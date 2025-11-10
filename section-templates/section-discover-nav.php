<?php
// Section template for Discover menu list (navigation)

$container = get_theme_mod( 'understrap_container_type' );
?>




<?php if (have_rows('discover_links', 'option')) : ?>
	
	<?php $service_parent_count = 1; ?>

	<div class="menu-wrapper two-step-menu-wrap">


		<?php while (have_rows('discover_links', 'option')) : the_row(); ?>

			<ul class="rwd-menu">
				<li>
					<a title="<?php the_sub_field('parent_item_title'); ?>" class=""><?php the_sub_field('parent_item_title'); ?></a>


					<?php if (have_rows('child_items', 'option')) : ?>

						<?php $service_child_count = 1; ?>

						<ul class="rwd-submenu sub-menu">

							<?php while (have_rows('child_items', 'option')) : the_row(); ?>

								<li itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" id="menu-item-<?php echo $service_parent_count . '-' . $service_child_count; ?>" class="menu-item menu-item-<?php echo $service_parent_count . '-' . $service_child_count; ?> nav-item service-child-item">
									<a title="<?php the_sub_field('title'); ?>" href="<?php the_sub_field('link'); ?>" class=""> <?php the_sub_field('title'); ?> </a>
								</li>


								<?php $service_child_count++; ?>

							<?php endwhile; ?>

						</ul>

					<?php endif; ?>

				</li>
			</ul>

		<?php endwhile; ?>



	</div>

<?php endif; ?>