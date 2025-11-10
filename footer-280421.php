<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="sub-footer-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-12">

				<div class="popular-links-section">

					<div class="row">

						<div class="col-12">

							<h2>Popular Links</h2>

						</div>

						<div class="col-md-6">

							<h3><?php the_field('column_1_title', 'option'); ?></h3>

							<?php if( have_rows('column_1_links', 'option') ): ?>

								<ul>
									<?php while( have_rows('column_1_links', 'option') ) : the_row(); ?>

										<li class="pop-link-item"><a href="<?php the_sub_field('link'); ?>"><span class="list-triangle"></span><?php the_sub_field('title'); ?></a></li>

									<?php endwhile; ?>
									
								</ul>

							<?php endif; ?>

						</div>

						<div class="col-md-6">

							<h3><?php the_field('column_2_title', 'option'); ?></h3>

							<?php if( have_rows('column_2_links', 'option') ): ?>

								<ul>
									<?php while( have_rows('column_2_links', 'option') ) : the_row(); ?>

										<li class="pop-link-item"><a href="<?php the_sub_field('link'); ?>"><span class="list-triangle"></span><?php the_sub_field('title'); ?></a></li>

									<?php endwhile; ?>
									
								</ul>

							<?php endif; ?>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

<div class="wrapper" id="wrapper-footer">

	<footer class="site-footer" id="colophon">

		<div class="<?php echo esc_attr( $container ); ?>">

			<div class="row">

				<div class="col-md-12">

					<div class="footer-socials">

						<?php // check if the repeater field has rows of data
						if( have_rows('social', 'option') ): ?>

							<ul class="social-list">

			 					<?php 
			 					// loop through the rows of data
			    				while ( have_rows('social', 'option') ) : the_row();

			   					$social_network_icon = get_sub_field('social_network');
			   					$social_network_url = get_sub_field('network_url');

			   					$social_network_field = get_field_object('social_network');
								$social_network_value = get_field('social_network');
								// $social_network_label = get_sub_field('social_network')['label'];

			        			// display a sub field value ?>
			        			<li class="social-item">
				        			<a href="<?php echo $social_network_url; ?>" target="_blank">
					        			<div class="contact-social-icon">
						        			<?php echo $social_network_icon; ?> 
						        		</div>
					        		</a>
			        			</li>

			    				<?php endwhile; ?>

							</ul>

						<?php else :

						// no rows found

						endif;

						?>

					</div><!-- .site-info -->

				</div><!--col end -->

				<div class="col-md-3 col-6">

					<?php dynamic_sidebar( 'footer_1' ); ?>
					
				</div>

				<div class="col-md-3 col-6">

					<h3 class="widget-title">Popular Links</h3>

						<div class="accordion" id="accordionExample">

						  <div class="card">

						    <div class="card-header" id="headingOne">
						      <h4 class="mb-0">
						        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          <h4><?php the_field('column_1_title', 'option'); ?></h4>
						        </button>
						      </h4>
						    </div>

						    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <?php if( have_rows('column_1_links', 'option') ): ?>

									<ul>
										<?php while( have_rows('column_1_links', 'option') ) : the_row(); ?>

											<li class="pop-link-item"><a href="<?php the_sub_field('link'); ?>"><span class="list-triangle"></span><?php the_sub_field('title'); ?></a></li>

										<?php endwhile; ?>
										
									</ul>

								<?php endif; ?>
							  </div>
							</div>

						  </div>

						  <div class="card">

						    <div class="card-header" id="headingTwo">
						      <h4 class="mb-0">
						        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
						          <h4><?php the_field('column_2_title', 'option'); ?></h4>
						        </button>
						      </h4>
						    </div>

						    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						      <div class="card-body">
								<?php if( have_rows('column_2_links', 'option') ): ?>

									<ul>
										<?php while( have_rows('column_2_links', 'option') ) : the_row(); ?>

											<li class="pop-link-item"><a href="<?php the_sub_field('link'); ?>"><span class="list-triangle"></span><?php the_sub_field('title'); ?></a></li>

										<?php endwhile; ?>
										
									</ul>

								<?php endif; ?>
							  </div>
						    </div>

						  </div>

						</div>

					<?php dynamic_sidebar( 'footer_2' ); ?>
					
				</div>

				<div class="col-md-3 col-6">

					<?php dynamic_sidebar( 'footer_3' ); ?>
					
				</div>

				<div class="col-md-3 col-6">

					<h3>© MENZIES LLP <?php echo date("Y"); ?></h3>

					<?php the_field('company_details', 'options'); ?>
					
				</div>

			</div><!-- row end -->

		</div><!-- container end -->

	</footer><!-- #colophon -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

