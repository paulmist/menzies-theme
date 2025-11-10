<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
if( has_post_thumbnail() ) {
	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
} else {
	$get_old_header = get_field('header_image');
	$featured_img_url = $get_old_header['url'];
}
if($featured_img_url) {
	$has_hero = "yes-hero";
}
?>

<main class="site-main" id="main">

	<article <?php post_class($has_hero); ?> id="post-<?php the_ID(); ?>">

		<?php if($featured_img_url): ?>

			<div class="wrapper single-hero-wrapper" style="background-image: url('<?php echo $featured_img_url; ?>');">

				<div class="img-overlay"></div>

				<div class="<?php echo esc_attr( $container ); ?>" id="single-header" tabindex="-1">

					<div class="row">

						<div class="col-md-12">	

							<header class="entry-header">

								<div class="single-post-cat"><?php echo sprintf( '<a href="%s">%s</a>', get_category_link( $first_category ), $first_category->name ); ?></div>

								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

								</div><!-- .entry-meta -->

							</header><!-- .entry-header -->

						</div>

					</div>

				</div>

			</div>

		<?php endif; ?>

		<div class="wrapper" id="single-wrapper">

			<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

				<div class="row">

					<div class="col-lg-8">

						<div class="crumbs-box">
						<?php
						if(function_exists('bcn_display'))
						{
						 bcn_display();
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

							<?php if(function_exists('pf_show_link')){echo pf_show_link();} ?>

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

					<div class="col-lg-4">

						<aside class="blog-sidebar sidebar">

							<nav class="sidebar-menu blog-sidebar-menu sidebar-widget">
								<h3><?php _e( 'Insights', 'menziestheme'); ?></h3>
								<?php 
									wp_nav_menu(array(
									  'menu'			=> 'Insights menu',
									  'container'       => '', 
									  'container_id'    => ' ',
									  'menu_class'      => '',			
									  'menu_id'			=> 'insights-nav',
									  'echo'            => true));
								?>	 
							</nav>

							<?php get_template_part( 'section-templates/section', 'sidebar-featured' ); ?>

							<?php dynamic_sidebar( 'blog' ); ?>

						</aside>
						
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


