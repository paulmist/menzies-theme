<?php

/**
 * Carousel Testimonials Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'carousel-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'carousel-testimonials';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$accent = get_field('accent_bg');
if ($accent) {
	$class = 'accent-light-blue';
}
else {
	$class = '';
}


?>
<a id="employees"></a>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo $class; ?>">
	<div class="uk-container carousel-testimonials-wrapper p-t-<?php echo get_field('padding_top'); ?> p-b-<?php echo get_field('padding_bottom'); ?>">
		<div class="carousel-container-title carousel-container-news-title flexBox alignEnd justifySpace p-b-medium animatable fadeInUp animationDelayone">
			<div>
				<?php if(get_field('employee_testimonial_sub_heading')): ?><h3 class="subTitle"><?php echo get_field('employee_testimonial_sub_heading'); ?></h3><?php endif; ?>
				<?php if(get_field('employee_testimonial_title')): ?><h2 class="modTitle"><?php echo get_field('employee_testimonial_title'); ?></h2><?php endif; ?>
			</div>
		</div>
		<div class="carousel-wrapper animatable fadeInUp animationDelayone">

			<?php 
				$args = array(
					'post_type'     	=> 'case-studies',
					'posts_per_page' 	=> 7,

				);

				$the_query = new WP_Query( $args );

				?>
				
				<?php if( $the_query->have_posts() ): ?>
				<div class="carousel em-testimonials" data-flickity="{ &quot;cellAlign&quot;: &quot;center&quot;, &quot;contain&quot;: true, &quot;groupCells&quot;: 1, &quot;pageDots&quot;: false, &quot;imagesLoaded&quot;: true, &quot;wrapAround&quot;: false }">
					
					<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

					<?php $eventInfo = get_field('event_info'); ?>

						<div class="carousel-cell">

	
                                <div class="testimonial-cell-image">
                                    <?php $fields = array(); $fields = get_fields(get_the_id()); if (!empty($fields)) { echo '<img src="' . $fields['case_study_thumbnail_image'] . '" />'; } ?>
                                </div>
								<div class="testimonial-cell-text">
                                    <?php $fields = array(); $fields = get_fields(get_the_id()); if (!empty($fields)) { echo '<h2>' . $fields['case_study_opening_statement'] . '</h2>'; } ?>
                                    <p> <?php $excerpt = get_the_excerpt(); echo wp_trim_words($excerpt, 15, '...'); ?></p>
                                    <?php $fields = array(); $fields = get_fields(get_the_id()); if (!empty($fields)) { echo '<h5>' . $fields['case_study_employee_name'] . '</h5>'; } ?>
                                    <?php $fields = array(); $fields = get_fields(get_the_id()); if (!empty($fields)) { echo '<h6>' . $fields['case_study_employee_position'] . '</h6>'; } ?>
                                    <a href="<?php the_permalink(); ?>" class="readon" title="<?php the_title(); ?>">Read more</a>
                                        
								</div>
				

						</div>

					<?php endwhile; ?>
				</div>
				<?php endif; ?>

				<?php wp_reset_query(); ?>
		</div>
	</div>
</div>



