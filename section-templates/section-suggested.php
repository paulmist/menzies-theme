<?php

// Related content section

$container = get_theme_mod( 'understrap_container_type' );

$meta_query = array();
		
if($post->post_type == 'sector'){
	$meta_query = array(
		array(										
			'key' => 'related_sectors', 
			'value' => '"' . $post->ID . '"',
			'compare' => 'LIKE'
		)
	);
						
}elseif($post->post_type == 'specialism'){
	$meta_query = array(
		array(										
			'key' => 'related_specialisms', 
			'value' => '"' . $post->ID . '"',
			'compare' => 'LIKE'
		)
	);			
}elseif($post->post_type == 'page' || $post->post_type == 'post'){

	$related_specialisms = get_field('related_specialisms', $post->ID);
	$related_sectors = get_field('related_sectors', $post->ID);
	if(!empty($related_specialisms)){
		foreach($related_specialisms as $rs){
		$meta_query[] = array(										
				'key' => 'related_specialisms', 
				'value' => '"' . $rs->ID . '"',
				'compare' => 'LIKE'
			);
		}					
	} elseif(!empty($related_sectors)) {
		foreach($related_sectors as $rs){
		$meta_query[] = array(										
				'key' => 'related_sectors', 
				'value' => '"' . $rs->ID . '"',
				'compare' => 'LIKE'
			);
		}					
	}			
		
}

$query_args = array(
		'post_type'=>'post', 
		'posts_per_page'=> 6,
		'orderby'=> 'date',
		'order'=> 'DESC',
		// 'cat'=> 1,
		'post__not_in' => array($post->ID) 
); 

if(count($meta_query)){
	$meta_query['relation'] = 'OR';
	$query_args['meta_query'] = $meta_query;
}

// $related = get_posts( array( 
// 	'category__in' => wp_get_post_categories($post->ID), 
// 	'numberposts' => 3, 
// 	'post__not_in' => array($post->ID) ) ); 

?>

<div class="<?php echo esc_attr( $container ); ?>" id="content">

	<div class="row related">

		<div class="col-12">

			<div class="related-header">

				<h2><?php _e( 'Suggested Content', 'menziestheme'); ?></h2>

				<p><?php the_field('suggest_content_introduction', 'option'); ?></p>

			</div>

		</div>

	</div>

	<div class="row related grid">

		<?php 
		// if( $related ) foreach( $related as $post ) {
		// setup_postdata($post); 
		$news_query = new WP_Query( $query_args );
		while($news_query->have_posts()) : $news_query->the_post();
		?>

		    <?php $category = get_the_category();
			$first_category = $category[0]; ?>

			<div class="col-lg-4 col-md-6 grid-item grid-sizer">

				<article class="homepage-post-item homepage-post-item-<?php echo $news_item_count; ?> homepage-<?php echo $first_category->slug; ?>">

					<div class="meta">

						<?php echo sprintf( '<a href="%s">%s</a>', get_category_link( $first_category ), $first_category->name ); ?>

						<div class="post-date-hidden" style="display: none;">// <?php the_time('d/m/Y') ?>
						</div>

					</div>

					<header>

					  	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

					</header>

					<?php the_excerpt( '' ); ?>

					<footer>

						<a href="<?php the_permalink(); ?>" class="link" title="<?php the_title(); ?>">read more</a>
						<?php
						echo sprintf( '<a href="%s" class="link">%s %s</a>', get_category_link( $first_category ), 'More ', $first_category->name );
						?>	

					</footer>

				</article>

			</div>

			<?php $news_item_count++; ?>

		<?php endwhile;

		wp_reset_postdata(); ?>

	</div>

</div>

