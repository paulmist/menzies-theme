<?php

/**
 * Flexible content Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'flexible-content-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'flexible-content';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo get_field('custom_class'); ?>">

<?php 
$content_alignment = get_field('content_alignment');
$padding_top = get_field('padding_top');
$padding_bottom = get_field('padding_bottom');
$padding_left = get_field('padding_left');
$padding_right = get_field('padding_right');
$background_colour = get_field('background_colour');
$editor_field = get_field('editor_field');
$subtitle = get_field('flexible_content_subtitle');
$title = get_field('flexible_content_title');


$padding_top_class = $padding_top ? 'p-t-' . $padding_top : '';
$padding_bottom_class = $padding_bottom ? 'p-b-' . $padding_bottom : '';
$content_alignment_class = $content_alignment ? esc_attr($content_alignment) : '';

$text_alignment_class = '';
$max_width_class = '';
if ($content_alignment === 'alignCenter') {
    $text_alignment_class = 'textCenter';
    $max_width_class = 'maxWidthContainer';
} elseif ($content_alignment === 'alignRight') {
    $text_alignment_class = 'textRight';
}

$padding_left_class = $padding_left ? 'auto-padding-left' : '';
$padding_right_class = $padding_right ? 'auto-padding-right' : '';
?>

    <div class="fadeInUp animationDelayone animatable <?php echo trim("{$padding_top_class} {$padding_bottom_class} {$content_alignment_class} {$text_alignment_class} {$max_width_class} {$padding_left_class} {$padding_right_class}"); ?> flexBox flexDirColumn" style="background-color: var(--<?php echo esc_html($background_colour); ?>);">

    <?php if ($subtitle) : ?>
    <h4 class="subTitle yellow"><?php echo esc_html($subtitle) ?></h4>
    <?php endif; ?>

  <?php if ($title) : ?>
    <h2 class="modTitle"><?php echo esc_html($title) ?></h2>
    <?php endif; ?>
  
        <?php if ($editor_field) : ?>
            <?php echo $editor_field; ?>
        <?php endif; ?>
    </div>
</div>
