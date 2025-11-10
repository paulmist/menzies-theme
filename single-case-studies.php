<?php

/**
 * The template for displaying all single events.
 *
 * @package understrap
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<?php while (have_posts()) : the_post(); ?>

	<?php
	$author_object = get_field('author');
	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
	$has_hero = "no-hero";
	if (has_post_thumbnail()) {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
	}
	if ($featured_img_url) {
		$has_hero = "yes-hero";
	}
	?>

	<main class="site-main" id="main">

		<article <?php post_class($has_hero); ?> id="post-<?php the_ID(); ?>">

			<?php if ($featured_img_url) : ?>

				<div class="wrapper single-hero-wrapper" style="background-image: url('<?php echo $featured_img_url; ?>');">

					<?php if (!get_field('disable_image_overlay')) : ?><div class="img-overlay"></div><?php endif; ?>

					<div class="<?php echo esc_attr($container); ?>" id="single-header" tabindex="-1">

						<div class="row">

							<div class="col-md-12">

								<header class="entry-header">

									<div class="single-post-cat"><?php echo sprintf('<a href="%s">%s</a>', get_category_link($first_category), $first_category->name); ?></div>

									<?php the_title('<h1 class="entry-title">', '</h1>'); ?>

									<div class="entry-meta event-meta-hero">

										<!-- <?php
												// Author details
												if ($author_object) :
													// override $post
													$post = $author_object;
													setup_postdata($post);
												?>
									    <div class="author-meta">
									    	<?php _e('By ', 'menziestheme'); ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php _e(' - ', 'menziestheme'); ?><?php the_field('position'); ?>
									    </div>
									    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
										?>
									<?php endif; ?> -->

										<div class="post-meta">
											<span class="hero-meta-item"><?php the_field('date_of_event'); ?></span> - <span class="hero-meta-item"><?php the_field('location_event'); ?></span>
										</div>

									</div><!-- .entry-meta -->

								</header><!-- .entry-header -->

							</div>

						</div>

					</div>

				</div>

			<?php endif; ?>

			<div class="wrapper" id="single-wrapper">

				<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

					<div class="row">



						<div class="crumbs-box">
							<?php
							if (function_exists('yoast_breadcrumb')) {
								yoast_breadcrumb('<div id="breadcrumbs">', '</div>');
							}
							?>
						</div>







						<div class="entry-content">

							<?php if (!$featured_img_url) : ?>
								<header class="entry-header testimonial-header">

									<img src="<?php echo get_field('case_study_thumbnail_image'); ?>" alt="">




								</header><!-- .entry-header -->
							<?php endif; ?>

							<div class="testimonial-header-split p-b-small">
								<h2><?php echo get_field('case_study_employee_name'); ?> | <?php echo get_field('case_study_employee_position'); ?></h2>

								<h4><?php echo get_field('case_study_opening_statement'); ?></h4>
							</div>

							<?php the_content(); ?>

							<?php get_template_part('section-templates/section', 'share'); ?>

							<?php // if(function_exists('pf_show_link')){echo pf_show_link();} 
							?>



							<?php understrap_entry_footer(); ?>

						</div><!-- .entry-content -->

						<footer class="entry-footer">

							<?php
							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . __('Pages:', 'understrap'),
									'after'  => '</div>',
								)
							);
							?>

						</footer><!-- .entry-footer -->







					</div><!-- .row -->

				</div><!-- #content -->

			</div><!-- #single-wrapper -->

		</article><!-- #post-## -->

		<div class="wrapper-links">

			<?php // get_template_part( 'section-templates/section', 'related-events' ); 
			?>

			<?php // understrap_post_nav(); 
			?>

		</div>

	</main><!-- #main -->

<?php endwhile; // end of the loop. 
?>

<?php get_footer(); ?>