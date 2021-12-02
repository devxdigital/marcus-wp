<?php
function if_tax_category() 
{
	$labels = array(
		'name'                       => _x( 'Categories', 'Taxonomy General Name', 'swph' ),
		'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'swph' ),
		'menu_name'                  => __( 'Categories', 'swph' ),
		'all_items'                  => __( 'All Categories', 'swph' ),
		'parent_item'                => __( 'Parent Category', 'swph' ),
		'parent_item_colon'          => __( 'Parent Category:', 'swph' ),
		'new_item_name'              => __( 'New Category', 'swph' ),
		'add_new_item'               => __( 'Add New Category', 'swph' ),
		'edit_item'                  => __( 'Edit Category', 'swph' ),
		'update_item'                => __( 'Update Category', 'swph' ),
		'view_item'                  => __( 'View Category', 'swph' ),
		'separate_items_with_commas' => __( 'Separate Categories with commas', 'swph' ),
		'add_or_remove_items'        => __( 'Add or remove Category', 'swph' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'swph' ),
		'popular_items'              => __( 'Popular Categories', 'swph' ),
		'search_items'               => __( 'Search Categories', 'swph' ),
		'not_found'                  => __( 'Not Found', 'swph' ),
		'no_terms'                   => __( 'No Categories', 'swph' ),
		'items_list'                 => __( 'Category list', 'swph' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'swph' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
    'show_tagcloud'              => true,
    'rewrite' => array(
      'slug' => 'investments',
      'with_front' => false
    ),
	);
	register_taxonomy( 'investments', array( 'investment' ), $args );
}
add_action( 'init', 'if_tax_category', 0 );

?>