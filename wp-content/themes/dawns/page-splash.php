<?php
/*
Template Name: Splash
*/
?>

<!-- HEADER -->

<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage DAWNS
 */
?>
<!--[if lt IE 7 ]> <html lang="en" class="ie ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie ie7"> <![endif]--> 
<!--[if IE 8 ]>    <html lang="en" class="ie ie8"> <![endif]--> 
<!--[if IE 9 ]>    <html lang="en" class="ie ie9"> <![endif]--> 
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en" class="no-js" xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml"> <!--<![endif]-->
<head>
	<!-- OPEN GRAPH API -->
	<?php if (have_posts()):while(have_posts()):the_post(); endwhile; endif;?>
	<!-- the default values -->
	<meta property="fb:app_id" content="405126159531480" />
	<meta property="fb:admins" content="704446808"/>
	
	<!-- if page is content page -->
	<?php if (is_single()) { ?>
	<meta property="og:url" content="<?php the_permalink() ?>"/>
	<meta property="og:title" content="<?php single_post_title(''); ?>" />
	<meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
	<meta property="og:type" content="article" />
	<meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); }?>" />
	
	<!-- if page is others -->
	<?php } else { ?>
	<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
	<meta property="og:description" content="<?php bloginfo('description'); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:image" content="<?php bloginfo( 'template_directory' ); ?>/assets/img/og-logo.jpg" /> <?php } ?>

	<meta charset="utf-8" />
	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 * We filter the output of wp_title() a bit -- see
	 * twentyten_filter_wp_title() in functions.php.
	 */
	wp_title( '|', true, 'right' );

	?></title>
	
	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Global styles -->
	

	<!-- All JavaScript at the bottom, except for Modernizr, Respond, jQuery, lettering.js. -->
	<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/global/respond.min.js"></script>
	<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/global/modernizr.custom.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	
	<!-- Add support for CSS3 selectors to IE6-IE8 -->
	<!--[if (gte IE 6)&(lte IE 8)]>
	<script type="text/javascript" src="assets/js/global/selectivizr-min.js"></script>
	<![endif]-->
	
	<!-- Fav and Touch icons -->
	<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/assets/ico/favicon.ico">
    <link rel="apple-touch-icon" href="<?php bloginfo( 'template_directory' ); ?>/assets/ico/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo( 'template_directory' ); ?>/assets/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo( 'template_directory' ); ?>/assets/ico/apple-touch-icon-114x114.png">
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php
	
		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
	?>
</head>

<body <?php body_class(); ?>>
<!-- FACEBOOK SDK -->
<div id="fb-root"></div>  
<script>  
  window.fbAsyncInit = function() {  
    FB.init({appId: '405126159531480', status: true, cookie: true,  
             xfbml: true});  
  };  
  (function() {  
    var e = document.createElement('script'); e.async = true;  
    e.src = document.location.protocol +  
      '//connect.facebook.net/en_US/all.js';  
    document.getElementById('fb-root').appendChild(e);  
  }());  
</script>


<!-- PAGE -->


<!-- Page specific styles -->
<link href="<?php bloginfo( 'template_directory' ); ?>/assets/css/areas/splash.css" rel="stylesheet">
	
<!-- ======================= -->
<!-- =====  HEADER   ======= -->
<!-- ======================= -->
<header class="container">
	<div class="row">
		<div class="stores span2">
			<a href="#"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/splash/store-itunes.png" alt="Order on iTunes" title="Order on iTunes" /></a>
			<a href="#"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/splash/store-amazon.png" alt="Order on Amazon" title="Order on Amazon" /></a>
		</div>
		<a class="pull-right" href="http://www.dawnsiscoming.com/home/"><span>Continue to main site</span> &rarr;</a>	
	</div>
	<h1 class="logo">DAWNS - Debut EP release June 20th</h1>
</header>

<!-- ======================= -->
<!-- ======  PAGE  ========= -->
<!-- ======================= -->

