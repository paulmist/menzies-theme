<?php 

function my_searchwp_live_search_configs( $configs ) {

	$configs['default'] = array(
		'engine' => 'default',                  // search engine to use (if SearchWP is available)
		'input' => array(
			'delay'     => 300,                 // wait 500ms before triggering a search
			'min_chars' => 2,                   // wait for at least 3 characters before triggering a search
		),
		'results' => array(
			'position'  => 'bottom',            // where to position the results (bottom|top)
			'width'     => 'css',               // whether the width should automatically match the input (auto|css)
			'offset'    => array(
				'x' => 0,                   	// x offset (in pixels)
				'y' => 1                   		// y offset (in pixels)
			),
		),
		'spinner' => array(                     // powered by http://fgnass.github.io/spin.js/
			'lines'         => 8,               // number of lines in the spinner
			'length'        => 6,               // length of each line
			'width'         => 5,               // line thickness
			'radius'        => 6,               // radius of inner circle
			'corners'       => 1,               // corner roundness (0..1)
			'rotate'        => 0,               // rotation offset
			'direction'     => 1,               // 1: clockwise, -1: counterclockwise
			'color'         => '#58584e',       // #rgb or #rrggbb or array of colors
			'speed'         => 1,               // rounds per second
			'trail'         => 60,              // afterglow percentage
			'shadow'        => false,           // whether to render a shadow
			'hwaccel'       => false,           // whether to use hardware acceleration
			'className'     => 'spinner',       // CSS class assigned to spinner
			'zIndex'        => 2000000000,      // z-index of spinner
			'top'           => '15%',           // top position (relative to parent)
			'left'          => '50%',           // left position (relative to parent)
		),
	);
	
	return $configs;
}
add_filter( 'searchwp_live_search_configs', 'my_searchwp_live_search_configs' );