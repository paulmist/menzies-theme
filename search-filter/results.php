<?php
/**
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 */

if ( $query->have_posts() )
{
	?>
	
	<?php
	while ($query->have_posts())
	{
		$query->the_post();
		
		?>
		<a href="<?php the_permalink(); ?>" class="blog-tile-wrapper">
			<div class="blog-tile-image">
				<?php if( get_field('blog_image') ): ?>
    				<img src="<?php echo get_field('blog_image'); ?>" />
				<?php endif; ?>
			</div>
			<div class="blog-tile-text">
				<?php
					$tags = get_field('blog_tag');
					if( $tags ): ?>
					<ul class="blog-meta">
						<?php foreach( $tags as $tag ): ?>
							<li class="bm-<?php echo $tag; ?>"><?php echo $tag; ?></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
				<h3><?php the_title(); ?></h3>
				<p><?php echo wp_trim_words(get_the_content(), 25, '...'); ?></p>
				<p class="readon navy solid m-b-none">Read more</p>
			</div>
		</a>
		
		<?php
	}
	?>

<div class="pagination">
		
		<?php
			/* example code for using the wp_pagenavi plugin */
			if (function_exists('wp_pagenavi'))
			{
				wp_pagenavi( array( 'query' => $query ) );
			}
		?>
	</div>

	<?php
}
else
{
	echo "Unfortunately no items match your search criteria, please re-try. If you're looking for a specific item, then please get in touch.";
}
?>