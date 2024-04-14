<?php

function my_scripts() {
    wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/assets/css/main.css' );
    wp_enqueue_script('jquery');
    wp_enqueue_script('main', get_stylesheet_directory_uri() . '/assets/js/dist/main.js', array('jquery'), '', true);
    wp_enqueue_style('bootstrap4', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css');
    wp_enqueue_script( 'boot1','https://code.jquery.com/jquery-3.3.1.slim.min.js', array( 'jquery' ),'',true );
    wp_enqueue_script( 'boot2','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js', array( 'jquery' ),'',true );
    wp_enqueue_script( 'boot3','https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array( 'jquery' ),'',true );
}
add_action( 'wp_enqueue_scripts', 'my_scripts' );


//register a new post type called 'faqs' with a custom taxonomy called 'topics' does not need a single and archive
function faqs_post_type() {
  $labels = array(
    'name'               => _x( 'FAQs', 'post type general name' ),
    'singular_name'      => _x( 'FAQ', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'FAQ' ),
    'add_new_item'       => __( 'Add New FAQ' ),
    'edit_item'          => __( 'Edit FAQ' ),
    'new_item'           => __( 'New FAQ' ),
    'all_items'          => __( 'All FAQs' ),
    'view_item'          => __( 'View FAQ' ),
    'search_items'       => __( 'Search FAQs' ),
    'not_found'          => __( 'No FAQs found' ),
    'not_found_in_trash' => __( 'No FAQs found in the Trash' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'FAQs'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our FAQs and FAQ specific data',
    'public'        => true,
    'menu_position' => 5,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    'has_archive'   => false,
    'rewrite'       => array('slug' => 'faqs'),
  );
  register_post_type( 'faqs', $args );
}
add_action( 'init', 'faqs_post_type' );





