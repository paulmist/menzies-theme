<?php
/**
 * The template for displaying partners archive pages.
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
						<h1><?php _e( 'Partners', 'menziestheme'); ?></h1>
						<?php
						// the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<div id="archive-partners-row" class="row archive-partners-row ">

						<?php // Start the Loop  ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<div class="col-6 col-sm-4">

								<a href="<?php the_field('link'); ?>" target="_blank">

									<div class="partner_list-item">

										<?php the_post_thumbnail(); ?>

										<h2 style="display: none;"><?php the_title(); ?></h2>

									</div>

								</a>

							</div>

						<?php endwhile; ?>

						<div class="col-md-12 grid-item"><?php echo do_shortcode( '[facetwp pager="true"]' ); ?></div>

					</div>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

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
