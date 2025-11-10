<?php

/**
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 */

if ($query->have_posts()) {
?>

    <?php
    while ($query->have_posts()) {
        $query->the_post();

        // Ensure $first_category is set
        $first_category = get_the_category()[0] ?? null; // Get the first category or set to null

        // Set the tile link
        $tile_link = get_permalink();
    ?>
        <a href="<?php echo esc_url($tile_link); ?>" class="insights-tile">
            <article class="<?php if (get_post_type(get_the_ID()) == 'page') {
                                echo 'no-date';
                            } ?>  homepage-post-item homepage-post-item-<?php echo $news_item_count; ?> homepage-<?php if (get_post_type(get_the_ID()) == 'events') : echo 'events';
                                                                                                                        else : echo ($first_category ? esc_attr($first_category->slug) : 'no-category'); // Fallback if no category is found
                                                                                                                        endif; ?>">
                <div class="meta">
                    <?php
                    if (get_post_type(get_the_ID()) == 'post') :
                        echo sprintf('<span class="category-link">%s</span>', esc_html($first_category->name));
                    elseif (get_post_type(get_the_ID()) == 'events') : ?>
                        <span class="category-link"><?php _e('Events', 'menziestheme'); ?></span>
                    <?php elseif (get_post_type(get_the_ID()) == 'page') : ?>
                        <span class="category-link"><?php _e('Pages', 'menziestheme'); ?></span>
                    <?php endif;

                    // Only show read time if NOT an event
                    if (get_post_type(get_the_ID()) != 'events') : ?>
                        <span class="read-time"><?php echo get_read_time(); ?></span>
                    <?php endif; ?>
                </div>

                <div class="insights-tile-image">
                    <img src="<?php echo esc_url(get_field('post_results_icon')); ?>" alt="">
                </div>
                <div class="insights-tile-text">
                    <div class="post-date">
                        <?php
                        if (get_field('date_of_event')) {
                            echo "<div class='d-o-e'>" . "<h6>Event date - " . esc_html(get_field('date_of_event')) . "</h6></div>";
                        } else {
                            the_date('d-m-Y', '<h6>', '</h6>');
                        }
                        ?>
                    </div>
                    <h2><span class="post-title"><?php the_title(); ?></span></h2>
                    <span class="link arrow" title="<?php the_title(); ?>">Read more</span>
                </div>
            </article>
        </a>
    <?php
    }
    ?>
    <div class="pagination">
        <?php
        /* example code for using the wp_pagenavi plugin */
        if (function_exists('wp_pagenavi')) {
            wp_pagenavi(array('query' => $query));
        }
        ?>
    </div>
<?php
} else {
    echo '<div class="results-empty-container">';
    echo 'Unfortunately no items match your search criteria, please re-try.';
    echo '</div>';
}
?>