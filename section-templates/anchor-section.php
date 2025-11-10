<?php

/**
 * Anchor Section Block Template.
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
$className = 'anchor-section';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div id="sticky-anchor"></div>
    <div id="sticky" class="sticky-anchor-nav uk-container animatable fadeInDown animationDelayone p-t-<?php echo esc_html(get_field('padding_top')); ?> p-b-<?php echo esc_html(get_field('padding_bottom')); ?>" style="background-color: var(--<?php echo esc_html(get_field('background_colour')); ?>);">
        <div>
            <div class="anchor-inner">

                <?php
                if (have_rows('anchor_repeater')) : ?>
                    <ul class="anchor-row">
                        <?php
                        while (have_rows('anchor_repeater')) : the_row(); ?>
                            <a href="#<?php if (get_sub_field('anchor_link')) : echo esc_attr(get_sub_field('anchor_link'));
                                        endif; ?>" class="anchor-field">
                                <?php if (get_sub_field('anchor_title')) : echo esc_html(get_sub_field('anchor_title'));
                                endif; ?>
                            </a>
                        <?php
                        endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>

        </div>


        <?php if (get_field('show_banner') == 'Yes') : ?>
            <?php
            $banner_background_colour = get_field('banner_background_colour');
            $additional_class = ($banner_background_colour == 'dark') ? 'border-top-yes' : '';
            ?>
            <div class="anchor-banner <?php echo esc_attr($additional_class); ?>" style="background-color: var(--<?php echo esc_html($banner_background_colour); ?>);">
                <?php
                $banner_link = get_field('banner_link');
                $banner_phone = get_field('anchor_phone_number');

                if ($banner_link || $banner_phone) :
                    $link_url = $banner_link ? esc_url($banner_link['url']) : '';
                    $link_target = $banner_link ? esc_attr($banner_link['target']) : '';
                    $phone_number = $banner_phone ? "tel:" . esc_attr($banner_phone) : '';

                    $href = $link_url;
                    if ($link_url && $phone_number) {
                        $href .= ' ';
                    }
                    $href .= $phone_number;

                ?>
                    <a class="flexBox justifyCenter" href="<?php echo $href; ?>" target="<?php echo $link_target; ?>">
                        <h3 style="color: var(--<?php echo get_field('banner_text_color'); ?>);">
                            <?php echo esc_html(get_field('banner_text')); ?>
                        </h3>
                    </a>
                <?php endif; ?>

            </div>
        <?php endif; ?>
    </div>
</div>