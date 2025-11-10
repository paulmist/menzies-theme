<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper" id="search-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
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

				<header class="page-header">

					<h1 class="page-title">
						<?php
						printf(
							/* translators: %s: query term */
							esc_html__( 'Search Results for: %s', 'understrap' ),
							'<span>' . get_search_query() . '</span>'
						);
						?>
					</h1>

				</header><!-- .page-header -->

				<div id="archive-list-row" class="row archive-list-row grid">

					<?php if ( have_posts() ) : ?>

						<div class="col-lg-4 col-md-6 grid-item grid-sizer archive-filter-item">

							<div class="archive-filters insights-page-filters">

								<!--<h2><?php _e( 'Filter results', 'menziestheme'); ?></h2> -->

								<div class="filter-section">



									<nav class="filter-menu insights-filters">
										<?php
										wp_nav_menu(array(
											'menu'            => 'Insights landing page menu',
											'container'       => '',
											'container_id'    => ' ',
											'menu_class'      => '',
											'menu_id'            => 'insights-nav',
											'echo'            => true
										));
										?>
									</nav>

								</div>

								<form id="labnol" action="<?php echo home_url(); ?>" method="get">

									<div class="speech">
										<input type="text" name="s" value="" id="transcript" placeholder="Search.." />
										<a onClick="startDictation()" onTouchTap="startDictation()" ontouchstart="startDictation()" class="search-mic-icon" alt="search mic" style="cursor:pointer;"><i class="fa fa-microphone" aria-hidden="true"></i></a><input type="submit">
									</div>

								</form>

								<a class="filter-toggle" data-toggle="collapse" href="#filter-container" role="button" aria-expanded="false" aria-controls="filter-container">
									<div class="filter-toggle-text"><?php _e( 'Filters', 'menziestheme'); ?></div><i class="fa fa-plus-square" aria-hidden="true"></i>
								</a>



							</div>

						</div>

						<div class="facetwp-template">

							<?php // Start the Loop  ?>
							<?php while ( have_posts() ) : the_post(); ?>

								<?php
								get_template_part( 'loop-templates/content', get_post_format() );
								?>

							<?php endwhile; ?>

							<div class="col-md-12 grid-item"><?php echo do_shortcode( '[facetwp pager="true"]' ); ?></div>

						</div>	

					</div>			

				</main><!-- #main -->

				<!-- The pagination component -->
				<?php // understrap_pagination(); ?>

				<!-- Do the right sidebar check -->
				<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

			</div><!-- .row -->

		</div><!-- #content -->

	</div><!-- #search-wrapper -->

	<div class="wrapper-links">

		<?php // get_template_part( 'section-templates/section', 'suggested' ); ?>

		<?php // understrap_post_nav(); ?>	

	</div>	

<?php else : ?>	

	<div class="col-md-8 grid-item nothing-found-box">	

		<?php // get_template_part( 'loop-templates/content', 'none' ); ?>
		<h1 class="page-title"><?php the_field('empty_search_title', 'option'); ?></h1>
		

		<p><?php the_field('empty_search_text', 'option'); ?></p>

		<div class="search-empty-form">
			

			<form id="labnol" action="<?php echo home_url(); ?>" method="get">

				<div class="speech">
					<input type="text" name="s" value="" id="transcript" placeholder="Search.." />
					<img onclick="startDictation()" src="//i.imgur.com/cHidSVu.gif" class="search-mic-icon" />
				</div>

			</form>

		</div>	

		<a href="javascript:history.back()" class="back-link">Go Back</a>

	</div>	

	<div class="wrapper-links">

		<?php // get_template_part( 'section-templates/section', 'suggested' ); ?>

	</div>	

</div>			

</main><!-- #main -->

<!-- The pagination component -->
<?php // understrap_pagination(); ?>

<!-- Do the right sidebar check -->
<?php get_template_part( 'global-templates/right-sidebar-check' ); ?>

</div><!-- .row -->

</div><!-- #content -->

</div><!-- #search-wrapper -->

<div class="wrapper-links">

	<?php get_template_part( 'section-templates/section', 'suggested' ); ?>

	<?php // understrap_post_nav(); ?>	

</div>	

<?php endif; ?>	



<?php get_footer(); ?>
