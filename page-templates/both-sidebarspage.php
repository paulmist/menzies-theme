<?php
/**
 * Template Name: Left and Right Sidebar Layout
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
$has_hero = "no-hero";
if( has_post_thumbnail() ) {
	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
	$has_hero = "yes-hero";
} else {
	$get_old_header = get_field('header_image');
	$featured_img_url = $get_old_header['url'];
	$has_hero = "yes-hero";
}
?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<?php get_template_part( 'sidebar-templates/sidebar', 'left' ); ?>

			<div
				class="<?php
					if ( is_active_sidebar( 'left-sidebar' ) xor is_active_sidebar( 'right-sidebar' ) ) : ?>col-md-8<?php
					elseif ( is_active_sidebar( 'left-sidebar' ) && is_active_sidebar( 'right-sidebar' ) ) : ?>col-md-4<?php
					else : ?>col-md-12<?php
					endif; ?> content-area"
				id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

			<?php get_template_part( 'sidebar-templates/sidebar', 'right' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- page-wrapper -->

<?php get_footer(); ?>
