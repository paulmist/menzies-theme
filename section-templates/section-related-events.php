<?php

// Related events section

$container = get_theme_mod( 'understrap_container_type' );

$related = get_posts( array( 
	'post_type' => 'events',
	'numberposts' => 3, 
	'post__not_in' => array($post->ID) ) ); 

?>

<div class="<?php echo esc_attr( $container ); ?>" id="content">

	<div class="row related">

		<div class="col-12">

			<div class="related-header">

				<h3><?php _e( 'Related Events', 'menziestheme'); ?></h3>

			</div>

		</div>

		<?php if( $related ) foreach( $related as $post ) {
		setup_postdata($post); ?>

		    <?php $category = get_the_category();
			$first_category = $category[0]; ?>

			<div class="col-lg-4 col-md-6">

				<article class="homepage-post-item homepage-post-item-<?php echo $news_item_count; ?> homepage-<?php if ( get_post_type( get_the_ID() ) == 'events' ) : echo 'events'; else: echo $first_category->slug; endif; ?>">

					<div class="meta">

						<?php 
						if ( get_post_type( get_the_ID() ) == 'post' ) :
							echo sprintf( '<a href="%s">%s</a>', get_category_link( $first_category ), $first_category->name );
						elseif ( get_post_type( get_the_ID() ) == 'events' ) : ?>
							<a href="/events/">Events</a>
						<?php endif;
						?>

						<div class="post-date">
							<?php 
							if ( get_post_type( get_the_ID() ) == 'events' ) :
								the_field('date_of_event');
							else:
								the_time('d/m/Y');
							endif;
							?>
						</div>

					</div>

					<header>

					  	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

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

		<?php }

		wp_reset_postdata(); ?>

	</div>

</div>

