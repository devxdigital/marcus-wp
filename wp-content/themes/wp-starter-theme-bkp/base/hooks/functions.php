<?php


//==================== NS HOOK FUNCTIONS =======================================================

//hide admin bar
function ns_hide_admin_bar() {
    if (nsof_get_option('show_adminbar', 'nsof-theme-options') != '1') {
        add_filter('show_admin_bar', '__return_false');
    }
}


//register header menu
function ns_register_ns_menus(){
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'wp-starter-theme')
    ));
}


//format wp title
function ns_blogname_wp_title( $title, $sep ) {

    global $paged, $page;

    if ( is_feed() )
        return $title;

    // Add the site name.
    $title .= get_bloginfo( 'name' );

    return $title;
}



//Display custom post types in archive page
// function ns_add_types_archive_page( $query ) {

//  if( !is_admin() && (is_archive() || is_tag()) && empty( $query->query_vars['suppress_filters'] ) ) {

//      $query->set( 'post_type', array( 'post', 'test' ));

//      return $query;
//  }
// }



//insert the comment box below the comment you want to reply
function ns_comments_reply_link() {
    if( get_option( 'thread_comments' ) )  {
        wp_enqueue_script( 'comment-reply' );
    }
}


//display pagination
function ns_output_pagination($query = null){
    if ( $query == null ) {
        global $wp_query;

        $query = $wp_query;
    }

    $big = 999999999;
    $output = '';

    $page_links = paginate_links( array(
        'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format'    => '?paged=%#%',
        'type'      => 'array',
        'prev_next' => true,
        'prev_text' => __('<i class="fas fa-angle-left"></i>', 'wp-starter-theme'),
        'next_text' => __('<i class="fas fa-angle-right"></i>', 'wp-starter-theme'),
        'current'   => max( 1, get_query_var('paged') ),
        'total'     => $query->max_num_pages
    ));

    if ( $page_links ) :
        $output .= '<nav aria-label="Articles Navigation">';
        $output .= '    <ul class="pagination justify-content-center">';
        foreach ( $page_links as $key => $page_link ) :
            $raw_link = htmlspecialchars($page_link);
            $raw_link = str_replace( ' current', '', $raw_link);
            $output .= '<li class="page-item'.( strpos( $page_link, 'current' ) !== false ? ' active' : '' ).'">';
            $raw_link = str_replace( 'page-numbers', 'page-link', $raw_link);
            $output .= htmlspecialchars_decode($raw_link);
            $output .= '</li>';
        endforeach;
        $output .= '    </ul>';
        $output .= '</nav>';
    endif;

    if($query->max_num_pages > 1){
        echo $output;
    }
}






// function call_taxonomy_template_from_directory(){
//     $taxonomy_slug = get_query_var('taxonomy');

//     load_template(get_template_directory() . "/templates/taxonomy/taxonomy-$taxonomy_slug.php");

//     exit;
// }
// add_filter('taxonomy_template', 'call_taxonomy_template_from_directory');



// add_filter( 'theme_page_templates', 'baw_theme_page_templates' );
// function baw_theme_page_templates( $pages_templates )
// {
//     $pages_templates['page-unu2.php'] = 'Page unu2';
//     return $pages_templates;
// }



//==================== ROOTS HOOK FUNCTIONS =======================================================


/**
 * Clean up wp_head()
 *
 * Remove unnecessary <link>'s
 * Remove inline CSS used by Recent Comments widget
 * Remove inline CSS used by posts with galleries
 * Remove self-closing tag and change ''s to "'s on rel_canonical()
 */
function roots_head_cleanup(){
    add_filter('show_recent_comments_widget_style','__return_false');
    add_filter('use_default_gallery_style', '__return_null');
}



/**
 * Clean up output of stylesheet <link> tags
 */
function roots_clean_style_tag($input){
    preg_match_all("!<link rel='stylesheet'\s?(id='[^']+')?\s+href='(.*)' type='text/css' media='(.*)' />!", $input, $matches);
    // Only display media if it's print
    $media = $matches[3][0] === 'print' ? ' media="print"' : '';

    return '<link rel="stylesheet" href="' . $matches[2][0] . '"' . $media . '>' . "\n";
}


/**
 * Add class="thumbnail" to attachment items
 */
function roots_attachment_link_class($html){
    $postid = get_the_ID();
    $html = str_replace('<a', '<a class="thumbnail"', $html);

    return $html;
}


/**
 * Remove unnecessary dashboard widgets
 *
 * @link http://www.deluxeblogtips.com/2011/01/remove-dashboard-widgets-in-wordpress.html
 */
function roots_remove_dashboard_widgets(){
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');
    remove_meta_box('dashboard_primary', 'dashboard', 'normal');
    remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
}



/**
 * Add Bootstrap thumbnail styling to images with captions
 * Use <figure> and <figcaption>
 *
 * @link http://justintadlock.com/archives/2011/07/01/captions-in-wordpress
 */
function roots_caption($output, $attr, $content){
    if (is_feed()) {
        return $output;
    }

    $defaults = array(
            'id' => '',
            'align' => 'alignnone',
            'width' => '',
            'caption' => ''
    );

    $attr = shortcode_atts($defaults, $attr);

    // If the width is less than 1 or there is no caption, return the content wrapped between the [caption] tags
    if ($attr['width'] < 1 || empty($attr['caption'])) {
        return $content;
    }

    // Set up the attributes for the caption <figure>
    $attributes = (!empty($attr['id']) ? ' id="' . esc_attr($attr['id']) . '"' : '');
    $attributes .= ' class="thumbnail wp-caption ' . esc_attr($attr['align']) . '"';
    $attributes .= ' style="width: ' . esc_attr($attr['width']) . 'px"';

    $output = '<figure' . $attributes . '>';
    $output .= do_shortcode($content);
    $output .= '<figcaption class="caption wp-caption-text">' . $attr['caption'] . '</figcaption>';
    $output .= '</figure>';

    return $output;
}


/**
 * Don't return the default description in the RSS feed if it hasn't been changed
 */
function roots_remove_default_description($bloginfo){
    $default_tagline = __('Just another WordPress site', 'wp-starter-theme');

    return ($bloginfo === $default_tagline) ? '' : $bloginfo;
}



/**
 * Add additional classes onto widgets
 *
 * @link http://wordpress.org/support/topic/how-to-first-and-last-css-classes-for-sidebar-widgets
 */
function roots_widget_first_last_classes($params){
    global $my_widget_num;

    $this_id = $params[0]['id'];
    $arr_registered_widgets = wp_get_sidebars_widgets();

    if (!$my_widget_num) {
        $my_widget_num = array();
    }

    if (!isset($arr_registered_widgets[$this_id]) || !is_array($arr_registered_widgets[$this_id])) {
        return $params;
    }

    if (isset($my_widget_num[$this_id])) {
        $my_widget_num[$this_id]++;
    } else {
        $my_widget_num[$this_id] = 1;
    }

    $class = 'class="widget-' . $my_widget_num[$this_id] . ' ';

    if ($my_widget_num[$this_id] == 1) {
        $class .= 'widget-first ';
    } elseif ($my_widget_num[$this_id] == count($arr_registered_widgets[$this_id])) {
        $class .= 'widget-last ';
    }

    $params[0]['before_widget'] = preg_replace('/class=\"/', "$class", $params[0]['before_widget'], 1);

    return $params;
}


/**
 * Redirects search results from /?s=query to /search/query/, converts %20 to +
 *
 * @link http://txfx.net/wordpress-plugins/nice-search/
 */
function roots_nice_search_redirect(){
    global $wp_rewrite;
    if (!isset($wp_rewrite) || !is_object($wp_rewrite) || !$wp_rewrite->using_permalinks()) {
        return;
    }
    $search_base = $wp_rewrite->search_base;
    if (is_search() && !is_admin() && apply_filters('roots-nice-search',true) && strpos($_SERVER['REQUEST_URI'], "/{$search_base}/") === false) {
        wp_redirect(home_url("/{$search_base}/" . urlencode(get_query_var('s'))));
        exit();
    }
}


/**
 * Fix for get_search_query() returning +'s between search terms
 */
function roots_search_query($escaped = true){
    $query = apply_filters('roots_search_query', get_query_var('s'));

    if ($escaped) {
        $query = esc_attr($query);
    }

    return urldecode($query);
}


/**
 * Fix for empty search queries redirecting to home page
 *
 * @link http://wordpress.org/support/topic/blank-search-sends-you-to-the-homepage#post-1772565
 * @link http://core.trac.wordpress.org/ticket/11330
 */
function roots_request_filter($query_vars){
    if (isset($_GET['s']) && empty($_GET['s'])) {
        $query_vars['s'] = ' ';
    }

    return $query_vars;
}


/**
 * Allow more tags in TinyMCE including <iframe> and <script>
 */
function roots_change_mce_options($options){
    $ext = 'pre[id|name|class|style],iframe[align|longdesc|name|width|height|frameborder|scrolling|marginheight|marginwidth|src],script[charset|defer|language|src|type]';

    if (isset($initArray['extended_valid_elements'])) {
        $options['extended_valid_elements'] .= ',' . $ext;
    } else {
        $options['extended_valid_elements'] = $ext;
    }

    return $options;
}

/** Style Sidebar Widgets for Bootstrap **/
function if_bootstrap_widgets( $widget_output, $widget_type, $widget_id, $sidebar_id ) {
	switch( $widget_type ) {
		case 'categories' :
            $widget_output = str_replace('<ul>', '<ul class="list-group list-group-flush left-menu"><li class="list-group-item d-flex justify-content-between align-items-center cat-item cat-item-0'.(is_home() ? ' current-cat' : '').'"><a aria-current="page" href="'.get_post_type_archive_link( 'post' ).'">All</a> <span class="badge bg-theme rounded-pill cat-item-count">'.wp_count_posts()->publish.'</span></li>', $widget_output);
            $widget_output = str_replace('<li class="cat-item cat-item-', '<li class="list-group-item d-flex justify-content-between align-items-center cat-item cat-item-', $widget_output);
            $widget_output = str_replace('(', '<span class="badge bg-theme rounded-pill cat-item-count"> ', $widget_output);
            $widget_output = str_replace(')', ' </span>', $widget_output);
            break;
		case 'calendar' :
            $widget_output = str_replace('calendar_wrap', 'calendar_wrap table-responsive', $widget_output);
            $widget_output = str_replace('<table id="wp-calendar', '<table class="table table-condensed" id="wp-calendar', $widget_output);
            break;
		case 'tag_cloud' :    	
			$regex = "/(<a[^>]+?)( style='font-size:.+pt;'>)([^<]+?)(<\/a>)/"; //clean up
			$replace_with = "$1><span class='label label-primary'>$3</span>$4";
			$widget_output = preg_replace( $regex , $replace_with , $widget_output );
    		break;
		case 'archives' :	
            $widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
            $widget_output = str_replace('<li>', '<li class="list-group-item">', $widget_output);
            $widget_output = str_replace('(', '<span class="badge cat-item-count"> ', $widget_output);
            $widget_output = str_replace(')', ' </span>', $widget_output);
            break;
		case 'meta' :   	
            $widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
            $widget_output = str_replace('<li>', '<li class="list-group-item">', $widget_output);
            break;
		case 'recent-posts' :   	
            $widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
            $widget_output = str_replace('<li>', '<li class="list-group-item">', $widget_output);
			$widget_output = str_replace('class="post-date"', 'class="post-date text-muted small"', $widget_output);
    		break;
		case 'recent-comments' :   	
            $widget_output = str_replace('<ul id="recentcomments">', '<ul id="recentcomments" class="list-group">', $widget_output);
            $widget_output = str_replace('<li class="recentcomments">', '<li class="recentcomments list-group-item">', $widget_output);
            break;
		case 'pages' :   	
            $widget_output = str_replace('<ul>', '<ul class="nav nav-stacked nav-pills">', $widget_output);
            break;
		case 'nav_menu' :   	
            $widget_output = str_replace(' class="menu"', 'class="menu nav nav-stacked nav-pills"', $widget_output);
            break;
    	default:
			$widget_output = $widget_output; // not sure if this is needed
	}
    
    return $widget_output;
}

// Show empty categories in widget
// add_filter( 'widget_categories_args', 'if_show_empty_categories_in_widget' );
// function if_show_empty_categories_in_widget($cat_args) {
//     $cat_args['hide_empty'] = 0;
//     return $cat_args;
// }

// Search form
add_filter( 'get_search_form', 'if_bootstrap_searhform', 100);
function if_bootstrap_searhform() {
    $label = 'Search';
    $search_text = 'Search this website...';
    $button_text = 'Search';
    $form = '<form method="get" class="search-form form-inline" action="'.home_url( '/' ).'" role="search">
        <div class="input-group">
            <input type="search" class="search-field form-control" id="search" name="s" aria-label="'.$search_text.'" aria-describedby="search-button" value="'.trim( get_search_query() ).'" placeholder="'.$search_text.'">
            <button class="btn btn-outline-theme" type="submit" id="search-button"><i class="fas fa-search"></i></button>
        </div>
    </form>';
    return $form;
}

// Front-end login
add_action('init','if_frontend_login');
function if_frontend_login() {
    global $if_login_error;
    $if_login_error = false;

    if ( isset($_POST['username']) && isset($_POST['password']) ) {
        $creds = array();
        $creds['user_login']    = $_POST['username'];
        $creds['user_password'] = $_POST['password'];

        $user = wp_signon($creds);
        if ( is_wp_error($user) ) {
            $if_login_error = $user->get_error_message();
        } else {
            if (isset($_POST['redirect']) && $_POST['redirect']) {
                wp_redirect($_POST['redirect']);
                exit;
            }
        }
    }
}
  
function if_get_login_error() {
    global $if_login_error;

    if ($if_login_error) {
        $return = $if_login_error;
        $if_login_error = false;

        return $return;
    } else {
        return false;
    }
}
  