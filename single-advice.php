<?php

/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod('understrap_container_type');
$author_objects = get_field('author');
$faq_title = get_field('faq_title');

while (have_posts()) : the_post();

	$has_hero = "no-hero";
	if (has_post_thumbnail()) {
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
	}
	if ($featured_img_url) {
		$has_hero = "yes-hero";
	}
	$category = get_the_category();
	$first_category = $category[0];
?>

	<main class="site-main" id="main">
		<div class="pageHeader backgroundHeader animatable fadeInDown animationDelayone">
			<?php
			$image = get_the_post_thumbnail(); ?>
			<?php if ($image) : ?>
				<?php echo ($image); ?>
			<?php endif; ?>
			<div class="<?php if ($inner_page_header['centred_text']) : echo 'pageHeaderCenter';
						endif; ?> p-t-xlarge p-b-medium animatable fadeInDown animationDelayone">
				<div class="post-categories">
					<span class="post-category-tag">FAQ</span>
				</div>
				<h1 class="<?php echo $inner_page_header['centred_text'] ? 'justifyCenter' : ''; ?>">
					<?php echo $faq_title ? $faq_title : get_the_title(); ?>
				</h1>
				<div class="post-meta-container">
					<div class="post-meta"><span class="read-time">
							<?php echo get_read_time(); ?></span>
					</div>
					<?php if ($inner_page_header['inner-header-sub']) : ?>
						<p class="subPara <?php if ($inner_page_header['centred_text']) : echo 'justifyCenter';
											endif; ?>"><?php echo $inner_page_header['inner-header-sub']; ?></p>
					<?php endif; ?>

				</div>
			</div>
		</div>

		<article <?php post_class($has_hero); ?> id="post-<?php the_ID(); ?>">

			<div class="wrapper" id="single-wrapper">

				<div class="thin-post-container <?php echo esc_attr($container); ?>" id="content" tabindex="-1">

					<div class="row">



						<div class="entry-content post-entry-content fadeInUp animationDelayone animatable">
							<?php the_content(); ?>
							<?php if (function_exists('pf_show_link')) {
								echo pf_show_link();
							} ?>
							<?php
							$author_post = get_field('author');

							if ($author_post && get_post_status($author_post->ID) === 'publish') :
								$author_name = get_the_title($author_post->ID);
								$big_image = get_field('big_image', $author_post->ID);
								$position = get_field('position', $author_post->ID);
								$author_link = get_permalink($author_post->ID);
							?>
								<div class="flexBox alignCenter justifyCenter flexDirColumn">
									<h2 class="modTitle">Contact Our <span class="yellow">Experts</span></h2>
									<div class="author author-100 flexBox alignCenter justifyCenter p-b-medium">
										<div class="author-image-wrapper fadeInUp animationDelayone animatable">
											<div class="author__image">
												<?php if ($big_image) : ?>
													<img src="<?php echo esc_url($big_image['url']); ?>" alt="<?php echo esc_attr($big_image['alt']); ?>" />
												<?php endif; ?>
											</div>
										</div>
										<div class="author__details fadeInUp animationDelaytwo animatable">
											<?php if ($position) : ?>
												<h4 class="author__job-title subTitle yellow"><?php echo esc_html($position); ?></h4>
											<?php endif; ?>
											<?php if ($author_name) : ?>
												<h2 class="secondTitle"><?php echo esc_html($author_name); ?></h2>
											<?php endif; ?>
											<?php if ($author_link) : ?>
												<a class="readon solid yellow" href="<?php echo esc_url($author_link); ?>">Get in touch</a>
											<?php endif; ?>
										</div>
									</div>
								</div>
							<?php
							endif;
							?>
							<p class="flexBox p-t-small"><a href="<?php echo home_url(); ?>/advice-hub" class="readon solid blue">Back to Advice Hub</a></p>
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

			<?php // get_template_part( 'section-templates/section', 'related' ); 
			?>

			<?php // understrap_post_nav(); 
			?>

		</div>

		<!-- FOOTER CTA -->
		<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo get_field('custom_class', 'option'); ?>">
			<?php
			$background_colour = get_field('faq_cta_banner_background_colour', 'option');
			$padding_top = get_field('padding_top', 'option');
			$padding_bottom = get_field('padding_bottom', 'option');
			?>
			<div class="section-wrapper cta-banner-wrapper co-bg-<?php echo esc_html($background_colour); ?> p-t-<?php echo esc_html($padding_top); ?> p-b-<?php echo esc_html($padding_bottom); ?>" style="background-color: var(--<?php echo esc_html($background_colour); ?>);">
				<div class="cta-banner-container">
					<div class="cta-banner-inner animatable fadeInUp animationDelayone">
						<?php echo '<h3 class="modTitle">' . get_field('faq_cta_banner_title', 'option') . '</h3>'; ?>
						<?php echo '<p class="subPara">' . esc_html(get_field('faq_cta_banner_introduction', 'option')) . '</p>'; ?>
						<?php if (have_rows('faq_cta_banner_buttons', 'option')) : ?>
							<div>
								<?php while (have_rows('faq_cta_banner_buttons', 'option')) : the_row();
									$link = get_sub_field('faq_cta_banner_link', 'option');
									if ($link) :
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
								?>
										<a class="readon <?php echo esc_html(get_sub_field('button_colour', 'option')); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
									<?php endif; ?>

									<?php if (get_sub_field('contact_pop')) : ?>
										<?php $popid = preg_replace('/[^a-zA-Z0-9]/', '-', get_sub_field('contact_pop', 'option')); ?>
										<p class="<?php echo esc_html(get_sub_field('popup_button_colour', 'option')); ?> readon toggle" data-target="<?php echo $popid; ?>"><?php echo get_sub_field('contact_pop', 'option'); ?></p>
									<?php endif; ?>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="cta-banner-graphics animatable fadeInUp animationDelayfour">

					<svg id="shape-group-one" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 428.7 458">
						<g class="animatable fadeInUp animationDelayone">
							<polygon points="258 137.4 195.7 137.4 195.7 75 258 137.4" style="fill:#fcc100; stroke-width:0px;" />
						</g>
						<g class="animatable fadeInUp animationDelaytwo">
							<path d="m268.1,402.2H47v-221.1l221.1,221.1Zm-219.1-2h214.3L49,186v214.3Z" style="fill:#fcc103; stroke-width:0px;" />
						</g>
						<g class="animatable fadeInUp animationDelaythree">
							<polygon points="0 318.1 0 0 318.1 0 0 318.1" style="fill:#fff; stroke-width:0px;opacity:.3;" />
						</g>
						<g class="animatable fadeInUp animationDelayfour">
							<path d="m428.7,458h-166.2l166.2-166.2v166.2Zm-161.4-2h159.4v-159.4l-159.4,159.4Z" style="fill:#fff; stroke-width:0px;" />
						</g>
					</svg>
					<svg id="shape-group-two" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 602.2 401.2">
						<g class="animatable fadeInUp animationDelayone">
							<polygon points="278.3 66.4 340.7 66.4 340.7 128.7 278.3 66.4" style="fill:#fcc100; stroke-width:0px;" />
						</g>
						<g class="animatable fadeInUp animationDelaytwo">
							<polygon points="336.5 0 554.2 0 554.2 217.7 336.5 0" style="fill:#da9b00; stroke-width:0px;opacity:.3;" />
						</g>
						<g class="animatable fadeInUp animationDelaythree">
							<polygon points="602.2 83.1 602.2 401.2 284 401.2 602.2 83.1" style="fill:#da9b00; stroke-width:0px;opacity:.3;" />
						</g>
						<g class="animatable fadeInUp animationDelayfour">
							<path d="m114.3,397.3L0,283.1h228.5l-114.3,114.3ZM4.8,285.1l109.4,109.4,109.4-109.4H4.8Z" style="fill:#fcc100; stroke-width:0px;" />
						</g>
						<g class="animatable fadeInUp animationDelayfive">
							<path d="m185.1,400.2v-214.2h214.2l-214.2,214.2Zm2-212.2v207.4l207.4-207.4h-207.4Z" style="fill:#fff; stroke-width:0px;" />
						</g>
					</svg>
				</div>
			</div>
			<?php if (have_rows('faq_cta_banner_buttons', 'option')) : ?> <?php while (have_rows('faq_cta_banner_buttons', 'option')) : the_row(); ?>
					<?php $popid = preg_replace('/[^a-zA-Z0-9]/', '-', get_sub_field('contact_pop', 'option')); ?>

					<div id="<?php echo $popid; ?>" class="popup-box popup-box-sustainability hide">
						<span class="close-screen toggle" data-target="<?php echo $popid; ?>">close</span>
						<div class="popup-wrapper popup-contact-wrapper">
							<div class="popup-header">
								<span class="close-button toggle" data-target="<?php echo $popid; ?>">close</span>
							</div>
							<div class="popup-body popup-contact-body">
								<?php $hubspot_form_shortcode = get_sub_field('add_shortcode', 'option');
																				if ($hubspot_form_shortcode) {
																					echo do_shortcode($hubspot_form_shortcode);
																				} ?>
							</div>
						</div>
					</div>
			<?php endwhile;
																		endif; ?>
		</div>
		<!-- END OF FOOTER CTA -->

	</main><!-- #main -->

<?php endwhile; // end of the loop. 
?>

<?php get_footer(); ?>