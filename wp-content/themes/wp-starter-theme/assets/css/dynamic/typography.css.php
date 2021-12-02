<?php
// if ( ! defined( 'ABSPATH' ) ) {
//     // exit; // Exit if accessed directly
// }


// $elements = array('h1','h2','h3','h4','h5','h6','paragraph','pre','blockquote','ol','ol_li','ul','ul_li','custom_1','custom_2','custom_3','custom_4','custom_5');

// $font_family_print  = array();
// $font_size_print  = array();
// $color_print = array();
// $font_weight_print = array();
// $font_style_print = array();
// $line_height_print = array();
// $letter_spacing_print = array();

// $margin_top_print = array();
// $margin_right_print = array();
// $margin_bottom_print = array();
// $margin_left_print = array();

// $padding_top_print = array();
// $padding_right_print = array();
// $padding_bottom_print = array();
// $padding_left_print = array();

// foreach($elements as $elem){


// 	$pos = strpos($elem, 'custom_');
// 	if ($pos !== false) {
// 		$important = ' !important';
// 	} else {
// 	    $important = '';
// 	}

// 	/* Font Family */
// 	$font_family = nsof_get_option( $elem.'_font', 'nsof-theme-options' );
// 	if($font_family == 'default'){ $font_family_print[$elem] = ''; }
// 	else{ $font_family_print[$elem] = 'font-family:'.$font_family.''.$important.';'; }

// 	/* Font Size */
// 	$font_size = nsof_get_option( $elem.'_font_size', 'nsof-theme-options' );
// 	$font_size_unit = nsof_get_option( $elem.'_font_size_unit', 'nsof-theme-options' );
// 	if($font_size == ''){ $font_size_print[$elem] = ''; }
// 	else{ $font_size_print[$elem] = 'font-size: '.$font_size.$font_size_unit.''.$important.';';	}

// 	/* Color */
// 	$color = nsof_get_option( $elem.'_color', 'nsof-theme-options' );
// 	if($color == ''){ $color_print[$elem] = ''; }
// 	else{ $color_print[$elem] = 'color: '.$color.''.$important.';';	 }

// 	/* Font weight */
// 	$font_weight = nsof_get_option( $elem.'_font_weight', 'nsof-theme-options' );
// 	if($font_weight == ''){ $font_weight_print[$elem] = ''; }	
// 	else{ $font_weight_print[$elem] = 'font-weight: '.$font_weight.''.$important.';';	}

// 	/* Font style */
// 	$font_style = nsof_get_option( $elem.'_font_style', 'nsof-theme-options' );
// 	if($font_style == ''){ $font_style_print[$elem] = ''; }
// 	else{ $font_style_print[$elem] = 'font-style: '. $font_style. ''.$important.';'; }

// 	/* Line Height */
// 	$line_height = nsof_get_option( $elem.'_line_height', 'nsof-theme-options' );
// 	$line_height_unit = nsof_get_option( $elem.'_line_height_unit', 'nsof-theme-options' );
// 	if($line_height == ''){ $line_height_print[$elem] = ''; }
// 	else{ $line_height_print[$elem] = 'line-height: '.$line_height.$line_height_unit.''.$important.';';	}

// 	/* Letter Spacing */
// 	$letter_spacing = nsof_get_option( $elem.'_letter_spacing', 'nsof-theme-options' );
// 	$letter_spacing_unit = nsof_get_option( $elem.'_letter_spacing_unit', 'nsof-theme-options' );
// 	if($letter_spacing == ''){ $letter_spacing_print[$elem] = ''; }
// 	else{ $letter_spacing_print[$elem] = 'letter-spacing: '.$letter_spacing.$letter_spacing_unit.''.$important.';';	}

// 	/* Margin-top */
// 	$margin_top = nsof_get_option( $elem.'_margin_top', 'nsof-theme-options' );
// 	$margin_top_unit = nsof_get_option( $elem.'_margin_top_unit', 'nsof-theme-options' );
// 	if($margin_top == ''){ $margin_top_print[$elem] = ''; }
// 	else{ $margin_top_print[$elem] = 'margin-top: '.$margin_top.$margin_top_unit.''.$important.';';	}

