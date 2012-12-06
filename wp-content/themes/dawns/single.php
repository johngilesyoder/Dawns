<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage DAWNS
 */

get_header(); ?>

<!-- Page specific styles -->
<link href="<?php bloginfo( 'template_directory' ); ?>/assets/css/areas/post.css" rel="stylesheet">

<!-- ======================= -->
<!-- =====  HEADER   ======= -->
<!-- ======================= -->
<header>
	<!-- ======  Header  ====== -->
	<a href="http://www.dawnsiscoming.com/home/">
		<section class="header">
			<h1 class="art-title">DAWNS</h1>
		</section>
	</a>
</header>

<!-- =====  PRIMARY NAVIGATION  ====== -->
<div class="navbar-placeholder">
	<?php wp_nav_menu( array( 'container' => 'nav', 'container_id' => 'primary', 'menu' => 'Primary Navigation', 'menu_class' => 'container' ) ); ?>
</div>

<!-- ======================= -->
<!-- ======  PAGE  ========= -->
<!-- ======================= -->

<!-- ======  PAGE CONTAINER  ====== -->
<div class="page">
	<div class="wrapper">
		<!-- ======  PAGE SPECIFIC CONTENT  ====== -->
		<div class="container">
			<div class="row">
				<!-- =====  CONTENT (Left)  ====== -->
				<!-- =====  ================  ====== -->
				<div class="span9">
					<section class="news">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>					
						<h2><?php the_title(); ?></h2>
							<!-- TIMESTAMP -->
							<p class="meta"><?php the_time('M j, Y') ?></p>
							<div class="content">
								<?php the_content(); ?>
							</div>
					<?php endwhile; ?>
					</section>
				</div>
				<!-- =====  SIDEBAR (right)  ====== -->
  				<!-- =====  ===============  ====== -->
  				<div class="span3">
  					<?php get_sidebar(); ?>
  				</div>
  			</div>
  		</div>
	</div>
</div>

<!-- Page specific scripts/options -->
<script type="text/javascript">
$(document).ready(
	function(){
		$(".art-title").lettering();
	}
);
</script>


<?php get_footer(); ?>