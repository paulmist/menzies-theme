<?php
// featured posts for sidebars

$news_item_count=1; 

$custom_query = new WP_Query( array( 
	'post_type' 		=> 'post', 
	'meta_query' => array(
        array(
            'key'     => 'featured',
            'value'   => '1',
        ),
    ),
	'orderby' 			=> 'date',
	'posts_per_page' 	=> 3,
	) 
); ?>

<div class="sidebar-featured-widget">

	<h3><?php _e( 'Featured', 'menziestheme'); ?></h3>

	<div class="row grid">

	<?php while($custom_query->have_posts()) : $custom_query->the_post(); 

		$category = get_the_category();
		$first_category = $category[0]; ?>

		<div class="col-lg-12 col-6 grid-item">

			<article class="sidebar-featured">

				<div class="meta">
					<?php echo sprintf( '<a href="%s" class="post-date-related-cat">%s</a>', get_category_link( $first_category ), $first_category->name ); ?> - <span class="post-date-related-block"><?php echo get_the_time('d/m/Y') ?></span>
				</div>

				<header>

				  	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

				</header>

			</article>

		</div>

		<?php $news_item_count++; ?>

	<?php 
	endwhile;
	wp_reset_postdata();
	?>

	</div>


</div>