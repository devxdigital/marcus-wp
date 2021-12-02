<?php

function if_cpt_investment() 
{   
    $labels = array(
      'name'                  => _x( 'Investments', 'Post Type General Name', 'swph' ),
      'singular_name'         => _x( 'Investment', 'Post Type Singular Name', 'swph' ),
      'menu_name'             => __( 'Investments', 'swph' ),
      'name_admin_bar'        => __( 'Investment', 'swph' ),
      'archives'              => __( 'Investment Archives', 'swph' ),
      'attributes'            => __( 'Investment Attributes', 'swph' ),
      'parent_item_colon'     => __( 'Parent Investment:', 'swph' ),
      'all_items'             => __( 'All Investments', 'swph' ),
      'add_new_item'          => __( 'Add New Investment', 'swph' ),
      'add_new'               => __( 'Add New', 'swph' ),
      'new_item'              => __( 'New Investment', 'swph' ),
      'edit_item'             => __( 'Edit Investment', 'swph' ),
      'update_item'           => __( 'Update Investment', 'swph' ),
      'view_item'             => __( 'View Investment', 'swph' ),
      'view_items'            => __( 'View Investments', 'swph' ),
      'search_items'          => __( 'Search Investments', 'swph' ),
      'not_found'             => __( 'Investment not found', 'swph' ),
      'not_found_in_trash'    => __( 'Investment not found in Trash', 'swph' ),
      'featured_image'        => __( 'Featured Image', 'swph' ),
      'set_featured_image'    => __( 'Set featured image', 'swph' ),
      'remove_featured_image' => __( 'Remove featured image', 'swph' ),
      'use_featured_image'    => __( 'Use as featured image', 'swph' ),
      'insert_into_item'      => __( 'Insert into Investment', 'swph' ),
      'uploaded_to_this_item' => __( 'Uploaded to this Investment', 'swph' ),
      'items_list'            => __( 'Investments list', 'swph' ),
      'items_list_navigation' => __( 'Investments list navigation', 'swph' ),
      'filter_items_list'     => __( 'Filter Investments list', 'swph' ),
    );
    
    $args = array(
      'label'                 => __( 'Investment', 'swph' ),
      'description'           => __( 'Available Investments', 'swph' ),
      'labels'                => $labels,
      'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt'),
      'taxonomies'            => array( 'investments'),
      'hierarchical'          => false,
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => true,
      'menu_position'         => 6,
      'menu_icon'             => 'dashicons-admin-post',
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => false,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      //'rewrite'               => true,
      'capability_type'       => 'post',
      'rewrite' => array(
        'slug' => 'investment',
        'with_front' => false
      ),
    );
    register_post_type( 'investment', $args );
}
add_action( 'init', 'if_cpt_investment', 0 );

?>