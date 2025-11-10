<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="error-404-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main">

					<div class="crumbs-box full-width-crumbs">
						<?php
						if(function_exists('bcn_display'))
						{
						 bcn_display();
						}
						?>
					</div>

					<section class="error-404 not-found">

						<header class="page-header">

							<h1 class="page-title"><?php the_field('404_title', 'option'); ?></h1>

						</header><!-- .page-header -->

						<div class="page-content">

							<p><?php the_field('404_text', 'option'); ?></p>

							<div class="search-empty-form">

								<form id="labnol" action="<?php echo home_url(); ?>" method="get">

								    <div class="speech">
								    	<input type="text" name="s" value="" id="transcript" placeholder="Search.." />
								    	<img onclick="startDictation()" src="//i.imgur.com/cHidSVu.gif" class="search-mic-icon" />
								    </div>

								</form>

							</div>

							<a href="javascript:history.back()" class="back-link">Go Back</a>

						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #error-404-wrapper -->

<div class="wrapper-links">

	<?php get_template_part( 'section-templates/section', 'suggested' ); ?>

	<?php // understrap_post_nav(); ?>	

</div>	


<div class="wrapper" id="error-404-wrapper-hidden" style="display:none;">
	<p>
		Hello
	</p>
</div>

<?php get_footer(); ?>
