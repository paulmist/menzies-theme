<?php
if(get_field( 'insight_selection' )){
	$selection = get_field( 'insight_selection' );	
} else {
	$selection = 'manual';
}

if($selection == 'manual'){
	$related_posts = get_field('carousel_items');
} else {
	global $post;
	$page_slug = $post->post_name;

	$related_posts = new WP_Query( [
		'post_type'      => 'post',
		'posts_per_page' => 10,
		'tax_query' => array(
				array (
					'taxonomy' => 'service',
					'field' => 'slug',
					'terms' => $page_slug,
				)
			),
	] );
}
?>

<div id="<?php echo esc_attr($id); ?>" class="carousel-insights <?php echo esc_attr($className); ?> <?php echo get_field('element_class'); ?> p-t-<?php echo get_field('padding_top'); ?> p-b-<?php echo get_field('padding_bottom'); ?>">

	<div class="title-container p-b-small animatable fadeInUp animationDelayone">
		<?php echo '<h4>' . get_field('carousel_subtitle') . '</h4>'; ?>
		<?php echo '<h2 class="modTitle">' . get_field('carousel_title') . '</h2>'; ?>
	</div>

		<div class="carousel fadeInUp animationDelaytwo animatable" data-flickity='{"cellAlign":"left", "contain": false, "groupCells": 1, "pageDots": true, "prevNextButtons": true, "draggable": true, "freeScroll": true, "imagesLoaded": true, "wrapAround": false, "percentPosition": false}'>
		<?php if ($selection == 'manual') : ?>
			<?php foreach ($related_posts as $related_post) :
				$post_id = $related_post->ID;
				$permalink = get_permalink($post_id);
				$title = get_the_title($post_id);
				$fields = get_fields($post_id);
				$post_icon = !empty($fields['post_results_icon']) ? $fields['post_results_icon'] : '';
				$excerpt = get_the_excerpt($post_id);
				$categories = get_the_category($post_id);
				$date = get_the_date('d/m/Y', $post_id);
				$post_type = get_post_type($post_id);
			?>
				<div class="carousel-cell insights-tile">
					<article class="homepage-post-item">
						<div class="insight-tile-inner">
							<?php if ($post_icon) : ?>
								<img src="<?php echo esc_url($post_icon); ?>" alt="">
							<?php endif; ?>
							<div class="meta-data">
								<?php
								if ($post_type == 'events') {
									echo '<span class="meta-category">Event</span>';
								} else {
									if (!empty($categories)) {
										$first_category = $categories[0]->name;
										echo '<span class="meta-category">' . $first_category . '</span>';
									}
								}
								?>
								<?php if ($date) : ?>
									<?php echo '<span>' . $date .  '</span>'; ?>
								<?php endif; ?>
							</div>
							<h2 class="secondTitle"><?php echo wp_trim_words($title, 7, '...'); ?></h2>
							<div class="post-excerpt">
								<p><?php echo wp_trim_words($excerpt, 15, '...'); ?></p>
								<p><a href="<?php echo $permalink; ?>" class="readon grey solid" title="<?php echo esc_attr($title); ?>">Read more</a></p>
							</div>
						</div>
					</article>
				</div>
			<?php endforeach; ?>
		<?php elseif($selection == 'automatic') : ?>
			<?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
			<?php
			// $post_id = $related_post->ID;
			$permalink = get_the_permalink();
			$title = get_the_title();
			// $fields = get_fields($post_id);
			if(get_field('post_results_icon', $post->ID)){
				$post_icon = get_field('post_results_icon', $post->ID);
			} else {
				$post_icon = '';
			}
			$excerpt = get_the_excerpt();
			$categories = get_the_category();
			$date = get_the_date('d/m/Y');
			$post_type = get_post_type();
			?>
			    <div class="carousel-cell insights-tile">
			    	<article class="homepage-post-item">
			    		<div class="insight-tile-inner">
			    			<?php if ($post_icon) : ?>
			    				<img src="<?php echo esc_url($post_icon); ?>" alt="">
			    			<?php endif; ?>
			    			<div class="meta-data">
			    				<?php
			    				if ($post_type == 'events') {
			    					echo '<span class="meta-category">Event</span>';
			    				} else {
			    					if (!empty($categories)) {
			    						$first_category = $categories[0]->name;
			    						echo '<span class="meta-category">' . $first_category . '</span>';
			    					}
			    				}
			    				?>
			    				<?php if ($date) : ?>
			    					<?php echo '<span>' . $date .  '</span>'; ?>
			    				<?php endif; ?>
			    			</div>
			    			<h2 class="secondTitle"><?php echo wp_trim_words($title, 7, '...'); ?></h2>
			    			<div class="post-excerpt">
			    				<p><?php echo wp_trim_words($excerpt, 15, '...'); ?></p>
			    				<p><a href="<?php echo $permalink; ?>" class="readon grey solid" title="<?php echo esc_attr($title); ?>">Read more</a></p>
			    			</div>
			    		</div>
			    	</article>
			    </div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		<?php endif ?>
		</div>
</div>