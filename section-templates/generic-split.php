<?php

/**
 * Generic Split Block Template.
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
$className = 'generic-split';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <div class="uk-container p-t-<?php echo esc_html(get_field('padding_top')); ?> p-b-<?php echo esc_html(get_field('padding_bottom')); ?>">

        <div class="generic-split-container">

            <div class="generic-split-image animatable fadeInUp animationDelayone">

                <?php
                $image = get_field('generic_split_image');
                if (!empty($image)): ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                <?php endif; ?>

            </div>

            <div class="generic-split-text animatable fadeInUp animationDelaytwo">

                <?php echo '<h3 class="subTitle">' . get_field('generic_split_sub_heading') . '</h3>'; ?>
                <?php echo '<h2 class="modTitle">' . get_field('generic_split_title') . '</h2>'; ?>
                <?php the_field('content_block'); ?>







                <div class="text-split-button">
                    <?php
                    $block_id = $block['id'];

                    if (have_rows('text_split_buttons')) :
                        while (have_rows('text_split_buttons')) : the_row();

                            $is_popup = get_sub_field('generic_split_link_type');
                            $button_colour = get_sub_field('text_split_button_colour');

                            if ($is_popup) :
                                $popup_text = get_sub_field('generic_split_popup_text');
                                $row_index = get_row_index();

                                $sanitised_text = $popup_text ? strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', $popup_text)) : 'popup';

                                $unique_id = $block_id . '-' . $sanitised_text . '-' . $row_index;
                    ?>

                                <a class="readon toggle <?php echo esc_attr($button_colour); ?>" data-target="<?php echo esc_attr($unique_id); ?>" href="javascript:void(0);"><?php echo esc_html($popup_text ? $popup_text : 'Open Popup'); ?></a>

                                <?php else :
                                $link = get_sub_field('text_split_link');
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

    </div>
</div>







<!-- POPUP CONTENT -->
<?php if (have_rows('text_split_buttons')) : ?>
    <?php while (have_rows('text_split_buttons')) : the_row(); ?>
        <?php
        $popup_text = get_sub_field('generic_split_popup_text');
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
                    $ts_pop_subtitle = get_sub_field('generic_split_subtitle');
                    $ts_pop_title = get_sub_field('generic_split_title');
                    $ts_pop_content = get_sub_field('generic_split_content');

                    if ($ts_pop_subtitle) : ?>
                        <h4 class="subTitle"><?php echo esc_html($ts_pop_subtitle); ?></h4>
                    <?php endif;

                    if ($ts_pop_title) : ?>
                        <h2 class="modTitle"><?php echo esc_html($ts_pop_title); ?></h2>
                    <?php endif;

                    if ($ts_pop_content) : ?>
                        <?php echo ($ts_pop_content); ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php endif; ?>