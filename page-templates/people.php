<?php

/**
 * Template Name: People page
 *
 *
 * @package understrap
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod('understrap_container_type');
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

<div class="wrapper" id="full-width-page-wrapper">

	<?php if ($featured_img_url) : ?>

		<div class="wrapper single-hero-wrapper" style="background-image: url('<?php echo $featured_img_url; ?>');">

			<?php if (!get_field('disable_image_overlay')) : ?><div class="img-overlay"></div><?php endif; ?>

			<div class="<?php echo esc_attr($container); ?>" id="single-header" tabindex="-1">

				<div class="row">

					<div class="col-md-12">

						<header class="entry-header">

							<span class="hero-title">

								<header class="entry-header">
									<div class="single-post-cat"></div>
									<h1 class="entry-title"><?php the_title(); ?></h1>

								</header><!-- .entry-header -->

							</span>

						</header><!-- .entry-header -->

					</div>

				</div>

			</div>

		</div>

	<?php endif; ?>

	<div class="<?php echo esc_attr($container); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area awards-content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<div class="row inner-content-row">

						<div class="col-md-8 inner-content-col">

							<?php while (have_posts()) : the_post(); ?>

								<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

									<div class="entry-content">

										<div class="crumbs-box">
											<?php if (function_exists('yoast_breadcrumb')) {
												yoast_breadcrumb('<div id="breadcrumbs">', '</div>');
											} ?>
										</div>

										<?php the_content(); ?>

									</div><!-- .entry-content -->

								</article><!-- #post-## -->

							<?php endwhile; // end of the loop. 
							?>

						</div>

						<div class="col-md-4">

							<div class="archive-filters">

								<h2><?php _e('Search people', 'menziestheme'); ?></h2>

								<a class="filter-toggle" data-toggle="collapse" href="#filter-container" role="button" aria-expanded="false" aria-controls="filter-container">
									<div class="filter-toggle-text"><?php _e('Filters', 'menziestheme'); ?></div><i class="fa fa-plus-square" aria-hidden="true"></i>
								</a>

								<div class="collapse show filter-collapse" id="filter-container">

									<div class="filter-section">

										<h3><?php _e('Search by name', 'menziestheme'); ?></h3>

										<?php echo do_shortcode('[facetwp facet="post_name"]'); ?>

									</div>

									<div class="row">

										<div class="col-md-6">

											<div class="filter-section">

												<h3><?php _e('Sector', 'menziestheme'); ?></h3>

												<?php echo do_shortcode('[facetwp facet="sector_posts"]'); ?>

											</div>

										</div>

										<div class="col-md-6">

											<div class="filter-section">

												<h3><?php _e('Specialism', 'menziestheme'); ?></h3>

												<?php echo do_shortcode('[facetwp facet="related_specialism"]'); ?>

											</div>

										</div>

									</div>

									<div class="filter-section">

										<h3><?php _e('Office', 'menziestheme'); ?></h3>

										<?php echo do_shortcode('[facetwp facet="office"]'); ?>

									</div>

									<a href="/about-us/people/"><button class="carousel-btn"><?php _e('Reset', 'menziestheme'); ?></button></a>

								</div>

							</div>

						</div>

					</div>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div>

		<?php $people_item_count = 1; ?>

		<?php
		$paged = get_query_var('paged') ? get_query_var('paged') : 1;

		$custom_query = new WP_Query(
			array(
				'post_type' 		=> 'people',
				'orderby' 			=> 'menu_order',
				'order' => 'ASC',
				'posts_per_page' 	=> 24,
				'facetwp' => true,
				'paged'               => $paged,
			)
		); ?>

		<div class="row people-list-row facetwp-template">

			<?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>

				<div class="col-6 col-lg-3 col-md-4">

					<article class="people-post-item people-post-item-<?php echo $people_item_count; ?> ">

						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a>

						<?php
						$person_image = get_field('big_image');
						if (!empty($person_image)) :
							// vars
							$url = $person_image['url'];
							$alt = $person_image['alt'];
							// thumbnail
							$size = 'people-big-cropped';
							$thumb = $person_image['sizes'][$size];
						?>
							<a href="<?php the_permalink(); ?>"><img class="person-hero" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" /></a>
						<?php endif; ?>

						<div class="people-list-meta-container">

							<div class="people-list-meta people-list-initial">

								<div class="people-meta-inner">

									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

									<p class="small-p"><a href="<?php the_permalink(); ?>"><?php if (get_field('certificates')) : the_field('certificates');
																								echo ' | ';
																							endif; ?><?php the_field('position'); ?></a></p>

									<?php $post_object = get_field('related_office');

									if ($post_object) :

										// override $post
										// $post = $post_object;
										// setup_postdata( $post ); 

									?>

										<p class="small-p"><a href="<?php echo get_the_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></a></p>

										<?php // wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
										?>

									<?php endif; ?>

								</div>

							</div>

						</div>

					</article>

				</div>

				<?php $people_item_count++; ?>

			<?php
			endwhile; ?>



			<div class="col-md-12 grid-item">
				<?php // echo do_shortcode( '[facetwp pager="true"]' ); 
				?>



				<?php // next_posts_link(); 
				?>
				<?php // previous_posts_link(); 
				?>

				<?php // understrap_pagination(); 
				?>

			</div>

			<?php wp_reset_postdata();
			?>
		</div><!-- .row end -->

		<div class="facets-perpage-holder">

			<?php echo do_shortcode('[facetwp facet="numberposts"]'); ?>

		</div>

		<div class="facets-loadmore-holder">

			<?php echo do_shortcode('[facetwp facet="pagination"]'); ?>

		</div>

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>