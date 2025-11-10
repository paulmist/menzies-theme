<?php 
// Section template for insights list (navigation)

$container = get_theme_mod( 'understrap_container_type' );

$events_query = new WP_Query( array( 
	'post_type' 		=> 'events', 
	'meta_key'			=> '_expiration-date',
	'orderby' 			=> 'meta_value',
	'order' => 'ASC',
	'facetwp' 			=> false,
	) 
);

$custom_query = new WP_Query( array( 
	'post_type' 		=> 'post', 
	'meta_query' => array(
        array(
            'key'     => 'featured',
            'value'   => '1',
        ),
    ),
	'orderby' 			=> 'date',
	'posts_per_page' 	=> 4,
	'facetwp' 			=> false,
	) 
);

?>

<div class="row insight-nav-row">

	<div class="col-md-4">

		<div class="insights-nav-submenu-container">

			<a href="/insights/"><h3>Insights</h3></a>

			<?php if( have_rows('insights_categories', 'option') ): ?>

				<ul>

					<?php while ( have_rows('insights_categories', 'option') ) : the_row(); ?>

						<li><a title="<?php the_sub_field('link_title'); ?>" href="<?php the_sub_field('link_url'); ?>" class=""><span class="list-triangle"></span>  <?php the_sub_field('link_title'); ?></a></li>

					<?php endwhile; ?>

				</ul>

			<?php endif; ?>

		</div>

		<?php if ($events_query->have_posts()) : ?>

			<div class="insights-nav-thinking-container">

				<h3>Brighter Thinking Resources</h3>

				<?php if( have_rows('brighter_thinking_links', 'option') ): ?>

					<ul>

						<?php while ( have_rows('brighter_thinking_links', 'option') ) : the_row(); ?>

							<li><a title="<?php the_sub_field('title'); ?>" href="<?php the_sub_field('link'); ?>" class=""><?php the_sub_field('title'); ?></a></li>

						<?php endwhile; ?>

					</ul>

				<?php endif; ?>

			</div>

		<?php endif; ?>

	</div>

	<div class="col-md-4">

		<div class="insights-nav-featured-container">

			<h3>Featured Insights</h3>

			<div class="row">

				<?php while($custom_query->have_posts()) : $custom_query->the_post(); 

					$category = get_the_category();
					$first_category = $category[0]; ?>

					<div class="col-lg-12 col-12">

						<article class="sidebar-featured">

							<div class="meta">
								<?php echo sprintf( '<a href="%s" class="post-date-related-cat">%s</a>', get_category_link( $first_category ), $first_category->name ); ?>
							</div>

							<header>

							  	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

							</header>

							<div class="specialism-hashtag">

								<?php
								// $count = 1;
								// $featured_posts = get_field('related_specialisms');
								// if( $featured_posts ): 
								// 	foreach( $featured_posts as $post ): 
								//     	if ($count == 1) :
								// 	        setup_postdata($post); ?>
									         <!-- <span class="hashtag-single"><a href="<?php the_permalink(); ?>"># <?php the_title(); ?></a></span> -->
									     <?php 
								// 	 	endif;
								// 	$count++; endforeach;
								//     wp_reset_postdata(); 
								// endif; ?>

							</div>

						</article>

					</div>

					<?php $news_item_count++; ?>

				<?php 
				endwhile;
				wp_reset_postdata();
				?>

			</div>

		</div>

	</div>

	<div class="col-md-4">

		<?php if (!$events_query->have_posts()) : ?>

			<div class="insights-nav-thinking-container">

				<h3>Brighter Thinking Resources</h3>

				<?php if( have_rows('brighter_thinking_links', 'option') ): ?>

					<ul>

						<?php while ( have_rows('brighter_thinking_links', 'option') ) : the_row(); ?>

							<li><a title="<?php the_sub_field('title'); ?>" href="<?php the_sub_field('link'); ?>" class=""><?php the_sub_field('title'); ?></a></li>

						<?php endwhile; ?>

					</ul>

				<?php endif; ?>

			</div>

		<?php endif; ?>

		<?php if ($events_query->have_posts()) : ?>

			<div class="insights-nav-events-container">

				<h3>Events</h3>

				<div class="row">

					<?php while($events_query->have_posts()) : $events_query->the_post(); ?>

						<div class="col-lg-12 col-12">

							<article class="sidebar-featured">

								<div class="meta">

									<?php echo sprintf( '<a href="/events" class="post-date-related-cat">Events</a>' ); ?>

								</div>

								<header>

								  	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

								</header>

								<div class="specialism-hashtag">

									<?php
									// $count = 1;
									// $featured_posts = get_field('related_specialisms');
									// if( $featured_posts ): 
									// 	foreach( $featured_posts as $post ): 
									//     	if ($count == 1) :
									// 	        setup_postdata($post); ?>
										         <!-- <span class="hashtag-single"><a href="<?php the_permalink(); ?>"># <?php the_title(); ?></a></span> -->
										     <?php 
									// 	 	endif;
									// 	$count++; endforeach;
									//     wp_reset_postdata(); 
									// endif; ?>

								</div>

							</article>

						</div>

						<?php $news_item_count++; ?>

					<?php 
				endwhile;
				wp_reset_postdata();
				?>

				</div>

			</div>

		<?php endif; ?>

	</div>

</div>	