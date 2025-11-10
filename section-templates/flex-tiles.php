<?php

/**
 * Flex Tiles Template.
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
$className = 'flex-tiles';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">


    <?php $flex_tiles_width = get_field('flex_tiles_width'); ?>
    <?php $flex_tile_type = get_field('flex_tile_type'); ?>

    <?php if ($flex_tile_type == 'icon') : ?>

        <div class="<?php if ($flex_tiles_width): echo 'full-width-container';
                    endif; ?> section-wrapper sectors-section-wrapper ss-bg-<?php echo esc_html(get_field('background_colour')); ?> <?php echo 'p-t-' . get_field('padding_top'); ?> <?php echo 'p-b-' . get_field('padding_bottom'); ?>" style="background-color: var(--<?php echo esc_html(get_field('background_colour')); ?>);">

            <div class="sectors-section-container uk-container">

               <?php if (get_field('flex_tiles_title')) : ?>  
                <div class="sectors-section-title">
                    <?php echo '<h2 class="modTitle animatable fadeInUp animationDelayone">' . esc_html(get_field('flex_tiles_title')) . '</h2>'; ?>
                    <p class="subPara animatable fadeInUp animationDelaytwo"><?php echo get_field('flex_tiles_introduction'); ?></p>
                </div> 
                <?php endif; ?>

                <div class="sectors-section-grid animatable fadeInUp animationDelaytwo">

                    <?php
                    $count = 0;
                    if (have_rows('flex_tiles_tiles')):
                        while (have_rows('flex_tiles_tiles')): the_row();
                            if ($count % 4 == 0) {
                                echo '<div class="column">';
                            }
                    ?>
                            <?php if (get_sub_field('cta_tile')) { ?>

                                <a href="<?php echo get_sub_field('flex_tiles_tile_link'); ?>" class="cta-tile cta-bg-<?php echo esc_html(get_sub_field('flex_tiles_tile_background_colour')); ?>" style="background-color: var(--<?php echo esc_html(get_sub_field('flex_tiles_tile_background_colour')); ?>);">
                                    <?php $image = get_sub_field('flex_tiles_tile_icon');
                                    if (!empty($image)): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>
                                    <?php echo '<h3>' . get_sub_field('flex_tiles_tile_title') . '</h3>'; ?>
                                    <?php echo '<p>' . get_sub_field('flex_tiles_cta_introduction') . '</p>'; ?>
                                </a>

                            <?php } else { ?>

                                <a href="<?php echo get_sub_field('flex_tiles_tile_link'); ?>">
                                    <?php $image = get_sub_field('flex_tiles_tile_icon');
                                    if (!empty($image)): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php endif; ?>
                                    <?php echo '<h3>' . esc_html(get_sub_field('flex_tiles_tile_title')) . '</h3>'; ?>
                                </a>

                            <?php } ?>

                    <?php
                            $count++;
                            if ($count % 4 == 0) {
                                echo '</div>';
                            }
                        endwhile;

                        // Close the last column if it's not already closed
                        if ($count % 4 != 0) {
                            echo '</div>';
                        }
                    endif; ?>
                </div>
            </div>
            <div class="home-header-accent animatable fadeInUp animationDelaythree"></div>
            <div class="sectors-section-graphics">
                <svg id="shape-group-three" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 318.1 358.2">
                    <g class="animatable fadeInUp animationDelayone">
                        <polygon points="109.6 1 261.8 1 261.8 153.2 109.6 1" style="fill:none; stroke:#fff; stroke-miterlimit:10; stroke-width:2px;" />
                    </g>
                    <g class="animatable fadeInUp animationDelaytwo">
                        <polygon points="318.1 40 318.1 358.2 0 358.2 318.1 40" style="fill:#da9b00; opacity:.3; stroke-width:0px;" />
                    </g>
                </svg>
            </div>
        <?php endif; ?>



        <?php if ($flex_tile_type == 'image') : ?>
            <div class="<?php if ($flex_tiles_width): echo 'full-width-container';
                        endif; ?> section-wrapper sectors-section-wrapper ss-bg-<?php echo esc_html(get_field('background_colour')); ?> <?php echo 'p-t-' . get_field('padding_top'); ?> <?php echo 'p-b-' . get_field('padding_bottom'); ?>" style="background-color: var(--<?php echo esc_html(get_field('background_colour')); ?>);">

                <div class="sectors-section-container uk-container">

                    <div class="sectors-section-title">
                        <?php echo '<h2 class="modTitle animatable fadeInUp animationDelayone">' . esc_html(get_field('flex_tiles_title')) . '</h2>'; ?>
                        <?php echo get_field('flex_tiles_introduction'); ?>
                    </div>

                    <div class="sectors-section-grid sectors-section-image-grid animatable fadeInUp animationDelaytwo">

                        <?php
                        $count = 0;
                        if (have_rows('flex_tiles_tiles')):
                            while (have_rows('flex_tiles_tiles')): the_row();
                                if ($count % 4 == 0) {
                                    echo '<div class="column">';
                                }
                        ?>
                                <?php if (get_sub_field('cta_tile')) { ?>

                                    <a href="<?php echo get_sub_field('flex_tiles_tile_link'); ?>" class="cta-tile cta-bg-<?php echo esc_html(get_sub_field('flex_tiles_tile_background_colour')); ?>" style="background-color: var(--<?php echo esc_html(get_sub_field('flex_tiles_tile_background_colour')); ?>);">
                                        <?php echo '<h3>' . get_sub_field('flex_tiles_tile_title') . '</h3>'; ?>
                                        <?php echo '<p>' . get_sub_field('flex_tiles_cta_introduction') . '</p>'; ?>
                                        <?php echo '<p class="readon outline white">' . get_sub_field('flex_tiles_cta_button') . '</p>'; ?>
                                    </a>

                                <?php } else { ?>

                                    <a href="<?php echo get_sub_field('flex_tiles_tile_link'); ?>">
                                        <?php
                                        $background_image = get_sub_field('flex_tiles_tile_background_image');
                                        if (!empty($background_image)): ?>
                                            <img src="<?php echo esc_url($background_image['url']); ?>" alt="<?php echo esc_attr($background_image['alt']); ?>" title="<?php echo esc_attr($background_image['title']); ?>" />
                                        <?php endif; ?>
                                        <?php echo '<h3>' . esc_html(get_sub_field('flex_tiles_tile_title')) . '</h3>'; ?>
                                    </a>

                                <?php } ?>

                        <?php
                                $count++;
                                if ($count % 4 == 0) {
                                    echo '</div>';
                                }
                            endwhile;

                            // Close the last column if it's not already closed
                            if ($count % 4 != 0) {
                                echo '</div>';
                            }
                        endif; ?>

                    </div>

                </div>
                <div class="home-header-accent animatable fadeInUp animationDelaythree"></div>
                <div class="sectors-section-graphics">
                    <svg id="shape-group-three" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 318.1 358.2">
                        <g class="animatable fadeInUp animationDelayone">
                            <polygon points="109.6 1 261.8 1 261.8 153.2 109.6 1" style="fill:none; stroke:#fff; stroke-miterlimit:10; stroke-width:2px;" />
                        </g>
                        <g class="animatable fadeInUp animationDelaytwo">
                            <polygon points="318.1 40 318.1 358.2 0 358.2 318.1 40" style="fill:#da9b00; opacity:.3; stroke-width:0px;" />
                        </g>
                    </svg>
                </div>
            <?php endif; ?>



            <?php if ($flex_tile_type == 'standard') : ?>

                <div class="<?php if ($flex_tiles_width): echo 'full-width-container';
                            endif; ?> section-wrapper sectors-section-wrapper ss-bg-<?php echo esc_html(get_field('background_colour')); ?> <?php echo 'p-t-' . get_field('padding_top'); ?> <?php echo 'p-b-' . get_field('padding_bottom'); ?>" style="background-color: var(--<?php echo esc_html(get_field('background_colour')); ?>);">

                    <div class="sectors-section-container uk-container">

                        <div class="sectors-section-title">
                            <?php echo '<h2 class="modTitle animatable fadeInUp animationDelayone">' . esc_html(get_field('flex_tiles_title')) . '</h2>'; ?>
                            <p class="subPara animatable fadeInUp animationDelaytwo"><?php echo get_field('flex_tiles_introduction'); ?></p>
                        </div>

                        <div class="sectors-section-grid animatable fadeInUp animationDelaytwo standard-flex-tiles-container">

                            <?php if (have_rows('flex_tiles_tiles')): ?>
                                <?php while (have_rows('flex_tiles_tiles')): the_row(); ?>

                                    <?php $recommended = get_sub_field('flex_reccomended_tile') ? ' reccomended-tile' : ''; ?>

                                    <?php $popid = str_replace(str_split(' .'), '-', get_sub_field('package_popup_name')); ?>

                                    <a data-target="<?php echo get_sub_field('package_popup_name'); ?>" href="#" class="full-width toggle standard-flex-tile<?php echo $recommended; ?> cta-bg-<?php echo esc_html(get_sub_field('flex_tiles_tile_background_colour')); ?>" style="background-color: var(--<?php echo esc_html(get_sub_field('flex_tiles_tile_background_colour')); ?>);">

                                        <?php $meta_tag = get_sub_field('reccomended_tag'); ?>

                                        <?php if ($recommended): ?>
                                            <span class="meta-tag"><?php echo esc_html($meta_tag); ?></span>
                                        <?php endif; ?>

                                        <?php echo '<h3>' . esc_html(get_sub_field('flex_tiles_tile_title')) . '</h3>'; ?>

                                        <?php
                                        // Display pricing section only if package_price is set
                                        $package_price = get_sub_field('package_price');
                                        $price_term = get_sub_field('price_term');
                                        $price_sub = get_sub_field('price_sub');

                                        if (!empty($package_price)) : ?>
                                            <div class="price-section">
                                                <p class="price">£<?php echo esc_html($package_price); ?><?php if (!empty($price_term)) : ?> <span>/<?php echo esc_html($price_term); ?></span><?php endif; ?></p>
                                                <?php if (!empty($price_sub)) : ?>
                                                    <p class="price-sub"><?php echo esc_html($price_sub); ?></p>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                        <p><?php echo esc_html(get_sub_field('flex_tiles_cta_introduction')); ?></p>

                                        <?php if (have_rows('flex_tiles_package_facts')): ?>
                                            <ul>
                                                <?php while (have_rows('flex_tiles_package_facts')): the_row();
                                                    $fact = get_sub_field('package_fact');
                                                    $is_included = get_sub_field('is_included');
                                                    $li_class = $is_included ? '' : 'cross';
                                                ?>
                                                    <li class="<?php echo esc_attr($li_class); ?>">
                                                        <?php echo esc_html($fact); ?>
                                                    </li>
                                                <?php endwhile; ?>
                                            </ul>
                                        <?php endif; ?>

                                        <?php
                                        $cta_button_text = get_sub_field('flex_tiles_cta_button');
                                        $button_class = (get_sub_field('flex_tiles_tile_background_colour') == 'yellow') ? 'readon solid grey' : 'readon solid yellow';
                                        if (!empty($cta_button_text)): ?>
                                            <p><span class="<?php echo $button_class; ?>"><?php echo esc_html($cta_button_text); ?></span></p>
                                        <?php endif; ?>

                                    </a>

                                <?php endwhile; ?>
                            <?php else: ?>
                                <p>No tiles found.</p>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>



            <!-- POPUP CONTENT -->

            <?php if (have_rows('flex_tiles_tiles')) : while (have_rows('flex_tiles_tiles')) : the_row(); ?>
                    <?php $popid = str_replace(str_split(' .'), '-', get_sub_field('package_popup_name')); ?>
                    <div id="<?php echo get_sub_field('package_popup_name'); ?>" class="popup-box popup-box-sustainability hide">

                        <span class="close-screen toggle" data-target="<?php echo $popid; ?>">close</span>
                        <div class="popup-wrapper">
                            <div class="popup-header">
                                <span class="close-button toggle" data-target="<?php echo $popid; ?>">close</span>
                            </div>
                            <div class="popup-body flex_tiles_popup_body">
                                <?php $popup_subtitle = get_sub_field('popup_subtitle'); ?>
                                <?php $popup_title = get_sub_field('popup_title'); ?>
                                <?php $popup_content = get_sub_field('popup_content'); ?>

                                <?php if ($popup_subtitle) : ?>
                                    <h4 class="subTitle"><?php echo ($popup_subtitle); ?></h4>
                                <?php endif; ?>

                                <?php if ($popup_title) : ?>
                                    <h2 class="modTitle"><?php echo ($popup_title); ?></h2>
                                <?php endif; ?>

                                <?php if ($popup_content) : ?>
                                    <?php echo ($popup_content); ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>

            <?php endwhile;
            endif; ?>


            <!-- FLEX TILES - POPUP TILES -->

            <?php if ($flex_tile_type == 'pop') : ?>

                <?php
                $tiles = get_field('flex_tiles_tiles');
                $tile_count = is_array($tiles) ? count($tiles) : 0;
                $custom_class = get_field('custom_class');
                $block_uid = isset($block['id']) ? $block['id'] : 'popblock-' . uniqid();
                ?>

                <div class="flex-popup-wrapper <?php
                            if ($flex_tiles_width) echo 'full-width-container ';
                            echo 'section-wrapper sectors-section-wrapper';
                            echo ' ss-bg-' . esc_html(get_field('background_colour'));
                            echo ' p-t-' . get_field('padding_top');
                            echo ' p-b-' . get_field('padding_bottom');
                            if (!empty($custom_class)) echo ' ' . esc_attr($custom_class);
                            ?>" style="background-color: var(--<?php echo esc_html(get_field('background_colour')); ?>);">

                    <div class="uk-container">

                        <div class="sectors-section-title">
                            <h2 class="modTitle animatable fadeInUp animationDelayone"><?php echo esc_html(get_field('flex_tiles_title')); ?></h2>
                            <p class="subPara animatable fadeInUp animationDelaytwo"><?php echo get_field('flex_tiles_introduction'); ?></p>
                        </div>

                        <div class="sectors-section-grid animatable fadeInDown animationDelaytwo pop-flex-tiles-container tiles-count-<?php echo $tile_count; ?>">

                            <?php if ($tile_count) : ?>
                                <?php foreach ($tiles as $index => $tile) : ?>

                                    <?php
                                    $recommended = $tile['flex_reccomended_tile'] ? ' reccomended-tile' : '';
                                    $bg_colour = esc_html($tile['flex_tiles_tile_background_colour']);
                                    $inline_bg = esc_html($tile['flex_pop_tile_background_colour']);
                                    $button_colour_class = esc_html($tile['flex_pop_tile_button_colour']);


                                    $popup_id = $block_uid . '-popup-' . $index;
                                    ?>

                                    <a data-target="<?php echo esc_attr($popup_id); ?>" href="#" class="full-width toggle pop-flex-tile<?php echo $recommended; ?> cta-bg-<?php echo $bg_colour; ?>" style="background-color: var(--<?php echo $inline_bg; ?>);">

                                        <h2><?php echo esc_html($tile['flex_pop_tile_title']); ?></h2>
                                        <p><?php echo esc_html($tile['flex_pop_tile_content']); ?></p>

                                        <?php if (!empty($tile['flex_pop_tile_button'])) : ?>
                                            <p><span class="<?php echo $button_colour_class; ?> readon solid"><?php echo esc_html($tile['flex_pop_tile_button']); ?></span></p>
                                        <?php endif; ?>
                                    </a>

                                <?php endforeach; ?>
                            <?php else : ?>
                                <p>No tiles found.</p>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <!-- PACKAGE POPUP CONTENT -->

            <?php if (have_rows('flex_tiles_tiles')) : while (have_rows('flex_tiles_tiles')) : the_row(); ?>
                    <?php $popid = str_replace(str_split(' .'), '-', get_sub_field('package_popup_name')); ?>
                    <div id="<?php echo get_sub_field('package_popup_name'); ?>" class="popup-box popup-box-sustainability hide">

                        <span class="close-screen toggle" data-target="<?php echo $popid; ?>">close</span>
                        <div class="popup-wrapper">
                            <div class="popup-header">
                                <span class="close-button toggle" data-target="<?php echo $popid; ?>">close</span>
                            </div>
                            <div class="popup-body flex_tiles_popup_body">
                                <?php $popup_subtitle = get_sub_field('popup_subtitle'); ?>
                                <?php $popup_title = get_sub_field('popup_title'); ?>
                                <?php $popup_content = get_sub_field('popup_content'); ?>

                                <?php if ($popup_subtitle) : ?>
                                    <h4 class="subTitle"><?php echo ($popup_subtitle); ?></h4>
                                <?php endif; ?>

                                <?php if ($popup_title) : ?>
                                    <h2 class="modTitle"><?php echo ($popup_title); ?></h2>
                                <?php endif; ?>

                                <?php if ($popup_content) : ?>
                                    <?php echo ($popup_content); ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>

            <?php endwhile;
            endif; ?>


            <!-- POPUP TILES CONTENT -->

            <?php if (have_rows('flex_tiles_tiles')) : $index = 0;
                while (have_rows('flex_tiles_tiles')) : the_row(); ?>
                    <?php
                    // Generate a unique ID for this block instance
                    $block_uid = isset($block['id']) ? $block['id'] : 'popblock-' . uniqid();
                    $popup_id = $block_uid . '-popup-' . $index;
                    ?>
                    <div id="<?php echo esc_attr($popup_id); ?>" class="popup-box popup-box-sustainability hide">

                        <span class="close-screen toggle" data-target="<?php echo $popup_id; ?>">close</span>
                        <div class="popup-wrapper">
                            <div class="popup-header">
                                <span class="close-button toggle" data-target="<?php echo $popup_id; ?>">close</span>
                            </div>
                            <div class="popup-body flex_tiles_popup_body">
                                <?php
                                $popup_modal_subtitle = get_sub_field('flex_popup_modal_subtitle');
                                $popup_modal_title = get_sub_field('flex_popup_modal_title');
                                $popup_modal_content = get_sub_field('flex_popup_modal_content');
                                ?>

                                <?php if ($popup_modal_subtitle) : ?>
                                    <h4 class="subTitle"><?php echo ($popup_modal_subtitle); ?></h4>
                                <?php endif; ?>

                                <?php if ($popup_modal_title) : ?>
                                    <h2 class="modTitle"><?php echo ($popup_modal_title); ?></h2>
                                <?php endif; ?>

                                <?php if ($popup_modal_content) : ?>
                                    <?php echo ($popup_modal_content); ?>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
            <?php $index++;
                endwhile;
            endif; ?>
            </div>