<?php

/**
 * Understrap functions and definitions
 *
 * @package understrap
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker.
	// '/woocommerce.php',                  // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/acf-blocks.php',                      // Loads ACF Gutenberg blocks.
	'/ajax-search.php',                     // Config for AJAX search plugin.
	'/dev.php',                             // Miscellaneous functions and scripts.
	'/custom_people.php',                    // Add custom post type
	'/custom_sectors.php',                    // Add custom post type
	'/custom_specialisms.php',                // Add custom post type
	'/custom_offices.php',                    // Add custom post type
	'/custom_psectors.php',                    // Add custom post type
	'/custom_quiz.php',                        // Add custom post type
	'/custom_quotes.php',                    // Add custom post type
	'/custom_awards.php',                    // Add custom post type
	'/custom_events.php',                    // Add custom post type
	'/custom_partners.php',                    // Add custom post type
	'/custom_sliders.php',                    // Add custom post type
	'/custom_sub_banners.php',                // Add custom post type
	'/custom_jobs.php',                        // Add custom post type
	'/custom_employee_case_studies.php',    // Add custom post type
	'/loadmore.php',                        // AJAX load more
	'/schema.php',                            // Schema.org json-ld
	// '/plugin-control.php',				    // plugin control system

);

foreach ($understrap_includes as $file) {
	$filepath = locate_template('inc' . $file);
	if (!$filepath) {
		trigger_error(sprintf('Error locating /inc%s for inclusion', $file), E_USER_ERROR);
	}
	require_once $filepath;
}

function Careers_Main($params = array())
{
	extract(shortcode_atts(array(
		'file' => 'section-careers-main-tab-selector'
	), $params));

	ob_start();
	include(get_theme_root() . '/' . get_template() . "/section-templates/$file.php");

	return ob_get_clean();
}

function Careers_Sub($params = array())
{
	extract(shortcode_atts(array(
		'file' => 'section-careers-sub-section-selector'
	), $params));

	ob_start();
	include(get_theme_root() . '/' . get_template() . "/section-templates/$file.php");

	return ob_get_clean();
}

function Careers_Second_Sub($params = array())
{
	extract(shortcode_atts(array(
		'file' => 'section-careers-second-sub-section-info'
	), $params));

	ob_start();
	include(get_theme_root() . '/' . get_template() . "/section-templates/$file.php");

	return ob_get_clean();
}

add_shortcode('career-main-section', 'Careers_Main');
add_shortcode('career-sub-section', 'Careers_Sub');
add_shortcode('career-second-sub-section', 'Careers_Second_Sub');

add_action('acf/init', 'career_tab_main_init_block_types');
function career_tab_main_init_block_types()
{

	// Check function exists.
	if (function_exists('acf_register_block_type')) {

		// register a testimonial block.
		acf_register_block_type(array(
			'name'              => 'careertabmain',
			'title'             => __('Career Tab Main'),
			'description'       => __('Tabbed Career Main Content'),
			'render_template'   => 'section-templates/section-careers-main-tab-selector.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
			
		));
		acf_register_block_type(array(
			'name'              => 'careertabsub',
			'title'             => __('Career Tab Sub'),
			'description'       => __('Tabbed Career Sub Content'),
			'render_template'   => 'section-templates/section-careers-sub-section-selector.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
			
		));
		acf_register_block_type(array(
			'name'              => 'careertabsecond',
			'title'             => __('Career Tab Secondary'),
			'description'       => __('Tabbed Career Secondary Content'),
			'render_template'   => 'section-templates/section-careers-second-sub-section-info.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
			
		));
		acf_register_block_type(array(
			'name'              => 'accorionblock',
			'title'             => __('Accordion Block'),
			'description'       => __('Acoordion Block with drop down repeater fields'),
			'render_template'   => 'section-templates/accordion.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
		   
		));
		acf_register_block_type(array(
			'name'              => 'carousel',
			'title'             => __('Carousel'),
			'description'       => __('A carousel to display different features'),
			'render_template'   => 'section-templates/section-carousel.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
			
		));
		acf_register_block_type(array(
			'name'              => 'home-header',
			'title'             => __('Home Header'),
			'description'       => __('A content block to display the home header'),
			'render_template'   => 'section-templates/home-header.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
		   
		));
		acf_register_block_type(array(
			'name'              => 'carousel-logos',
			'title'             => __('Logo Carousel'),
			'description'       => __('A content block to display logos that are clickable'),
			'render_template'   => 'section-templates/logo-carousel.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
			
		));
		acf_register_block_type(array(
			'name'              => 'carousel-insights',
			'title'             => __('Carousel Insights'),
			'description'       => __('A carousel to display insights'),
			'render_template'   => 'section-templates/section-carousel-insights.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
			
		));
		acf_register_block_type(array(
			'name'              => 'text-split',
			'title'             => __('Text Split'),
			'description'       => __('A content block for displaying a simple text split'),
			'render_template'   => 'section-templates/text-split.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
			
		));
		acf_register_block_type(array(
			'name'              => 'generic-split',
			'title'             => __('Generic Split'),
			'description'       => __('A content block for displaying a simple Generic split'),
			'render_template'   => 'section-templates/generic-split.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
			
		));
		acf_register_block_type(array(
			'name'              => 'flex-tiles',
			'title'             => __('Flexible Tiles'),
			'description'       => __('A content block for displaying a grid of tiles'),
			'render_template'   => 'section-templates/flex-tiles.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
		   
		));
		acf_register_block_type(array(
			'name'              => 'call-out',
			'title'             => __('Call Out'),
			'description'       => __('A content block for displaying a call out or call to action'),
			'render_template'   => 'section-templates/call-out.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
			
		));
		acf_register_block_type(array(
			'name'              => 'list-buttons',
			'title'             => __('List Buttons'),
			'description'       => __('A compact block to display for important resources'),
			'render_template'   => 'section-templates/section-list-buttons.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
			
		));
		acf_register_block_type(array(
			'name'              => 'employee-testimonials',
			'title'             => __('Employee Testimonials'),
			'description'       => __('A content block to display employee testimonials'),
			'render_template'   => 'section-templates/employee-testimonials.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
		  
		));
		acf_register_block_type(array(
			'name'              => 'popup-button',
			'title'             => __('Popup Button'),
			'description'       => __('A button which opens up in to a popup'),
			'render_template'   => 'section-templates/popup-button.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
		  
		));
		acf_register_block_type(array(
			'name'              => 'content-tabs',
			'title'             => __('Content Tabs'),
			'description'       => __('A content block to display any type of content in tabs'),
			'render_template'   => 'section-templates/content-tabs.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
		   
		));
		acf_register_block_type(array(
			'name'              => 'call-to-action-banner',
			'title'             => __('CTA Banner'),
			'description'       => __('A content block to display any type of content in a cta banner'),
			'render_template'   => 'section-templates/cta-banner.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
			
		));

		acf_register_block_type(array(
			'name'              => 'anchor-section',
			'title'             => __('Anchor Section'),
			'description'       => __('A section to anchor down to different sections of the page'),
			'render_template'   => 'section-templates/anchor-section.php',
			'category'          => 'layout',
			'icon'              => 'admin-comments',
			
		));
		acf_register_block_type(array(
			'name'              => 'page-explore',
			'title'             => __('Page Explore'),
			'description'       => __('A block for displaying links to additional pages'),
			'render_template'   => 'section-templates/page-explore.php',
			'category'          => 'formatting',
		));
		acf_register_block_type(array(
			'name'              => 'related-page-split',
			'title'             => __('Related Page Split'),
			'description'       => __('A split section for related page objects'),
			'render_template'   => 'section-templates/related-page-split.php',
			'category'          => 'formatting',
		));
		acf_register_block_type(array(
			'name'              => 'office-location-popup',
			'title'             => __('Office Location Popup'),
			'description'       => __('A section to display popup maps for office locations'),
			'render_template'   => 'section-templates/office-location-popup.php',
			'category'          => 'formatting',
		));

		acf_register_block_type(array(
			'name'              => 'authors-block',
			'title'             => __('Authors Block'),
			'description'       => __('A block for displaying author details'),
			'render_template'   => 'section-templates/authors-block.php',
			'category'          => 'formatting',
		));

		acf_register_block_type(array(
			'name'              => 'post-intro',
			'title'             => __('Introduction'),
			'description'       => __('A block for introducing posts'),
			'render_template'   => 'section-templates/post-intro.php',
			'category'          => 'custom-post-blocks',
		));

		acf_register_block_type(array(
			'name'              => 'post_title',
			'title'             => __('Title'),
			'description'       => __('A block for custom titles'),
			'render_template'   => 'section-templates/post-title.php',
			'category'          => 'custom-post-blocks',
		));

		acf_register_block_type(array(
			'name'              => 'post-table',
			'title'             => __('Table'),
			'description'       => __('A block for displaying tables with custom styling'),
			'render_template'   => 'section-templates/post-table.php',
			'category'          => 'custom-post-blocks',
		));

		acf_register_block_type(array(
			'name'              => 'awards-scroller',
			'title'             => __('Awards Carousel'),
			'description'       => __('A carousel for displaying awards'),
			'render_template'   => 'section-templates/awards-scroller.php',
			'category'          => 'formatting',
		));

		acf_register_block_type(array(
			'name'              => 'featured-insights-carousel',
			'title'             => __('Featured Insights Carousel'),
			'description'       => __('A carousel for displaying featured insights'),
			'render_template'   => 'section-templates/featured-insights-carousel.php',
			'category'          => 'formatting',
		));

		acf_register_block_type(array(
			'name'              => 'sectors-call-out',
			'title'             => __('Sectors Call Out'),
			'description'       => __('A call to action bar for Sector pages'),
			'render_template'   => 'section-templates/sectors-call-out.php',
			'category'          => 'formatting',
		));

		 acf_register_block_type(array(
			'name'              => 'buttons',
			'title'             => __('Buttons'),
			'description'       => __('A block to render styled buttons'),
			'render_template'   => 'section-templates/buttons.php',
			'category'          => 'formatting',
		));

				 acf_register_block_type(array(
			'name'              => 'flexible-content',
			'title'             => __('Flexible Content'),
			'description'       => __('A block to add flexible content'),
			'render_template'   => 'section-templates/flexible-content.php',
			'category'          => 'formatting',
		));
	}
}

function my_custom_block_categories( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'custom-post-blocks',
				'title' => __( 'Custom Post Blocks', 'my-text-domain' ),
			),
		)
	);
}
add_filter( 'block_categories_all', 'my_custom_block_categories', 10, 2 );

add_theme_support('editor-color-palette', array(
	array(
		'name'  => esc_attr__('Menzies Yellow', 'themeLangDomain'),
		'slug'  => 'menzies-yellow',
		'color' => '#ffc500',
	),
	array(
		'name'  => esc_attr__('Menzies Grey', 'themeLangDomain'),
		'slug'  => 'menzies-grey',
		'color' => '#58584e',
	),
	array(
		'name'  => esc_attr__('Menzies Light Grey', 'themeLangDomain'),
		'slug'  => 'menzies-light-grey',
		'color' => '#a3a297',
	),
	array(
		'name'  => esc_attr__('Beige', 'themeLangDomain'),
		'slug'  => 'menzies-biege',
		'color' => '#e5e3d2',
	),
	array(
		'name'  => esc_attr__('Green', 'themeLangDomain'),
		'slug'  => 'menzies-green',
		'color' => '#87b50f',
	),
	array(
		'name'  => esc_attr__('Blue', 'themeLangDomain'),
		'slug'  => 'menzies-blue',
		'color' => '#1395dc',
	),
	array(
		'name'  => esc_attr__('Pink', 'themeLangDomain'),
		'slug'  => 'menzies-pink',
		'color' => '#dc0a74',
	),
));

register_sidebar(array(
	'name'          => esc_html__('Quick Links', 'dolia'),
	'id'            => 'quick-links',
	'class'         => 'quick-links',
	'description'   => esc_html__('Add widgets here.', 'dolia'),
	'before_widget' => '<section id="quick-links" class="quick-links">',
	'after_widget'  => '</section>',
	'before_title'  => '<h2 class="widget-title">',
	'after_title'   => '</h2>',
));

// Register a custom sidebar
function custom_theme_widgets_init()
{
	register_sidebar(array(
		'name'          => __('Footer Widget 4', 'text_domain'),
		'id'            => 'footer_4',
		'description'   => __('Widgets in this area will be shown in the fourth column of the footer.', 'text_domain'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	));
}
add_action('widgets_init', 'custom_theme_widgets_init');


function custom_read_more_shortcode($atts, $content = null)
{
	$atts = shortcode_atts(array(
		'label' => 'Read more',
	), $atts);

	return '<div class="read-more"><button class="read-more-label readon grey solid">' . esc_html($atts['label']) . '</button><div class="read-more-content">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('readmore', 'custom_read_more_shortcode');

function custom_tabs_shortcode($atts, $content = null)
{
	extract(shortcode_atts(array(
		'title' => 'Tab Title',
		'default' => 'false',
	), $atts));

	$is_default = ($default === 'true') ? 'default-open' : '';

	ob_start();
?>
	<div class="custom-tabs <?php echo $is_default; ?>">
		<button class="open-tab <?php echo $is_default; ?>"><?php echo $title; ?></button>
		<div class="tab-content" style="display: <?php echo ($is_default === 'default-open') ? 'block' : 'none'; ?>"><?php echo do_shortcode($content); ?></div>
	</div>
<?php
	return ob_get_clean();
}
add_shortcode('tab', 'custom_tabs_shortcode');

add_image_size('custom_people_size', 600, 600, true);


function custom_post_types_in_main_query($query)
{
	if (!is_admin() && $query->is_main_query()) {
		if (is_home() || is_archive()) {
			$query->set('post_type', array('post', 'project', 'people'));
		}
	}
}
add_action('pre_get_posts', 'custom_post_types_in_main_query');

function custom_query_vars_filter($vars) {

	$vars[] = '_sft_category';
	$vars[] = '_sft_post_types';
	return $vars;
}
add_filter('query_vars', 'custom_query_vars_filter');


function filter_by_custom_categories_and_post_types($query) {
	if (!is_admin() && $query->is_main_query()) {
	   
		if (get_query_var('_sft_category')) {
			$category = get_query_var('_sft_category');
	  
			$query->set('category_name', $category); 
		}
		
  
		if (get_query_var('_sft_post_types')) {
			$post_type = get_query_var('_sft_post_types');
			$query->set('post_type', $post_type);
		}
	}
}

function get_read_time($post_id = null) {
	$post_id = $post_id ?: get_the_ID();
	$content = get_post_field('post_content', $post_id);
	$acf_fields = ['text_split_title', 'text_split_introduction'];
	foreach ($acf_fields as $field) {
		$acf_content = get_field($field, $post_id);
		if ($acf_content) {
			$content .= ' ' . wp_strip_all_tags($acf_content);
		}
	}
	$wysiwyg_content = get_field('content_block', $post_id);
	if ($wysiwyg_content) {
		$wysiwyg_content = strip_shortcodes($wysiwyg_content);
		$wysiwyg_content = wp_strip_all_tags($wysiwyg_content);
		$content .= ' ' . $wysiwyg_content;
	}

	$word_count = str_word_count($content);
	$words_per_minute = 225;
	$minutes = ceil($word_count / $words_per_minute);

	return $minutes . ' min read';
}

if( function_exists('acf_add_options_sub_page') ) {
	acf_add_options_sub_page(array(
		'page_title'  => 'People Options',
		'menu_title'  => 'People Options',
		'parent_slug' => 'edit.php?post_type=people',
	));
}

function is_people_filter_active() {
	$filter_keys = [
		'_sf_s',  
		'_sfm_related_sectors',
		'_sfm_related_specialisms',
		'_sfm_related_office'
	];

	foreach ($filter_keys as $key) {
		if (!empty($_GET[$key])) {
			return true;
		}
	}

	return false;
}

// Replace Yoast Schema
add_action( 'wp', function() {
    if ( is_singular() ) {
        $schema = get_field( 'schema' );

        if ( ! empty( $schema ) ) {

            add_filter( 'wpseo_json_ld_output', '__return_false', 1 );

            add_action( 'wp_head', function() use ( $schema ) {
                echo '<script type="application/ld+json">' . $schema . '</script>';
            }, 99 );
        }
    }
});