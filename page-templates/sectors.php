<?php
/**
 * Template Name: Sectors Landing Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="wrapper landing-page" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<div class="crumbs-box full-width-crumbs">
					<?php
					if ( function_exists('yoast_breadcrumb') ) {
						  yoast_breadcrumb( '<div id="breadcrumbs">','</div>' );
						}
					?>
					</div>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'page' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

			<?php
			// check if the repeater field has rows of data
			if( have_rows('boxes') ): 
				$box_count = count(get_field('boxes')); 
				//echo $box_count; 
				if ( $box_count == 1 ) :
					$box_cols = "col-md-12" ;
				elseif ( $box_count == 2 ) :
					$box_cols = "col-sm-6";
				elseif ( $box_count == 3 ) : 
					$box_cols = "col-md-4";
				elseif ( $box_count == 4 ) : 
					$box_cols = "col-sm-6 col-lg-3";
				elseif ( $box_count == 5 ) : 
					$box_cols = "col-md-3";
				elseif ( $box_count == 6 ) : 
					$box_cols = "col-md-4";
				elseif ( $box_count == 7 ) : 
					$box_cols = "col-md-4";
				elseif ( $box_count == 8 ) : 
					$box_cols = "col-md-3";
				endif;

				$box_number = 1;

				?>

			 	<?php // loop through the rows of data
			    while ( have_rows('boxes') ) : the_row(); ?>

			    	<div class="<?php echo $box_cols; ?> box-col">

				        <h2><?php the_sub_field('title'); ?></h2>

				        <?php the_sub_field('content'); ?>

				        <?php if ( get_sub_field('link') ) : ?>

				        	<div class="boxes-link">

				        		<a href="<?php the_sub_field('link'); ?>"><?php the_sub_field('link_icon'); ?><span><?php the_sub_field('link_text') ; ?></span></a>

				        	</div>

				        <?php endif; ?>

				        <?php if ( get_sub_field('show_pop-up') ) : ?>

				        	<div class="boxes-link">

				        		<a href="#" class="sub-field-modal-link-<?php echo $box_number; ?>" data-toggle="modal" data-target="#sub-field-modal-<?php echo $box_number; ?>"><?php the_sub_field('link_icon'); ?><span><?php the_sub_field('link_text') ; ?></span></a>

				        		<div class="modal fade sub-field-modal" id="sub-field-modal-<?php echo $box_number; ?>" tabindex="-1" role="dialog" aria-labelledby="sub-field-modal-<?php echo $box_number; ?>-label" aria-hidden="true">

									<div class="modal-dialog" role="document">

								    	<div class="modal-content">

								      		<div class="modal-header">

								        		<h2><?php the_sub_field('title'); ?></h2>

								        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          			<span aria-hidden="true">&times;</span>
								        		</button>

								      		</div>

								      		<div class="modal-body">
								        	<?php
								        	$short = get_sub_field('contact_form_shortcode');
											echo do_shortcode($short);  
								        	?>
								      		</div>

								    	</div>

								  	</div>

								</div>

				        	</div>

				        <?php endif; ?>

				    </div>

				    <?php $box_number++; ?>

			    <?php endwhile; ?>

			<?php endif; ?>

		</div>

		<?php get_template_part( 'section-templates/section', 'sectors-nav' ); ?>

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>