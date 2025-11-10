<?php
/**
 * Block Name: Related content
 *
 * This is the template that displays the Related content block.
 */
// create id attribute for specific styling
$id = 'related-' . $block['id'];
?>

<div id="<?php echo $id; ?>" class="acf-block acf-block-related related_content">

	<h3><?php the_field('related_title'); ?></h3>

	<?php $post_objects = get_field('related_content_block'); ?>

	<?php if( $post_objects ): ?>

		<?php $count = count( get_field( 'related_content_block' ) ); ?>

		<?php 
		if ($count == 1) {
			$related_block_cols = 'col-lg-12 col-md-12';
		} elseif ($count == 2 || $count == 4) {
			$related_block_cols = 'col-lg-6 col-md-6';
		} elseif ($count == 3 || $count == 6) {
			$related_block_cols = 'col-lg-4 col-md-6';
		} else {
			$related_block_cols = 'col-lg-4 col-md-6';
		}
		?>

		<div class="row related block-related grid">

		    <?php foreach( $post_objects as $post_object): ?>

		    	<?php $category = get_the_category($post_object);
				$first_category = $category[0]; ?>

				<div class="<?php echo $related_block_cols; ?> grid-item">

					<article class="homepage-post-item homepage-post-item-<?php echo $news_item_count; ?> homepage-<?php echo $first_category->slug; ?>">

						<div class="meta"><?php echo sprintf( '<a href="%s" class="post-date-related-cat">%s</a>', get_category_link( $first_category ), $first_category->name ); ?></div>

						<header>

						  	<h3><a href="<?php echo get_the_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></a></h3>

						</header>

						<?php // echo get_the_excerpt($post_object->ID); ?>

						<footer><a href="<?php echo get_the_permalink($post_object->ID); ?>" class="link" title="<?php echo get_the_title($post_object->ID); ?>">read more</a><?php // echo sprintf( '<a href="%s" class="link">%s %s</a>', get_category_link( $first_category ), 'More ', $first_category->name ); ?></footer>

					</article>

				</div>

				<?php $news_item_count++; ?>

		    <?php endforeach; ?>

		</div>

	<?php endif; ?>

    
</div>
