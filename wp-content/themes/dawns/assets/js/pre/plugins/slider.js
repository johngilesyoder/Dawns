/*
 * jQuery UI Slider 1.8.18
 *
 * Copyright 2011, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Slider
 *
 * Depends:
 *	jquery.ui.core.js
 *	jquery.ui.mouse.js
 *	jquery.ui.widget.js
 */
(function(a, b) {
	var c = 5;
	a.widget("ui.slider", a.ui.mouse, {
		widgetEventPrefix: "slide",
		options: {
			animate: !1,
			distance: 0,
			max: 100,
			min: 0,
			orientation: "horizontal",
			range: !1,
			step: 1,
			value: 0,
			values: null
		},
		_create: function() {
			var b = this,
				d = this.options,
				e = this.element.find(".ui-slider-handle").addClass("ui-state-default ui-corner-all"),
				f = "<a class='ui-slider-handle ui-state-default' href='#'></a>",
				g = d.values && d.values.length || 1,
				h = [];
			this._keySliding = !1, this._mouseSliding = !1, this._animateOff = !0, this._handleIndex = null, this._detectOrientation(), this._mouseInit(), this.element.addClass("ui-slider" + (d.disabled ? " ui-slider-disabled ui-disabled" : "")), this.range = a([]), d.range && (d.range === !0 && (d.values || (d.values = [this._valueMin(), this._valueMin()]), d.values.length && d.values.length !== 2 && (d.values = [d.values[0], d.values[0]])), this.range = a("<div></div>").appendTo(this.element).addClass("ui-slider-range" + (d.range === "min" || d.range === "max" ? " ui-slider-range-" + d.range : "")));
			for (var i = e.length; i < g; i += 1) h.push(f);
			this.handles = e.add(a(h.join("")).appendTo(b.element)), this.handle = this.handles.eq(0), this.handles.add(this.range).filter("a").click(function(a) {
				a.preventDefault()
			}).hover(function() {
				d.disabled || a(this).addClass("ui-state-hover")
			}, function() {
				a(this).removeClass("ui-state-hover")
			}).focus(function() {
				d.disabled ? a(this).blur() : (a(".ui-slider .ui-state-focus").removeClass("ui-state-focus"), a(this).addClass("ui-state-focus"))
			}).blur(function() {
				a(this).removeClass("ui-state-focus")
			}), this.handles.each(function(b) {
				a(this).data("index.ui-slider-handle", b)
			}), this.handles.keydown(function(d) {
				var e = a(this).data("index.ui-slider-handle"),
					f, g, h, i;
				if (!b.options.disabled) {
					switch (d.keyCode) {
					case a.ui.keyCode.HOME:
					case a.ui.keyCode.END:
					case a.ui.keyCode.PAGE_UP:
					case a.ui.keyCode.PAGE_DOWN:
					case a.ui.keyCode.UP:
					case a.ui.keyCode.RIGHT:
					case a.ui.keyCode.DOWN:
					case a.ui.keyCode.LEFT:
						d.preventDefault();
						if (!b._keySliding) {
							b._keySliding = !0, a(this).addClass("ui-state-active"), f = b._start(d, e);
							if (f === !1) return
						}
					}
					i = b.options.step, b.options.values && b.options.values.length ? g = h = b.values(e) : g = h = b.value();
					switch (d.keyCode) {
					case a.ui.keyCode.HOME:
						h = b._valueMin();
						break;
					case a.ui.keyCode.END:
						h = b._valueMax();
						break;
					case a.ui.keyCode.PAGE_UP:
						h = b._trimAlignValue(g + (b._valueMax() - b._valueMin()) / c);
						break;
					case a.ui.keyCode.PAGE_DOWN:
						h = b._trimAlignValue(g - (b._valueMax() - b._valueMin()) / c);
						break;
					case a.ui.keyCode.UP:
					case a.ui.keyCode.RIGHT:
						if (g === b._valueMax()) return;
						h = b._trimAlignValue(g + i);
						break;
					case a.ui.keyCode.DOWN:
					case a.ui.keyCode.LEFT:
						if (g === b._valueMin()) return;
						h = b._trimAlignValue(g - i)
					}
					b._slide(d, e, h)
				}
			}).keyup(function(c) {
				var d = a(this).data("index.ui-slider-handle");
				b._keySliding && (b._keySliding = !1, b._stop(c, d), b._change(c, d), a(this).removeClass("ui-state-active"))
			}), this._refreshValue(), this._animateOff = !1
		},
		destroy: function() {
			this.handles.remove(), this.range.remove(), this.element.removeClass("ui-slider ui-slider-disabled").removeData("slider").unbind(".slider"), this._mouseDestroy();
			return this
		},
		_mouseCapture: function(b) {
			var c = this.options,
				d, e, f, g, h, i, j, k, l;
			if (c.disabled) return !1;
			this.elementSize = {
				width: this.element.outerWidth(),
				height: this.element.outerHeight()
			}, this.elementOffset = this.element.offset(), d = {
				x: b.pageX,
				y: b.pageY
			}, e = this._normValueFromMouse(d), f = this._valueMax() - this._valueMin() + 1, h = this, this.handles.each(function(b) {
				var c = Math.abs(e - h.values(b));
				f > c && (f = c, g = a(this), i = b)
			}), c.range === !0 && this.values(1) === c.min && (i += 1, g = a(this.handles[i])), j = this._start(b, i);
			if (j === !1) return !1;
			this._mouseSliding = !0, h._handleIndex = i, g.addClass("ui-state-active").focus(), k = g.offset(), l = !a(b.target).parents().andSelf().is(".ui-slider-handle"), this._clickOffset = l ? {
				left: 0,
				top: 0
			} : {
				left: b.pageX - k.left - g.width() / 2,
				top: b.pageY - k.top - g.height() / 2 - (parseInt(g.css("borderTopWidth"), 10) || 0) - (parseInt(g.css("borderBottomWidth"), 10) || 0) + (parseInt(g.css("marginTop"), 10) || 0)
			}, this.handles.hasClass("ui-state-hover") || this._slide(b, i, e), this._animateOff = !0;
			return !0
		},
		_mouseStart: function(a) {
			return !0
		},
		_mouseDrag: function(a) {
			var b = {
				x: a.pageX,
				y: a.pageY
			},
				c = this._normValueFromMouse(b);
			this._slide(a, this._handleIndex, c);
			return !1
		},
		_mouseStop: function(a) {
			this.handles.removeClass("ui-state-active"), this._mouseSliding = !1, this._stop(a, this._handleIndex), this._change(a, this._handleIndex), this._handleIndex = null, this._clickOffset = null, this._animateOff = !1;
			return !1
		},
		_detectOrientation: function() {
			this.orientation = this.options.orientation === "vertical" ? "vertical" : "horizontal"
		},
		_normValueFromMouse: function(a) {
			var b, c, d, e, f;
			this.orientation === "horizontal" ? (b = this.elementSize.width, c = a.x - this.elementOffset.left - (this._clickOffset ? this._clickOffset.left : 0)) : (b = this.elementSize.height, c = a.y - this.elementOffset.top - (this._clickOffset ? this._clickOffset.top : 0)), d = c / b, d > 1 && (d = 1), d < 0 && (d = 0), this.orientation === "vertical" && (d = 1 - d), e = this._valueMax() - this._valueMin(), f = this._valueMin() + d * e;
			return this._trimAlignValue(f)
		},
		_start: function(a, b) {
			var c = {
				handle: this.handles[b],
				value: this.value()
			};
			this.options.values && this.options.values.length && (c.value = this.values(b), c.values = this.values());
			return this._trigger("start", a, c)
		},
		_slide: function(a, b, c) {
			var d, e, f;
			this.options.values && this.options.values.length ? (d = this.values(b ? 0 : 1), this.options.values.length === 2 && this.options.range === !0 && (b === 0 && c > d || b === 1 && c < d) && (c = d), c !== this.values(b) && (e = this.values(), e[b] = c, f = this._trigger("slide", a, {
				handle: this.handles[b],
				value: c,
				values: e
			}), d = this.values(b ? 0 : 1), f !== !1 && this.values(b, c, !0))) : c !== this.value() && (f = this._trigger("slide", a, {
				handle: this.handles[b],
				value: c
			}), f !== !1 && this.value(c))
		},
		_stop: function(a, b) {
			var c = {
				handle: this.handles[b],
				value: this.value()
			};
			this.options.values && this.options.values.length && (c.value = this.values(b), c.values = this.values()), this._trigger("stop", a, c)
		},
		_change: function(a, b) {
			if (!this._keySliding && !this._mouseSliding) {
				var c = {
					handle: this.handles[b],
					value: this.value()
				};
				this.options.values && this.options.values.length && (c.value = this.values(b), c.values = this.values()), this._trigger("change", a, c)
			}
		},
		value: function(a) {
			if (arguments.length) this.options.value = this._trimAlignValue(a), this._refreshValue(), this._change(null, 0);
			else return this._value()
		},
		values: function(b, c) {
			var d, e, f;
			if (arguments.length > 1) this.options.values[b] = this._trimAlignValue(c), this._refreshValue(), this._change(null, b);
			else {
				if (!arguments.length) return this._values();
				if (!a.isArray(arguments[0])) return this.options.values && this.options.values.length ? this._values(b) : this.value();
				d = this.options.values, e = arguments[0];
				for (f = 0; f < d.length; f += 1) d[f] = this._trimAlignValue(e[f]), this._change(null, f);
				this._refreshValue()
			}
		},
		_setOption: function(b, c) {
			var d, e = 0;
			a.isArray(this.options.values) && (e = this.options.values.length), a.Widget.prototype._setOption.apply(this, arguments);
			switch (b) {
			case "disabled":
				c ? (this.handles.filter(".ui-state-focus").blur(), this.handles.removeClass("ui-state-hover"), this.handles.propAttr("disabled", !0), this.element.addClass("ui-disabled")) : (this.handles.propAttr("disabled", !1), this.element.removeClass("ui-disabled"));
				break;
			case "orientation":
				this._detectOrientation(), this.element.removeClass("ui-slider-horizontal ui-slider-vertical").addClass("ui-slider-" + this.orientation), this._refreshValue();
				break;
			case "value":
				this._animateOff = !0, this._refreshValue(), this._change(null, 0), this._animateOff = !1;
				break;
			case "values":
				this._animateOff = !0, this._refreshValue();
				for (d = 0; d < e; d += 1) this._change(null, d);
				this._animateOff = !1
			}
		},
		_value: function() {
			var a = this.options.value;
			a = this._trimAlignValue(a);
			return a
		},
		_values: function(a) {
			var b, c, d;
			if (arguments.length) {
				b = this.options.values[a], b = this._trimAlignValue(b);
				return b
			}
			c = this.options.values.slice();
			for (d = 0; d < c.length; d += 1) c[d] = this._trimAlignValue(c[d]);
			return c
		},
		_trimAlignValue: function(a) {
			if (a <= this._valueMin()) return this._valueMin();
			if (a >= this._valueMax()) return this._valueMax();
			var b = this.options.step > 0 ? this.options.step : 1,
				c = (a - this._valueMin()) % b,
				d = a - c;
			Math.abs(c) * 2 >= b && (d += c > 0 ? b : -b);
			return parseFloat(d.toFixed(5))
		},
		_valueMin: function() {
			return this.options.min
		},
		_valueMax: function() {
			return this.options.max
		},
		_refreshValue: function() {
			var b = this.options.range,
				c = this.options,
				d = this,
				e = this._animateOff ? !1 : c.animate,
				f, g = {},
				h, i, j, k;
			this.options.values && this.options.values.length ? this.handles.each(function(b, i) {
				f = (d.values(b) - d._valueMin()) / (d._valueMax() - d._valueMin()) * 100, g[d.orientation === "horizontal" ? "left" : "bottom"] = f + "%", a(this).stop(1, 1)[e ? "animate" : "css"](g, c.animate), d.options.range === !0 && (d.orientation === "horizontal" ? (b === 0 && d.range.stop(1, 1)[e ? "animate" : "css"]({
					left: f + "%"
				}, c.animate), b === 1 && d.range[e ? "animate" : "css"]({
					width: f - h + "%"
				}, {
					queue: !1,
					duration: c.animate
				})) : (b === 0 && d.range.stop(1, 1)[e ? "animate" : "css"]({
					bottom: f + "%"
				}, c.animate), b === 1 && d.range[e ? "animate" : "css"]({
					height: f - h + "%"
				}, {
					queue: !1,
					duration: c.animate
				}))), h = f
			}) : (i = this.value(), j = this._valueMin(), k = this._valueMax(), f = k !== j ? (i - j) / (k - j) * 100 : 0, g[d.orientation === "horizontal" ? "left" : "bottom"] = f + "%", this.handle.stop(1, 1)[e ? "animate" : "css"](g, c.animate), b === "min" && this.orientation === "horizontal" && this.range.stop(1, 1)[e ? "animate" : "css"]({
				width: f + "%"
			}, c.animate), b === "max" && this.orientation === "horizontal" && this.range[e ? "animate" : "css"]({
				width: 100 - f + "%"
			}, {
				queue: !1,
				duration: c.animate
			}), b === "min" && this.orientation === "vertical" && this.range.stop(1, 1)[e ? "animate" : "css"]({
				height: f + "%"
			}, c.animate), b === "max" && this.orientation === "vertical" && this.range[e ? "animate" : "css"]({
				height: 100 - f + "%"
			}, {
				queue: !1,
				duration: c.animate
			}))
		}
	}), a.extend(a.ui.slider, {
		version: "1.8.18"
	})
})(jQuery);
