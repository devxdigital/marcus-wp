<?php

add_action('wp_ajax_nsof_get_icons', 'nsof_get_icon_list');
add_action('wp_head', 'nsof_print_styles');
add_action('wp_footer', 'nsof_print_styles');
add_action('admin_print_styles', 'nsof_tinymce_admin_print_styles' );
add_filter('nsof_fonts_google_webfonts', 'nsof_fonts_google_webfonts_filter');
add_action('wp_ajax_nsof_link_search_posts', 'nsof_search_posts_action');


//---------------------------------------------


/**
 * The ajax handler for getting a list of available icons.
 */
function nsof_get_icon_list(){
	if(empty($_GET['family'])) exit();
	if ( empty( $_REQUEST['_nsof_nonce'] ) || !wp_verify_nonce( $_REQUEST['_nsof_nonce'], 'nsof_action' ) ) return;

	$widget_icon_families = apply_filters('nsof_icon_families', array() );

	header('content-type: application/json');
	echo json_encode( !empty($widget_icon_families[$_GET['family']]) ? $widget_icon_families[$_GET['family']] : array() );
	exit();
}



/**
 * @param $css
 */
function nsof_add_inline_css($css){
	global $nsof_inline_styles;
	if(empty($nsof_inline_styles)) $nsof_inline_styles = '';

	$nsof_inline_styles .= $css;
}

/**
 * Print any inline styles that have been added with nsof_add_inline_css
 */
function nsof_print_styles(){
	global $nsof_inline_styles;
	if(!empty($nsof_inline_styles)) {
		?><style type="text/css"><?php echo($nsof_inline_styles) ?></style><?php
	}

	$nsof_inline_styles = '';
}



function nsof_tinymce_admin_print_styles() {
	wp_enqueue_style( 'editor-buttons' );
}



/**
 * Get all the Google Web Fonts.
 *
 * @return mixed|void
 */
function nsof_fonts_google_webfonts( ) {
	$fonts = include NSOF_PATH.'/includes/misc/fonts.php';
	$fonts = apply_filters( '', $fonts );
	return $fonts;
}

function nsof_is_google_webfont( $font_value ) {
	$google_webfonts = nsof_fonts_google_webfonts();

	$font_family = explode( ':', $font_value );
	$font_family = $font_family[0];

	return isset( $google_webfonts[$font_family] );
}



/**
 * Action to handle searching
 */
function nsof_search_posts_action(){
	if ( empty( $_REQUEST['_nsof_nonce'] ) || !wp_verify_nonce( $_REQUEST['_nsof_nonce'], 'nsof_action' ) ) return;

	header('content-type: application/json');

	// Get all public post types, besides attachments
	$post_types = (array) get_post_types( array(
		'public'   => true
	) );
	unset($post_types['attachment']);


	global $wpdb;
	if( !empty($_GET['query']) ) {
		$query = "AND post_title LIKE '%" . esc_sql( $_GET['query'] ) . "%'";
	}
	else {
		$query = '';
	}

	$post_types = "'" . implode("', '", array_map( 'esc_sql', $post_types ) ) . "'";

	$results = $wpdb->get_results( "
		SELECT ID, post_title, post_type
		FROM {$wpdb->posts}
		WHERE
			post_type IN ( {$post_types} ) AND post_status = 'publish' {$query}
		ORDER BY post_modified DESC
		LIMIT 20
	", ARRAY_A );

	echo json_encode( $results );
	wp_die();
}