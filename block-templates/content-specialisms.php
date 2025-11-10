<?php
/**
 * Block Name: Related specialisms
 *
 * This is the template that displays the Related specialisms block.
 */

// create id attribute for specific styling
$id = 'specialisms-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
?>

<div id="<?php echo $id; ?>" class="acf-block acf-block-<?php the_field('block_colours'); ?> related_specialisms <?php echo $align_class; ?>">

	<h3><?php _e( 'Related specialisms', 'menziestheme'); ?></h3>

	<?php $post_objects = get_field('related_specialisms_block'); ?>

	<?php $s_html = '<p>'; ?>
	<?php $sp = ''; ?>

	<?php if( $post_objects ): ?>

	    <?php foreach( $post_objects as $post_object): ?>

	    	<?php // echo $post_object->ID; ?>

        	<?php $s_html .= $sp . '<a href="/about-us/people/?fwp_related_specialism=' . $post_object->ID .'">' . $post_object->post_title . '</a>'; ?>

            <?php $sp = ''; ?>

	    <?php endforeach; ?>

	<?php endif; ?>

	<?php $s_html .= '</p>'; ?>
	<?php echo $s_html; ?>
    
</div>
