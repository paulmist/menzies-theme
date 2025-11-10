<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$container = get_theme_mod('understrap_container_type');
?>

<?php get_template_part('sidebar-templates/sidebar', 'footerfull'); ?>
<div class="wrapper p-t-large" id="wrapper-footer">
	<footer class="site-footer" id="colophon">
		<div class="<?php echo esc_attr($container); ?>">
			<div class="row">
				<div class="col-md-12 footer-logo-container p-b-large fadeInUp animationDelayone animatable">
					<div class="col-md-12 post-footer logo-footer">
						<p class="p-b-small">
							<img src="/wp-content/uploads/2021/05/Menzies_Logo_Small_YellowWhite_low_alt.png" width="150" height="38" class="">
						</p>
					</div><!-- col end -->
					<div class="footer-socials">
						<div class="footer-column fc-socials">
							<?php if (have_rows('footer_columns_socials', 'option')) : ?>
								<ul class="company-socials">
									<?php while (have_rows('footer_columns_socials', 'option')) : the_row(); ?>
										<li>
											<a target="_blank" class="social <?php the_sub_field('footer_columns_social_type', 'option'); ?>" href="<?php the_sub_field('footer_columns_social_link', 'option'); ?>">
												<?php if (get_sub_field('footer_columns_social_type', 'option') == 'instagram') : echo '';
												endif; ?>
												<?php if (get_sub_field('footer_columns_social_type', 'option') == 'facebook') : echo '';
												endif; ?>
												<?php if (get_sub_field('footer_columns_social_type', 'option') == 'linkedin') : echo '';
												endif; ?>
												<?php if (get_sub_field('footer_columns_social_type', 'option') == 'twitter') : echo '';
												endif; ?>
												<?php if (get_sub_field('footer_columns_social_type', 'option') == 'youtube') : echo '';
												endif; ?>
											</a>
										</li>
									<?php endwhile; ?>
								</ul>
							<?php endif; ?>
						</div>

					</div><!-- .site-info -->

				</div><!--col end -->

				<div class="col-md-3 col-6 fadeInUp animationDelayone animatable">

					<?php dynamic_sidebar('footer_1'); ?>

				</div>

				<div class="col-md-3 col-6 fadeInUp animationDelaytwo animatable">

					<?php dynamic_sidebar('footer_4'); ?>


				</div>

				<div class="col-md-3 col-6 fadeInUp animationDelaythree animatable">

					<?php dynamic_sidebar('footer_3'); ?>

				</div>

				<div class="col-md-3 col-6 fadeInUp animationDelayfour animatable">


					<?php dynamic_sidebar('footer_2'); ?>



				</div>






				<!--<div class="quick-links-container">
				<?php dynamic_sidebar('quick-links'); ?>
				</div>-->

			</div><!-- row end -->

		</div><!-- container end -->

		<div class="site-details-container">
			<div>
				<h3>© MENZIES LLP <?php echo date("Y"); ?></h3>

				<?php the_field('company_details', 'options'); ?>
			</div>
		</div>


	</footer><!-- #colophon -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>