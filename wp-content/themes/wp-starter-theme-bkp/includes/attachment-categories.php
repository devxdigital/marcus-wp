<?php

/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~



	SUPER WP HEROES

	FILE PURPOSE: ADD CATEGORIES (FOLDERS) WORDPRESS MEDIA FILES
	


   ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */



/*
//	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//	***
//	***		SUPER WP HEROES                                               
//	***		FUNCTION NAME: swph_add_folder_taxonomy
//	***		DESCRIPTION: 
//  ***		CALLED ON: wp media
//  ***
//  ***		TO DO: -
//	***
//	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/


function swph_add_folder_taxonomy() {
    $labels = array(
        'name'              => 'Folders',
        'singular_name'     => 'Folder',
        'search_items'      => 'Search Folders',
        'all_items'         => 'All Folders',
        'parent_item'       => 'Parent Folder',
        'parent_item_colon' => 'Parent Folder:',
        'edit_item'         => 'Edit Folder',
        'update_item'       => 'Update Folder',
        'add_new_item'      => 'Add New Folder',
        'new_item_name'     => 'New Folder Name',
        'menu_name'         => 'Folders',
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => 'true',
        'rewrite' => 'true',
        'show_admin_column' => 'true',
    );
 
    register_taxonomy( 'folder', 'attachment', $args );
}
add_action( 'init', 'swph_add_folder_taxonomy' );

?>