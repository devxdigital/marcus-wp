<?php

add_action( 'wp_enqueue_scripts', 'ns_enqueue_frontend_scripts', 0 );
function ns_enqueue_frontend_scripts(){

    //---- CSS
    wp_enqueue_style('swph-vendors', NS_ASSETS_URI.'css/vendors.css', false);
    wp_enqueue_style('dynamic-typography', NS_ASSETS_URI . 'css/dynamic/typography.css');
    wp_enqueue_style('swph-theme', NS_ASSETS_URI.'css/swph-custom.css', array('swph-vendors'));
    wp_enqueue_style('swph-wp-core', NS_ASSETS_URI.'css/wp-core.css', false);
    wp_enqueue_style('swph-responsive', NS_ASSETS_URI.'css/swph-responsive.css', false);
    
    //include_once( NS_ASSETS .'css/dynamic/typography.css.php' );

    //---- JS
    wp_deregister_script('jquery');
    wp_register_script('jquery', NS_ASSETS_URI.'js/jquery.2.1.3.min.js', array(), false, true );
    wp_enqueue_script('jquery');

    wp_enqueue_script('swph-vendors', NS_ASSETS_URI.'js/vendors.js', array('jquery'), false, true );
    wp_enqueue_script('swph-functions', NS_ASSETS_URI.'js/functions.js', array('jquery'), false, true );
    wp_enqueue_script('swph-init', NS_ASSETS_URI.'js/init.js', array('jquery', 'swph-functions'), false, true );

}   