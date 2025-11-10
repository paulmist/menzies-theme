<?php

/**
 * Logo Carousel Block Template.
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

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo get_field('element_class'); ?>">

	<div class="clients-carousel-wrapper">
		<div class="carousel logos clients animatable fadeInUp animationDelaytwo p-t-<?php echo esc_html ( get_field('padding_top') ); ?> p-b-<?php echo esc_html ( get_field('padding_bottom') ); ?>" data-flickity="{ &quot;cellAlign&quot;: &quot;left&quot;, &quot;contain&quot;: false, &quot;groupCells&quot;: 1, &quot;pageDots&quot;: false, &quot;prevNextButtons&quot;: true, &quot;draggable&quot;: true,&quot;freeScroll&quot;: true, &quot;imagesLoaded&quot;: true, &quot;wrapAround&quot;: true, &quot;autoPlay&quot;: true  }">

            <?php if( have_rows('client_carousel') ): ?>
                <?php while( have_rows('client_carousel') ): the_row(); ?>
                    <div class="carousel-cell">
                        <?php $image = get_sub_field('client_logo'); if( !empty( $image ) ): ?>
                            <img class="attachment-full size-full" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>	
		</div>
	</div>
</div>