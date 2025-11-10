<?php
/**
 * Block Name: Related sectors
 *
 * This is the template that displays the Related sectors block.
 */

// create id attribute for specific styling
$id = 'specialisms-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
?>

<div id="<?php echo $id; ?>" class="acf-block acf-block-<?php the_field('block_colours'); ?> related_sectors <?php echo $align_class; ?>">

	<h3><?php _e( 'Related sectors', 'menziestheme'); ?></h3>

	<?php $post_objects = get_field('related_sectors_block'); ?>

	<?php $s_html = '<p>'; ?>
	<?php $sp = ''; ?>

	<?php if( $post_objects ): ?>

	    <?php foreach( $post_objects as $post_object): ?>

	    	<?php $post_object_page = get_page_by_slug($post_object->post_name); ?>

	    	<?php if( $post_object_page ): ?>

            	<?php $s_html .= $sp . '<a href="' . get_permalink($post_object_page->ID). '">' . $post_object->post_title . '</a>'; ?>

            <?php else: ?>

            	<?php $s_html .= $sp . '<a href="' . get_permalink($post_object->ID). '">' . $post_object->post_title . '</a>'; ?>

            <?php endif; ?>

            <?php $sp = ''; ?>

	    <?php endforeach; ?>

	<?php endif; ?>

	<?php $s_html .= '</p>'; ?>
	<?php echo $s_html; ?>
    
</div>
