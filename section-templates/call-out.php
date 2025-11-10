<?php

/**
 * Call Out Template.
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
$className = 'call-out';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo get_field('custom_class'); ?>">

    <div class="section-wrapper call-out-wrapper co-bg-<?php echo esc_html(get_field('background_colour')); ?> <?php echo 'p-t-' . get_field('padding_top'); ?> <?php echo 'p-b-' . get_field('padding_bottom'); ?>" style="background-color: var(--<?php echo esc_html(get_field('background_colour')); ?>);">

        <div class="call-out-container">
            <?php $image = get_field('call_out_thumbnail');
            if (!empty($image)): ?>
                <div class="call-out-image animatable fadeInUp animationDelayone">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                </div>
            <?php endif; ?>
            <div class="call-out-text">
                <?php echo '<h4 class="subTitle animatable fadeInUp animationDelaytwo">' . esc_html(get_field('call_out_sub_heading')) . '</h4>'; ?>
                <?php echo '<h3 class="modTitle animatable fadeInUp animationDelaythree">' . get_field('call_out_title') . '</h3>'; ?>

                <div class="text-split-button fadeInUp animationDelayfour animatable">
                    <?php
                    $block_id = $block['id'];

                    if (have_rows('call_out_buttons')) :
                        while (have_rows('call_out_buttons')) : the_row();

                            $is_popup = get_sub_field('call_out_link_type');
                            $button_colour = get_sub_field('button_colour');

                            if ($is_popup) :
                                $popup_text = get_sub_field('call_out_button_text');
                                $row_index = get_row_index();

                                $sanitised_text = $popup_text ? strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', $popup_text)) : 'popup';

                                $unique_id = $block_id . '-' . $sanitised_text . '-' . $row_index;
                    ?>
                                <a class="readon toggle <?php echo esc_attr($button_colour); ?>" data-target="<?php echo esc_attr($unique_id); ?>" href="javascript:void(0);"><?php echo esc_html($popup_text ? $popup_text : 'Open Popup'); ?></a>

                                <?php else :
                                $link = get_sub_field('link');
                                if ($link) :
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                    <a class="readon <?php echo esc_attr($button_colour); ?>"
                                        href="<?php echo esc_url($link_url); ?>"
                                        target="<?php echo esc_attr($link_target); ?>">
                                        <?php echo esc_html($link_title); ?>
                                    </a>
                    <?php endif;
                            endif;

                        endwhile;
                    endif;
                    ?>
                </div>

            </div>
        </div>

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


<!-- POPUP CONTENT -->
<?php if (have_rows('call_out_buttons')) : ?>
    <?php while (have_rows('call_out_buttons')) : the_row(); ?>
        <?php
        $popup_text = get_sub_field('call_out_button_text');
        $row_index = get_row_index(); // Must match button logic

        // Reuse the same $block_id that was passed to the block
        // Make sure $block_id is available in this scope — pass it in from parent block if needed

        $sanitised_text = $popup_text ? strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', $popup_text)) : 'popup';
        $unique_id = $block_id . '-' . $sanitised_text . '-' . $row_index;
        ?>
        <div id="<?php echo esc_attr($unique_id); ?>" class="popup-box popup-box-sustainability hide">
            <span class="close-screen toggle" data-target="<?php echo esc_attr($unique_id); ?>">close</span>
            <div class="popup-wrapper popup-contact-wrapper">
                <div class="popup-header">
                    <span class="close-button toggle" data-target="<?php echo esc_attr($unique_id); ?>">close</span>
                </div>
                <div class="popup-body popup-contact-body">

                    <?php
                    $call_out_pop_subtitle = get_sub_field('call_out_subtitle');
                    $call_out_pop_title = get_sub_field('call_out_title');
                    $call_out_pop_content = get_sub_field('call_out_content');

                    if ($call_out_pop_subtitle) : ?>
                        <h4 class="subTitle"><?php echo esc_html($call_out_pop_subtitle); ?></h4>
                    <?php endif;

                    if ($call_out_pop_title) : ?>
                        <h2 class="modTitle"><?php echo esc_html($call_out_pop_title); ?></h2>
                    <?php endif;

                    if ($call_out_pop_content) : ?>
                        <?php echo ($call_out_pop_content); ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>