<?php
/**
 * Block Name: Related specialisms
 *
 * This is the template that displays the Related specialisms block.
 */

// create id attribute for specific styling
$id = 'related_specialisms-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<div id="<?php echo $id; ?>" class="related_specialisms <?php echo $align_class; ?>">
    <p><?php the_field('test_field'); ?></p>
</div>
