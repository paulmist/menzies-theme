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
	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
	?>



	<?php
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
				<div class="topic-page-wrapper office-page-wrapper">
					<article class="animatable fadeInDown animationDelayone">
						<div class="entry-content">
							<div class="office-intro-button-row p-b-medium">

								<!-- OFFICE DIRECTIONS BUTTON -->
								<?php $office_directions_pop = get_the_title(); ?>
								<a class="readon solid yellow toggle" data-target="<?php echo $office_directions_pop; ?>" href="#"><?php _e('Get directions', 'menziestheme'); ?></a>

								<!-- MEET THE TEAM BUTTON -->
								<?php
								$office_id = get_the_ID(); // current 'office' post ID
								?>
								<a class="readon solid yellow" href="/about-us/people/?_sfm_related_office=<?php echo $office_id; ?>">
									<?php _e('Meet the ', 'menziestheme');
									the_title();
									_e(' team', 'menziestheme'); ?>
								</a>

								<!-- OFFICE EMAIL BUTTON -->
								<?php $office_email_pop = preg_replace('/[^a-zA-Z0-9]/', '-', get_field('office_email')); ?>
								<a href="#" class="toggle readon solid yellow" data-target="<?php echo esc_html($office_email_pop); ?>">Email <?php echo get_the_title(); ?> Office</a>
							</div>

							<!-- OFFICE PRINCIPAL -->
							<?php
							$office_title = get_the_title();

							$author_object = get_field('office_principle');
							if ($author_object): ?>
								<div class="author-details-row p-b-medium">
									<h2><?php _e('Office principal', 'menziestheme'); ?></h2>
									<?php
									$author_description = get_field('author_description');
									// override $post
									$post = $author_object;
									setup_postdata($post);
									?>
									<div class="author-details-inner flexBox">
										<a href="<?php the_permalink(); ?>">
											<?php $thmbnail = get_field('thmbnail');
											if (!empty($thmbnail)): ?>
												<div class="author__image">
													<img class="author__img" src="<?php echo esc_url($thmbnail['url']); ?>" alt="<?php echo esc_attr($thmbnail['alt']); ?>" />
												</div>
											<?php endif; ?>
										</a>

										<div class="author__details">
											<?php $position = get_field('position'); ?>
											<h4 class="author__job-title subTitle yellow"><?php echo esc_html($position); ?></h4>
											<h2><?php the_title(); ?></h2>
											<div class="author__details__links">
												<p>
													<a class="location toggle" data-target="<?php echo $office_directions_pop; ?>" href="#"><?php echo esc_html($office_title); ?></a>
													<a class="email toggle" data-target="<?php echo esc_html($office_email_pop); ?>" href="#">Get in touch</a>
												</p>
											</div>
										</div>
									</div>
								</div>

								<?php wp_reset_postdata(); // Reset $post to original 
								?>
							<?php endif; ?>
							<?php the_content(); ?>
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
					</article class="">

					<!-- SIDE PANEL -->
					<aside class="topic-page-sidebar animatable fadeInDown animationDelayone">

						<div class="p-b-small">
							<h2>Get in touch</h2>
						</div>

						<!-- SIDE PANEL - OFFICE ADDRESS -->
						<?php
						$address = get_field('office_address'); ?>
						<?php if ($address) : ?>
							<div class="side-panel address">
								<h3><?php _e('Find us', 'menziestheme'); ?></h3>
								<a class="toggle" href="#" data-target="<?php echo $office_directions_pop; ?>">
									<p><?php the_field('office_address'); ?></p>
								</a>
							</div>
						<?php endif; ?>

						<!-- SIDE PANEL - TELEPHONE -->
						<div class="side-panel telephone">
							<h3><?php _e('Call us', 'menziestheme'); ?></h3>
							<?php if (get_field('office_phone')): ?>
								<p><a href="tel:<?php the_field('office_phone'); ?>">Tel: <?php the_field('office_phone'); ?></a></p>
							<?php endif; ?>
						</div>

						<!-- SIDE PANEL - OPENING HOURS -->
						<?php if (have_rows('opening_hours')): ?>
							<div class="side-panel opening-times">
								<h3><?php _e('Opening hours', 'menziestheme'); ?></h3>
								<p><?php while (have_rows('opening_hours')) : the_row(); ?>
										<?php the_sub_field('days');
										_e(' from ', 'menziestheme');
										the_sub_field('from');
										_e(' to ', 'menziestheme');
										the_sub_field('to'); ?>
									<?php endwhile; ?></p>
								<?php
								// check if the special_days repeater field has rows of data
								if (have_rows('special_days')): ?>
									<h4 class="closed-title"><?php _e('Closed ', 'menziestheme');  ?></h4>
									<div class="special-days row">
										<?php while (have_rows('special_days')) : the_row(); ?>
											<?php
											$date_from = get_sub_field('date_from', false, false);
											$date_from = new DateTime($date_from);
											$date_to = get_sub_field('date_to', false, false);
											$date_to = new DateTime($date_to);
											?>
											<?php if ($date_from == $date_to): ?>
												<div class="col-4 special-day-item">
													<?php echo $date_from->format('j M Y') . "<br>"; ?>
												</div>
											<?php else: ?>
												<div class="col-4 special-day-item">
													<?php echo $date_from->format('j M Y');
													_e(' to ', 'menziestheme');
													echo $date_to->format('j M Y')  . "<br>"; ?>
												</div>
											<?php endif; ?>
										<?php endwhile; ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</aside>
				</div>

				<!-- FOOTER CTA -->
				<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo get_field('custom_class', 'option'); ?>">
					<?php
					$background_colour = get_field('office_cta_banner_background_colour', 'option');
					$padding_top = get_field('padding_top', 'option');
					$padding_bottom = get_field('padding_bottom', 'option');
					?>
					<div class="section-wrapper cta-banner-wrapper co-bg-<?php echo esc_html($background_colour); ?> p-t-<?php echo esc_html($padding_top); ?> p-b-<?php echo esc_html($padding_bottom); ?>" style="background-color: var(--<?php echo esc_html($background_colour); ?>);">
						<div class="cta-banner-container">
							<div class="cta-banner-inner animatable fadeInUp animationDelayone">
								<?php echo '<h3 class="modTitle">' . get_field('office_cta_banner_title', 'option') . '</h3>'; ?>
								<?php echo '<p class="subPara">' . esc_html(get_field('office_cta_banner_introduction', 'option')) . '</p>'; ?>
								<?php if (have_rows('office_cta_banner_buttons', 'option')) : ?>
									<div>
										<?php while (have_rows('office_cta_banner_buttons', 'option')) : the_row();
											$link = get_sub_field('office_cta_banner_link', 'option');
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
					<?php if (have_rows('office_cta_banner_buttons', 'option')) : ?> <?php while (have_rows('office_cta_banner_buttons', 'option')) : the_row(); ?>
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
			</div><!-- #single-wrapper -->
		</article><!-- #post-## -->
		<div class="wrapper-links">
			<?php // get_template_part( 'section-templates/section', 'related' ); 
			?>
			<?php // understrap_post_nav(); 
			?>
		</div>
	</main>
