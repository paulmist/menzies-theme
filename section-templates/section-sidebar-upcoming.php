<?php
// upcoing events for sidebars

$upcoming_item_count=1; 

$date_now = date('Ymd');
echo $date_now;

$custom_query = new WP_Query( array( 
	'post_type' => 'events',
    'meta-query' => array(
	        array(
	            'key' => 'date_of_event',
	            'type' => 'NUMBER',
	            'compare' => '>=',
	            'value' => $date_now,
	        )
    	),
    'posts_per_page' => 3,
	'meta_key'  => 'date_of_event',
	'orderby'   => 'meta_value_num',
	'order'     => 'ASC',
	)
); ?>

<div class="sidebar-upcoming-widget">

	<h3><?php _e( 'Upcoming events', 'menziestheme'); ?></h3>

	<?php while($custom_query->have_posts()) : $custom_query->the_post(); ?>

		<article class="sidebar-featured">

			<header>

				<?php the_field('date_of_event'); ?>

			  	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

			</header>

		</article>

		<?php $upcoming_item_count++; ?>

	<?php 
	endwhile;
	wp_reset_postdata();
	?>

</div>