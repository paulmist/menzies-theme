<?php

/**
 * Content Tabs Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'content-tabs-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'content-tabs';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>
<script>
    jQuery(document).ready(function($) {
      $('.tab-content:first-child').show();
      $('.tab-nav-link').bind('click', function(e) {
        $this = $(this);
        $tabs = $this.parent().parent().next();
        $target = $($this.data("target"));
        $this.siblings().removeClass('current');
        $target.siblings().css("display", "none");
        $this.addClass('current');
        $target.fadeIn("fast");
      });
      $('.tab-nav-link:first-child').trigger('click');
    });
  </script>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

	<div class="section-wrapper tabs <?php echo 'p-t-' . get_field('padding_top'); ?> <?php echo 'p-b-' . get_field('padding_bottom'); ?>">

		<div class="tabs-container">
            <div class="tabs">
                <?php if( have_rows('tabs') ): ?>
                    <div class="tabs-nav">
                        <?php while( have_rows('tabs') ): the_row();?>
                            <?php
                                $title = get_sub_field('content_tabs_title');
                                $title = preg_replace('/[^a-z0-9 ]/', '', $title);
                                $title = strtolower($title); 
                            ?>
                            <div><a href="#" class="tab-nav-link" data-target="#<?php echo $title; ?>"><?php echo $title; ?></a></div>
                        <?php endwhile; ?>
                    </div>   
                <?php endif; ?>

                <?php if( have_rows('tabs') ): ?>
                    <div class="tabs-nav">
                        <?php while( have_rows('tabs') ): the_row();?>
                            <?php
                                $title = get_sub_field('content_tabs_title');
                                $title = preg_replace('/[^a-z0-9 ]/', '', $title);
                                $title = strtolower($title); 
                            ?>
                            <div class="tab-content" data-target="#<?php echo $title; ?>">
                                
                                <div class="tab-inner">
                                    <?php the_sub_field('body_content'); ?>
                                </div>
                        
                            </div>

                        <?php endwhile; ?>
                    </div>   
                <?php endif; ?>
            
		</div>

    </div>
</div>
