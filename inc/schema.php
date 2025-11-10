<?php 
/**
 * Schema.org json-ld
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// reference https://schema.org/
// reference https://css-tricks.com/working-with-schemas-wordpress/

add_action('wp_head', function() {
    $schema = array(
        '@context'  => 'https://schema.org',
	);

// @type - depending on what post type we're looking at

    if ( is_singular( array( 'office' ) ) ) {
    	$schema['@type'] = 'LocalBusiness';
    } elseif ( is_singular( array( 'people' ) ) ) {
    	$schema['@type'] = 'Person';
	} elseif ( is_page_template( 'page-templates/servies-helping-you.php' ) ) {
		$schema['@type'] = 'Service';
	} elseif ( is_singular( 'post' ) ) {
		$schema['@type'] = 'Article';
	} else {
    	// use gloabl options
    	$schema['@type'] = get_field('schema_type', 'options');
    }

// Name & URL
    
    if ( is_singular( array( 'office', 'people', 'post' ) ) ) {
    	$schema['name'] = get_the_title();
	} elseif ( is_page_template( 'page-templates/servies-helping-you.php' ) ) {
		$schema['name'] = get_bloginfo('name') . ' ' . get_the_title();
	} else {
    	// use gloabl options
    	$schema['name'] = get_bloginfo('name');
    }

    if ( is_singular( array( 'office', 'people', 'post' ) ) || is_page_template( 'page-templates/servies-helping-you.php' ) ) {
    	$schema['url'] = get_the_permalink();
	} else {
    	// use gloabl options
    	$schema['url'] = get_home_url();
    }

// Telephone number - check if office type, otherwise use the global options

    if ( is_singular( array( 'office' ) ) ) {
    	$schema['telephone'] = '+44' . get_field('office_phone');
    } elseif ( is_singular( array( 'people' ) ) ) {
    	$schema['telephone'] = get_field('phone');
    } elseif (is_page_template( 'page-templates/servies-helping-you.php' ) || is_singular( 'post' )) {
    	// do nothing
	} else {
    	$schema['telephone'] = '+44' . get_field('company_phone', 'options');
    }

// People things

    if ( is_singular( array( 'people' ) ) ) {
    	$schema['jobTitle'] = get_field('position');
        $schema['knowsAbout'] = array();
        $post_objects = get_field('related_specialisms');
        if( $post_objects ):
        	foreach( $post_objects as $post_object):
        		array_push( $schema['knowsAbout'], get_the_title($post_object->ID) );
    		endforeach;
        endif;
        $post_objects = get_field('related_sectors');
        if( $post_objects ):
        	foreach( $post_objects as $post_object):
        		array_push( $schema['knowsAbout'], get_the_title($post_object->ID) );
    		endforeach;
        endif;
    }

// Service things (helping you)

    if ( is_page_template( 'page-templates/servies-helping-you.php' ) ) {
    	$schema['serviceType'] = get_the_title();
    }
// Article things

    if ( is_singular('post') ) {
    	$schema['author'] = array();
    	$author = array(
    		'@type'           => 'Organization',
            'name'            => get_bloginfo('name'),
        );
        array_push($schema['author'], $author);
        $schema['datePublished'] = get_the_date();
        $schema['headline'] = get_the_title();
        $schema['image'] = get_the_post_thumbnail_url();
        $schema['publisher'] = array();
    	$publisher = array(
    		'@type'           => 'Organization',
            'name'            => get_bloginfo('name'),
            'logo'			  => get_field('company_logo', 'option')
        );
        array_push($schema['publisher'], $publisher);
        $schema['dateModified'] = get_the_modified_date();
        $schema['mainEntityOfPage'] = get_home_url();
    }

// address - check if office type, otherwise use the global options
    if ( is_singular( array( 'office' ) ) ) {
    	$schema['address'] = array();
		$address = array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => get_field('address_street'),
            'postalCode'      => get_field('address_postal'),
            'addressLocality' => get_field('address_locality'),
            'addressRegion'   => get_field('address_region'),
            "addressCountry"  => get_field('address_country')
        );
        array_push($schema['address'], $address);
    } elseif ( is_singular( array( 'people' ) ) || is_page_template( 'page-templates/servies-helping-you.php' ) || is_singular( 'post' ) ) {
    	// do nothing
	} else {
    	$schema['address'] = array();
		$address = array(
            '@type'           => 'PostalAddress',
            'streetAddress'   => get_field('address_street', 'option'),
            'postalCode'      => get_field('address_postal', 'option'),
            'addressLocality' => get_field('address_locality', 'option'),
            'addressRegion'   => get_field('address_region', 'option'),
            "addressCountry"  => get_field('address_country', 'option')
        );
        array_push($schema['address'], $address);
    }

// LOGO

    if ( !is_singular( array( 'office', 'people', 'post' ) ) ) {
	    if (get_field('company_logo', 'option')) {
	        $schema['logo'] = get_field('company_logo', 'option');
	    }
	}

// IMAGE

    if (get_field('company_image', 'option')) {
        $schema['image'] = get_field('company_image', 'option');
    }

// SOCIAL MEDIA

    if (have_rows('social_media', 'option')) {
        $schema['sameAs'] = array();
        while (have_rows('social_media', 'option')) : the_row();
            array_push($schema['sameAs'], get_sub_field('url'));
        endwhile;
    }

// OPENING HOURS - Only for Office CPT

    if ( is_singular( array( 'office' ) ) ) {
	    if ( have_rows('opening_hours' ) ) {
	        $schema['openingHoursSpecification'] = array();
	        while (have_rows('opening_hours')) : the_row();
	            $closed = get_sub_field('closed');
	            $from   = $closed ? '00:00' : get_sub_field('from');
	            $to     = $closed ? '00:00' : get_sub_field('to');
	            $openings = array(
	                '@type'     => 'OpeningHoursSpecification',
	                'dayOfWeek' => get_sub_field('days'),
	                'opens'     => $from,
	                'closes'    => $to
	            );
	            array_push($schema['openingHoursSpecification'], $openings);
	        endwhile;
	        // VACATIONS / HOLIDAYS
	        if (have_rows('special_days')) {
	            while (have_rows('special_days')) : the_row();
	                $closed    = get_sub_field('closed');
	                $date_from = get_sub_field('date_from');
	                $date_to   = get_sub_field('date_to');
	                $time_from = $closed ? '00:00' : get_sub_field('time_from');
	                $time_to   = $closed ? '00:00' : get_sub_field('time_to');
	                $special_days = array(
	                    '@type'        => 'OpeningHoursSpecification',
	                    'validFrom'    => $date_from,
	                    'validThrough' => $date_to,
	                    'opens'        => $time_from,
	                    'closes'       => $time_to
	                );
	                array_push($schema['openingHoursSpecification'], $special_days);
	            endwhile;
	        }
	    }
	}

// CONTACT POINTS

	if ( is_singular( array( 'office' ) ) ) {
		$schema['contactPoint'] = array();
		$contacts = array(
            '@type'       => 'ContactPoint',
            'contactType' => 'customer support',
            'telephone'   => get_field('office_phone')
        );
        array_push($schema['contactPoint'], $contacts);
	} elseif ( is_singular( array( 'people' ) ) ) {
		$schema['contactPoint'] = array();
		$contacts = array(
            '@type'       => 'ContactPoint',
            'contactType' => 'customer support',
            'telephone'   => get_field('phone')
        );
        array_push($schema['contactPoint'], $contacts);
	} elseif ( is_page_template( 'page-templates/servies-helping-you.php' ) || is_singular( 'post' ) ) {
    	// do nothing
	}else {
	    if (get_field('contact', 'options')) {
	        $schema['contactPoint'] = array();
	        while (have_rows('contact', 'options')) : the_row();
	            $contacts = array(
	                '@type'       => 'ContactPoint',
	                'contactType' => get_sub_field('type'),
	                'telephone'   => '+44' . get_sub_field('phone')
	            );
	            if (get_sub_field('option')) {
	                $contacts['contactOption'] = get_sub_field('option');
	            }
	            array_push($schema['contactPoint'], $contacts);
	        endwhile;
	    }
	}

// echo out the JSON-LD	

    echo '<script type="application/ld+json">' . json_encode($schema) . '</script>';

// finish add_action    

});

?>