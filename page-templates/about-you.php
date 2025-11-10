<?php
/**
 * Template Name: About You page
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
$category = get_the_category();
$first_category = $category[0];
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
						if ( function_exists('yoast_breadcrumb') ) {
						  yoast_breadcrumb( '<div id="breadcrumbs">','</div>' );
						}
						?>
						</div>

						<?php if(!$featured_img_url): ?>

							<header class="entry-header">

								<div class="single-post-cat"><?php echo sprintf( '<a href="%s">%s</a>', get_category_link( $first_category ), $first_category->name ); ?> - <?php the_date('jS F Y'); ?></div>

								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

								<div class="entry-meta">

									<div class="post-meta">
								    	<?php the_date('jS F Y'); ?>
								    </div>

								</div><!-- .entry-meta -->

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

					<div class="col-lg-4">

						<aside class="blog-sidebar sidebar">

							<nav class="sidebar-menu blog-sidebar-menu sidebar-widget">
								<h3><?php _e( 'About you', 'menziestheme'); ?></h3>
								<?php
								$about_you_id = 4;
								// $about_you_id = wp_get_post_parent_id( $post_ID );
								$args = array(
								    'post_type'      => 'page',
								    //'posts_per_page' => -1,
								    'post_parent'    => $about_you_id,
								    'order'          => 'ASC',
								    'orderby'        => 'menu_order'
								 );


								$parent = new WP_Query( $args );

								if ( $parent->have_posts() ) : ?>

								    <?php while ( $parent->have_posts() ) : $parent->the_post(); ?>

								        <div id="parent-<?php the_ID(); ?>" class="parent-page">

								            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>

								        </div>

								    <?php endwhile; ?>

								<?php endif; wp_reset_query(); ?> 
							</nav>

							<?php get_template_part( 'section-templates/section', 'sidebar-search' ); ?>

							<?php $post_object = get_field('meet_the_team_specialism');

							if( $post_object ): 

								// override $post
								$post = $post_object;
								setup_postdata( $post ); 

								?>
							    <div class="meet-the-team-widget sidebar-widget">

									<a href="/about-us/people/?fwp_related_specialism=<?php echo $post->ID; ?>">

										<i class="fa fa-users" aria-hidden="true"></i><h3 class="inline-heading"><?php _e( 'Meet the ', 'menziestheme'); the_title(); _e( ' team', 'menziestheme'); ?></h3>

									</a>

								</div>

							    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

							<?php endif; ?>

							<div class="sidebar-widget posts-contact">

								<a href="#" class="post-contact" data-toggle="modal" data-target="#post_contact_modal">

									<i class="fa fa-envelope" aria-hidden="true"></i><h3 class="inline-heading"><?php _e( 'Get in touch', 'menziestheme'); ?></h3>

								</a>

								<div class="modal fade" id="post_contact_modal" tabindex="-1" role="dialog" aria-labelledby="post_contact_modalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-body">
								      	<h3><?php _e( 'Get in touch with Menzies', 'menziestheme'); ?></h3>
								        <?php echo do_shortcode('[contact-form-7 id="7943" title="Post contact modal"]'); ?>
								      </div>
								    </div>
								  </div>
								</div>

							</div>

							<?php get_template_part( 'section-templates/section', 'sidebar-featured' ); ?>

							<?php // dynamic_sidebar( 'blog' ); ?>

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