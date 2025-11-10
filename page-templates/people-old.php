<?php
/**
 * Template Name: People page (old verision)
 *
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
?>

<div class="wrapper" id="full-width-page-wrapper">

	<?php if($featured_img_url): ?>

		<div class="wrapper single-hero-wrapper" style="background-image: url('<?php echo $featured_img_url; ?>');">

			<?php if ( !get_field('disable_image_overlay') ): ?><div class="img-overlay"></div><?php endif; ?>

			<div class="<?php echo esc_attr( $container ); ?>" id="single-header" tabindex="-1">

				<div class="row">

					<div class="col-md-12">	

						<header class="entry-header">

							<span class="hero-title">

								<header class="entry-header">
									<div class="single-post-cat"></div>
									<h1 class="entry-title"><?php the_title(); ?></h1>

								</header><!-- .entry-header -->

							</span>

						</header><!-- .entry-header -->

					</div>

				</div>

			</div>

		</div>

	<?php endif; ?>

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area awards-content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<div class="row inner-content-row">

						<div class="col-md-8 inner-content-col">

							<?php while ( have_posts() ) : the_post(); ?>

								<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

									<div class="entry-content">

										<div class="crumbs-box">
											<?php if(function_exists('bcn_display')) { bcn_display(); } ?>
										</div>

										<?php the_content(); ?>

									</div><!-- .entry-content -->

								</article><!-- #post-## -->

							<?php endwhile; // end of the loop. ?>

						</div>

						<div class="col-md-4">

							<div class="archive-filters">

								<h2><?php _e( 'Search people', 'menziestheme'); ?></h2>

								<a class="filter-toggle" data-toggle="collapse" href="#filter-container" role="button" aria-expanded="false" aria-controls="filter-container">
								    <div class="filter-toggle-text"><?php _e( 'Filters', 'menziestheme'); ?></div><i class="fa fa-plus-square" aria-hidden="true"></i>
								</a>

								<div class="collapse show filter-collapse" id="filter-container">

									<div class="filter-section">

										<h3><?php _e( 'Search by name', 'menziestheme'); ?></h3>

										<?php echo do_shortcode( '[facetwp facet="post_name"]' ); ?>

									</div>

									<div class="row">

										<div class="col-md-6">

											<div class="filter-section">

												<h3><?php _e( 'Sector', 'menziestheme'); ?></h3>

												<?php echo do_shortcode( '[facetwp facet="sector_posts"]' ); ?>

											</div>

										</div>

										<div class="col-md-6">

											<div class="filter-section">

												<h3><?php _e( 'Specialism', 'menziestheme'); ?></h3>

												<?php echo do_shortcode( '[facetwp facet="related_specialism"]' ); ?>

											</div>

										</div>

									</div>

									<div class="filter-section">

										<h3><?php _e( 'Office', 'menziestheme'); ?></h3>

										<?php echo do_shortcode( '[facetwp facet="office"]' ); ?>

									</div>

									<a href="/about-us/people/"><button class="carousel-btn"><?php _e( 'Reset', 'menziestheme'); ?></button></a>

								</div>

							</div>

						</div>

					</div>

				</main><!-- #main -->
					
			</div><!-- #primary -->

		</div>

		<?php $people_item_count=1; ?>

		<?php
		$custom_query = new WP_Query( array( 
			'post_type' 		=> 'people', 
			'orderby' 			=> 'menu_order',
			'order' => 'ASC',
			'facetwp' => true,
			'posts_per_page' 	=> 12,
			) 
		); ?>

		<div class="row people-list-row facetwp-template">

			<?php while($custom_query->have_posts()) : $custom_query->the_post(); ?>

				<div class="col-6 col-lg-3 col-md-4">

					<article class="people-post-item people-post-item-<?php echo $people_item_count; ?> ">

						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'full' ); ?></a>

						<?php 
						$person_image = get_field('big_image');
						if( !empty($person_image) ): 
							// vars
							$url = $person_image['url'];
							$alt = $person_image['alt'];
							// thumbnail
							$size = 'people-big-cropped';
							$thumb = $person_image['sizes'][ $size ];
						?>
							<a href="<?php the_permalink(); ?>"><img class="person-hero" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" /></a>
						<?php endif; ?>

						<div class="people-list-meta-container">

							<div class="people-list-meta people-list-initial">

								<div class="people-meta-inner">

									<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

									<p class="small-p"><a href="<?php the_permalink(); ?>"><?php if( get_field('certificates') ): the_field('certificates'); echo ' | '; endif; ?><?php the_field('position'); ?></a></p>

									<?php $post_object = get_field('related_office'); 

									if( $post_object ): 

										// override $post
										// $post = $post_object;
										// setup_postdata( $post ); 

										?>

										<p class="small-p"><a href="<?php echo get_the_permalink($post_object->ID); ?>"><?php echo get_the_title($post_object->ID); ?></a></p>

										<?php // wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
									
									<?php endif; ?>

								</div>

							</div>

							<div class="people-list-meta people-list-hidden">

								<div class="people-meta-inner">

									<h4><?php _e( 'Sectors & Specialisms', 'menziestheme'); ?></h4>

									<?php $post_objects = get_field('related_sectors'); ?>

									<?php $s_html = '<p class="small-p">'; ?>
									<?php $sp = ''; ?>

									<?php if( $post_objects ): ?>

									    <?php foreach( $post_objects as $post_object): ?>

									    	<?php $post_object_page = get_page_by_slug($post_object->post_name); ?>

									    	<?php if( $post_object_page ): ?>

								            	<?php $s_html .= $sp . '<a href="' . get_permalink($post_object_page->ID). '">' . $post_object->post_title . '</a>'; ?>

								            <?php else: ?>

								            	<?php $s_html .= $sp . '<a href="' . get_permalink($post_object->ID). '">' . $post_object->post_title . '</a>'; ?>

								            <?php endif; ?>

								            <?php $sp = ', '; ?>

									    <?php endforeach; ?>

									<?php endif; ?>

									<?php $post_objects = get_field('related_specialisms'); ?>						
									<?php if( $post_objects ): ?>

									    <?php foreach( $post_objects as $post_object): ?>

									    	<?php // echo $post_object->ID; ?>

							            	<?php $s_html .= $sp . '<a href="/about-us/people/?fwp_related_specialism=' . $post_object->ID .'">' . $post_object->post_title . '</a>'; ?>

								            <?php $sp = ', '; ?>

									    <?php endforeach; ?>

									<?php endif; ?>	

									<?php $s_html .= '</p>'; ?>
									<?php echo $s_html; ?>

									<!-- <a href="tel:<?php the_field('phone'); ?>" class="person-contact-item"><i class="fa fa-phone-square" aria-hidden="true"></i></a> -->

									<!-- <a href="#" class="person-contact-item" data-toggle="modal" data-target="#person_contact_modal-<?php echo $people_item_count; ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a> -->

									<!-- <div class="modal fade" id="person_contact_modal-<?php echo $people_item_count; ?>" tabindex="-1" role="dialog" aria-labelledby="person_contact_modalLabel" aria-hidden="true">
									  <div class="modal-dialog" role="document">
									    <div class="modal-content">
									      <div class="modal-body">
									      	<h3><?php _e( 'Send an email to ', 'menziestheme'); the_title(); ?></h3>
									        <?php echo do_shortcode('[contact-form-7 id="7915" title="Person contact form"]'); ?>
									      </div>
									    </div>
									  </div>
									</div> -->

									<?php
									// $linked_in = get_field('linkedin');
									// if ($linked_in): ?>

										<!-- <a href="<?php the_field('linkedin'); ?>" class="person-contact-item" target="_blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> -->

									<?php // endif; ?>

								</div>


							</div>

						</div>

					</article>

				</div>

				<?php $people_item_count++; ?>

			<?php 
			endwhile; ?>

			<div class="col-md-12 grid-item"><?php echo do_shortcode( '[facetwp pager="true"]' ); ?></div>

			<?php wp_reset_postdata();
			?>

		</div><!-- .row end -->

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<?php get_footer(); ?>
