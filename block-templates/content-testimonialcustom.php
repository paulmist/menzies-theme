<?php
/**
 * Block Name: Quote / testimonial (custom)
 *
 * This is the template that displays the custom quote / testimonial block.
 */

// create id attribute for specific styling
$id = 'specialisms-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
?>

<div id="<?php echo $id; ?>" class="acf-block acf-block-taupe quote-testimonial <?php echo $align_class; ?>">

	<?php $quote_content = apply_filters('', get_post_field('post_content', $post_object->ID)); ?>
	<blockquote><i class="fa fa-quote-left" aria-hidden="true"></i><?php the_field('quote'); ?><i class="fa fa-quote-right" aria-hidden="true"></i>
    	<footer><cite><?php the_field('name'); ?> <?php the_field('company'); ?></cite></footer></blockquote>
    
</div>
