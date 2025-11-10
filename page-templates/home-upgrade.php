<?php
/**
 * Template Name: Homepage Upgrade
 *
 * Template for displaying the homepage upgrade.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<span id="homepage-flag" style="display: none"></span>

<div class="wrapper p-b-none" id="full-width-page-wrapper">

	<div class="" id="content">

				<main class="site-main site-home" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'empty' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						// if ( comments_open() || get_comments_number() ) :
						// 	comments_template();
						// endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->		

	</div>

</div>

<?php get_footer(); ?>
