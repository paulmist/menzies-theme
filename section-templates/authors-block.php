<?php

/**
 * Authors Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'solution-' . (isset($block['id']) ? $block['id'] : 'default');
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'authors-block';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

// Get the selected authors
$authors = get_field('authors');
if ($authors && is_array($authors)) :
    $author_count = count($authors);

    // Determine layout based on the number of authors
    if ($author_count == 1) {
        $width_class = 'full-width';
    } elseif ($author_count == 2) {
        $width_class = 'half-width';
    } elseif ($author_count == 3) {
        $width_class = 'third-width';
    } else {
        $width_class = 'author-carousel';
    }
?>
    <div id="<?php echo esc_attr($id); ?>" class="author-block-wrapper p-t-<?php echo esc_attr(get_field('padding_top')); ?> p-b-<?php echo esc_attr(get_field('padding_bottom')); ?>">
        <?php if (get_field('author_block_main_title')) : ?>
            <div class="author-block-title-container flexDirColumn flexBox alignCenter justifyCenter p-b-small fadeInUp animationDelayone animatable">
                <?php if (get_field('author_block_sub_title')) : ?><h4 class="subTitle yellow"><?php echo get_field('author_block_sub_title'); ?></h4><?php endif; ?>
                <h2 class="modTitle"><?php echo esc_html(get_field('author_block_main_title')); ?></h2>
            </div>
        <?php endif; ?>
        <div id="author-carousel" class="authors-block <?php echo esc_attr($width_class); ?>">
            <?php foreach ($authors as $author) : ?>
                <div class="author flexBox alignCenter <?php echo esc_attr($width_class); ?>-item">
                    <div class="author-image-wrapper fadeInUp animationDelayone animatable">
                        <div class="author__image">
                            <?php
                            $thumbnail = get_field('big_image', $author->ID);
                            if ($thumbnail) : ?>
                                <img src="<?php echo esc_url($thumbnail['url']); ?>" alt="<?php echo esc_attr($thumbnail['alt']); ?>" class="author__img" />
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="author__details fadeInUp animationDelaytwo animatable">
                        <h4 class="author__job-title subTitle yellow"><?php echo esc_html(get_field('position', $author->ID)); ?></h4>
                        <h2 class="secondTitle"><?php echo esc_html($author->post_title); ?></h2>
                        <?php
                        $excerpt = get_field('author_block_excerpt', $author->ID);
                        if ($excerpt) : ?>
                            <p><?php echo wp_trim_words(esc_html($excerpt), 20, '...'); ?></p>
                        <?php endif; ?>
                        <?php
                        $link = get_permalink($author->ID);
                        if ($link) : ?>
                            <a class="author__link readon solid yellow" href="<?php echo esc_url($link); ?>">About <?php echo esc_html(get_the_title($author->ID)); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php if ($author_count > 3) : ?>
        <script>
            jQuery(document).ready(function($) {
                $('#author-carousel').slick({
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    responsive: [{
                            breakpoint: 1100,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
                });
            });
        </script>
    <?php endif; ?>
<?php endif; ?>