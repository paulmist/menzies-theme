<?php

/**
 * Related Page Split Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'solution-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'related-page-split';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}
$accent_bg = get_field('accent_bg');
if ($accent_bg) {
    $class = 'accent-bg';
} else {
    $class = '';
}
$subtitle = get_field('rps_subtitle');
$title = get_field('rps_title');

?>
<a id="<?php echo get_field('custom_id'); ?>"></a>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> solution-explore-section-wrapper <?php echo $class; ?> p-t-<?php echo get_field('padding_top'); ?> p-b-<?php echo get_field('padding_bottom'); ?>">

    <div class="related-page-split-container">
        <div class="rps-left-side animatable fadeInUp animationDelayone">
            <?php if ($subtitle) {
                echo '<h4 class="subTitle">' . esc_html($subtitle) . '</h4>';
            } ?>
            <?php if ($title) {
                echo '<h2 class="modTitle">' . ($title) . '</h2>';
            } ?>
            <?php if (have_rows('rps_buttons')) : ?>
                <?php while (have_rows('rps_buttons')) : the_row(); ?>
                    <?php
                    $link = get_sub_field('rps_button_link');
                    if ($link) :
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                        <a class="readon <?php echo esc_html(get_sub_field('rps_button_colour')); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php endif; ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <div class="rps-right-side animatable fadeInUp animationDelaytwo">
            <?php
            $secondary_posts = get_field('secondary_posts');
            $external_links = get_field('external_links');

            if ($secondary_posts) :
                foreach ($secondary_posts as $secondary_post) :
                    $permalink = get_permalink($secondary_post->ID);
                    $title = get_the_title($secondary_post->ID);
            ?>
                    <a href="<?php echo esc_url($permalink); ?>" class="secondary-post">
                        <div class="post-content">
                            <h3><?php echo esc_html($title); ?></h3>
                        </div>
                        <p class="arrow-link"></p>
                    </a>
            <?php
                endforeach;
            endif; ?>
            <?php if (have_rows('external_links')) :

                while (have_rows('external_links')) : the_row(); ?>
                    <?php
                    $link = get_sub_field('external_links_link');
                    if ($link) :
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                        <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>" class="secondary-post">
                            <div class="post-content">
                                <h3><?php echo esc_html($link_title); ?></h3>
                            </div>
                            <p class="arrow-link"></p>
                        </a>
                    <?php endif; ?>
            <?php endwhile;
            endif; ?>
        </div>

    </div>
</div>