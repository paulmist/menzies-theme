<?php

/**
 * List Buttons Block Template.
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
$className = 'list-buttons';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>  desktop-no mobile-yes">


    <div class="list-button-container m-t-<?php echo get_field('margin_top'); ?> m-b-<?php echo get_field('margin_bottom'); ?>">

        <?php if (get_field('lb_title')) : ?><h2><?php echo get_field('lb_title'); ?></h2> <?php endif; ?>
        <?php if (have_rows('lb_links')) :


            while (have_rows('lb_links')) : the_row();



                $link = get_sub_field('lb_link_tile');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
                    <ul>
                        <li>
                            <h4><a class="list_button_tile" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a></h4>
                        </li>
                    </ul>
        <? endif;
            endwhile;
        endif;
        ?>


    </div>


</div>