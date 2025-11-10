<?php
/**
 * ACF Guterberg blocks
 *
 * Needs ACF Pro 5.8.x or above to work. Developed using 5.8.0-beta3
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Register block
add_action('acf/init', 'my_acf_init');
function my_acf_init() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {
		
		// register testimonial block
		acf_register_block(array(
			'name'				=> 'testimonial',
			'title'				=> __('Quote (CPT)'),
			'description'		=> __('A quote / testimonial block. Custom block for Menzies LLP'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'testimonial', 'quote' ),
		));

		// register testimonial block
		acf_register_block(array(
			'name'				=> 'testimonialcustom',
			'title'				=> __('Quote (Custom)'),
			'description'		=> __('A quote / testimonial block. Custom block for Menzies LLP'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'testimonial', 'quote' ),
		));

		// register Related specialisms block
		acf_register_block(array(
			'name'				=> 'specialisms',
			'title'				=> __('Related specialisms'),
			'description'		=> __('Related specialisms. A custom block for Menzies LLP.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'star-filled',
			'keywords'			=> array( 'related', 'specialisms' ),
		));

		// register Related sectors block
		acf_register_block(array(
			'name'				=> 'sectors',
			'title'				=> __('Related sectors'),
			'description'		=> __('Related sectors. A custom block for Menzies LLP.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'star-filled',
			'keywords'			=> array( 'related', 'sectors' ),
		));

		// register Sector head block
		acf_register_block(array(
			'name'				=> 'sectorhead',
			'title'				=> __('Sector head'),
			'description'		=> __('Sector head. A custom block for Menzies LLP.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'star-filled',
			'keywords'			=> array( 'head', 'sectors' ),
		));

		// register People block
		acf_register_block(array(
			'name'				=> 'people',
			'title'				=> __('People'),
			'description'		=> __('People block. A custom block for Menzies LLP.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'star-filled',
			'keywords'			=> array( 'people', 'profile' ),
		));

		// register modal block
		acf_register_block(array(
			'name'				=> 'modal',
			'title'				=> __('Modal'),
			'description'		=> __('Bootstrap 4 modal block. A custom block for Menzies LLP.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'star-filled',
			'keywords'			=> array( 'modal', 'popup' ),
		));

		// register modal block
		acf_register_block(array(
			'name'				=> 'collapse',
			'title'				=> __('Collapse'),
			'description'		=> __('Bootstrap 4 Collapse block. A custom block for Menzies LLP.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'star-filled',
			'keywords'			=> array( 'accordion', 'collapse' ),
		));

		// register related block
		acf_register_block(array(
			'name'				=> 'related',
			'title'				=> __('Related'),
			'description'		=> __('related content block. A custom block for Menzies LLP.'),
			'render_callback'	=> 'my_acf_block_render_callback',
			'category'			=> 'layout',
			'icon'				=> 'star-filled',
			'keywords'			=> array( 'related', 'content' ),
		));

		// register event CF7 block - currently disabled, don't think we actually need this..
		// acf_register_block(array(
		// 	'name'				=> 'eventcf7',
		// 	'title'				=> __('Event Registration'),
		// 	'description'		=> __('Event Registration. A custom block for Menzies LLP.'),
		// 	'render_callback'	=> 'my_acf_block_render_callback',
		// 	'category'			=> 'layout',
		// 	'icon'				=> 'star-filled',
		// 	'keywords'			=> array( 'event', 'email' ),
		// ));

	}
}

// Render block
function my_acf_block_render_callback( $block ) {
	
	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);
	
	// include a template part from within the "template-parts/block" folder
	if( file_exists( get_theme_file_path("/block-templates/content-{$slug}.php") ) ) {
		include( get_theme_file_path("/block-templates/content-{$slug}.php") );
	}
}


