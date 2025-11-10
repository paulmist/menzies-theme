<?php
// Section template for service list (navigation)
$container = get_theme_mod('understrap_container_type');
?>

<div class="careers_nav_wrapper">

    <?php
    wp_nav_menu(array(
        'menu' => 30339,
    ));
    ?>



    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo get_field('element_class', 'option'); ?> p-t-<?php echo get_field('padding_top', 'option'); ?> p-b-<?php echo get_field('padding_bottom', 'option'); ?>">

        <div class="cvl-carousel-container">
            <?php if (have_rows('career_link_carousel_items', 'option')) : ?>
                <div class="cvl-carousel center">
                    <?php while (have_rows('career_link_carousel_items', 'option')) : the_row(); ?>
                        <?php $link = get_sub_field('cvl_link'); ?>
                        <?php if ($link) :
                            $link_url = $link['url'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            $image = get_sub_field('cvl_background_image');
                            $cvl_title = get_sub_field('cvl_title');
                        ?>
                            <div>
                                <a class="slick-cell career-nav-cell" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                    <?php if ($cvl_title) {
                                        echo '<div class="career-nav-inner">' . '<h4>' . esc_html($cvl_title) . '</h4>' . '</div>';
                                    } ?>
                                </a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>