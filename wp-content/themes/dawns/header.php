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
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
	
	<!-- Global styles -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<!-- All JavaScript at the bottom, except for Modernizr, Respond, jQuery, lettering.js. -->
	<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/global/respond.min.js"></script>
	<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/global/modernizr.custom.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/global/lettering-0.6.1.js"></script>
	
	<!-- Add support for CSS3 selectors to IE6-IE8 -->
	<!--[if (gte IE 6)&(lte IE 8)]>
	<script type="text/javascript" src="assets/js/global/selectivizr-min.js"></script>
	<![endif]-->
	
	<!-- Fav and Touch icons -->
	<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/assets/ico/favicon.ico">
    <link rel="apple-touch-icon" href="<?php bloginfo( 'template_directory' ); ?>/assets/ico/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php bloginfo( 'template_directory' ); ?>/assets/ico/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php bloginfo( 'template_directory' ); ?>/assets/ico/apple-touch-icon-114x114.png">
    
    
	<link href="<?php bloginfo( 'template_directory' ); ?>/assets/css/areas/widgets.css" rel="stylesheet">
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );
	
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