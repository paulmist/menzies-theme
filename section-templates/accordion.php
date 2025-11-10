<?php

/**
 * Accordion Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'splits-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'accordion';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo get_field('custom_class'); ?>">

	<div class="section-wrapper sa-container<?php if (get_field('shape_accent')): ?><?php echo '-active';?><?php endif; ?>" data-aos="fade-up" data-aos-duration="700">

		<div class="uk-container p-t-<?php the_field('padding_top'); ?> p-b-<?php the_field('padding_bottom'); ?>">
			<div class="accordion-block-wrapper">
				<div class="ac-block-text" data-aos="fade-up" data-aos-duration="700" data-aos-delay="100">
					<div class="ac-title">
                        <h2 class="modTitle fadeInUp animationDelayone animatable"><?php echo get_field('ac_block_sub_title'); ?></h2>
                    </div>
                    <?php if (get_field('ac_block_introduction')): ?>
                        <div class="ac-intro">
                            <p class="subPara fadeInUp animationDelaytwo animatable"><?php echo get_field('ac_block_introduction'); ?></p>
                        </div>
                    <?php endif; ?>
				</div>
				<div class="ac-block-accordion-container fadeInUp animationDelaythree animatable" data-aos="fade-up" data-aos-duration="700" data-aos-delay="200">
                <div class="acc">
                    <?php if( have_rows('ac_block_accordion') ): while ( have_rows('ac_block_accordion') ) : the_row(); ?>
                        <div class="acccard">
                            <div class="acctitle">
                                <h4><?php echo get_sub_field('ac_block_accordion_title'); ?></h4>
                            </div>
                            <div class="accpanel">
                              <?php echo get_sub_field('ac_block_accordion_text'); ?>
                            </div>
                        </div>
                    <?php endwhile; endif; ?>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>