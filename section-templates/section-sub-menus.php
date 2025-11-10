<?php 
// Section template for homepage sub-menus

$container = get_theme_mod( 'understrap_container_type' );

?>

<div class="<?php echo esc_attr( $container ); ?> homegrid-container" id="content">

	<div class="row sub-menu-row">

		<div class="col-sm-6 col-md-3">

			<?php
			if( have_rows('sub_menu_1') ): ?>

				<div class="sub-menu-link-holder sub-menu-1">

					<div class="triangle-bit"></div>

			  		<a class="btn-sub-menu" data-toggle="collapse" href="#collapse_submenu_1" role="button" aria-expanded="false" aria-controls="collapse_submenu_1">
			    	<?php the_field('sub_menu_1_title'); ?>
			  		</a>

			  	</div>

			  	<div class="collapse" id="collapse_submenu_1">

				  	<?php while( have_rows('sub_menu_1') ) : the_row(); ?>

				        <?php 
				        $title = get_sub_field('title');
				        $link = get_sub_field('link');
				        ?>

				        <a class="sub-menu-item" href="<?php echo $link; ?>"><?php echo $title; ?></a>

				    <?php endwhile; ?>
			  	
			    	
			  	</div>

			<?php endif;
			?>

		</div>

		<div class="col-sm-6 col-md-3">

			<?php
			if( have_rows('sub_menu_2') ): ?>

				<div class="sub-menu-link-holder sub-menu-2">

					<div class="triangle-bit"></div>

			  		<a class="btn-sub-menu" data-toggle="collapse" href="#collapse_submenu_2" role="button" aria-expanded="false" aria-controls="collapse_submenu_2">
			    	<?php the_field('sub_menu_2_title'); ?>
			  		</a>

			  	</div>

			  	<div class="collapse" id="collapse_submenu_2">

				  	<?php while( have_rows('sub_menu_2') ) : the_row(); ?>

				        <?php 
				        $title = get_sub_field('title');
				        $link = get_sub_field('link');
				        ?>

				        <a class="sub-menu-item" href="<?php echo $link; ?>"><?php echo $title; ?></a>

				    <?php endwhile; ?>
			  	
			    	
			  	</div>

			<?php endif;
			?>

		</div>

		<div class="col-sm-6 col-md-3">

			<?php
			if( have_rows('sub_menu_3') ): ?>

				<div class="sub-menu-link-holder sub-menu-3">

					<div class="triangle-bit"></div>

			  		<a class="btn-sub-menu" data-toggle="collapse" href="#collapse_submenu_3" role="button" aria-expanded="false" aria-controls="collapse_submenu_3">
			    	<?php the_field('sub_menu_3_title'); ?>
			  		</a>

			  	</div>

			  	<div class="collapse" id="collapse_submenu_3">

				  	<?php while( have_rows('sub_menu_3') ) : the_row(); ?>

				        <?php 
				        $title = get_sub_field('title');
				        $link = get_sub_field('link');
				        ?>

				        <a class="sub-menu-item" href="<?php echo $link; ?>"><?php echo $title; ?></a>

				    <?php endwhile; ?>
			  	
			    	
			  	</div>

			<?php endif;
			?>

		</div>

		<div class="col-sm-6 col-md-3">

			<?php
			if( have_rows('sub_menu_4') ): ?>

				<div class="sub-menu-link-holder sub-menu-4">

					<div class="triangle-bit"></div>

			  		<a class="btn-sub-menu" data-toggle="collapse" href="#collapse_submenu_4" role="button" aria-expanded="false" aria-controls="collapse_submenu_4">
			    	<?php the_field('sub_menu_4_title'); ?>
			  		</a>

			  	</div>

			  	<div class="collapse" id="collapse_submenu_4">

				  	<?php while( have_rows('sub_menu_4') ) : the_row(); ?>

				        <?php 
				        $title = get_sub_field('title');
				        $link = get_sub_field('link');
				        ?>

				        <a class="sub-menu-item" href="<?php echo $link; ?>"><?php echo $title; ?></a>

				    <?php endwhile; ?>
			  	
			    	
			  	</div>

			<?php endif;
			?>

		</div>

	</div>

</div>