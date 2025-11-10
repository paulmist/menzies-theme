<?php
/**
 * The template for displaying event archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<div class="crumbs-box full-width-crumbs">
					<?php
					if(function_exists('bcn_display'))
					{
					 bcn_display();
					}
					?>
				</div>

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1><?php _e( 'Insightss: Events', 'menziestheme'); ?></h1>
						<?php
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<div id="archive-list-row" class="row archive-list-row grid">

						<div class="col-lg-4 col-md-6 grid-item grid-sizer archive-filter-item">

							<div class="archive-filters insights-page-filters">
								
								

								<!-- <h2><?php _e( 'Filters', 'menziestheme'); ?></h2> -->

								<div class="filter-section">



<nav class="filter-menu insights-filters">
	<?php 
		wp_nav_menu(array(
		  'menu'			=> 'Insights landing page menu',
		  'container'       => '', 
		  'container_id'    => ' ',
		  'menu_class'      => '',			
		  'menu_id'			=> 'insights-nav',
		  'echo'            => true));
	?>	 
</nav>	

</div>



								<form id="labnol" action="<?php echo home_url(); ?>" method="get">

								    <div class="speech">
								    	<input type="text" name="s" value="" id="transcript" placeholder="Search.." />
								    	<img onclick="startDictation()" src="//i.imgur.com/cHidSVu.gif" class="search-mic-icon" /><input type="submit">
								    </div>

								</form>

								

								<a class="filter-toggle" data-toggle="collapse" href="#filter-container" role="button" aria-expanded="false" aria-controls="filter-container">
								    <div class="filter-toggle-text"><?php _e( 'Filters', 'menziestheme'); ?></div><i class="fa fa-plus-square" aria-hidden="true"></i>
								</a>



							</div>

						</div>

						<div class="facetwp-template">
							<?php $events_item_count=1; ?>

							<?php
							$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

							$custom_query = new WP_Query( array( 
								'post_type' 		=> 'events', 
								'meta_key'			=> 'date_of_event',
								'orderby' 			=> 'meta_value',
								'order' => 'DESC',
								'meta_type' => 'DATE',
								'facetwp' => true,
								'posts_per_page' 	=> 24,
								'paged'               => $paged,
								) 
							); ?>
							<?php // Start the Loop  ?>
							<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
							

								<?php
								get_template_part( 'loop-templates/content', get_post_format() );
								?>

							<?php endwhile; ?>

				

							

						</div>



						

					</div>

				<?php else : ?>

					<section class="no-results not-found">

						<header class="page-header">

							<h1 class="page-title"><?php esc_html_e( 'No Events Found', 'understrap' ); ?></h1>

						</header><!-- .page-header -->

						<div class="page-content">

							<p>Whoops! Looks like we don't have any new events scheduled.</p>

							<p>Please <a href="/contact-us/">contact</a> your local Menzies office to receive an update on any events you may have already registered to attend.</p>

							<div class="search-empty-form">

								<form id="labnol" action="<?php echo home_url(); ?>" method="get">

								    <div class="speech">
								    	<input type="text" name="s" value="" id="transcript" placeholder="Search.." />
								    	<img onclick="startDictation()" src="//i.imgur.com/cHidSVu.gif" class="search-mic-icon" />
								    </div>

								</form>

							</div>

						</div><!-- .page-content -->
						
					</section><!-- .no-results -->


				<?php endif; ?>

			</main><!-- #main -->

			<div class="facets-loadmore-holder">

			<?php echo do_shortcode('[facetwp facet="pagination"]'); ?>

		</div>

			<!-- The pagination component -->
			<?php // understrap_pagination(); ?>

			<!-- Do the right sidebar check -->
			<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div> <!-- .row -->

	</div><!-- #content -->

	</div><!-- #archive-wrapper -->

<?php get_footer(); ?>
