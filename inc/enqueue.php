<?php
/**
 * Understrap enqueue scripts
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'understrap_scripts' ) ) {
	/**
	 * Load theme's JavaScript and CSS sources.
	 */
	function understrap_scripts() {
		// Get the theme data.
		$the_theme     = wp_get_theme();
		$theme_version = $the_theme->get( 'Version' );

		// $css_version = $theme_version . '.' . filemtime( get_template_directory() . '/css/theme.min.css' );
		wp_enqueue_style( 'understrap-styles', get_stylesheet_directory_uri() . '/css/theme.min.css', array(), null );

		// Custom stylesheet 
		wp_enqueue_style( 'custom', get_stylesheet_directory_uri() . '/css/custom.min.css', array(), null );



		wp_enqueue_script( 'jquery' );

		

		$js_version = $theme_version . '.' . filemtime( get_template_directory() . '/js/theme.js' );
		wp_enqueue_script( 'understrap-scripts', get_template_directory_uri() . '/js/theme.js', array(), null, true );
		wp_enqueue_script( 'team-contact-forms', get_template_directory_uri() . '/js/team-contact-forms.js', array('jquery'), null, true );
		wp_enqueue_script( 'dolia', get_template_directory_uri() . '/js/dolia.js', array('jquery'), null, true );
		// wp_enqueue_script( 'popup-feedback', get_template_directory_uri() . '/js/popup-feedback.js', array('jquery'), null, true );

		wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.min.js', array(), $js_version, true );

		wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array(), $js_version, true );

		// jQuery lazy load
		// wp_enqueue_script( 'lazy', get_stylesheet_directory_uri() . '/js/jquery.lazy.min.js', array(), filemtime( get_stylesheet_directory() . '/js/jquery.lazy.min.js' ) );

		// wp_enqueue_script( 'infinite-scroll', get_template_directory_uri() . '/js/infinite-scroll.pkgd.min.js', array(), $js_version, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		// custom scripts
		// wp_enqueue_script( 'jquery.particleground.min', get_stylesheet_directory_uri() . '/js/jquery.particleground.min.js', array() );

		// Fancybox
		// wp_enqueue_style( 'fancybox', get_stylesheet_directory_uri() . '/css/jquery.fancybox.min.css', array(), filemtime( get_stylesheet_directory() . '/css/jquery.fancybox.min.css' ) );
		// wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.min.js' );

		// Menzies specific js
		// wp_enqueue_script( 'menzies', get_template_directory_uri() . '/js/menzies.js' );

	}
} // endif function_exists( 'understrap_scripts' ).

add_action( 'wp_enqueue_scripts', 'understrap_scripts' );


