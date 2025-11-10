<?php

/**
 * Post Intro Block Template.
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
$className = 'post-intro';
if (!empty($block['className'])) {
	$className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
	$className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

	<div class="uk-container post-intro-container p-t-<?php echo esc_html ( get_field('padding_top') ); ?> p-b-<?php echo esc_html ( get_field('padding_bottom') ); ?>">

    <?php if(get_field('post_intro')): echo ( get_field('post_intro') ) ; endif; ?>
		
	</div>
</div>