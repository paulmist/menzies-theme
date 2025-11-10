<?php 
// Section template for Awards

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="<?php echo esc_attr( $container ); ?>" id="content">

	<div class="row">

		<?php $award_item_count=1; ?>

		<?php
		$custom_query = new WP_Query( array( 
			'post_type' 		=> 'awards', 
			'orderby' 			=> 'date',
			'posts_per_page' 	=> 6,
			) 
		); 

		while($custom_query->have_posts()) : $custom_query->the_post(); ?>

			<?php $award_image = get_field('thumbnail_image'); ?>

			<div class="col-lg-2 col-md-4 col-6">

				<article class="award-post-item award-post-item-<?php echo $award_item_count; ?> ">

					<a href="<?php the_permalink(); ?>">

						<img src="<?php echo $award_image['url']; ?>">

						<!-- <picture>
						  <source srcset="<?php echo $award_image['url']; ?>.webp" type="image/webp">
						  <source srcset="<?php echo $award_image['url']; ?>">
						  <img src="<?php echo $award_image['url']; ?>"> 
						</picture> -->
							
					</a>

				</article>

			</div>

			<?php $award_item_count++; ?>

		<?php 
		endwhile;
		wp_reset_postdata();
		?>

	</div>

</div>