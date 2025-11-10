<?php

/**
 * Sectors Call Out Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'call-out-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'sectors-call-out';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo get_field('custom_class'); ?> <?php echo 'p-t-' . get_field('padding_top'); ?> <?php echo 'p-b-' . get_field('padding_bottom'); ?>">

    <div class="section-wrapper call-out-wrapper co-bg-<?php echo esc_html(get_field('background_colour')); ?>" style="background-color: var(--<?php echo esc_html(get_field('background_colour')); ?>);">

        <?php $link = get_field('sectors_call_out_link'); ?>

        
                            <?php $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                       

        <a class="sectors-call-out-container" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
            <?php $image = get_field('sectors_call_out_thumbnail');
            if (!empty($image)): ?>
                <div class="sectors-call-out-image animatable fadeInUp animationDelayone">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endif; ?>
            <div class="sectors-call-out-text">
                <?php echo '<h4 class="subTitle animatable fadeInUp animationDelaytwo">' . esc_html(get_field('sectors_call_out_sub_heading')) . '</h4>'; ?>
                <?php echo '<h3 class="modTitle animatable fadeInUp animationDelaythree">' . get_field('sectors_call_out_title') . '</h3>'; ?>
                <?php echo '<p class="fake-readon animatable fadeInUp animationDelaythree readon solid blue">' . get_field('sectors_call_out_button_text') . '</p>'; ?>
            </div>
        </a>
        

        <?php if (get_field('accents') == 'yes') { ?>

            <div class="call-out-graphics animatable fadeInUp animationDelaythree">

                <svg id="shape-group-four" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 180.1 180.1">
                    <g class="animatable fadeInUp animationDelayone">
                        <polygon points="0 180.1 0 0 180.1 0 0 180.1" style="fill:#0e5368; stroke-width:0px;opacity:.1;" />
                    </g>
                    <g class="animatable fadeInUp animationDelaytwo">
                        <path d="m89.1,176.4H27v-62.1l62.1,62.1Zm-60.1-2h55.3l-55.3-55.3v55.3Z" style="fill:#fcc100; stroke-width:0px;" />
                    </g>
                </svg>

                <svg id="shape-group-five" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 170.2 158.9">
                    <g class="animatable fadeInUp animationDelaythree">
                        <polygon points="170.2 0 170.2 158.9 11.3 158.9 170.2 0" style="fill:#da9b00; stroke-width:0px;opacity:.2;" />
                    </g>
                    <g class="animatable fadeInUp animationDelayfour">
                        <path d="m59.4,135.3H0v-59.4l59.4,59.4Zm-57.4-2h52.6L2,80.8v52.6Z" style="fill:#50544b; stroke-width:0px;" />
                    </g>
                </svg>

            </div>

        <?php } else { ?>

        <?php } ?>

    </div>
</div>