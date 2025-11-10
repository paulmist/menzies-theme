<?php 

// Events CPT

function custom_post_events() {
  $labels = array(
    'name'               => _x( 'Events', 'post type general name' ),
    'singular_name'      => _x( 'Event', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'events' ),
    'add_new_item'       => __( 'Add New event' ),
    'edit_item'          => __( 'Edit event' ),
    'new_item'           => __( 'New event' ),
    'all_items'          => __( 'All events' ),
    'view_item'          => __( 'View events' ),
    'search_items'       => __( 'Search events' ),
    'not_found'          => __( 'No events found' ),
    'not_found_in_trash' => __( 'No events found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Events'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => '',
    'public'        => true,
    'menu_position' => 7,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
    'show_in_rest'  => true,
    'taxonomies'    => array( 'category' ),
  );
  register_post_type( 'events', $args ); 
}
add_action( 'init', 'custom_post_events' );

//events Interaction Messages

function my_events_messages( $messages ) {
  global $post, $post_ID;
  $messages['events'] = array(
    0 => '', 
    1 => sprintf( __('event updated. <a href="%s">View event</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('event updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('event restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('event published. <a href="%s">View events</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('events saved.'),
    8 => sprintf( __('event submitted. <a target="_blank" href="%s">Preview events</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('event scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview product</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('event draft updated. <a target="_blank" href="%s">Preview events</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_events_messages' );