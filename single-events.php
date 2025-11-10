<?php

/**
 * The template for displaying all single events.
 *
 * @package understrap
 */

if (! defined('ABSPATH')) {
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

		<div class="pageHeader animatable fadeInDown animationDelayone">
			<div class="<?php if ($inner_page_header['centred_text']) : echo 'pageHeaderCenter';
						endif; ?> p-t-xlarge p-b-medium animatable fadeInDown animationDelayone">
				<div class="post-categories">
					<span class="post-category-tag">Event</span>
				</div>
				<?php the_title('<h1 class="entry-title ">', '</h1>'); ?>
				<div class="entry-meta event-meta-hero">

					<!-- <?php
							// Author details
							if ($author_object):
								// override $post
								$post = $author_object;
								setup_postdata($post);
							?>
<div class="author-meta">
	<?php _e('By ', 'menziestheme'); ?><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><?php _e(' - ', 'menziestheme'); ?><?php echo get_field('position'); ?>
</div>
<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
?>
<?php endif; ?> -->

					<div class="post-meta">
						<span class="hero-meta-item"><?php echo get_field('date_of_event'); ?></span> - <span class="hero-meta-item"><?php echo get_field('location_event'); ?></span>
					</div>

				</div><!-- .entry-meta -->
			</div>
			<div class="home-header-graphic box home-header-graphic-inner" data-scroll-speed="3" style="top: 0px; opacity: 1;">

				<svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 605.5 600.1">
					<g class="fadeInRight animationDelayone box animated">
						<path d="m400.5,166.6h-118.6V48l118.6,118.6Zm-116.6-2h111.8l-111.8-111.8v111.8Z" style="fill:#50544b; stroke-width:0px;"></path>
					</g>
					<g class="fadeInDown animationDelaytwo box animated">
						<path d="m453,152.5L300.6,0h304.9l-152.5,152.5ZM305.4,2l147.6,147.6L600.7,2h-295.3Z" style="fill:#fff; stroke-width:0px;"></path>
					</g>
					<g class="fadeInUp animationDelaythree box animated">
						<polygon points="278.3 265.2 340.7 265.2 340.7 327.6 278.3 265.2" style="fill:#48494c; stroke-width:0px;"></polygon>
					</g>
					<g class="fadeInUp animationDelayfour box animated">
						<polygon points="539.7 107.6 602.1 107.6 602.1 170 539.7 107.6" style="fill:#48494c; stroke-width:0px;"></polygon>
					</g>
					<g class="fadeInLeft animationDelayfive box animated">
						<polygon points="336.5 198.9 554.2 198.9 554.2 416.5 336.5 198.9" style="fill:#da9b00; stroke-width:0px; opacity: 0.3;"></polygon>
					</g>
					<g class="fadeInLeft animationDelaysix box animated">
						<polygon points="602.2 281.9 602.2 600.1 284 600.1 602.2 281.9" style="fill:#da9b00; stroke-width:0px; opacity: 0.3;"></polygon>
					</g>
					<g class="fadeInRight animationDelayseven box animated">
						<path d="m114.3,596.2L0,481.9h228.5l-114.3,114.3ZM4.8,483.9l109.4,109.4,109.4-109.4H4.8Z" style="fill:#50544b; stroke-width:0px;"></path>
					</g>
					<g class="fadeInUp animationDelayeight box animated">
						<path d="m185.1,599v-214.2h214.2l-214.2,214.2Zm2-212.2v207.4l207.4-207.4h-207.4Z" style="fill:#fff; stroke-width:0px;"></path>
					</g>
				</svg>

				<script>
					jQuery(function($) {
						var boxes = $('.box'),
							$window = $(window);

						$window.scroll(function() {
							var scrollTop = $window.scrollTop();
							boxes.each(function() {
								var $this = $(this),
									scrollspeed = parseInt($this.data('scroll-speed')),
									val = -scrollTop / scrollspeed,
									opacity = 1 - scrollTop / (scrollspeed * 200);

								$this.css({
									'top': val + 'px',
									'opacity': opacity
								});
							});
						});
					});
				</script>

			</div>
		</div>

		<article <?php post_class($has_hero); ?> id="post-<?php the_ID(); ?>">

			<div class="wrapper" id="single-wrapper">

				<div class="<?php echo esc_attr($container); ?>" id="content" tabindex="-1">

					<div class="row">

						<?php if (!$featured_img_url): ?>

							<header class="entry-header">

								<?php the_title('<h1 class="entry-title">', '</h1>'); ?>

								<div class="entry-meta event-meta-not-hero">

									<div class="post-meta">
										<span class="hero-meta-item"><?php echo get_field('date_of_event'); ?></span> - <span class="hero-meta-item"><?php echo get_field('location_event'); ?></span>
									</div>

								</div><!-- .entry-meta -->

							</header><!-- .entry-header -->

						<?php endif; ?>

						<div class="entry-content post-entry-content fadeInUp animationDelaytwo animatable">

							<?php the_content(); ?>

							<div class="event-details">

								<h2><?php _e('Event details', 'menziestheme'); ?></h2>

								<div class="row event-details-row">

									<div class="col-md-3">

										<h3><?php _e('Date', 'menziestheme'); ?></h3>

										<p class="small-p"><?php echo get_field('date_of_event'); ?></p>

									</div>

									<div class="col-md-3">

										<h3><?php _e('Time', 'menziestheme'); ?></h3>

										<p class="small-p"><?php echo get_field('time_of_event'); ?></p>

									</div>

									<div class="col-md-3">

										<h3><?php _e('Location', 'menziestheme'); ?></h3>

										<p class="small-p"><?php echo get_field('location_event'); ?></p>

									</div>

									<div class="col-md-3">

										<?php if (get_field('location_event')) : ?>

											<a href="http://maps.google.com/?q=<?php echo sanitize_text_field(get_field('location_event')); ?>" class="event-button" target="_blank"><button class="carousel-btn"><?php _e('View map', 'menziestheme'); ?></button></a>

											<p></p>

										<?php endif; ?>

									</div>

									<div class="col-md-12">

										<?php if (get_field('registration_type') == 'enquiry' && get_field('contact_email_event')) : ?>

											<h3><?php _e('Event Enquiry', 'menziestheme'); ?></h3>

											<p><?php echo get_field('registration_intro'); ?></p>

											<?php echo do_shortcode('[contact-form-7 id="7607" title="Event contact form"]'); ?>

										<?php elseif (get_field('registration_type') == 'email') : ?>

											<h3><?php _e('Event registration', 'menziestheme'); ?></h3>

											<p><?php echo get_field('registration_intro'); ?></p>

											<div class="email-register-form">

												<?php echo do_shortcode('[contact-form-7 id="7631" title="Event registration form - WP5"]'); ?>

											</div>

										<?php elseif (get_field('registration_type') == 'eventbrite') : ?>

											<h3><?php _e('Event registration', 'menziestheme'); ?></h3>

											<p><?php echo get_field('registration_intro'); ?></p>

											<div class="eventbrite-iframe">

												<?php echo get_field('eventbrite_embed_code'); ?>

											</div>

										<?php endif; ?>

									</div>

								</div>

							</div>

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