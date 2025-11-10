<?php
/**
 * Template Name: Full Width Page
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

<?php while ( have_posts() ) : the_post(); ?>

<?php 
$author_object = get_field('author');
$has_hero = "no-hero";



$featured_img_url = '';

if ( has_post_thumbnail() ) {
    $featured_img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
} else {
    $get_old_header = get_field('header_image');
    if ( !empty($get_old_header) && is_array($get_old_header) && !empty($get_old_header['url']) ) {
        $featured_img_url = $get_old_header['url'];
    }
}
if($featured_img_url) {
	$has_hero = "yes-hero";
}
$category = get_the_category();
$first_category = $category[0];
?>

<main class="site-main" id="main">

	<article <?php post_class($has_hero); ?> id="post-<?php the_ID(); ?>">

	

	<?php if ( !empty($featured_img_url) ): ?>
    <div class="wrapper single-hero-wrapper" style="background-image: url('<?php echo esc_url($featured_img_url); ?>');">
        <?php if ( !get_field('disable_image_overlay') ): ?><div class="img-overlay"></div><?php endif; ?>
        <div class="<?php echo esc_attr( $container ); ?>" id="single-header" tabindex="-1">
            <div class="row">
                <div class="col-md-12">
                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header><!-- .entry-header -->
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


		

		

		<div class="wrapper" id="single-wrapper">

			<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

				<div class="row">

					<div class="col-lg-12">

						<div class="crumbs-box">
						<?php
						if ( function_exists('yoast_breadcrumb') ) {
						  yoast_breadcrumb( '<div id="breadcrumbs">','</div>' );
						}
						?>
						</div>

						<?php if(!$featured_img_url): ?>

							<header class="entry-header">

								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

							</header><!-- .entry-header -->	

						<?php endif; ?>			

						<div class="entry-content">

							<?php the_content(); ?>

							<?php // if(function_exists('pf_show_link')){echo pf_show_link();} ?>

							<?php understrap_entry_footer(); ?>

						</div><!-- .entry-content -->

						<footer class="entry-footer">

							<?php
							// Author details
							if( $author_object ): ?>

								<div class="author-details">

									<div class="row author-details-row">

										<?php
										$author_description = get_field('author_description');
										// override $post
										$post = $author_object;
										setup_postdata( $post ); 
										?>
									    <div class="col-sm-3 author-photo">
									    	<a href="<?php the_permalink(); ?>">
									    		<?php $thmbnail = get_field('thmbnail');
												if( !empty($thmbnail) ): ?>
													<img src="<?php echo $thmbnail['url']; ?>" alt="<?php echo $thmbnail['alt']; ?>" class="single-author-thumb" />
												<?php endif; ?>
											</a>
										</div>
										<div class="col-sm-9 author-text">
									    	<a href="<?php the_permalink(); ?>">
									    		<h3>
									    			<?php the_title(); ?>
									    			<?php if( get_field('certificates') ): ?>
									    				<?php echo ' - '; ?><?php the_field('certificates'); ?>
									    			<?php endif; ?>
									    		</h3>
									    	</a>
								    		<p class="position"><?php the_field('position'); ?></p>
								    		<p class="person-meta">
								    			<?php if( $author_description ): ?>
													<?php echo $author_description; ?>
												<?php else: ?>
								    				<?php 
								    				$yoast_meta_description = get_post_meta( $post->ID, '_yoast_wpseo_metadesc', true ); 
								    				echo $yoast_meta_description;
								    				?>
								    			<?php endif; ?>
								    		</p>

								    		<a href="<?php the_permalink(); ?>"><button class="carousel-btn"><?php _e( 'View profile', 'menziestheme'); ?></button></a>
									    </div>
									    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

									</div>

								</div>

							<?php endif; ?>

							<?php
							wp_link_pages(
								array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
									'after'  => '</div>',
								)
							);
							?>

						</footer><!-- .entry-footer -->

							

					</div>

				</div><!-- .row -->

			</div><!-- #content -->

		</div><!-- #single-wrapper -->

	</article><!-- #post-## -->

	<div class="wrapper-links">

		<?php get_template_part( 'section-templates/section', 'related' ); ?>

		<?php // understrap_post_nav(); ?>	

	</div>		

</main><!-- #main -->

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
