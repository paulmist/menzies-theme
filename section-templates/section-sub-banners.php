<?php 
// Section template for homepage sub-banners

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="<?php echo esc_attr( $container ); ?> homegrid-container banner-container" id="content">

	<div class="row sub-banner-row">

		<?php $sub_banner_item_count=1; ?>

		<?php
		$sub_banners_count = get_field('number_of_sub_banners');
		$custom_query = new WP_Query( array( 
			'post_type' 		=> 'banners', 
			'orderby' 			=> 'date',
			'posts_per_page' 	=> $sub_banners_count,
			) 
		); 

		while($custom_query->have_posts()) : $custom_query->the_post(); ?>

			<?php $link = get_field('link'); ?>
			<?php $logo = get_field('logo'); ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>

			<div class="col-md-4 col-6 sub-banner-col-<?php echo $sub_banners_count; ?> sub-banner-item-<?php echo $sub_banner_item_count; ?>">

				<style type="text/css">.no-webp .sub-banner-item-<?php echo $sub_banner_item_count; ?> .banner-item {background: url('<?php echo $image[0]; ?>');}.webp .sub-banner-item-<?php echo $sub_banner_item_count; ?> .banner-item {background: url('<?php echo $image[0]; ?>.webp');}</style>

				<a href="<?php echo $link; ?>">

					<div class="banner-parent">

						<div class="banner-item lazy">

							<div class="img-overlay"></div>

						</div>

						<div class="banner-title">
							<?php the_title(); ?>
							<span class="banner-logo">
								<?php the_field('icon'); ?>
							</span>
						</div>

					</div>

				</a>

			</div>

			<?php $sub_banner_item_count++; ?>

		<?php 
		endwhile;
		wp_reset_postdata();
		?>

	</div>

</div>