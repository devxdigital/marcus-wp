<?php

//hide PHP notices
error_reporting(E_ALL ^ E_NOTICE);


define('NS_DOMAIN', 'NS_domain');


/**
 * because we're using PHP functions which are available starting with PHP 5.3
 * we should make sure that the PHP version of the server is at least 5.3
 */
define('NS_PHP_VERSION', '5.3');


//Path and URI to the UTILS folder
define('NS_BASE_URI', get_template_directory_uri().'/base/');
define('NS_BASE', get_template_directory().'/base/');

//Path and URI to the assets folder
define('NS_ASSETS_URI', get_template_directory_uri().'/assets/');
define('NS_ASSETS', get_template_directory().'/assets/');

//Path to the includes folder
define('NS_INCLUDES', get_template_directory().'/includes/');

add_theme_support( 'post-formats', apply_filters('ns_post_formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio' )));
add_theme_support( 'html5', apply_filters('ns_html5', array( 'search-form' )));

// add_theme_support( 'custom-header', array());
// add_theme_support( 'custom-background', array());

add_action( 'after_setup_theme', 'wph_theme_setup' );
function wph_theme_setup() {
    add_theme_support( 'title-tag' );
}

add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );

// Content width
if( !isset( $content_width ) ) {
    // @TODO : edit the value for your own specifications
    $content_width = 960;
}

//global configs
$ns_cfg = apply_filters('ns_configs', array(


    /**
     * Display PHP Info
     */
    'phpinfo' => false,


    /**
     * Init base modules. Comment what module you do not need
     */
    'base_modules' => apply_filters('ns_base_modules', array(
        'ns-breadcrumb/ns-breadcrumb.php',
        'ns-options-framework/nsof-init.php',
        'tgm-plugin-activation/ns-init.php',
    )),


    /**
     * Remove default WP widgets
     */
    'remove_widgets' => apply_filters('ns_remove_default_widgets', array(
        'WP_Widget_Pages',
        'WP_Widget_Calendar',
        // 'WP_Widget_Archives',
        'WP_Widget_Links',
        // 'WP_Widget_Meta',
        //'WP_Widget_Search',
        //'WP_Widget_Text',
        //'WP_Widget_Categories',
        'WP_Widget_Recent_Posts' ,
        'WP_Widget_Recent_Comments',
        'WP_Widget_RSS',
        'WP_Widget_Tag_Cloud',
        'WP_Nav_Menu_Widget',
    )),


    /**
     * Hide certain plugins by specifying main plugin file (check the hello plugin example below)
     */
    'hidden_plugins' => apply_filters('ns_hidden_plugins', array(
        //'hello.php',//hide hello dolly plugin
    )),


    /**
     * Generates new thumbnail sizes. Add your new values as an array as it shows bellow
     */
    'thumbnail_sizes' => apply_filters('ns_thumbnail_sizes', array(
        array(
            'name' => 'main-logo',
            'size' => array('w' => 202, 'h' => 100),
            'crop' => true
        ),
        array(
            'name' => 'square-small',
            'size' => array('w' => 202, 'h' => 202),
            'crop' => true
        ),
        array(
            'name' => 'post-loop',
            'size' => array('w' => 910, 'h' => 240),
            'crop' => true
        ),
    )),

));


// Add new constant that returns true if WooCommerce is active
define( 'WPEX_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );

// Checking if WooCommerce is active
if ( WPEX_WOOCOMMERCE_ACTIVE ) {

    add_action( 'wp_enqueue_scripts', 'swph_woo_enqueue_frontend_scripts', 0 );
    function swph_woo_enqueue_frontend_scripts(){
        wp_enqueue_style('swph-woocommerce', NS_ASSETS_URI.'css/swph-woocommerce.css', false);
    }


    include(NS_BASE.'woocommerce/config.php');
    include(NS_BASE.'woocommerce/woocommerce-hooks-n-functions.php');
}