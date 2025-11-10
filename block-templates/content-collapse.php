<?php
/**
 * Block Name: Collapse
 *
 * This is the template that displays the Bootstrap 4 Collapse block.
 */
// create id attribute for specific styling
$id = 'collpase-' . $block['id'];
// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
?>
<?php if( have_rows('collapse') ): ?>
	<?php $collpase_count = 1; while( have_rows('collapse') ): the_row(); ?> <div id="<?php echo $id; ?>-<?php echo $collpase_count; ?>" class="acf-block collapse-block <?php echo $align_class; ?>"> <?php $style = get_sub_field('style'); if($style == 'button'): ?><a class="btn btn-primary" data-toggle="collapse" href="#multicollapse-<?php echo $collpase_count; ?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><?php the_sub_field('title'); ?></a><?php else: ?><a class="" data-toggle="collapse" href="#multicollapse-<?php echo $collpase_count; ?>" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><h2><?php the_sub_field('title'); ?></h2></a><?php endif; ?><!-- Collapse --><div class="collapse multi-collapse" id="multicollapse-<?php echo $collpase_count; ?>"><?php the_sub_field('content'); ?></div></div><?php $collpase_count++; endwhile; ?>
<?php endif; ?>