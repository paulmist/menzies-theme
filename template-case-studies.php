<?php
    /*Template Name: Employee Testimonials*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper t" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<div class="crumbs-box full-width-crumbs">
					<?php
					if ( function_exists('yoast_breadcrumb') ) {
						  yoast_breadcrumb( '<div id="breadcrumbs">','</div>' );
						}
					?>
				</div>

				<?php if ( have_posts() ) : ?>

					<header class="page-header">

						<h1 class="page-title"><?php _e( 'Employee Testimonials', 'menziestheme'); ?></h1>

					</header><!-- .page-header -->

					<div id="archive-list-row" class="row archive-list-row grid">

						<div class="col-lg-4 col-md-6 grid-item grid-sizer archive-filter-item">

							<div class="archive-filters insights-page-filters testimonial-filters">
							

								<!-- <h2><?php _e( 'Filters', 'menziestheme'); ?></h2> -->

								<div class="filter-section">

									<nav class="filter-menu insights-filters">
										<?php 
											wp_nav_menu(array(
											  'menu'			=> 'Case Studies Menu',
											  'container'       => '', 
											  'container_id'    => ' ',
											  'menu_class'      => '',			
											  'menu_id'			=> 'case-studies-nav',
											  'echo'            => true));
										?>	 
									</nav>	

								</div>

								

								

							</div>

						</div>

						<div class="facetwp-template">


						<?php
							$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
							$args = array(
								'post_type' => 'employee-testimonial',
								'paged' => $paged,
								'posts_per_page' => 12,
								'facetwp' => true,

							);
							query_posts($args);
							?>

							<?php if (have_posts()) : ?>
								<?php while (have_posts()) : the_post(); ?>
									<?php get_template_part('loop-templates/content', 'employee-testimonial'); ?>
								<?php endwhile; ?>
							</div>

								<!-- Add pagination links -->
								<div class="facets-loadmore-holder">

<?php echo do_shortcode('[facetwp facet="pagination"]'); ?>

</div>
								

							<?php else : ?>
								<div class="col-md-8 grid-item nothing-found">	

									<h1 class="page-title">Nothing Found</h1>

									<p>Sorry, but nothing matched your search terms.</p>

									<div class="search-empty-form">

									

									</div>	

								</div>
							<?php endif; ?>


						</div>	



					</div>

				<?php endif; ?>

			</main><!-- #main -->

		

		

			<!-- The pagination component -->
			<?php // understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div> <!-- .row -->

	</div><!-- #content -->

	</div><!-- #archive-wrapper -->

<?php get_footer(); ?>

