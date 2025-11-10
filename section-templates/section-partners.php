<?php 
// Section template for partners

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="<?php echo esc_attr( $container ); ?>" id="content">

	<div class="row">

		<!-- <div class="col-12">

			<h2 class="partners-title"><?php _e( 'Partners', 'menziestheme'); ?></h2>

		</div> -->

		<?php $partners_item_count=1; ?>

		<?php
		$custom_query = new WP_Query( array( 
			'post_type' 		=> 'partners', 
			'orderby' 			=> 'date',
			'posts_per_page' 	=> 6,
			) 
		); 

		while($custom_query->have_posts()) : $custom_query->the_post(); ?>

			<div class="col">

				<article class="partners-post-item partners-post-item-<?php echo $partners_item_count; ?> ">

					<a href="<?php the_field('link'); ?>" target="_blank"><?php the_post_thumbnail( 'full' ); ?></a>

				</article>

			</div>

			<?php $partners_item_count++; ?>

		<?php 
		endwhile;
		wp_reset_postdata();
		?>

	</div>

</div>