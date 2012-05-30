<?php
/*
Template Name: Home
*/


get_header(); ?>

<!-- Page specific styles -->
<link href="<?php bloginfo( 'template_directory' ); ?>/assets/css/areas/home.css" rel="stylesheet">
	
<!-- ======================= -->
<!-- =====  HEADER   ======= -->
<!-- ======================= -->
<header>
	<!-- ======  HERO  ====== -->
	<section class="hero">
		<p class="intro">The debut EP produced by<br />
	   Danton Supple (<span>Coldplay</span>, <span>Morrissey</span>, <span>Starsailor</span>) is scheduled for release on<br />
	   the summer solstice, June 20th.
	</p>
		<div class="art-header-inner">
			<h1 class="art-title">DAWNS</h1>
			<p>
				featuring <span>“Better to Love Than”</span> and <span>“Taillights”</span>
			</p>
		</div>
	</section>
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
				<!-- =====  SIDEBAR (left)  ====== -->
  				<!-- =====  ==============  ====== -->
  				<div class="span3">
  					<?php get_sidebar('secondary'); ?>
  				</div>
  				<!-- =====  CONTENT (Middle)  ====== -->
  				<!-- =====  ================  ====== -->
  				<div class="span6">
  					<section class="news">
  						<h2>News</h2>
  						<!-- LOOP THROUGH NEWS POSTS -->
						<?php
						// The Query
						$news_query = new WP_Query( 'category_name=news' );						
						// The Loop
						while ( $news_query->have_posts() ) : $news_query->the_post(); 
						?>
						<!-- POST TEMPLATE -->
						<div class="post">
							<!-- POST TITLE -->
							<h3><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
							<!-- TIMESTAMP -->
							<p class="meta"><?php the_time('M j, Y') ?></p>
							<!-- POST CONTENT -->
							<?php the_content( __( 'Continue reading &rarr;', 'twentyten' ) ); ?>
						</div>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
						<a href="/dawns/category/news" class="more">View more news   →</a>
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
<script src="<?php bloginfo( 'template_directory' ); ?>/assets/js/areas/home-min.js"></script>

<script type="text/javascript">
$(document).ready(
	function(){
		$(".art-title").lettering();
	}
);
</script>

<?php get_footer(); ?>