<?php endwhile;
?>

<!-- OFFICE DETAILS POPUP -->
<?php
$office_directions_pop = get_the_title();
$current_office_name = $office_directions_pop;
$contact_page = get_page_by_path('contact-us');
$contact_page_id = $contact_page ? $contact_page->ID : null;
?>
<div id="<?php echo esc_attr($office_directions_pop); ?>" class="popup-box popup-box-sustainability hide">
	<span class="close-screen toggle" data-target="<?php echo esc_attr($office_directions_pop); ?>">close</span>
	<?php if ($contact_page_id && have_rows('office_location', $contact_page_id)) : ?>
		<?php while (have_rows('office_location', $contact_page_id)) : the_row();
			$popup_name = get_sub_field('office_popup_name');

			if (strtolower(trim($popup_name)) === strtolower(trim($current_office_name))) :
		?>
				<div class="popup-wrapper">
					<div class="popup-header">
						<span class="close-button toggle" data-target="<?php echo $office_directions_pop; ?>">close</span>
					</div>
					<div class="popup-body">
						<div class="popup-map">
							<?php if (get_sub_field('office_popup_content')) : ?><?php echo get_sub_field('office_popup_content'); ?><?php endif; ?>
						</div>
						<div class="popup-location-details">
							<h4>Contact details</h4>
							<?php
							$locationDetails = get_sub_field('location_contact_details');
							if (!empty($locationDetails)) {
								echo '<p>' . ($locationDetails) . '</p>';
							} ?>
							<?php
							$link = get_sub_field('office_number');
							if ($link) :
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<h4>Give us a call</h4>
								<p><a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a></p>
							<?php endif; ?>
							<h4>Opening hours</h4>
							<?php if (get_sub_field('opening_hours')) : echo '<p>' . esc_html(get_sub_field('opening_hours')) . '</p>';
							endif; ?>
						</div>
					</div>
				</div>
		<?php break;
			endif;
		endwhile; ?>
	<?php endif; ?>
</div>

<!-- OFFICE CONTACT POPUP -->
<?php $office_email_pop = preg_replace('/[^a-zA-Z0-9]/', '-', get_field('office_email')); ?>
<div id="<?php echo $office_email_pop; ?>" class="popup-box popup-box-sustainability hide">
	<span class="close-screen toggle" data-target="<?php echo $office_email_pop; ?>">close</span>
	<div class="popup-wrapper popup-contact-wrapper">
		<div class="popup-header">
			<span class="close-button toggle" data-target="<?php echo $office_email_pop; ?>">close</span>
		</div>
		<div class="popup-body popup-contact-body">

			<?php $office_email_pop_subtitle = get_field('office_email_pop_subtitle'); ?>
			<?php $office_email_pop_title = get_field('office_email_pop_title'); ?>

			<?php if ($office_email_pop_subtitle) : ?>
				<h4 class="subTitle"><?php echo esc_html($office_email_pop_subtitle); ?></h4>
			<?php endif; ?>

			<?php if ($office_email_pop_title) : ?>
				<h2 class="modTitle"><?php echo esc_html($office_email_pop_title); ?></h2>
			<?php endif; ?>

			<?php $hubspot_form_shortcode = get_field('add_shortcode');
			if ($hubspot_form_shortcode) {
				echo do_shortcode($hubspot_form_shortcode);
			} ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>