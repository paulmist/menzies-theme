<?php

/**
 * CTA Banner Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'cta-banner-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'cta-banner';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

?>





<a id="<?php echo get_field('custom_id'); ?>"></a>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo get_field('custom_class'); ?>">

    <div class="section-wrapper cta-banner-wrapper co-bg-<?php echo esc_html(get_field('cta_banner_background_colour')); ?> <?php echo 'p-t-' . get_field('padding_top'); ?> <?php echo 'p-b-' . get_field('padding_bottom'); ?>" style="background-color: var(--<?php echo esc_html(get_field('cta_banner_background_colour')); ?>);">

        <div class="cta-banner-container">
            <div class="cta-banner-inner animatable fadeInUp animationDelayone">
                <?php echo '<h3 class="modTitle">' . get_field('cta_banner_title') . '</h3>'; ?>
                <?php echo '<p class="subPara">' . esc_html(get_field('cta_banner_introduction')) . '</p>'; ?>
                <?php if (have_rows('cta_banner_buttons')) : ?>
                    <div>
                        <?php while (have_rows('cta_banner_buttons')) : the_row();
                        $link = get_sub_field('cta_banner_link');
                            if ($link) :
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                                <a class="readon <?php echo esc_html(get_sub_field('button_colour')); ?>" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                            <?php endif; ?>

                            <?php if (get_sub_field('contact_pop')) : ?>
                                <?php $popid = preg_replace('/[^a-zA-Z0-9]/', '-', get_sub_field('contact_pop')); ?>
                                <p class="<?php echo esc_html(get_sub_field('popup_button_colour')); ?> readon toggle" data-target="<?php echo $popid; ?>"><?php echo get_sub_field('contact_pop'); ?></p>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>

        <div class="cta-banner-graphics animatable fadeInUp animationDelayfour">

            <svg id="shape-group-one" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 428.7 458">
                <g class="animatable fadeInUp animationDelayone">
                    <polygon points="258 137.4 195.7 137.4 195.7 75 258 137.4" style="fill:#fcc100; stroke-width:0px;" />
                </g>
                <g class="animatable fadeInUp animationDelaytwo">
                    <path d="m268.1,402.2H47v-221.1l221.1,221.1Zm-219.1-2h214.3L49,186v214.3Z" style="fill:#fcc103; stroke-width:0px;" />
                </g>
                <g class="animatable fadeInUp animationDelaythree">
                    <polygon points="0 318.1 0 0 318.1 0 0 318.1" style="fill:#fff; stroke-width:0px;opacity:.3;" />
                </g>
                <g class="animatable fadeInUp animationDelayfour">
                    <path d="m428.7,458h-166.2l166.2-166.2v166.2Zm-161.4-2h159.4v-159.4l-159.4,159.4Z" style="fill:#fff; stroke-width:0px;" />
                </g>
            </svg>

            <svg id="shape-group-two" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 602.2 401.2">
                <g class="animatable fadeInUp animationDelayone">
                    <polygon points="278.3 66.4 340.7 66.4 340.7 128.7 278.3 66.4" style="fill:#fcc100; stroke-width:0px;" />
                </g>
                <g class="animatable fadeInUp animationDelaytwo">
                    <polygon points="336.5 0 554.2 0 554.2 217.7 336.5 0" style="fill:#da9b00; stroke-width:0px;opacity:.3;" />
                </g>
                <g class="animatable fadeInUp animationDelaythree">
                    <polygon points="602.2 83.1 602.2 401.2 284 401.2 602.2 83.1" style="fill:#da9b00; stroke-width:0px;opacity:.3;" />
                </g>
                <g class="animatable fadeInUp animationDelayfour">
                    <path d="m114.3,397.3L0,283.1h228.5l-114.3,114.3ZM4.8,285.1l109.4,109.4,109.4-109.4H4.8Z" style="fill:#fcc100; stroke-width:0px;" />
                </g>
                <g class="animatable fadeInUp animationDelayfive">
                    <path d="m185.1,400.2v-214.2h214.2l-214.2,214.2Zm2-212.2v207.4l207.4-207.4h-207.4Z" style="fill:#fff; stroke-width:0px;" />
                </g>
            </svg>

        </div>

    </div>





    <?php if (have_rows('cta_banner_buttons')) : ?> <?php while (have_rows('cta_banner_buttons')) : the_row(); ?>
            <?php $popid = preg_replace('/[^a-zA-Z0-9]/', '-', get_sub_field('contact_pop')); ?>

            <div id="<?php echo $popid; ?>" class="popup-box popup-box-sustainability hide">
                <span class="close-screen toggle" data-target="<?php echo $popid; ?>">close</span>
                <div class="popup-wrapper popup-contact-wrapper">
                    <div class="popup-header">
                        <span class="close-button toggle" data-target="<?php echo $popid; ?>">close</span>
                    </div>
                    <div class="popup-body popup-contact-body">
                        <?php $hubspot_form_shortcode = get_sub_field('add_shortcode');
                                                        if ($hubspot_form_shortcode) {
                                                            echo do_shortcode($hubspot_form_shortcode);
                                                        } ?>
                    </div>
                </div>
            </div>
    <?php endwhile;
                                                endif; ?>
</div>