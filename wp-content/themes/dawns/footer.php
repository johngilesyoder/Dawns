<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */
?>

<!-- ======================= -->
<!-- ======  FOOTER  ======= -->
<!-- ======================= -->
<footer>
<div class="container">
	<ul class="networks">
		<li><a href="http://www.facebook.com/dawnsiscoming"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/footer/facebook.png"/></a></li>
		<li><a href="http://www.twitter.com/dawnsiscoming"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/footer/twitter.png"/></a></li>
		<li><a href="http://www.youtube.com/dawnsiscoming"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/footer/youtube.png"/></a></li>
		<li><a href="#"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/footer/itunes.png"/></a></li>
		<li><a href="#"><img src="<?php bloginfo( 'template_directory' ); ?>/assets/img/footer/amazon.png"/></a></li>
	</ul>
	<!-- FOOTER NAVIGATION -->
	<?php wp_nav_menu( array( 'container' => 'nav', 'menu' => 'Footer Navigation' ) ); ?>
	<p class="legal">
		© 2012 DAWNS &nbsp;&nbsp;|&nbsp;&nbsp; <a href="mailto:davidboonemusic@gmail.com">General Inquiries</a> &nbsp;&nbsp;|&nbsp;&nbsp; Site Design by <a href="http://skycatchfire.com" target="_blank">SKYCATCHFIRE®</a>
	</p>
</div>
</footer>

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
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>


<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
</body>
</html>