<?php
/**
 * Template Name: Awards page
 *
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
?>

<div class="wrapper" id="full-width-page-wrapper">

	<?php if($featured_img_url): ?>

		<div class="wrapper single-hero-wrapper" style="background-image: url('<?php echo $featured_img_url; ?>');">

			<div class="<?php echo esc_attr( $container ); ?>" id="single-header" tabindex="-1">

				<div class="row">

					<div class="col-md-12">	

						<header class="entry-header">

							<span class="hero-title">
								<?php _e( 'Awards', 'menziestheme'); ?>
							</span>

						</header><!-- .entry-header -->

					</div>

				</div>

			</div>

		</div>

	<?php endif; ?>

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area awards-content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<div class="crumbs-box full-width-crumbs">
					<?php
					if ( function_exists('yoast_breadcrumb') ) {
						  yoast_breadcrumb( '<div id="breadcrumbs">','</div>' );
						}
					?>
					</div>

					<?php while ( have_posts() ) : the_post(); ?>

						<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

							<header class="entry-header">

								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

							

							</header><!-- .entry-header -->

							<div class="entry-content">

								<?php the_content(); ?>

							</div><!-- .entry-content -->

						</article><!-- #post-## -->

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

			<?php $award_item_count=1; ?>

			<?php
			$custom_query = new WP_Query( array( 
				'post_type' 		=> 'awards', 
				'orderby' 			=> 'date',
				'posts_per_page' 	=> 24,
				) 
			); 

			while($custom_query->have_posts()) : $custom_query->the_post(); ?>

				<div class="col-6 col-lg-3 col-md-4">

					<article class="award-post-item award-post-item-<?php echo $award_item_count; ?> ">

						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>

						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

					</article>

				</div>

				<?php $award_item_count++; ?>

			<?php 
			endwhile;
			wp_reset_postdata();
			?>

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
