// Sticky nav bar
var $win = $(window)
  , $navBar = $('#primary')
  , navBarTop = $('#primary').length && $('#primary').offset().top - 0
  , isFixed = 0

processScroll()

$win.on('scroll', processScroll)

function processScroll() {
  var i, scrollTop = $win.scrollTop()
  if (scrollTop >= navBarTop && !isFixed) {
    isFixed = 1
    $navBar.addClass('navbar-fixed')
  } else if (scrollTop <= navBarTop && isFixed) {
    isFixed = 0
    $navBar.removeClass('navbar-fixed')
  }
}
