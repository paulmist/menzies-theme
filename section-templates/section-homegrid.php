<?php 
// Section template for homepage posts grid (featured items)

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="<?php echo esc_attr( $container ); ?> homegrid-container p-b-medium p-t-medium" id="content">

	<div class="row">

		<div class="col-md-12">

			<h2 class="homegrid-header">Insights</h2>

		</div>

	</div>

	<div id="archive-list-row" class="row archive-list-row grid">

		<div class="col-lg-4 col-md-6 grid-item grid-sizer archive-filter-item">

			<div class="archive-filters insights-page-filters">

				<!-- <h3><?php _e( 'Filter Insights', 'menziestheme'); ?></h3> --> 

				<div class="filter-section">

					

						<nav class="filter-menu insights-filters">
							<?php 
								wp_nav_menu(array(
								  'menu'			=> 'Insights landing page menu',
								  'container'       => '', 
								  'container_id'    => ' ',
								  'menu_class'      => '',			
								  'menu_id'			=> 'insights-nav',
								  'echo'            => true));
							?>	 
						</nav>	

					</div>

					<form id="labnol" action="<?php echo home_url(); ?>" method="get">

								    <div class="speech">
								    	<input type="text" name="s" value="" id="transcript" placeholder="Search.." />
								    	<img onclick="startDictation()" src="//i.imgur.com/cHidSVu.gif" class="search-mic-icon" />
										<input type="submit">
								    </div>

								</form>

				<a class="filter-toggle" data-toggle="collapse" href="#filter-container" role="button" aria-expanded="false" aria-controls="filter-container">
				    <div class="filter-toggle-text"><?php _e( 'Filters', 'menziestheme'); ?></div><i class="fa fa-plus-square" aria-hidden="true"></i>
				</a>

			

			</div>

		</div>

		<?php $news_item_count=1; ?>

		

		<?php
		$custom_query = new WP_Query( array( 
			'post_type' 		=> array(
				'post',
				'events',
			), 
			
			'orderby' 			=> 'date',
			'order'				=> 'DESC',
			'posts_per_page' 	=> 6,
			) 
		); ?>


<div class="facetwp-template p-b-medium">
		<?php while($custom_query->have_posts()) : $custom_query->the_post(); ?>

			<?php 
			if ( get_post_type( get_the_ID() ) == 'post' ) :
				$category = get_the_category();
				$first_category = $category[0]; 
			endif;
			?>

			<div class="insights-tile">

			<article class="homepage-post-item homepage-post-item-<?php echo $news_item_count; ?> homepage-<?php if (get_post_type(get_the_ID()) == 'events') : echo 'events';
																									else : echo $first_category->slug;
																									endif; ?>">

		<div class="meta">

			<?php
			if (get_post_type(get_the_ID()) == 'post') :
				echo sprintf('<a href="%s">%s</a>', get_category_link($first_category), $first_category->name);
			elseif (get_post_type(get_the_ID()) == 'events') : ?>
				<a href="/events/"><?php _e('Events', 'menziestheme'); ?></a>
			<?php elseif (get_post_type(get_the_ID()) == 'page') : ?>
				<a href="/helping-you/"><?php _e('Pages', 'menziestheme'); ?></a>
			<?php endif;
			?>

	
			



		</div>

		<div class="insights-tile-image">
	 <img src="<?php echo get_field('post_results_icon'); ?> " alt=""> 
		</div>

		<div class="insights-tile-text">
		<div class="post-date">
				<?php
				if (get_field('date_of_event')) {
					echo "<div class='d-o-e'>" . "<h6>Event date - " . get_field('date_of_event') . "</h6></div>";
				} else {
					the_date('d-m-Y', '<h6>', '</h6>');
				}
				?>
			</div>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<a href="<?php the_permalink(); ?>" class="link arrow" title="<?php the_title(); ?>">Read more</a>
		</div>




		<?php
		// echo sprintf( '<a href="%s" class="link">%s %s</a>', get_category_link( $first_category ), 'More ', $first_category->name );
		?>



	</article>

			</div>

			<?php $news_item_count++; ?>

		<?php 
		endwhile;
		wp_reset_postdata();
		?>

</div>

	</div>

	<div class="row">

		<div class="col-md-12">

			<a href="/insights/" class="btn insights-more-link">More Insights</a>

		</div>

	</div>

</div>