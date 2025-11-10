<?php

/**
 * Template Name: Contact Us
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod('understrap_container_type');

?>





<?php
$inner_page_header = get_field('inner_page_header');
?>







<div class="wrapper" id="full-width-page-wrapper">

	<div class="row">



		<div class="col-md-12 content-area" id="primary">



			<?php if ($inner_page_header['inner-header-title']) : ?>
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


			<div class="uk-container-centre">


				<?php the_content(); ?>
				<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> p-t-<?php echo get_field('padding_top'); ?> p-b-<?php echo get_field('padding_bottom'); ?> uk-container-centre office-location-wrapper">
					<h2 class="modTitle p-b-small animatable fadeInDown animationDelayone"><strong class="yellow">Contact</strong> a local Menzies office</h2>
					<div class="office-location-container animatable fadeInDown animationDelaytwo">
						<?php if (have_rows('office_location')) : ?>
							<ul>
								<?php while (have_rows('office_location')) : the_row(); ?>
									<li>
										<div>
											<?php if (get_sub_field('office_title')) : echo '<h2>' . esc_html(get_sub_field('office_title')) . '</h2>';
											endif; ?>
											<?php $popid = str_replace(str_split(' .'), '-', get_sub_field('office_popup_name')); ?>
											<p class="readon toggle" data-target="<?php echo $popid; ?>"><?php echo get_sub_field('office_popup_button_text'); ?></p>
										</div>
									</li>
								<?php endwhile; ?>
							</ul>
						<?php endif; ?>
					</div>
				</div>

			</div><!-- #primary -->
		</div>
	</div>
</div><!-- #full-width-page-wrapper -->

<!-- POPUP MODAL -->
<?php if (have_rows('office_location')) : while (have_rows('office_location')) : the_row(); ?>
		<?php $popid = str_replace(str_split(' .'), '-', get_sub_field('office_popup_name')); ?>
		<div id="<?php echo $popid; ?>" class="popup-box popup-box-sustainability hide">
			<span class="close-screen toggle" data-target="<?php echo $popid; ?>">close</span>
			<div class="popup-wrapper">
				<div class="popup-header">
					<span class="close-button toggle" data-target="<?php echo $popid; ?>">close</span>
				</div>
				<div class="popup-body">
					<?php if (get_sub_field('office_popup_content')) : ?>
						<div class="popup-map">
							<?php echo get_sub_field('office_popup_content'); ?>
						</div>
					<?php endif; ?>
					<div class="popup-location-details <?php
														if (empty(get_sub_field('office_popup_content'))) {
															echo 'location-full-width';
														}
														?>
">
						<?php $locationDetails = get_sub_field('location_contact_details'); ?>

						<?php if (!empty($locationDetails)) {
							echo '<h4>Contact details</h4>';
						} ?>
						<?php

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
						<?php if (get_sub_field('opening_hours')) : echo '<h4>Opening Hours</h4>';
						endif; ?>
						<?php if (get_sub_field('opening_hours')) : echo '<p>' . esc_html(get_sub_field('opening_hours')) . '</p>';
						endif; ?>
					</div>
				</div>
			</div>
		</div>
<?php endwhile;
endif; ?>

<?php get_footer(); ?>