<?php
/**
 * Block Name: Quote / testimonial
 *
 * This is the template that displays the quote / testimonial block.
 */

// create id attribute for specific styling
$id = 'specialisms-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
?>

<div id="<?php echo $id; ?>" class="acf-block acf-block-taupe quote-testimonial <?php echo $align_class; ?>">

	<?php $post_object = get_field('testimonial'); ?>

	<?php if( $post_object ): ?>
		<?php $quote_content = apply_filters('', get_post_field('post_content', $post_object->ID)); ?>
		<blockquote><i class="fa fa-quote-left" aria-hidden="true"></i><?php echo $quote_content; ?><i class="fa fa-quote-right" aria-hidden="true"></i>
        	<footer><cite><?php echo get_field( 'company_name', $post_object->ID ); ?> <?php echo get_the_title($post_object->ID); ?></cite></footer></blockquote>
	<?php endif; ?>
    
</div>
