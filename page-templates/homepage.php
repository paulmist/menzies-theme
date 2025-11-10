<?php
/**
 * Template Name: Homepage
 *
 * Template for displaying the homepage.
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

<div class="wrapper" id="homepage-carousel-wrapper">

	<?php get_template_part( 'section-templates/section', 'carousel' ); ?>

</div>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-8 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						// if ( comments_open() || get_comments_number() ) :
						// 	comments_template();
						// endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

			<div class="col-md-4">

				<?php if( have_rows('affiliation_banner') ): ?>

					<div class="homepage-affiliate">

				    <?php while ( have_rows('affiliation_banner') ) : the_row(); ?>

				        <img class="home-hlb-logo" src="<?php the_sub_field('logo'); ?>" alt="affiliation_banner">
				        <?php the_sub_field('content'); ?>

				    <?php endwhile; ?>

				    </div>

				<?php endif; ?>

			</div>

		</div><!-- .row end -->
		<h2 class="row sector-title" id="h-sectors">Sectors</h2>
		<div class="row homepage-links-row">

			<?php if( have_rows('sector_links', 'option') ): ?>

			    <?php while ( have_rows('sector_links', 'option') ) : the_row(); ?>

			    	<div class="col-md-3 col-6 homepage-links-item">

			    		<?php $icon = get_sub_field('icon'); ?>

			    		<a href="<?php the_sub_field('link'); ?>"><img src="<?php echo $icon; ?>" alt="<?php the_sub_field('title'); ?>" class="homepage-link-icon"></a>

			        	<a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('title'); ?></a>

			        </div>

			    <?php endwhile; ?>

			<?php endif; ?>

		</div>	

	</div>

</div>

<div class="wrapper" id="homepage-posts-wrapper">

	<?php get_template_part( 'section-templates/section', 'sub-banners' ); ?>

	<?php get_template_part( 'section-templates/section', 'sub-menus' ); ?>

	<?php get_template_part( 'section-templates/section', 'homegrid' ); ?>

</div>

<div class="wrapper awards-wrapper">

	<?php get_template_part( 'section-templates/section', 'awards' ); ?>

</div> 





<!-- <div class="wrapper partners-wrapper">

	<?php // get_template_part( 'section-templates/section', 'partners' ); ?>

</div> -->

<?php get_footer(); ?>
