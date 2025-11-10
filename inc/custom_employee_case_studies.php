<?php 

// employee CPT

function custom_post_employee_case_studies() {
  $labels = array(
    'name'               => _x( 'employee case studies', 'post type general name' ),
    'singular_name'      => _x( 'employee case studies', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'employee case studies' ),
    'add_new_item'       => __( 'Add New employee case studies' ),
    'edit_item'          => __( 'Edit employee case studies' ),
    'new_item'           => __( 'New employee case studies' ),
    'all_items'          => __( 'All employee case studies' ),
    'view_item'          => __( 'View employee case studies' ),
    'search_items'       => __( 'Search employee case studies' ),
    'not_found'          => __( 'No employee case studies found' ),
    'not_found_in_trash' => __( 'No employee case studies found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Employee Case Studies'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => '',
    'public'        => true,
    'menu_position' => 20,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
    'show_in_rest'  => true,
  );
  register_post_type( 'employee-case-studies', $args ); 
}
add_action( 'init', 'custom_post_employee_case_studies' );

//employees Interaction Messages

function my_employee_messages( $messages ) {
  global $post, $post_ID;
  $messages['employee-case-studies'] = array(
    0 => '', 
    1 => sprintf( __('employee updated. <a href="%s">View employee</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('employee updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('employee restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('employee published. <a href="%s">View employees</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('employees saved.'),
    8 => sprintf( __('employee submitted. <a target="_blank" href="%s">Preview employees</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('employee scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview product</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('employee draft updated. <a target="_blank" href="%s">Preview employees</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_employee_messages' );