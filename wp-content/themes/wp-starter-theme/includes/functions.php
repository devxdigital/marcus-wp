<?php

function add_style_select_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'add_style_select_buttons' );

//add custom styles to the WordPress editor
function swph_custom_class( $init_array ) {  
 
    $style_formats = array(  
        // These are the custom styles
        array(  
            'title' => 'Custom Class 1',  
            'block' => 'span',  
            'classes' => 'custom-class-1',
            'wrapper' => true,
        ),          
        array(  
            'title' => 'Custom Class 2',  
            'block' => 'span',  
            'classes' => 'custom-class-2',
            'wrapper' => true,
        ),          
        array(  
            'title' => 'Custom Class 3',  
            'block' => 'span',  
            'classes' => 'custom-class-3',
            'wrapper' => true,
        ),          
        array(  
            'title' => 'Custom Class 4',  
            'block' => 'span',  
            'classes' => 'custom-class-4',
            'wrapper' => true,
        ),          
        array(  
            'title' => 'Custom Class 5',  
            'block' => 'span',  
            'classes' => 'custom-class-5',
            'wrapper' => true,
        ),  

    );  
    $init_array['style_formats'] = json_encode( $style_formats );  

    return $init_array;  

  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'swph_custom_class' );


function nsof_get_font_families($fonts){	
	
	$fonts = array_unique($fonts);
	$imports = array();
	foreach($fonts as $font){
		$nsof_font = nsof_get_font($font);
		$imports[] = $nsof_font['css_import'];
	}
	
	return implode(PHP_EOL, $imports);
}

function get_typography(){
	
	$fonts = array(
		/*Headlines*/
		nsof_get_option('h1_font', 'nsof-theme-options'),
		nsof_get_option('h2_font', 'nsof-theme-options'),
		nsof_get_option('h3_font', 'nsof-theme-options'),
		nsof_get_option('h4_font', 'nsof-theme-options'),
		nsof_get_option('h5_font', 'nsof-theme-options'),
		nsof_get_option('h6_font', 'nsof-theme-options'),

		nsof_get_option('paragraph_font', 'nsof-theme-options'),
		nsof_get_option('pre_font', 'nsof-theme-options'),
		nsof_get_option('blockquote_font', 'nsof-theme-options'),
		nsof_get_option('ol_font', 'nsof-theme-options'),
		nsof_get_option('ol_li_font', 'nsof-theme-options'),
		nsof_get_option('ul_font', 'nsof-theme-options'),
		nsof_get_option('ul_li_font', 'nsof-theme-options'),

		nsof_get_option('custom_1_font', 'nsof-theme-options'),
		nsof_get_option('custom_2_font', 'nsof-theme-options'),
		nsof_get_option('custom_3_font', 'nsof-theme-options'),
		nsof_get_option('custom_4_font', 'nsof-theme-options'),
		nsof_get_option('custom_5_font', 'nsof-theme-options')
	);
	
	$imports = nsof_get_font_families($fonts);
	return $imports;
	// $style  = sprintf('<style>%s</style>',$imports);
}

add_action('wp_head', 'add_custom_typo');

function add_custom_typo(){
	echo '<style type="text/css">';
	echo get_typography();
	echo '</style>';
}

