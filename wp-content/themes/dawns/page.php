<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Starkers
 * @since Starkers 3.0
 */

get_header(); ?>

<!-- Page specific styles -->
<link href="<?php bloginfo( 'template_directory' ); ?>/assets/css/areas/page.css" rel="stylesheet">

<!-- ======================= -->
<!-- =====  HEADER   ======= -->
<!-- ======================= -->
<header>
	<!-- ======  Header  ====== -->
	<a href="/">
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
							<div class="content">
								<h2 class="page-title"><?php the_title(); ?></h2>				
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