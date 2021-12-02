<?php

/**
 * Get a certain option value
 * @since  1.0.0
 * @param  string $field_name
 * @param  string|array $option_key - option key / options array
 *
 * @return array|string
 */
function nsof_get_option($field_name = '', $option_key = ''){

	$nsof = NSOF::getInstance();

	if( empty($option_key) ){
		return null;
	}

	//if it was provied an options array instead of option key
	if( is_array($option_key) ){
		$option = $nsof->get_value_by_key( $field_name, $option_key );

		return $option;
	}

	$options = get_option($option_key);
	$option = $options;

	if( is_array($options) && !empty($field_name) ){
		$option = $nsof->get_value_by_key( $field_name, $options );
	}

	return $option;
}



/**
 * Smart Merge array
 * @since  1.0.0
 * @param  array  $array_a
 * @param  array  $array_b
 * @return array
 */
function nsof_smart_array_merge($array_a = array(), $array_b = array()){

	$array_merge = array();

	if(!empty($array_a) && !empty($array_b)){

		foreach($array_a as $field => $value){
			$array_merge[$field] = $value;
		}

		foreach($array_b as $field => $value){

			if(!empty($value)){
				$array_merge[$field] = $value;
			}elseif(!array_key_exists($field,$array_a)){
				$array_merge[$field] = $value;
			}
		}
	}
	return $array_merge;
}



/**
 * Get list of supported measurements
 * @since  1.0.0
 * @return array
 */
function nsof_measurements_list() {

	$measurements = array(
		'px',
		'%',
		'in',
		'cm',
		'mm',
		'em',
		'ex',
		'pt',
		'pc',
	);

	// Allow themes and plugins to trim or enhance the list.
	return apply_filters('nsof_measurements_list', $measurements);
}



/**
 * Get an icon by icon value
 * @since  1.0.0
 * @param $icon_value
 * @param bool $icon_styles
 * @return bool|string
 */
function nsof_get_icon($icon_value, $icon_styles = false) {

	if( empty( $icon_value ) ) return false;
	list( $family, $icon ) = explode('-', $icon_value, 2);
	if( empty( $family ) || empty( $icon ) ) return false;

	static $widget_icon_families;
	static $widget_icons_enqueued = array();

	if( empty($widget_icon_families) ) $widget_icon_families = apply_filters('nsof_icon_families', array() );
	if( empty($widget_icon_families[$family]) || empty($widget_icon_families[$family]['icons'][$icon]) ) return false;

	if(empty($widget_icons_enqueued[$family]) && !empty($widget_icon_families[$family]['style_uri'])) {
		if( !wp_style_is( 'nsof-icon-font-'.$family ) ) {
			wp_enqueue_style('nsof-icon-font-'.$family, $widget_icon_families[$family]['style_uri'] );
		}
		return '<span class="nsof-icon-' . esc_attr($family) . '" data-nsof-icon="' . $widget_icon_families[$family]['icons'][$icon] . '" ' . ( !empty($icon_styles) ? 'style="'.implode('; ', $icon_styles).'"' : '' ) . '></span>';
	}
	else {
		return false;
	}

}



/**
 * Add fonts to font field
 * @since  1.0.0
 * @return null
 */
function nsof_add_font_families(){
	// Add the default fonts
	$font_families = array(
		'Helvetica Neue' => 'Helvetica Neue',
		'Lucida Grande' => 'Lucida Grande',
		'Georgia' => 'Georgia',
		'Courier New' => 'Courier New',
	);

	// Add in all the Google font families
	foreach ( nsof_fonts_google_webfonts() as $font => $variants ) {
		foreach ( $variants as $variant ) {
			if ( $variant == 'regular' || $variant == 400 ) {
				$font_families[ $font ] = $font;
			}
			else {
				$font_families[ $font . ':' . $variant ] = $font . ' (' . $variant . ')';
			}
		}
	}

	return apply_filters('nsof_font_families', $font_families);
}



/**
 * Get a font
 * @since  1.0.0
 * @param $font_value
 * @return array
 */
function nsof_get_font($font_value) {

	$web_safe = array(
		'Helvetica Neue' => 'Arial, Helvetica, Geneva, sans-serif',
		'Lucida Grande' => 'Lucida, Verdana, sans-serif',
		'Georgia' => '"Times New Roman", Times, serif',
		'Courier New' => 'Courier, mono',
		'default' => 'default',
	);

	$font = array();
	if ( isset( $web_safe[ $font_value ] ) ) {
		$font['family'] = $web_safe[ $font_value ];
	}
	else if( nsof_is_google_webfont( $font_value ) ) {
		$font_parts = explode( ':', $font_value );
		$font['family'] = $font_parts[0];
		$font_url_param = urlencode( $font_parts[0] );
		if ( count( $font_parts ) > 1 ) {
			$font['weight'] = $font_parts[1];
			$font_url_param .= ':' . $font_parts[1];
		}
		$font['css_import'] = '@import url(http' . ( is_ssl() ? 's' : '' ) . '://fonts.googleapis.com/css?family=' . $font_url_param . ');';
	}
	else {
		$font['family'] = $font_value;
		$font = apply_filters( 'nsof_get_custom_font_family', $font );
	}

	return $font;
}



/**
 * Get the attachment src, but also have the option of getting the fallback URL.
 * @since  1.0.0
 * @param $attachment
 * @param $size
 * @param bool|false $fallback
 *
 * @return array|bool|false
 */
function nsof_get_attachment_image_src( $attachment, $size, $fallback = false ){

	if( empty( $attachment ) && !empty($fallback) ) {
		$url = parse_url( $fallback );

		if( !empty($url['fragment']) && preg_match('/^([0-9]+)x([0-9]+)$/', $url['fragment'], $matches) ) {
			$width = intval($matches[1]);
			$height = intval($matches[2]);
		}
		else {
			$width = 0;
			$height = 0;
		}

		// TODO, try get better values than 0 for width and height
		return array( $fallback, $width, $height, false );
	}
	if( !empty( $attachment ) ) {
		return wp_get_attachment_image_src( $attachment, $size );
	}

	return false;
}

function nsof_get_attachment_image( $attachment, $size, $fallback ){

	if( !empty( $attachment ) ) {
		return wp_get_attachment_image( $attachment, $size );
	}
	else {
		$src = nsof_get_attachment_image_src( $attachment, $size, $fallback );
		if( empty($src[0]) ) return '';

		$atts = array(
			'src' => $src[0],
		);

		if( !empty($src[1]) ) $atts['width'] = $src[1];
		if( !empty($src[2]) ) $atts['height'] = $src[2];

		$return = '<img ';
		foreach( $atts as $id => $val ) {
			$return .= $id . '="' . esc_attr($val) . '" ';
		}
		return $return;
	}
}