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
if (get_post_type(get_the_ID()) == 'case-studies') :
	$category = get_the_category();
	$first_category = $category[0];
endif;
?>

<div class="insights-tile case-studies-tile">

	<article class="homepage-post-item homepage-post-item-<?php echo $news_item_count; ?> homepage-<?php if (get_post_type(get_the_ID()) == 'events') : echo 'events';
																									else : echo $first_category->slug;
																									endif; ?>">

		<div class="meta categories">

			<?php
				$categories = get_the_category(); // Retrieve post categories
				if ($categories) {
					foreach ($categories as $category) {
						echo '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
					}
				}
				?>

		</div>

		<div class="case-studies-tile-split">
			<div class="insights-tile-image">
			<img src="<?php echo get_field('case_study_thumbnail_image') ; ?>" alt="">
			
			</div>

			<div class="insights-tile-text">
				<!--<div class="post-date">
				<?php the_date('d-m-Y', '<h6>', '</h6>'); ?>
				</div>-->
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<?php the_excerpt(''); ?>
				<a href="<?php the_permalink(); ?>" class="link arrow" title="<?php the_title(); ?>">Read more</a>
			</div>
		</div>




		<?php
		// echo sprintf( '<a href="%s" class="link">%s %s</a>', get_category_link( $first_category ), 'More ', $first_category->name );
		?>



	</article>

</div>

<?php $news_item_count++; ?>