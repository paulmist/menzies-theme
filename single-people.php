<?php

/**
 * The template for displaying all single people.
 *
 * @package understrap
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod('understrap_container_type');
?>

<?php while (have_posts()) : the_post(); ?>

	<?php
	$person_image = get_field('big_image');
	$related_office = get_field('related_office');
	?>

	<main class="site-main main-people-page" id="main">
		<div class="topic-page-wrapper">
			<article class="fadeInDown animationDelayone animatable">
				<div class="author-details-row p-b-medium">
					<div class="author-details-inner">
						<?php if (!empty($person_image)) : ?>
							<div class="author__image">
								<?php
								$url = $person_image['url'];
								$title = $person_image['title'];
								$alt = $person_image['alt'];
								$size = 'people-big-cropped';
								$thumb = $person_image['sizes'][$size];
								?>
								<img class="author__img" src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>" />
							</div>
						<?php endif; ?>

						<div class="author__details">
							<h4 class="author__job-title subTitle yellow"><?php the_field('position'); ?></h4>
							<h1 class="entry-title">
								<?php the_title(); ?>
								<?php if (get_field('certificates')) : ?>
									- <?php the_field('certificates'); ?>
								<?php endif; ?>
							</h1>

							<div class="author__details__links">
								<?php if ($related_office) :
									$office_title = get_the_title($related_office->ID);
									$office_link = get_permalink($related_office->ID);
								?>
									<p>
										<a class="location" href="<?php echo esc_url($office_link); ?>"><?php echo esc_html($office_title); ?></a>
										<a class="email person-contact-item toggle" data-target="contact_popup" href="#">Email me</a>

										<?php if (get_field('phone')) : ?>
											<a class="only-mobile telephone person-contact-item" href="tel:<?php the_field('phone'); ?>">Call me</a>
										<?php endif; ?>
										<?php if (get_field('linkedin')) : ?>
											<a class="only-mobile linkedin person-contact-item" href="<?php the_field('linkedin'); ?>" target="_blank">LinkedIn</a>
										<?php endif; ?>
									</p>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

				<h2><?php _e('About', 'menziestheme'); ?></h2>
				<?php the_content(); ?>

				<?php if (get_field('personal')) : ?>
					<h3><?php _e('Personal', 'menziestheme'); ?></h3>
					<?php the_field('personal'); ?>
				<?php endif; ?>

				<p><a href="https://www.menzies.co.uk/about-us/people/" class="readon solid blue">Back to people</a></p>
			</article>

			<?php if ($related_office) : ?>
				<aside class="topic-page-sidebar fadeInDown animationDelayone animatable">
					<div class="p-b-small">
						<h2>Get in touch</h2>
					</div>

					<div class="side-panel-wrapper">
						<div class="side-panel address">
							<h3><?php _e('Location', 'menziestheme'); ?></h3>
							<p><a href="<?php echo esc_url($office_link); ?>"><?php the_field('office_address', $related_office->ID); ?></a></p>
						</div>

						<div class="side-panel telephone">
							<?php if (get_field('email') || get_field('phone') || get_field('mobile')) : ?>
								<h3><?php _e('Contact me', 'menziestheme'); ?></h3>
								<?php if (get_field('phone')) : ?>
									<p><a href="tel:<?php the_field('phone'); ?>" class="person-profile-text-link">DD: <?php the_field('phone'); ?></a></p>
								<?php endif; ?>
								<?php if (get_field('mobile')) : ?>
									<p><a href="tel:<?php the_field('mobile'); ?>" class="person-profile-text-link">Mobile: <?php the_field('mobile'); ?></a></p>
								<?php endif; ?>
								<?php if (get_field('linkedin')) : ?>
									<a href="<?php the_field('linkedin'); ?>" class="linkedin" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
								<?php endif; ?>
							<?php endif; ?>
						</div>

						<?php
						$post_objects = get_field('related_specialisms');
						if ($post_objects) :
						?>
							<div class="side-panel specialisms">
								<h3><?php _e('Specialisms', 'menziestheme'); ?></h3>
								<p>
									<?php
									$links = array();
									foreach ($post_objects as $specialism) :
										$link = add_query_arg('_sfm_related_specialisms', $specialism->ID, 'https://www.menzies.co.uk/about-us/people/');
										$links[] = '<span><a href="' . esc_url($link) . '">' . esc_html($specialism->post_title) . '</a></span>';
									endforeach;
									echo implode($links);
									?>
								</p>
							</div>
						<?php endif; ?>

						<?php
						$post_objects = get_field('related_sectors');
						if ($post_objects) :
						?>
							<div class="side-panel sector">
								<h3><?php _e('Sectors', 'menziestheme'); ?></h3>
								<p>
									<?php
									$links = array();
									foreach ($post_objects as $sector) :
										if ($sector instanceof WP_Post) {
											$link = add_query_arg('_sfm_related_sectors', $sector->ID, 'https://www.menzies.co.uk/about-us/people/');
											$links[] = '<span><a href="' . esc_url($link) . '">' . esc_html(get_the_title($sector->ID)) . '</a></span>';
										}
									endforeach;
									echo implode($links);
									?>
								</p>
							</div>
						<?php endif; ?>

						<?php
						$post_objects = get_field('related_award');
						if ($post_objects) :
						?>
							<div class="side-panel awards">
								<h3><?php _e('Awards', 'menziestheme'); ?></h3>
								<?php foreach ($post_objects as $award) : ?>
									<a href="<?php echo get_permalink($award->ID); ?>"><?php echo get_the_title($award->ID); ?></a>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				</aside>
			<?php endif; ?>
		</div>

		<div class="wrapper-links">
			<?php get_template_part('section-templates/section', 'related-byauthor'); ?>
		</div>
	</main>

<?php endwhile; ?>







    <div id="contact_popup" class="popup-box popup-box-sustainability hide">

        <span class="close-screen toggle" data-target="contact_popup">close</span>
        <div class="popup-wrapper">
            <div class="popup-header">
                <span class="close-button toggle" data-target="contact_popup">close</span>
            </div>
            <div class="popup-body flex_tiles_popup_body">
                <?php
                $subtitle = get_field('popup_subtitle', 'option');
                $title = get_field('popup_title', 'option');
                $form = get_field('popup_contact_form', 'option');
                ?>
                <?php if ($subtitle) : ?><h4 class="subTitle"><?php echo esc_html($subtitle); ?></h4> <?php endif; ?>
                <?php if ($title) : ?><h2 class="modTitle"><?php echo esc_html($title); ?></h2><?php endif; ?>
                <?php if ($form) : ?><?php echo ($form); ?><?php endif; ?>
            </div>
        </div>
    </div>








<?php get_footer(); ?>