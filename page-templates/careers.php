<?php
/**
 * Template Name: Careers page
 *
 * This template can be used to override the default template and sidebar setup
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
$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
?>

<main class="site-main" id="main">

	<article <?php post_class($has_hero); ?> id="post-<?php the_ID(); ?>">

		<?php if($featured_img_url): ?>

			<div class="wrapper single-hero-wrapper" style="background-image: url('<?php echo $featured_img_url; ?>');">

				<?php if ( !get_field('disable_image_overlay') ): ?><div class="img-overlay"></div><?php endif; ?>

				<div class="<?php echo esc_attr( $container ); ?>" id="single-header" tabindex="-1">

					<div class="row">

						<div class="col-md-12">	

							<header class="entry-header">

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

				<div class="row main-content-row">

					<div class="col-lg-8 main-content-col">

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

							<?php // if(function_exists('pf_show_link')){echo pf_show_link();} ?>

							<?php understrap_entry_footer(); ?>

						</div><!-- .entry-content -->

						<footer class="entry-footer">

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

							<?php
							$parent_id = $post->ID;
							$post_parent_id = wp_get_post_parent_id( $post_ID );

							$this_args = array(
							    'post_type'      => 'page',
							    //'posts_per_page' => -1,
							    'post_parent'    => $parent_id,
							    'order'          => 'ASC',
							    'orderby'        => 'menu_order'
							 );

							$parent_args = array(
							    'post_type'      => 'page',
							    //'posts_per_page' => -1,
							    'post_parent'    => $post_parent_id,
							    'order'          => 'ASC',
							    'orderby'        => 'menu_order'
							 );


							$parent = new WP_Query( $this_args );
							$post_parent = new WP_Query( $parent_args );

							if ( $parent->have_posts() ) : ?>

								<nav class="sidebar-menu blog-sidebar-menu sidebar-widget">

									<h3><?php the_title(); ?></h3>

								    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

								        <div id="parent-<?php the_ID(); ?>" class="parent-page">

								            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>

								        </div>

								    <?php endwhile; ?>

								</nav>

							<?php else:

								if ( $post_parent->have_posts() ) : ?>

									<nav class="sidebar-menu blog-sidebar-menu sidebar-widget">

										<h3><?php echo get_the_title($post_parent_id); ?></h3>

									    <?php while ( $post_parent->have_posts() ) : $post_parent->the_post(); ?>

									        <div id="parent-<?php the_ID(); ?>" class="parent-page">

									            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>

									        </div>

									    <?php endwhile; ?>

									</nav>

								<?php endif; ?>

							<?php endif; wp_reset_query(); ?> 

							<?php dynamic_sidebar( 'careers' ); ?>

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