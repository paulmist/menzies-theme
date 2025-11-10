<?php

/**
 * Carousel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'splits-' . $block['id'];
if (!empty($block['anchor'])) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'carousel';
if (!empty($block['className'])) {
	$className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
	$className .= ' align' . $block['align'];
}

?>


<?php $carousel_type = get_field('carousel_type') ?>

<?php if ($carousel_type === 'logos') : ?>

	<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo get_field('element_class'); ?>">

		<?php $args = array(
			'post_type' => 'awards',
			'posts_per_page' => -1,
			'orderby' => 'date',
		);
		$custom_query = new WP_Query($args);
		?>
		<div class="logo-carousel-wrapper">
			<div class="carousel awards logos animatable fadeInUp animationDelaytwo" data-flickity="{ &quot;cellAlign&quot;: &quot;left&quot;, &quot;contain&quot;: false, &quot;groupCells&quot;: 1, &quot;pageDots&quot;: false, &quot;prevNextButtons&quot;: true, &quot;draggable&quot;: true,&quot;freeScroll&quot;: true, &quot;imagesLoaded&quot;: true, &quot;percentPosition&quot;: false }">
				<?php
				if ($custom_query->have_posts()) :
					while ($custom_query->have_posts()) :
						$custom_query->the_post();
				?>
						<div class="carousel-cell">
							<?php the_post_thumbnail(); ?>
						</div>
				<?php endwhile;
					wp_reset_postdata();
				endif; ?>
			</div>
		</div>
	</div>

<?php endif; ?>

<!-- STANDARD CAROUSEL BLOCK -->
<?php

if ($carousel_type === 'standard') :
	$id = $block['id'];
	$className = 'acf-block-standard-carousel';
	$custom_class = get_field('element_class') ?: '';
	$carousel_items = get_field('standard_carousel_items');
	$carousel_title = get_field('carousel_title');
?>

	<div id="<?php echo esc_attr($id); ?>" class="p-t-<?php echo get_field('padding_top'); ?> p-b-<?php echo get_field('padding_bottom'); ?>  carousel-standard <?php echo esc_attr($className . ' ' . $custom_class); ?>">

		<?php if ($carousel_title) : ?>
			<h2 class="animatable fadeInUp animationDelayone"><?php echo $carousel_title; ?></h2>
		<?php endif; ?>

		<?php if ($carousel_items) : ?>
			<div class="standard-carousel-wrapper">
				<div class="carousel standard animatable fadeInUp animationDelaytwo"
					data-flickity='{
					"cellAlign": "left",
					"contain": false,
					"groupCells": 1,
					"pageDots": false,
					"prevNextButtons": true,
					"draggable": true,
					"freeScroll": true,
					"imagesLoaded": true,
					"percentPosition": false,
					"wrapAround": true
				}'>

					<?php foreach ($carousel_items as $item) :
						$image = $item['carousel_standard_image'];
						$overlay_text = $item['carousel_standard_overlay_text'];

						if ($image): ?>
							<div class="carousel-cell">
								<div class="carousel-image-wrapper">
									<img
										src="<?php echo esc_url($image['url']); ?>"
										alt="<?php echo esc_attr($image['alt']); ?>"
										width="<?php echo esc_attr($image['width']); ?>"
										height="<?php echo esc_attr($image['height']); ?>"
										loading="lazy" />
									<?php if (!empty($overlay_text)) : ?>
										<div class="carousel-overlay">
											<div class="overlay-text">
												<p><?php echo esc_html($overlay_text); ?></p>
											</div>
										</div>
									<?php endif; ?>
								</div>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>

				</div>
			</div>
		<?php endif; ?>
	</div>

<?php endif; ?>

<!-- NUMBERED CAROUSEL BLOCK -->
<?php

if ($carousel_type === 'numbered') :
	$id = $block['id'];
	$className = 'acf-block-numbered-carousel';
	$custom_class = get_field('element_class') ?: '';
	$carousel_items = get_field('numbered_carousel_items');
	$carousel_numbered_title = get_field('numbered_carousel_title');
	$carousel_numbered_subtitle = get_field('numbered_carousel_subtitle');
	$carousel_numbered_intro = get_field('numbered_carousel_intro');
?>

	<div id="<?php echo esc_attr($id); ?>" class="p-t-<?php echo get_field('padding_top'); ?> p-b-<?php echo get_field('padding_bottom'); ?>  carousel-standard carousel-numbered <?php echo esc_attr($className . ' ' . $custom_class); ?>">

		<div class="numbered-carousel-title animatable fadeInUp animationDelayone">
			<?php if ($carousel_numbered_title) : ?><h4 class="subTitle yellow"><?php echo esc_html($carousel_numbered_title); ?></h4><?php endif; ?>
			<?php if ($carousel_numbered_subtitle) : ?><h2 class="modTitle"><?php echo esc_html($carousel_numbered_subtitle); ?></h2><?php endif; ?>
			<?php if ($carousel_numbered_intro) : ?><p class="subPara"><?php echo esc_html($carousel_numbered_intro); ?></p><?php endif; ?>
		</div>

		<?php if ($carousel_items) : ?>

			<div class="standard-carousel-wrapper p-t-medium">
				<div class="carousel numbered animatable fadeInUp animationDelaytwo"
					data-flickity='{
					"cellAlign": "left",
					"contain": false,
					"groupCells": 1,
					"pageDots": false,
					"prevNextButtons": true,
					"draggable": true,
					"freeScroll": true,
					"imagesLoaded": true,
					"percentPosition": false,
					"wrapAround": false
				}'>

					<?php
					$counter = 1;

					foreach ($carousel_items as $item) :
						$numbered_title = $item['carousel_numbered_tile_title'];
						$numbered_text = $item['carousel_numbered_tile_text'];

						if ($numbered_text): ?>
							<div class="carousel-cell carousel-number-cell">

								<div class="carousel-number">
									<span><?php echo sprintf('%02d', $counter); ?></span>
								</div>

								<div class="carousel-content">
									<?php if ($numbered_title) : ?>
										<h2><?php echo esc_html($numbered_title); ?></h2>
									<?php endif; ?>
									<?php if ($numbered_text) : ?>
										<?php echo $numbered_text; ?>
									<?php endif; ?>
								</div>

							</div>
							<?php $counter++; ?>
						<?php endif; ?>
					<?php endforeach; ?>

				</div>

				<?php
				$link = get_field('carousel_additional_button');
				if ($link):
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
				?>
					<p class="p-t-small carousel-button-container"><a class="readon solid grey" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>


	</div>
<?php endif; ?>

<?php if ($carousel_type === 'video') :
	$id = $block['id'];
	$className = 'acf-block-video-carousel';
	$custom_class = get_field('element_class') ?: '';
	$carousel_items = get_field('video_carousel_items');
	$carousel_video_title = get_field('video_carousel_title');
	$carousel_video_subtitle = get_field('video_carousel_subtitle');
	$carousel_video_intro = get_field('video_carousel_intro');
?>

	<div id="<?php echo esc_attr($id); ?>" class="p-t-<?php echo get_field('padding_top'); ?> p-b-<?php echo get_field('padding_bottom'); ?> carousel-video carousel-standard <?php echo esc_attr($className . ' ' . $custom_class); ?>">

		<div class="video-carousel-title animatable fadeInUp animationDelayone">
			<?php if ($carousel_video_title) : ?><h4 class="subTitle yellow"><?php echo esc_html($carousel_video_title); ?></h4><?php endif; ?>
			<?php if ($carousel_video_subtitle) : ?><h2 class="modTitle"><?php echo esc_html($carousel_video_subtitle); ?></h2><?php endif; ?>
			<?php if ($carousel_video_intro) : ?><p class="subPara"><?php echo esc_html($carousel_video_intro); ?></p><?php endif; ?>
		</div>

		<?php if ($carousel_items) : ?>
			<div class="standard-carousel-wrapper p-t-medium">
				<div class="carousel video animatable fadeInUp animationDelaytwo"
					data-flickity='{
						"cellAlign": "left",
						"contain": false,
						"groupCells": 1,
						"pageDots": false,
						"prevNextButtons": true,
						"draggable": true,
						"freeScroll": true,
						"imagesLoaded": true,
						"percentPosition": false,
						"wrapAround": false
					}'>

					<?php foreach ($carousel_items as $item) :
						$video_embed = $item['video_embed'];
						if ($video_embed): ?>
							<div class="carousel-cell carousel-video-cell">

								<div class="video-embed-wrapper">
									<?php echo $video_embed; ?>
								</div>
							</div>
					<?php endif;
					endforeach; ?>

				</div>
			</div>
		<?php endif; ?>
	</div>

<?php endif; ?>