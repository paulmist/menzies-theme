<?php
/**
 * Block Name: Sector head
 *
 * This is the template that displays the Sector head block.
 */

// create id attribute for specific styling
$id = 'sectorhead-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
?>

<div id="<?php echo $id; ?>" class="acf-block acf-block-<?php the_field('block_colours'); ?> sector-head-block <?php echo $align_class; ?>">

	<?php $post_object = get_field('sector_head'); 

	if( $post_object ): ?>

	    <div class="row sector-head-row">

	    	<div class="col-sm-3 author-photo">
	    		<a href="<?php the_permalink(); ?>"><?php $thmbnail = get_field('thmbnail', $post_object->ID);
					if( !empty($thmbnail) ): ?><img src="<?php echo $thmbnail['url']; ?>" alt="<?php echo $thmbnail['alt']; ?>" class="single-author-thumb" /><?php endif; ?></a><h3><?php _e( 'Sector head', 'menziestheme'); ?></h3>
			</div>
			<div class="col-sm-9 author-text">
		    	<a href="<?php the_permalink(); ?>">
		    		<h3>
		    			<?php echo get_the_title($post_object->ID); ?>
		    			<?php if( get_field('certificates', $post_object->ID) ): ?>
		    				<?php echo ' - '; ?><?php echo get_field( 'certificates', $post_object->ID ); ?>
		    			<?php endif; ?>
		    		</h3>
		    	</a>
	    		<p class="position"><?php the_field('position', $post_object->ID); ?></p>
	    		<!-- <p class="person-meta"><?php 
	    		$yoast_meta_description = get_post_meta( $post_object->ID, '_yoast_wpseo_metadesc', true ); 
	    		echo $yoast_meta_description;
	    		?></p> -->

	    		<a href="<?php echo get_the_permalink($post_object->ID); ?>"><button class="carousel-btn"><?php _e( 'View profile', 'menziestheme'); ?></button></a>
		    </div>

	    </div>

	<?php endif; ?>
    
</div>
