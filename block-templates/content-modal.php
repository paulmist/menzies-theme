<?php
/**
 * Block Name: Modal
 *
 * This is the template that displays the Bootstrap 4 modal block.
 */
// create id attribute for specific styling
$id = 'modal-' . $block['id'];
// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
?>
<div id="<?php echo $id; ?>" class="acf-block modal-block <?php echo $align_class; ?>"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#acfmodal<?php echo $id; ?>"><?php the_field('button_text'); ?></button>
	<!-- Modal -->
	<div class="modal fade" id="acfmodal<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="acfmodallabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<button type="button" class="close-modal-btn" data-toggle="modal" data-target="#acfmodal<?php echo $id; ?>">&times;</button>
				<div class="modal-body">
					<?php the_field('modal_content'); ?>
				</div>
			</div>
		</div>
	</div>
</div>
