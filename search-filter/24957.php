<!-- PEOPLE PAGE ARCHIVE -->

<?php if (is_people_filter_active()): ?>
    <a data-target="contact_popup" href="/contact" class="people-tile cta-tile toggle">
        <h2>Get in touch with one of <span>our experts</span></h2>
        <p class="subPara">Find out how we can help your business.</p>
        <span class="readon outline white" class="button">Contact Us</span>
    </a>
<?php endif; ?>
<?php
if ($query->have_posts()) : ?>
    <?php while ($query->have_posts()) : $query->the_post(); ?>
        <?php
        if (get_post_type() !== 'people') {
            continue;
        }
        $name = get_the_title();
        $thumbnail = get_field('thmbnail');
        $position = get_field('position');
        $permalink = get_permalink();
        ?>
        <div class="people-tile" >
            <article class="people-tile-inner">
                <a href="<?php echo esc_url($permalink); ?>" class="people-tile-image">
                    <?php
                    if (!empty($thumbnail) && is_array($thumbnail) && isset($thumbnail['url'])) {
                        echo '<img src="' . esc_url($thumbnail['url']) . '" alt="' . esc_attr(get_the_title()) . '">';
                    } else {
                        echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/default-thumbnail.jpg') . '" alt="Default image">';
                    }
                    ?>
                </a>
                <div class="people-info">
                    <a href="<?php echo esc_url($permalink); ?>">
                        <h2 class="people-name"><?php the_title(); ?></h2>
                        <?php if (!empty($position)) : ?>
                            <p class="people-position"><?php echo esc_html($position); ?></p>
                        <?php endif; ?>
                    </a>
                    <div class="people-links">
                        <span data-target="contact_popup" data-person-name="<?php the_title(); ?>" class="people-contact-link toggle">Get in touch</span>
                        <?php
                        $related_office = get_field('related_office');
                        if ($related_office) :
                            $related_office_slug = get_post_field('post_name', $related_office->ID);
                            $related_office_title = get_the_title($related_office->ID);
                        ?>
                            <span class="people-location-link">
                                <a href="<?php echo home_url(); ?>/office/<?php echo $related_office_slug; ?>/">
                                    <?php echo $related_office_title; ?>
                                </a>
                            </span>
                        <?php endif; ?>

                    </div>
                </div>
            </article>
        </div>
    <?php endwhile; ?>
    <div class="pagination">
        <?php if (function_exists('wp_pagenavi')) {
            wp_pagenavi(array('query' => $query));
        } ?>
    </div>
<?php else : ?>
    <div class="results-empty-container">
        Unfortunately no items match your search criteria, please re-try.
    </div>
<?php endif; ?>