// 	/* Margin-right */
// 	$margin_right = nsof_get_option( $elem.'_margin_right', 'nsof-theme-options' );
// 	$margin_right_unit = nsof_get_option( $elem.'_margin_right_unit', 'nsof-theme-options' );
// 	if($margin_right == ''){ $margin_right_print[$elem] = ''; }
// 	else{ $margin_right_print[$elem] = 'margin-right: '.$margin_right.$margin_right_unit.''.$important.';';	}		

// 	/* Margin-bottom */
// 	$margin_bottom = nsof_get_option( $elem.'_margin_bottom', 'nsof-theme-options' );
// 	$margin_bottom_unit = nsof_get_option( $elem.'_margin_bottom_unit', 'nsof-theme-options' );
// 	if($margin_bottom == ''){ $margin_bottom_print[$elem] = ''; }
// 	else{ $margin_bottom_print[$elem] = 'margin-bottom: '.$margin_bottom.$margin_bottom_unit.''.$important.';';	}

// 	/* Margin-left */
// 	$margin_left = nsof_get_option( $elem.'_margin_left', 'nsof-theme-options' );
// 	$margin_left_unit = nsof_get_option( $elem.'_margin_left_unit', 'nsof-theme-options' );
// 	if($margin_left == ''){ $margin_left_print[$elem] = ''; }
// 	else{ $margin_left_print[$elem] = 'margin-left: '.$margin_left.$margin_left_unit.''.$important.';';	}

// 	/* padding-top */
// 	$padding_top = nsof_get_option( $elem.'_padding_top', 'nsof-theme-options' );
// 	$padding_top_unit = nsof_get_option( $elem.'_padding_top_unit', 'nsof-theme-options' );
// 	if($padding_top == ''){ $padding_top_print[$elem] = ''; }
// 	else{ $padding_top_print[$elem] = 'padding-top: '.$padding_top.$padding_top_unit.''.$important.';';	}

// 	/* padding-right */
// 	$padding_right = nsof_get_option( $elem.'_padding_right', 'nsof-theme-options' );
// 	$padding_right_unit = nsof_get_option( $elem.'_padding_right_unit', 'nsof-theme-options' );
// 	if($padding_right == ''){ $padding_right_print[$elem] = ''; }
// 	else{ $padding_right_print[$elem] = 'padding-right: '.$padding_right.$padding_right_unit.''.$important.';';	}		

// 	/* padding-bottom */
// 	$padding_bottom = nsof_get_option( $elem.'_padding_bottom', 'nsof-theme-options' );
// 	$padding_bottom_unit = nsof_get_option( $elem.'_padding_bottom_unit', 'nsof-theme-options' );
// 	if($padding_bottom == ''){ $padding_bottom_print[$elem] = ''; }
// 	else{ $padding_bottom_print[$elem] = 'padding-bottom: '.$padding_bottom.$padding_bottom_unit.''.$important.';';	}

// 	/* padding-left */
// 	$padding_left = nsof_get_option( $elem.'_padding_left', 'nsof-theme-options' );
// 	$padding_left_unit = nsof_get_option( $elem.'_padding_left_unit', 'nsof-theme-options' );
// 	if($padding_left == ''){ $padding_left_print[$elem] = ''; }
// 	else{ $padding_left_print[$elem] = 'padding-left: '.$padding_left.$padding_left_unit.''.$important.';';	}
// }

//$custom_css = <<<EOF
// .textwidget h1 {
// 	{$font_family_print['h1']}
// 	{$font_size_print['h1']}
// 	{$color_print['h1']}
// 	{$font_weight_print['h1']}
// 	{$font_style_print['h1']}
// 	{$line_height_print['h1']}
// 	{$letter_spacing_print['h1']}
// 	{$margin_top_print['h1']}
// 	{$margin_right_print['h1']}
// 	{$margin_bottom_print['h1']}
// 	{$margin_left_print['h1']}
// 	{$padding_top_print['h1']}
// 	{$padding_right_print['h1']}
// 	{$padding_bottom_print['h1']}
// 	{$padding_left_print['h1']}
// }

