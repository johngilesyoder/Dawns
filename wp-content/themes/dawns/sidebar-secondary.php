<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage DAWNS
 */
?>
	<section class="instagram">
		<h2>Instagram</h2>
		<?php echo do_shortcode('[instapress userid="dawnsmusic" piccount="4"]'); ?>
		<div class="clear"></div>
	  	<a href="/galleries" class="more">View more photos   →</a>
	</section>
	<?php dynamic_sidebar( 'secondary' ); ?>
	<!-- =====  TWITTER  ====== -->
	<section class="twitter">
	<h2>Twitter</h2>
		<div class="tweet">
			<p><?php aktt_latest_tweet(); ?></p>
		</div>
		<a href="https://twitter.com/dawnsiscoming" class="twitter-follow-button" data-show-count="false" data-size="large">Follow @dawnsiscoming</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</section>

