<?php

/*
* “enables” WooCommerce support and prevents the warnings from the plugin telling the end user that the theme is not compatible.
*/

add_action( 'after_setup_theme', function() {
	add_theme_support( 'woocommerce' );
} );

/* 
* Enable WooCommerce Product Gallery, Zoom & Lightbox (v3.0+)
*/

add_theme_support( 'wc-product-gallery-slider' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );