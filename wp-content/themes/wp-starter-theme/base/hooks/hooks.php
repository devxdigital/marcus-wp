<?php

require_once NS_BASE.'/hooks/functions.php';

// Custom Sidebar Widgets
require_once NS_BASE.'hooks/class-widget-output-filters.php';
Widget_Output_Filters::get_instance();
add_filter( 'widget_output', 'if_bootstrap_widgets', 10, 4 );


//remove emoji script
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
//Remove the WordPress version from RSS feeds
add_filter('the_generator', '__return_false');



//hide admin bar
add_action('init', 'ns_hide_admin_bar');

//register menus
add_action('init', 'ns_register_ns_menus');

//Display custom post types in archive page
//add_filter('pre_get_posts', 'ns_add_types_archive_page');

//format wp title
add_filter( 'wp_title', 'ns_blogname_wp_title', 10, 2 );

//insert the comment box below the comment you want to reply
add_action( 'comment_form_before', 'ns_comments_reply_link');

//display pagination
add_action('ns_show_pagination', 'ns_output_pagination');





//==================== ROOTS =======================================================

//Clean up wp_head()
add_action('init', 'roots_head_cleanup');

//Clean up output of stylesheet <link> tags
//add_filter('style_loader_tag', 'roots_clean_style_tag');

//Add class="thumbnail" to attachment items
add_filter('wp_get_attachment_link', 'roots_attachment_link_class', 10, 1);

//Remove unnecessary dashboard widgets
add_filter('admin_init', 'roots_remove_dashboard_widgets');

//Add Bootstrap thumbnail styling to images with captions
add_filter('img_caption_shortcode', 'roots_caption', 10, 3);

//Don't return the default description in the RSS feed if it hasn't been changed
add_filter('get_bloginfo_rss', 'roots_remove_default_description');

//Add additional classes onto widgets
add_filter('dynamic_sidebar_params', 'roots_widget_first_last_classes');

//Redirects search results from /?s=query to /search/query/, converts %20 to +
add_action('template_redirect', 'roots_nice_search_redirect');

//Fix for get_search_query() returning +'s between search terms
add_filter('get_search_query', 'roots_search_query');

//Fix for empty search queries redirecting to home page
add_filter('request', 'roots_request_filter');

//Allow more tags in TinyMCE including <iframe> and <script>
add_filter('tiny_mce_before_init', 'roots_change_mce_options');