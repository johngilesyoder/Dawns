<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage DAWNS
 */

get_header(); ?>

<!-- Page specific styles -->
<link href="<?php bloginfo( 'template_directory' ); ?>/assets/css/areas/category.css" rel="stylesheet">

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

					<h2 class="page-title"><?php
						printf( __( '%s', 'twentyten' ), '' . single_cat_title( '', false ) . '' );
					?></h2>
					<?php
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo '' . $category_description . '';
	
					/* Run the loop for the category page to output the posts.
					 * If you want to overload this in a child theme then include a file
					 * called loop-category.php and that will be used instead.
					 */
					get_template_part( 'loop', 'category' );
					?>
					
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