// .textwidget h2 {
// 	{$font_family_print['h2']}
// 	{$font_size_print['h2']}
// 	{$color_print['h2']}
// 	{$font_weight_print['h2']}
// 	{$font_style_print['h2']}
// 	{$line_height_print['h2']}
// 	{$letter_spacing_print['h2']}
// 	{$margin_top_print['h2']}
// 	{$margin_right_print['h2']}
// 	{$margin_bottom_print['h2']}
// 	{$margin_left_print['h2']}
// 	{$padding_top_print['h2']}
// 	{$padding_right_print['h2']}
// 	{$padding_bottom_print['h2']}
// 	{$padding_left_print['h2']}
// }

// .textwidget h3 {
// 	{$font_family_print['h3']}
// 	{$font_size_print['h3']}
// 	{$color_print['h3']}
// 	{$font_weight_print['h3']}
// 	{$font_style_print['h3']}
// 	{$line_height_print['h3']}
// 	{$letter_spacing_print['h3']}
// 	{$margin_top_print['h3']}
// 	{$margin_right_print['h3']}
// 	{$margin_bottom_print['h3']}
// 	{$margin_left_print['h3']}
// 	{$padding_top_print['h3']}
// 	{$padding_right_print['h3']}
// 	{$padding_bottom_print['h3']}
// 	{$padding_left_print['h3']}
// }

// .textwidget h4 {
// 	{$font_family_print['h4']}
// 	{$font_size_print['h4']}
// 	{$color_print['h4']}
// 	{$font_weight_print['h4']}
// 	{$font_style_print['h4']}
// 	{$line_height_print['h4']}
// 	{$letter_spacing_print['h4']}
// 	{$margin_top_print['h4']}
// 	{$margin_right_print['h4']}
// 	{$margin_bottom_print['h4']}
// 	{$margin_left_print['h4']}
// 	{$padding_top_print['h4']}
// 	{$padding_right_print['h4']}
// 	{$padding_bottom_print['h4']}
// 	{$padding_left_print['h4']}
// }

// .textwidget h5 {
// 	{$font_family_print['h5']}
// 	{$font_size_print['h5']}
// 	{$color_print['h5']}
// 	{$font_weight_print['h5']}
// 	{$font_style_print['h5']}
// 	{$line_height_print['h5']}
// 	{$letter_spacing_print['h5']}
// 	{$margin_top_print['h5']}
// 	{$margin_right_print['h5']}
// 	{$margin_bottom_print['h5']}
// 	{$margin_left_print['h5']}
// 	{$padding_top_print['h5']}
// 	{$padding_right_print['h5']}
// 	{$padding_bottom_print['h5']}
// 	{$padding_left_print['h5']}
// }

// .textwidget h6 {
// 	{$font_family_print['h6']}
// 	{$font_size_print['h6']}
// 	{$color_print['h6']}
// 	{$font_weight_print['h6']}
// 	{$font_style_print['h6']}
// 	{$line_height_print['h6']}
// 	{$letter_spacing_print['h6']}
// 	{$margin_top_print['h6']}
// 	{$margin_right_print['h6']}
// 	{$margin_bottom_print['h6']}
// 	{$margin_left_print['h6']}
// 	{$padding_top_print['h6']}
// 	{$padding_right_print['h6']}
// 	{$padding_bottom_print['h6']}
// 	{$padding_left_print['h6']}
// }

// .textwidget p {
// 	{$font_family_print['paragraph']}
// 	{$font_size_print['paragraph']}
// 	{$color_print['paragraph']}
// 	{$font_weight_print['paragraph']}
// 	{$font_style_print['paragraph']}
// 	{$line_height_print['paragraph']}
// 	{$letter_spacing_print['paragraph']}
// 	{$margin_top_print['paragraph']}
// 	{$margin_right_print['paragraph']}
// 	{$margin_bottom_print['paragraph']}
// 	{$margin_left_print['paragraph']}
// 	{$padding_top_print['paragraph']}
// 	{$padding_right_print['paragraph']}
// 	{$padding_bottom_print['paragraph']}
// 	{$padding_left_print['paragraph']}
// }

