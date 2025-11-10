<?php

/**
 * Popup Button Block Template.
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
$className = 'popup-button';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$popup_style = get_field('popup_style');
?>






<?php if ($popup_style === 'standard_popup') : ?>

    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>  mobile-yes">
        <div class="p-t-<?php echo get_sub_field('padding_top'); ?> p-b-<?php echo get_field('padding_bottom'); ?>">
            <?php if (get_field('popup')) : ?>
                <?php if (have_rows('popup')) : while (have_rows('popup')) : the_row(); ?>
                        <?php $popid = str_replace(str_split(' .'), '-', get_sub_field('popup_name')); ?>
                        <p class="readon full-width toggle" data-target="<?php echo $popid; ?>"><?php echo get_sub_field('popup_button_text'); ?></p>
                <?php endwhile;
                endif; ?>
            <?php endif; ?>
        </div>

        <?php if (have_rows('popup')) : while (have_rows('popup')) : the_row(); ?>
                <?php $popid = str_replace(str_split(' .'), '-', get_sub_field('popup_name')); ?>
                <div id="<?php echo $popid; ?>" class="popup-box popup-box-sustainability hide">
                    <div class="popup-wrapper">
                        <div class="popup-header">
                            <span class="close-button toggle" data-target="<?php echo $popid; ?>">close</span>
                        </div>
                        <div class="popup-body">
                            <?php if (get_sub_field('popup_content')) : ?><p><?php echo get_sub_field('popup_content'); ?></p><?php endif; ?>
                        </div>
                    </div>
                </div>
        <?php endwhile;
        endif; ?>
    </div>
<?php endif; ?>




<?php if ($popup_style === 'popup_display') : ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo get_field('custom_class'); ?> <?php echo 'p-t-' . get_field('padding_top'); ?> <?php echo 'p-b-' . get_field('padding_bottom'); ?>">

        <div class="section-wrapper call-out-wrapper">

            <div class="call-out-container popup-call-out-container" style="background-color: var(--<?php echo esc_html(get_field('background_colour')); ?>);">
                <div class="call-out-text">
                    <?php if (get_field('popup_sub_heading')) : ?>
                        <h4 class="subTitle animatable fadeInUp animationDelaytwo"><?php echo esc_html(get_field('popup_sub_heading')); ?></h4>
                    <?php endif; ?>

                    <?php if (get_field('popup_out_title')) : ?>
                        <h3 class="modTitle animatable fadeInUp animationDelaythree"><?php echo get_field('popup_out_title'); ?></h3>
                    <?php endif; ?>

                    <div>
                        <?php if (get_field('popup')) : ?>
                            <?php if (have_rows('popup')) : while (have_rows('popup')) : the_row(); ?>
                                    <?php $popid = str_replace(str_split(' .'), '-', get_sub_field('popup_name')); ?>
                                    <p class="readon toggle" data-target="<?php echo $popid; ?>"><?php echo get_sub_field('popup_button_text'); ?></p>
                            <?php endwhile;
                            endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if (have_rows('popup')) : while (have_rows('popup')) : the_row(); ?>
                <?php $popid = str_replace(str_split(' .'), '-', get_sub_field('popup_name')); ?>
                <div id="<?php echo $popid; ?>" class="popup-box popup-box-sustainability hide">
                    <div class="popup-wrapper">
                        <div class="popup-header">
                            <span class="close-button toggle" data-target="<?php echo $popid; ?>">close</span>
                        </div>
                        <div class="popup-body">
                            <?php if (get_sub_field('popup_content')) : ?><p><?php echo get_sub_field('popup_content'); ?></p><?php endif; ?>
                        </div>
                    </div>
                </div>
        <?php endwhile;
        endif; ?>

    </div>
<?php endif; ?>