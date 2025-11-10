<?php

/**
 * The template for displaying all single posts.
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
	$category = get_the_category();
	$first_category = $category[0];
	$inner_page_header = get_field('inner_page_header');
	$sector_header_type = get_field('header_format');
	?>

	<main class="site-main" id="main">


		<?php if ($sector_header_type === 'standard') : ?>


			<div class="pageHeader animatable fadeInDown animationDelayone">
				<div class="<?php if ($inner_page_header['centred_text']) : echo 'pageHeaderCenter';
							endif; ?> p-t-xlarge p-b-medium animatable fadeInDown animationDelayone">
					<h1 class="<?php if ($inner_page_header['centred_text']) : echo 'justifyCenter';
								endif; ?>">
						<?php $image = $inner_page_header['identitylogo'];
						if (!empty($image)) : ?>
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
						<?php echo $inner_page_header['inner-header-title']; ?>
					</h1>
					<p class="subPara <?php if ($inner_page_header['centred_text']) : echo 'justifyCenter';
										endif; ?>"><?php echo $inner_page_header['inner-header-sub']; ?></p>
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
						$(function() {
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

		<?php endif; ?>





		<?php if ($sector_header_type === 'image') : ?>


			<div class="pageHeader backgroundHeader animatable fadeInDown animationDelayone">

				<?php
				$image = $inner_page_header['sector_header_background_image'];
				if (!empty($image)): ?>
					<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				<?php endif; ?>

				<div class="<?php if ($inner_page_header['centred_text']) : echo 'pageHeaderCenter';
							endif; ?> p-t-xlarge p-b-medium animatable fadeInDown animationDelayone">
					<h1 class="<?php if ($inner_page_header['centred_text']) : echo 'justifyCenter';
								endif; ?>">
						<?php $image = $inner_page_header['identitylogo'];
						if (!empty($image)) : ?>
							<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
						<?php endif; ?>
						<?php echo $inner_page_header['inner-header-title']; ?>
					</h1>
					<p class="subPara <?php if ($inner_page_header['centred_text']) : echo 'justifyCenter';
										endif; ?>"><?php echo $inner_page_header['inner-header-sub']; ?></p>
				</div>
			</div>
		<?php endif; ?>








		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">









































			<div class="wrapper" id="single-wrapper">



				<div class="row">





					<?php if (!$featured_img_url): ?>

						<header class="entry-header">

							<?php the_title('<h1 class="entry-title">', '</h1>'); ?>

							<div class="entry-meta">

							</div><!-- .entry-meta -->

						</header><!-- .entry-header -->

					<?php endif; ?>

					<div class="entry-content">

						<?php the_content(); ?>

						<?php if (function_exists('pf_show_link')) {
							echo pf_show_link();
						} ?>

						<?php understrap_entry_footer(); ?>

					</div><!-- .entry-content -->

					<footer class="entry-footer">

						<?php
						// Sector head details
						$sector_object = get_field('sector_head');
						if ($sector_object): ?>

							<div class="author-details">

								<div class="row author-details-row">

									<?php
									$person_description = get_field('person_description');
									// override $post
									$post = $sector_object;
									setup_postdata($post);
									?>
									<div class="col-sm-3 author-photo">
										<a href="<?php the_permalink(); ?>">
											<?php $thmbnail = get_field('thmbnail');
											if (!empty($thmbnail)): ?>
												<img src="<?php echo $thmbnail['url']; ?>" alt="<?php echo $thmbnail['alt']; ?>" class="single-author-thumb" />
											<?php endif; ?>
										</a>
									</div>
									<div class="col-sm-9 author-text">
										<a href="<?php the_permalink(); ?>">
											<p class="position"><?php _e('Sector head', 'menziestheme'); ?></p>
											<h3>
												<?php the_title(); ?>
												<?php if (get_field('certificates')): ?>
													<?php echo ' - '; ?><?php the_field('certificates'); ?>
												<?php endif; ?>
											</h3>
										</a>
										<a href="<?php the_permalink(); ?>">
											<p class="position"><?php the_field('position'); ?></p>
										</a>
										<a href="<?php the_permalink(); ?>">
											<p class="person-meta">
												<?php if ($person_description): ?>
													<?php echo $person_description; ?>
												<?php else: ?>
													<?php
													$yoast_meta_description = get_post_meta($post->ID, '_yoast_wpseo_metadesc', true);
													echo $yoast_meta_description;
													?>
												<?php endif; ?>
											</p>
										</a>

										<a href="<?php the_permalink(); ?>"><button class="carousel-btn"><?php _e('View profile', 'menziestheme'); ?></button></a>
									</div>
									<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
									?>

								</div>

							</div>

						<?php endif; ?>

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



			</div><!-- #single-wrapper -->

		</article><!-- #post-## -->

		<div class="wrapper-links">

			<?php // get_template_part( 'section-templates/section', 'related' ); 
			?>

			<?php // understrap_post_nav(); 
			?>

		</div>

	</main><!-- #main -->

<?php endwhile; // end of the loop. 
?>

<?php get_footer(); ?>