// .textwidget pre{
// 	{$font_family_print['pre']}
// 	{$font_size_print['pre']}
// 	{$color_print['pre']}
// 	{$font_weight_print['pre']}
// 	{$font_style_print['pre']}
// 	{$line_height_print['pre']}
// 	{$letter_spacing_print['pre']}
// 	{$margin_top_print['pre']}
// 	{$margin_right_print['pre']}
// 	{$margin_bottom_print['pre']}
// 	{$margin_left_print['pre']}
// 	{$padding_top_print['pre']}
// 	{$padding_right_print['pre']}
// 	{$padding_bottom_print['pre']}
// 	{$padding_left_print['pre']}
// }

// .textwidget blockquote{
// 	{$font_family_print['blockquote']}
// 	{$font_size_print['blockquote']}
// 	{$color_print['blockquote']}
// 	{$font_weight_print['blockquote']}
// 	{$font_style_print['blockquote']}
// 	{$line_height_print['blockquote']}
// 	{$letter_spacing_print['blockquote']}
// 	{$margin_top_print['blockquote']}
// 	{$margin_right_print['blockquote']}
// 	{$margin_bottom_print['blockquote']}
// 	{$margin_left_print['blockquote']}
// 	{$padding_top_print['blockquote']}
// 	{$padding_right_print['blockquote']}
// 	{$padding_bottom_print['blockquote']}
// 	{$padding_left_print['blockquote']}
// }

// .textwidget ol{
// 	{$font_family_print['ol']}
// 	{$font_size_print['ol']}
// 	{$color_print['ol']}
// 	{$font_weight_print['ol']}
// 	{$font_style_print['ol']}
// 	{$line_height_print['ol']}
// 	{$letter_spacing_print['ol']}
// 	{$margin_top_print['ol']}
// 	{$margin_right_print['ol']}
// 	{$margin_bottom_print['ol']}
// 	{$margin_left_print['ol']}
// 	{$padding_top_print['ol']}
// 	{$padding_right_print['ol']}
// 	{$padding_bottom_print['ol']}
// 	{$padding_left_print['ol']}
// }

// .textwidget ol li{
// 	{$font_family_print['ol_li']}
// 	{$font_size_print['ol_li']}
// 	{$color_print['ol_li']}
// 	{$font_weight_print['ol_li']}
// 	{$font_style_print['ol_li']}
// 	{$line_height_print['ol_li']}
// 	{$letter_spacing_print['ol_li']}
// 	{$margin_top_print['ol_li']}
// 	{$margin_right_print['ol_li']}
// 	{$margin_bottom_print['ol_li']}
// 	{$margin_left_print['ol_li']}
// 	{$padding_top_print['ol_li']}
// 	{$padding_right_print['ol_li']}
// 	{$padding_bottom_print['ol_li']}
// 	{$padding_left_print['ol_li']}
// }

// .textwidget ul{
// 	{$font_family_print['ul']}
// 	{$font_size_print['ul']}
// 	{$color_print['ul']}
// 	{$font_weight_print['ul']}
// 	{$font_style_print['ul']}
// 	{$line_height_print['ul']}
// 	{$letter_spacing_print['ul']}
// 	{$margin_top_print['ul']}
// 	{$margin_right_print['ul']}
// 	{$margin_bottom_print['ul']}
// 	{$margin_left_print['ul']}
// 	{$padding_top_print['ul']}
// 	{$padding_right_print['ul']}
// 	{$padding_bottom_print['ul']}
// 	{$padding_left_print['ul']}
// }

// .textwidget ul li{
// 	{$font_family_print['ul_li']}
// 	{$font_size_print['ul_li']}
// 	{$color_print['ul_li']}
// 	{$font_weight_print['ul_li']}
// 	{$font_style_print['ul_li']}
// 	{$line_height_print['ul_li']}
// 	{$letter_spacing_print['ul_li']}
// 	{$margin_top_print['ul_li']}
// 	{$margin_right_print['ul_li']}
// 	{$margin_bottom_print['ul_li']}
// 	{$margin_left_print['ul_li']}
// 	{$padding_top_print['ul_li']}
// 	{$padding_right_print['ul_li']}
// 	{$padding_bottom_print['ul_li']}
// 	{$padding_left_print['ul_li']}
// }

