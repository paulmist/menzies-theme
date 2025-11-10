<?php

/**
 * Carousel Insights Block Template.
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
$className = 'carousel-insights';
if (!empty($block['className'])) {
	$className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
	$className .= ' align' . $block['align'];
}

?>
<a id="<?php echo get_field('custom_id') ;?>"></a>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo get_field('element_class'); ?> p-t-<?php echo get_field('padding_top'); ?> p-b-<?php echo get_field('padding_bottom'); ?>">

	<?php

	$args = array(
		'post_type' => 'post',
		'category_name' => 'blog,news,podcasts',
		'posts_per_page' => 10,

	);
	$custom_query = new WP_Query($args);

	?>

	<div class="title-container p-b-small animatable fadeInUp animationDelayone">
		<?php echo '<h4>' . get_field('carousel_subtitle') . '</h4>'; ?>
		<?php echo '<h2 class="modTitle">' . get_field('carousel_title') . '</h2>'; ?>
	</div>

	<div class="logo-carousel-wrapper p-b-large">
		<div class="carousel logos animatable fadeInUp animationDelaytwo" data-flickity="{ &quot;cellAlign&quot;: &quot;left&quot;, &quot;contain&quot;: false, &quot;groupCells&quot;: 1, &quot;pageDots&quot;: true, &quot;prevNextButtons&quot;: true, &quot;draggable&quot;: true,&quot;freeScroll&quot;: true, &quot;imagesLoaded&quot;: true, &quot;percentPosition&quot;: false, &quot;wrapAround&quot;: false }">
			<?php
			if ($custom_query->have_posts()) :
				while ($custom_query->have_posts()) :
					$custom_query->the_post();
			?>
					<div class="carousel-cell insights-tile">

						<article class="homepage-post-item homepage-post-item-<?php echo $news_item_count; ?> homepage-<?php if (get_post_type(get_the_ID()) == 'events') : echo 'events'; else : echo $first_category->slug; endif; ?>">

							<div class="insight-tile-inner">
								<img src="<?php $fields = array(); $fields = get_fields(get_the_id()); if (!empty($fields)) { echo $fields['post_results_icon']; } ?> " alt="">

								<div class="meta-data">
									<?php $categories = get_the_category(); if (!empty($categories)) {
										$first_category = $categories[0]->name;
											echo '<span class="meta-category">' . $first_category . '</span>';
										}
									?>
									<?php if (get_field('date_of_event')) {
											echo '<div class="d-o-e">' . '<span class="meta-date">Event date - ' . get_field('date_of_event') . '</span></div>';
										} else {
											the_date('d/m/Y', '<span class="meta-date">', '</span>');
										}
									?>
								</div>

								<h2><?php $title = the_title(); echo wp_trim_words($tile, 7, '...'); ?></h2>
								<div class="post-excerpt">
									<p><?php $excerpt = get_the_excerpt(); echo wp_trim_words($excerpt, 15, '...'); ?></p>
									<p><a href="<?php the_permalink(); ?>" class="readon grey solid" title="<?php the_title(); ?>">Read more</a></p>
								</div>
							</div>
						</article>

					</div>

			<?php endwhile;
				wp_reset_postdata();
			endif; ?>
		</div>
	</div>
</div>