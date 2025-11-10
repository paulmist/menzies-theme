<?php

// Related content (by author) section for single-people.php

$container = get_theme_mod( 'understrap_container_type' );
// echo $post->ID;
$args = array(
    'category__in' => wp_get_post_categories($post->ID), 
	 
	'meta_query'   => array(
        array(
            'key'       => 'author',
            'value'     => $post->ID,
        ),
    ),
    'numberposts'  => 3,
	
); ?>

<?php $by_author_query = new WP_Query($args); ?>

<?php if ($by_author_query->have_posts()) : ?>

	<div class="related-author-container fadeInDown animationDelaytwo animatable p-b-medium <?php echo esc_attr( $container ); ?>" id="content">

		<div class="row related">

			<div class="col-12">

				<div class="related-header">

					<h3><?php _e( 'Authored Content', 'menziestheme'); ?></h3>

				</div>

			</div>

			<?php while ($by_author_query->have_posts()) : $by_author_query->the_post(); ?>

				<?php $category = get_the_category();
				$first_category = $category[0]; ?>

				<div class="col-lg-4 col-md-6">

					<article class="homepage-post-item homepage-post-item-<?php echo $news_item_count; ?> homepage-<?php echo $first_category->slug; ?>">

						<div class="meta">

							<?php echo sprintf( '<a href="%s">%s</a>', get_category_link( $first_category ), $first_category->name ); ?>

							<div class="post-date"><?php the_time('d/m/Y') ?>
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

				<?php endwhile;  

			wp_reset_postdata(); ?>

		</div>

	</div>

<?php endif; ?>

