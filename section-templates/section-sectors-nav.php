<?php
// Section template for sectors list (navigation)

$container = get_theme_mod('understrap_container_type');
?>

<div class="row homepage-links-row sectors-dropdown-container">

	<?php if (have_rows('sector_links', 'option')): ?>

		<?php while (have_rows('sector_links', 'option')) : the_row(); ?>

			<div itemscope="itemscope" itemtype="https://www.schema.org/SiteNavigationElement" class="col-md-3 col-6 homepage-links-item">

				<?php $icon = get_sub_field('icon'); ?>

				<a href="<?php the_sub_field('link'); ?>">
					<?php if (!empty($icon)): ?>
						<img class="homepage-link-icon" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" />
					<?php endif; ?>
					<span><?php the_sub_field('title'); ?></span>
				</a>
			</div>

		<?php endwhile; ?>

	<?php endif; ?>

</div>