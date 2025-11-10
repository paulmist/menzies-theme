<?php

/**
 * Table Shortcode Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'flex-tiles-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'table-shortcode';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>

<?php $title = get_field('shortcode_table_title'); ?>
<?php $subtitle = get_field('shortcode_table_subtitle'); ?>
<?php $shortcode = get_field('shortcode'); ?>
<?php $paddingtop = get_field('padding_top'); ?>
<?php $paddingbottom = get_field('padding_bottom'); ?>


<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> p-t-<?php echo $paddingtop; ?> p-b-<?php echo $paddingbottom; ?>">
    <div class="p-t-small p-b-large">
        <div class="sectors-section-title">
            <?php if ($title) : ?>
                <h2 class="modTitle fadeInUp animationDelayone animatable"><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if ($subtitle) : ?>
                <p class="subPara fadeInUp animationDelaytwo animatable"><?php echo $subtitle; ?></p>
            <?php endif; ?>
        </div>
        <?php if ($shortcode) : ?>
            <div class="table-wrapper fadeInUp animationDelaythree animatable">
                <?php echo $shortcode; ?>
            </div>
        <?php endif; ?>
    </div>
</div>