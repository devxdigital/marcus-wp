<?php

/**
 * Escape a URL
 * @since  1.0.0
 * @param $url
 * @return string
 */
function nsof_esc_url( $url ) {

	if( preg_match('/^post: *([0-9]+)/', $url, $matches) ) {
		// Convert the special post URL into a permalink
		$url = get_the_permalink( intval($matches[1]) );
	}

	$protocols = wp_allowed_protocols();
	$protocols[] = 'skype';
	return esc_url( $url, $protocols );
}



/**
 * A special URL escaping function that handles additional protocols
 * @since  1.0.0
 * @param $url
 * @return string
 */
function nsof_esc_url_raw( $url ) {

	if( preg_match('/^post: *([0-9]+)/', $url, $matches) ) {
		// Convert the special post URL into a permalink
		$url = get_the_permalink( intval($matches[1]) );
	}

	$protocols = wp_allowed_protocols();
	$protocols[] = 'skype';
	return esc_url_raw( $url, $protocols );
}



/**
 * Convert underscore naming convention to camel case. Useful for data to be handled by javascript.
 * @since  1.0.0
 * @param $array array Input array of which the keys will be transformed.
 * @return array The transformed array with camel case keys.
 */
function nsof_underscores_to_camel_case( $array ) {
	$transformed = array();
	if ( !empty( $array ) ) {
		foreach ( $array as $key => $val ) {
			$jsKey = preg_replace_callback( '/_(.?)/', 'nsof_match_to_upper', $key );
			$transformed[ $jsKey ] = $val;
		}
	}
	return $transformed;
}

/**
 * Convert a matched string to uppercase. Used as a preg callback.
 * @since  1.0.0
 * @param $matches
 * @return string
 */
function nsof_match_to_upper( $matches ) {
	return strtoupper( $matches[1] );
}