<!-- ======  PAGE CONTAINER  ====== -->
<div class="page container">
	<div class="row">
		<div class="package package1 span6">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/splash/package-1.png" alt="Limited Edition Deluxe Package" title="Limited Edition Deluxe Package" />
			<h2>Limited Edition Deluxe (150 qty)</h2>
			<h3>exclusive to dawnsiscoming.com</h3>
			<p>American Apparel<sup>™</sup> Flex Fleece Hoodie, American Apparel<sup>™</sup> Tri-blend Tshirt,  AUTOGRAPHED High quality 11x17 print on glossy 10pt stock, plus the EP (CD &amp; download).</p>
			<span class="price">$65.00</span>
			<script type="text/javascript" src="http://cdn.topspin.net/javascripts/topspin_core.js?aId=21485&gat=UA-31947385-1&timestamp=1338866575"></script><a class="order-btn" href="http://www.spinshop.com/store/dawns/21485?aId=21485&cId=10221194&highlightColor=%23c9c9c9&offer_name=limitededitiondeluxepacka&theme=black&wId=149254">Pre-order Now</a>
		</div>
		<div class="package package2 span6">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/splash/package-2.png" alt="Deluxe Package" title="Deluxe Package" />
			<h2>Deluxe - Tshirt, Art Print, Music</h2>
			<h3>exclusive to dawnsiscoming.com</h3>
			<p>American Apparel<sup>™</sup> Tri-blend Tshirt,  High quality 11x17 print on glossy 10pt stock, plus the EP (CD &amp; download).</p>
			<span class="price">$30.00</span>
			<script type="text/javascript" src="http://cdn.topspin.net/javascripts/topspin_core.js?aId=21485&gat=UA-31947385-1&timestamp=1338867796"></script><a class="order-btn" href="http://www.spinshop.com/store/dawns/21485?aId=21485&cId=10221191&highlightColor=%23c9c9c9&offer_name=tshirtartprinteppreorder&theme=black&wId=149251">Pre-order Now</a>
		</div>
	</div>
	<div class="row">
		<div class="package package3 span4">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/splash/package-3.png" alt="The Music" title="The Music" />
			<h2>The Music</h2>
			<p>Fold-out digipack CD + digital download (high quality mp3, FLAC, or Apple Lossless).</p>
			<span class="price">$7.00</span>
			<script type="text/javascript" src="http://cdn.topspin.net/javascripts/topspin_core.js?aId=21485&gat=UA-31947385-1&timestamp=1338872742"></script><a class="order-btn" href="http://www.spinshop.com/store/dawns/21485?aId=21485&cId=10221178&highlightColor=%23c9c9c9&offer_name=dawnseppreorder&theme=black&wId=149239">Pre-order Now</a>
		</div>
		<div class="package package4 span4">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/splash/package-4.png" alt="Art Print + Music" title="Art Print + Music" />
			<h2>Art Print + Music</h2>
			<h3>exclusive to dawnsiscoming.com</h3>
			<p>High quality 11x17 print on glossy 10pt stock + the EP (CD &amp; download)</p>
			<span class="price">$15.00</span>
			<script type="text/javascript" src="http://cdn.topspin.net/javascripts/topspin_core.js?aId=21485&gat=UA-31947385-1&timestamp=1338872852"></script><a class="order-btn" href="http://www.spinshop.com/store/dawns/21485?aId=21485&cId=10221192&highlightColor=%23c9c9c9&offer_name=artprinteppreorder&theme=black&wId=149252">Pre-order Now</a>
		</div>
		<div class="package package5 span4">
			<img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/splash/package-5.png" alt="Tshirt + Music" title="Tshirt + Music" />
			<h2>Tshirt + Music</h2>
			<h3>exclusive to dawnsiscoming.com</h3>
			<p>American Apparel<sup>™</sup> Tri-blend Tshirt, plus the EP (CD &amp; download).</p>
			<span class="price">$28.00</span>
			<script type="text/javascript" src="http://cdn.topspin.net/javascripts/topspin_core.js?aId=21485&gat=UA-31947385-1&timestamp=1338885539"></script><a class="order-btn" href="http://www.spinshop.com/store/dawns/21485?aId=21485&cId=10221183&highlightColor=%23c9c9c9&offer_name=tshirteppreorder&theme=black&wId=149243">Pre-order&nbsp;Now</a>
		</div>
	</div>
	<div class="row notes">
		<p class="span12">* Pre-orders will be dispatched during the week of June 20th.</p>
		<a class="continue" href="http://www.dawnsiscoming.com/home/">Continue to DAWNSISCOMING.COM &rarr;</a>
	</div>
	<div class="row">
		<div class="span12">
			<p class="pull-left">© 2012 DAWNS music. All rights reserved.</p>
			<p class="pull-right">For questions or support, please contact our <a href="mailto:peterhortonmt@gmail.com">customer support team</a>.</p>
		</div>
</div>

<!-- Page specific scripts/options -->

<script type="text/javascript">
$(document).ready(
	function(){
	
	}
);
</script>


<!-- FOOTER -->

<!-- ============================================== -->
<!-- JavaScript at the bottom for fast page loading -->
<!-- ============================================== -->

<!-- Libraries -->

<!-- Global scripts/options concatenated and minified via Codekit-->
<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/global/plugins-min.js"></script>

<script type="text/javascript">
$(document).ready(

);
</script>

<!-- Google Analytics -->
<script>
//window._gaq = [['_setAccount','UAXXXXXXXX1'],['_trackPageview'],['_trackPageLoadTime']];
//Modernizr.load({
//  load: ('https:' == location.protocol ? '//ssl' : '//www') + '.google-analytics.com/ga.js'
//});
</script>

<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
chromium.org/developers/how-tos/chrome-frame-getting-started -->
<!--[if lt IE 7 ]>
<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->



<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>