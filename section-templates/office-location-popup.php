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
$className = 'office-location-popup';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> p-t-<?php echo get_sub_field('padding_top'); ?> p-b-<?php echo get_field('padding_bottom'); ?>">
    <div class="office-location-container animatable fadeInDown animationDelayone">
        <?php if (have_rows('office_location')) : ?>
            <ul>
                <?php while (have_rows('office_location')) : the_row(); ?>
                    <li>
                        <div>
                            <?php if (get_sub_field('office_title')) : echo '<h2>' . esc_html(get_sub_field('office_title')) . '</h2>';
                            endif; ?>
                            <?php $popid = str_replace(str_split(' .'), '-', get_sub_field('office_popup_name')); ?>
                            <p class="readon full-width toggle" data-target="<?php echo $popid; ?>"><?php echo get_sub_field('office_popup_button_text'); ?></p>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php endif; ?>

        <?php if (have_rows('office_location')) : while (have_rows('office_location')) : the_row(); ?>
                <?php $popid = str_replace(str_split(' .'), '-', get_sub_field('office_popup_name')); ?>
                <div id="<?php echo $popid; ?>" class="popup-box popup-box-sustainability hide hello-hello">
                <span class="close-screen toggle" data-target="<?php echo $popid; ?>">close</span>
                    <div class="popup-wrapper">
                        <div class="popup-header">
                            <span class="close-button toggle" data-target="<?php echo $popid; ?>">close</span>
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
                </div>
        <?php endwhile;
        endif; ?>
    </div>
</div>