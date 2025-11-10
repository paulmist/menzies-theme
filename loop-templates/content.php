<?php

/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package understrap
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>

<?php
if (get_post_type(get_the_ID()) == 'post') :
	$category = get_the_category();
	$first_category = $category[0];
endif;
?>

<div class="insights-tile">

	<article class=" <?php if (get_post_type(get_the_ID()) == 'page') {echo 'no-date';} ?>  homepage-post-item homepage-post-item-<?php echo $news_item_count; ?> homepage-<?php if (get_post_type(get_the_ID()) == 'events') : echo 'events';
																									else : echo $first_category->slug;
																									endif; ?>">

		<div class="meta">

			<?php
			if (get_post_type(get_the_ID()) == 'post') :
				echo sprintf('<a href="%s">%s</a>', get_category_link($first_category), $first_category->name);
			elseif (get_post_type(get_the_ID()) == 'events') : ?>
				<a href="/events/"><?php _e('Events', 'menziestheme'); ?></a>
			<?php elseif (get_post_type(get_the_ID()) == 'page') : ?>
				<a href="/helping-you/"><?php _e('Pages', 'menziestheme'); ?></a>
			<?php endif;
			?>






		</div>

		<div class="insights-tile-image">
			<img src="<?php echo get_field('post_results_icon'); ?> " alt="">
		</div>

		<div class="insights-tile-text">
			<div class="post-date">
				<?php
				if (get_field('date_of_event')) {
					echo "<div class='d-o-e'>" . "<h6>Event date - " . get_field('date_of_event') . "</h6></div>";
				} else {
					the_date('d-m-Y', '<h6>', '</h6>');
				}
				?>
			</div>

				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<a href="<?php the_permalink(); ?>" class="link arrow" title="<?php the_title(); ?>">Read more</a>
					</div>




		<?php
		// echo sprintf( '<a href="%s" class="link">%s %s</a>', get_category_link( $first_category ), 'More ', $first_category->name );
		?>



	</article>

</div>

<?php $news_item_count++; ?>