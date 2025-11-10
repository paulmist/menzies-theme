<?php

/**
 * Home Header Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'home-header-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'home-header';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <div class="section-wrapper home-header-wrapper home-header-bg-<?php echo esc_html(get_field('background_colour')); ?>">

        <div class="home-header-container uk-container">

            <div class="home-header-text">
                <?php if (get_field('home_header_sub_heading')) : ?>
                    <h3 class="animatable fadeInUp animationDelayone"><?php echo esc_html(get_field('home_header_sub_heading')); ?></h3>
                <?php endif; ?>

                <?php if (get_field('home_header_title')) : ?>
                    <h1 class="animatable fadeInUp animationDelayone"><?php echo esc_html(get_field('home_header_title')); ?></h1>
                <?php endif; ?>
                <?php if (have_rows('home_header_quick_facts')) : ?>
                    <ul class="home-header-facts animatable fadeInUp animationDelaytwo">
                        <?php while (have_rows('home_header_quick_facts')) : the_row(); ?>
                            <li><?php the_sub_field('home_header_fact'); ?></li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
                <?php if (have_rows('buttons')) : ?>
                    <p>
                        <?php while (have_rows('buttons')) : the_row(); ?>
                            <?php
                            $link = get_sub_field('link');
                            if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ?: '_self';
                            ?>
                                <a class="readon <?php echo esc_attr(get_sub_field('button_colour')); ?> animatable fadeInUp animationDelaythree" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                    <?php echo esc_html($link_title); ?>
                                </a>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </p>
                <?php endif; ?>
            </div>

            <!-- GRAPHIC DESKTOP -->
            <div class="home-header-graphic home-header-graphic-desktop box" data-scroll-speed="3">
                <?php $image_url = 'https://www.menzies.co.uk/wp-content/uploads/2025/07/home_pillars_collage.jpg'; ?>

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1766 1177" class="pillar-svg" preserveAspectRatio="none">
                    <defs>
                        <clipPath id="clippath">
                            <rect y="0" width="25%" height="0" />
                        </clipPath>
                        <clipPath id="clippath-1">
                            <rect x="450" y="0" width="25%" height="0" />
                        </clipPath>
                        <clipPath id="clippath-2">
                            <rect x="900" y="0" width="25%" height="0" />
                        </clipPath>
                        <clipPath id="clippath-3">
                            <rect x="1351" y="0" width="25%" height="0" />
                        </clipPath>
                    </defs>

                    <g id="pillar-one" class="pillar">
                        <g style="clip-path:url(#clippath);">
                            <image width="1766.4" height="1177" xlink:href="<?php echo esc_url($image_url); ?>" />
                        </g>
                    </g>
                    <g id="pillar-two" class="pillar">
                        <g style="clip-path:url(#clippath-1);">
                            <image width="1766.4" height="1177" xlink:href="<?php echo esc_url($image_url); ?>" />
                        </g>
                    </g>
                    <g id="pillar-three" class="pillar">
                        <g style="clip-path:url(#clippath-2);">
                            <image width="1766.4" height="1177" xlink:href="<?php echo esc_url($image_url); ?>" />
                        </g>
                    </g>
                    <g id="pillar-four" class="pillar">
                        <g style="clip-path:url(#clippath-3);">
                            <image width="1766.4" height="1177" xlink:href="<?php echo esc_url($image_url); ?>" />
                        </g>
                    </g>
                </svg>

            </div>


            <!-- GRAPHIC MEDIUM -->
            <div class="home-header-graphic home-header-graphic-mobile box" data-scroll-speed="3">

                <?php $mobile_image_url = 'https://www.menzies.co.uk/wp-content/uploads/2025/07/header-medium.jpg'; ?>


                <svg id="pillar-mobile-group" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1027 800">
                    <defs>
                        <clipPath id="clippath-mobile">
                            <rect x="0" y="0" width="24.26%" height="0" />
                        </clipPath>
                        <clipPath id="clippath-mobile-1">
                            <rect x="25.23%" y="0" width="24.26%" height="0" />
                        </clipPath>
                        <clipPath id="clippath-mobile-2">
                            <rect x="50.46%" y="0" width="24.26%" height="0" />
                        </clipPath>
                        <clipPath id="clippath-mobile-3">
                            <rect x="75.69%" y="0" width="24.26%" height="0" />
                            </clipPath>
                    </defs>
                    <g id="pillar-mobile-4">
                        <g style="clip-path:url(#clippath-mobile);">
                            <image width="1027" height="800" xlink:href="<?php echo esc_url($mobile_image_url); ?>" />
                        </g>
                    </g>
                    <g id="pillar-mobile-3">
                        <g style="clip-path:url(#clippath-mobile-1);">
                            <image width="1027" height="800" xlink:href="<?php echo esc_url($mobile_image_url); ?>" />
                        </g>
                    </g>
                    <g id="pillar-mobile-2">
                        <g style="clip-path:url(#clippath-mobile-2);">
                            <image width="1027" height="800" xlink:href="<?php echo esc_url($mobile_image_url); ?>" />
                        </g>
                    </g>
                    <g id="pillar-mobile-1">
                        <g style="clip-path:url(#clippath-mobile-3);">
                            <image width="1027" height="800" xlink:href="<?php echo esc_url($mobile_image_url); ?>" />
                        </g>
                    </g>
                </svg>
            </div>


            <!-- GRAPHIC SMALL -->
            <div class="home-header-graphic home-header-graphic-smallest box" data-scroll-speed="3">

                <?php $small_image_url = 'https://www.menzies.co.uk/wp-content/uploads/2025/07/header-smallest-.jpg'; ?>


                <svg id="pillar-mobile-group" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 900 800">
                    <defs>
                        <clipPath id="clippath-small">
                            <rect x="0" y="0" width="24.26%" height="0" />
                        </clipPath>
                        <clipPath id="clippath-small-1">
                            <rect x="25.23%" y="0" width="24.26%" height="0" />
                        </clipPath>
                        <clipPath id="clippath-small-2">
                            <rect x="50.46%" y="0" width="24.26%" height="0" />
                        </clipPath>
                        <clipPath id="clippath-small-3">
                            <rect x="75.69%" y="0" width="24.26%" height="0" />
                            </clipPath>
                    </defs>
                    <g id="pillar-mobile-4">
                        <g style="clip-path:url(#clippath-small);">
                            <image width="900" height="800" xlink:href="<?php echo esc_url($small_image_url); ?>" />
                        </g>
                    </g>
                    <g id="pillar-mobile-3">
                        <g style="clip-path:url(#clippath-small-1);">
                            <image width="900" height="800" xlink:href="<?php echo esc_url($small_image_url); ?>" />
                        </g>
                    </g>
                    <g id="pillar-mobile-2">
                        <g style="clip-path:url(#clippath-small-2);">
                            <image width="900" height="800" xlink:href="<?php echo esc_url($small_image_url); ?>" />
                        </g>
                    </g>
                    <g id="pillar-mobile-1">
                        <g style="clip-path:url(#clippath-small-3);">
                            <image width="900" height="800" xlink:href="<?php echo esc_url($small_image_url); ?>" />
                        </g>
                    </g>
                </svg>
            </div>

           <!-- GRAPHIC SHAPES MOBILE -->

                       <div class="home-header-graphic home-header-shapes mobileyes box" data-scroll-speed="3">
                
                    <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 605.5 600.1">
                        <g class="animatable fadeInRight animationDelayone box"><path d="m400.5,166.6h-118.6V48l118.6,118.6Zm-116.6-2h111.8l-111.8-111.8v111.8Z" style="fill:#50544b; stroke-width:0px;"/></g>
                        <g class="animatable fadeInDown animationDelaytwo box"><path d="m453,152.5L300.6,0h304.9l-152.5,152.5ZM305.4,2l147.6,147.6L600.7,2h-295.3Z" style="fill:#fff; stroke-width:0px;"/></g>
                        <g class="animatable fadeInUp animationDelaythree box"><polygon points="278.3 265.2 340.7 265.2 340.7 327.6 278.3 265.2" style="fill:#48494c; stroke-width:0px;"/></g>
                        <g class="animatable fadeInUp animationDelayfour box"><polygon points="539.7 107.6 602.1 107.6 602.1 170 539.7 107.6" style="fill:#48494c; stroke-width:0px;"/></g>
                        <g class="animatable fadeInLeft animationDelayfive box"><polygon points="336.5 198.9 554.2 198.9 554.2 416.5 336.5 198.9" style="fill:#da9b00; stroke-width:0px; opacity: 0.3;"/></g>
                        <g class="animatable fadeInLeft animationDelaysix box"><polygon points="602.2 281.9 602.2 600.1 284 600.1 602.2 281.9" style="fill:#da9b00; stroke-width:0px; opacity: 0.3;"/></g>
                        <g class="animatable fadeInRight animationDelayseven box"><path d="m114.3,596.2L0,481.9h228.5l-114.3,114.3ZM4.8,483.9l109.4,109.4,109.4-109.4H4.8Z" style="fill:#50544b; stroke-width:0px;"/></g>
                        <g class="animatable fadeInUp animationDelayeight box"><path d="m185.1,599v-214.2h214.2l-214.2,214.2Zm2-212.2v207.4l207.4-207.4h-207.4Z" style="fill:#fff; stroke-width:0px;"/></g>
                    </svg>

                    <script>
                        $(function(){
                            var boxes = $('.box'),
                                $window = $(window);
                            
                            $window.scroll(function(){
                                var scrollTop = $window.scrollTop();
                                boxes.each(function(){
                                    var $this = $(this),
                                        scrollspeed = parseInt($this.data('scroll-speed')),
                                        val = -scrollTop / scrollspeed,
                                        opacity = 1 - scrollTop / (scrollspeed * 200);

                                    $this.css({
                                        'top': val + 'px',
                                        'opacity': opacity
                                    });
                                });
                            });
                        });
                    </script>

                    
            </div>


        </div>

        <?php
        $link = get_field('additional_button');
        if ($link) :
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ?: '_self';
        ?>
            <div class="enquire-header">
                <a class="animatable fadeInUp animationDelayThree readon readon-enquire" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                    <span><?php echo esc_html($link_title); ?></span>
                    <span class="enquire-arrow"></span>
                </a>
            </div>
        <?php endif; ?>

        <div class="home-header-accent animatable fadeInUp animationDelayfour"></div>

    </div>
</div>