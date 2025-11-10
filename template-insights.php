<?php

/**
 * Template Name: Resources Page (Custom Archive)
 */

get_header();
?>

<head>
    <title>Insights from Menzies</title>
</head>


<?php
$author_object = get_field('author');
$has_hero = "no-hero";
if (has_post_thumbnail()) {
    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
} else {
    $get_old_header = get_field('header_image');
    $featured_img_url = $get_old_header['url'];
}
if ($featured_img_url) {
    $has_hero = "yes-hero";
}
?>
<?php
$inner_page_header = get_field('inner_page_header');
?>

<main id="primary" class="site-main stories">

    <?php if ($inner_page_header['inner-header-title']) : ?>
        <div class="pageHeader animatable fadeInDown animationDelayone">
            <div class="<?php if ($inner_page_header['centred_text']) : echo 'pageHeaderCenter';
                        endif; ?> p-t-xlarge p-b-medium animatable fadeInDown animationDelayone">
                <h1 class="<?php if ($inner_page_header['centred_text']) : echo 'justifyCenter';
                            endif; ?>">
                    <?php $image = $inner_page_header['identitylogo'];
                    if (!empty($image)) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    <?php endif; ?>
                    <?php echo $inner_page_header['inner-header-title']; ?>
                </h1>
                <p class="subPara <?php if ($inner_page_header['centred_text']) : echo 'justifyCenter';
                                    endif; ?>"><?php echo $inner_page_header['inner-header-sub']; ?></p>
            </div>
            <div class="home-header-graphic box home-header-graphic-inner" data-scroll-speed="3" style="top: 0px; opacity: 1;">

                <svg id="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 605.5 600.1">
                    <g class="fadeInRight animationDelayone box animated">
                        <path d="m400.5,166.6h-118.6V48l118.6,118.6Zm-116.6-2h111.8l-111.8-111.8v111.8Z" style="fill:#50544b; stroke-width:0px;"></path>
                    </g>
                    <g class="fadeInDown animationDelaytwo box animated">
                        <path d="m453,152.5L300.6,0h304.9l-152.5,152.5ZM305.4,2l147.6,147.6L600.7,2h-295.3Z" style="fill:#fff; stroke-width:0px;"></path>
                    </g>
                    <g class="fadeInUp animationDelaythree box animated">
                        <polygon points="278.3 265.2 340.7 265.2 340.7 327.6 278.3 265.2" style="fill:#48494c; stroke-width:0px;"></polygon>
                    </g>
                    <g class="fadeInUp animationDelayfour box animated">
                        <polygon points="539.7 107.6 602.1 107.6 602.1 170 539.7 107.6" style="fill:#48494c; stroke-width:0px;"></polygon>
                    </g>
                    <g class="fadeInLeft animationDelayfive box animated">
                        <polygon points="336.5 198.9 554.2 198.9 554.2 416.5 336.5 198.9" style="fill:#da9b00; stroke-width:0px; opacity: 0.3;"></polygon>
                    </g>
                    <g class="fadeInLeft animationDelaysix box animated">
                        <polygon points="602.2 281.9 602.2 600.1 284 600.1 602.2 281.9" style="fill:#da9b00; stroke-width:0px; opacity: 0.3;"></polygon>
                    </g>
                    <g class="fadeInRight animationDelayseven box animated">
                        <path d="m114.3,596.2L0,481.9h228.5l-114.3,114.3ZM4.8,483.9l109.4,109.4,109.4-109.4H4.8Z" style="fill:#50544b; stroke-width:0px;"></path>
                    </g>
                    <g class="fadeInUp animationDelayeight box animated">
                        <path d="m185.1,599v-214.2h214.2l-214.2,214.2Zm2-212.2v207.4l207.4-207.4h-207.4Z" style="fill:#fff; stroke-width:0px;"></path>
                    </g>
                </svg>

                <script>
                    $(function() {
                        var boxes = $('.box'),
                            $window = $(window);

                        $window.scroll(function() {
                            var scrollTop = $window.scrollTop();
                            boxes.each(function() {
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
    <?php endif; ?>

    <div class="uk-container knowledgebase-archive-wrapper p-t-medium p-b-large animatable fadeInUp animationDelaytwo">
        <div class="knowledgebase-archive-filter filter-nomobile">
            <?php echo do_shortcode('[searchandfilter id="23459"]'); ?>
        </div>

        <div class="filter-yesmobile mob-filter p-b-medium">
            <button id="show-element" class="filter">Filter
                <span class="before">Filter results</span>
                <span class="after">Show results</span>
            </button>
            <div id="to-show" class="hide">
                <div class="ms-h-filter">
                    <?php echo do_shortcode('[searchandfilter id="23459"]'); ?>
                </div>
            </div>
        </div>

        <div class="knowledgebase-archive-listing">

            <!-- Search & Filter shortcode -->
            <form class="searchandfilter" method="get">
                <?php echo do_shortcode('[searchandfilter id="23459" show="results"]'); ?>
            </form>
        </div>
    </div>

</main>

<?php
get_sidebar();
get_footer();
?>