<?php
/**
 * Block Name: Event CF7
 *
 * This is the template that displays the Event CF7 block.
 */

// create id attribute for specific styling
$id = 'people-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';
?>

<?php global $post; ?>

<div id="<?php echo $id; ?>" class="acf-block acf-block-<?php the_field('block_colours'); ?> people-block <?php echo $align_class; ?>">

    <div class="row sector-head-row">

    	<div class="col-12">
    		<h2><?php _e( 'Event registration', 'menziestheme'); // the_field('event_name'); ?></h2>
    		<?php if (get_field('registration_intro')) : ?>
    			<p><?php the_field('registration_intro'); ?></p>
    		<?php endif; ?>
		</div>

		<div class="col-12">

			<div class="row event-details-row">

				<div class="col-md-3">

					<h3><?php _e( 'Date', 'menziestheme'); ?></h3>

					<p class="small-p"><?php the_field('date_of_event', $post->ID); ?></p>

				</div>

				<div class="col-md-3">

					<h3><?php _e( 'Time', 'menziestheme'); ?></h3>

					<p class="small-p"><?php the_field('time_of_event', $post->ID); ?></p>

				</div>

				<div class="col-md-3">

					<h3><?php _e( 'Location', 'menziestheme'); ?></h3>

					<p class="small-p"><?php echo get_field('location_event', $post->ID); ?></p>

				</div>

				<div class="col-md-3">

					<?php if ( get_field( 'location_event', $post->ID ) ) : ?>

						<a href="http://maps.google.com/?q=<?php echo sanitize_text_field( get_field( 'location_event', $post->ID ) ); ?>" class="event-button" target="_blank"><button class="carousel-btn"><?php _e( 'View map', 'menziestheme'); ?></button></a>

						<p></p>

					<?php endif; ?>

				</div>

				<div class="col-md-12">

					<?php if ( get_field('contact_email_event', $post->ID) ) : ?>

						<h3><?php _e( 'Event Enquiry', 'menziestheme'); ?></h3>

						<p><?php _e( 'For more information about this event please use the form below.', 'menziestheme'); ?></p>

						<?php echo do_shortcode('[contact-form-7 id="7607" title="Event contact form"]'); ?>

					<?php endif; ?>

				</div>

			</div>

	    	<?php echo get_the_title($post_object->ID); ?>



	    </div>

    </div>
   
</div>
