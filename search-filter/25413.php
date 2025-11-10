<!-- FAQ PAGE ARCHIVE -->

<?php
if ($query->have_posts()) : ?>
    <?php while ($query->have_posts()) : $query->the_post(); ?>
        <?php
        $thumbnail = get_the_post_thumbnail();
        $excerpt = get_the_excerpt();
        $permalink = get_permalink();
        ?>
        <a href="<?php echo esc_url($permalink); ?>" class="people-tile faq-tile">
            <article class="faq-tile-inner">
                <div class="faq-tile-image">
                    <?php
                    if (!empty($thumbnail)) {
                        echo $thumbnail;
                    }
                    ?>
                </div>
                <div class="faq-info">
                    <div>
                    <h2><?php the_title(); ?></h2>
                    <?php if ($excerpt) : ?>
                        <p><?php echo esc_html(wp_trim_words($excerpt, 14, '…')); ?></p>
                    <?php endif; ?>
                    </div>
                    <span class="link arrow">Read more</span>
                </div>
            </article>
        </a>
    <?php endwhile; ?>
    <div class="pagination">
        <?php if (function_exists('wp_pagenavi')) {
            wp_pagenavi(array('query' => $query));
        } ?>
    </div>
<?php else : ?>
    <div class="faq-results-empty-container results-empty-container">
        <h3 class="modTitle">Need More Help?</h3>
        <p class="subPara">We are updating this on a regular basis but it appears we don’t have an answer for this query, get in touch with our specialist and we will be happy to help.</p>
        <p><a class="readon solid yellow" href="<?php echo home_url(); ?>/contact-us/">Contact our specialists</a></p>
    </div>
<?php endif; ?>