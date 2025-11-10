<?php
/**
 * The template for displaying all single specialism pages.
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
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
$category = get_the_category();
$first_category = $category[0];
?>

<main class="site-main" id="main">

	<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

		<?php if($featured_img_url): ?>

			<div class="wrapper single-hero-wrapper" style="background-image: url('<?php echo $featured_img_url; ?>');">

				<?php if ( !get_field('disable_image_overlay') ): ?><div class="img-overlay"></div><?php endif; ?>

				<div class="<?php echo esc_attr( $container ); ?>" id="single-header" tabindex="-1">

					<div class="row">

						<div class="col-md-12">	

							<header class="entry-header">

								<div class="single-post-cat"><?php echo sprintf( '<a href="%s">%s</a>', get_category_link( $first_category ), $first_category->name ); ?></div>

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

					<div class="col-lg-8">

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

								<div class="entry-meta">

								</div><!-- .entry-meta -->

							</header><!-- .entry-header -->	

						<?php endif; ?>			

						<div class="entry-content">

							<?php the_content(); ?>

							<?php if(function_exists('pf_show_link')){echo pf_show_link();} ?>

							<?php understrap_entry_footer(); ?>

						</div><!-- .entry-content -->

						<footer class="entry-footer">

							<?php
							// Sector head details
							$sector_object = get_field('sector_head');
							if( $sector_object ): ?>

								<div class="author-details">

									<div class="row author-details-row">

										<?php
										$person_description = get_field('person_description');
										// override $post
										$post = $sector_object;
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
									    		<p class="position"><?php _e( 'Sector head', 'menziestheme'); ?></p>
									    		<h3>
									    			<?php the_title(); ?>
									    			<?php if( get_field('certificates') ): ?>
									    				<?php echo ' - '; ?><?php the_field('certificates'); ?>
									    			<?php endif; ?>
									    		</h3>
									    	</a>
								    		<a href="<?php the_permalink(); ?>"><p class="position"><?php the_field('position'); ?></p></a>
								    		<a href="<?php the_permalink(); ?>"><p class="person-meta">
								    			<?php if( $person_description ): ?>
													<?php echo $person_description; ?>
												<?php else: ?>
								    				<?php 
								    				$yoast_meta_description = get_post_meta( $post->ID, '_yoast_wpseo_metadesc', true ); 
								    				echo $yoast_meta_description;
								    				?>
								    			<?php endif; ?>
								    		</p></a>

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
								<h3><?php _e( 'Sectors', 'menziestheme'); ?></h3>
								<?php 
									wp_nav_menu(array(
									  'menu'			=> 'Sectors menu',
									  'container'       => '', 
									  'container_id'    => ' ',
									  'menu_class'      => '',			
									  'menu_id'			=> 'insights-nav',
									  'echo'            => true));
								?>	 
							</nav>

							<div class="meet-the-team-widget sidebar-widget">

								<a href="/about-us/people/?fwp_sector_posts=<?php echo $post->ID; ?>">

									<i class="fa fa-users" aria-hidden="true"></i><h3 class="inline-heading"><?php _e( 'Meet the team', 'menziestheme'); ?></h3>

								</a>

							</div>

							<div class="linked-insights-widget sidebar-widget">

								<a href="/insights/?fwp_sector_posts=<?php echo $post->ID; ?>">

									<i class="fa fa-file-text" aria-hidden="true"></i><h3 class="inline-heading"><?php _e( 'Sector Insights', 'menziestheme'); ?></h3>

								</a>

							</div>

							<div class="contact-us-widget sidebar-widget">

								<a href="/contact-us/">

									<i class="fa fa-map-marker" aria-hidden="true"></i><h3 class="inline-heading"><?php _e( 'Contact us', 'menziestheme'); ?></h3>

								</a>

							</div>

							<?php get_template_part( 'section-templates/section', 'sidebar-related' ); ?>

							<?php // get_template_part( 'section-templates/section', 'sidebar-featured' ); ?>

							<?php // dynamic_sidebar( 'blog' ); ?>

						</aside>
						
					</div>

				</div><!-- .row -->

			</div><!-- #content -->

		</div><!-- #single-wrapper -->

	</article><!-- #post-## -->

	<div class="wrapper-links">

		<?php // get_template_part( 'section-templates/section', 'related' ); ?>

		<?php // understrap_post_nav(); ?>	

	</div>		

</main><!-- #main -->

<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>