// .textwidget span.custom-class-1{
//     {$font_family_print['custom_1']}
//     {$font_size_print['custom_1']}
//     {$color_print['custom_1']}
//     {$font_weight_print['custom_1']}
//     {$font_style_print['custom_1']}
//     {$line_height_print['custom_1']}
//     {$letter_spacing_print['custom_1']}
//     {$margin_top_print['custom_1']}
//     {$margin_right_print['custom_1']}
//     {$margin_bottom_print['custom_1']}
//     {$margin_left_print['custom_1']}
//     {$padding_top_print['custom_1']}
//     {$padding_right_print['custom_1']}
//     {$padding_bottom_print['custom_1']}
//     {$padding_left_print['custom_1']}	
// }

// .textwidget span.custom-class-2{
//     {$font_family_print['custom_2']}
//     {$font_size_print['custom_2']}
//     {$color_print['custom_2']}
//     {$font_weight_print['custom_2']}
//     {$font_style_print['custom_2']}
//     {$line_height_print['custom_2']}
//     {$letter_spacing_print['custom_2']}
//     {$margin_top_print['custom_2']}
//     {$margin_right_print['custom_2']}
//     {$margin_bottom_print['custom_2']}
//     {$margin_left_print['custom_2']}
//     {$padding_top_print['custom_2']}
//     {$padding_right_print['custom_2']}
//     {$padding_bottom_print['custom_2']}
//     {$padding_left_print['custom_2']}	
// }

// .textwidget span.custom-class-3{
//     {$font_family_print['custom_3']}
//     {$font_size_print['custom_3']}
//     {$color_print['custom_3']}
//     {$font_weight_print['custom_3']}
//     {$font_style_print['custom_3']}
//     {$line_height_print['custom_3']}
//     {$letter_spacing_print['custom_3']}
//     {$margin_top_print['custom_3']}
//     {$margin_right_print['custom_3']}
//     {$margin_bottom_print['custom_3']}
//     {$margin_left_print['custom_3']}
//     {$padding_top_print['custom_3']}
//     {$padding_right_print['custom_3']}
//     {$padding_bottom_print['custom_3']}
//     {$padding_left_print['custom_3']}	
// }

// .textwidget span.custom-class-4{
//     {$font_family_print['custom_4']}
//     {$font_size_print['custom_4']}
//     {$color_print['custom_4']}
//     {$font_weight_print['custom_4']}
//     {$font_style_print['custom_4']}
//     {$line_height_print['custom_4']}
//     {$letter_spacing_print['custom_4']}
//     {$margin_top_print['custom_4']}
//     {$margin_right_print['custom_4']}
//     {$margin_bottom_print['custom_4']}
//     {$margin_left_print['custom_4']}
//     {$padding_top_print['custom_4']}
//     {$padding_right_print['custom_4']}
//     {$padding_bottom_print['custom_4']}
//     {$padding_left_print['custom_4']}	
// }


// .textwidget span.custom-class-5{
//     {$font_family_print['custom_5']}
//     {$font_size_print['custom_5']}
//     {$color_print['custom_5']}
//     {$font_weight_print['custom_5']}
//     {$font_style_print['custom_5']}
//     {$line_height_print['custom_5']}
//     {$letter_spacing_print['custom_5']}
//     {$margin_top_print['custom_5']}
//     {$margin_right_print['custom_5']}
//     {$margin_bottom_print['custom_5']}
//     {$margin_left_print['custom_5']}
//     {$padding_top_print['custom_5']}
//     {$padding_right_print['custom_5']}
//     {$padding_bottom_print['custom_5']}
//     {$padding_left_print['custom_5']}	
// }

//EOF;

//wp_add_inline_style( 'dynamic-typography', $custom_css );