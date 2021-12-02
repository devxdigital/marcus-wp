<?php

/**
 * Class NSOF_Field_Font
 * @since  1.0.0
 */
class NSOF_Field_Font extends NSOF_Field_Base {

	protected function render_field( $value, $instance ) {
		static $widget_font_families;
		if( empty($widget_font_families) ) {

			$widget_font_families = nsof_add_font_families();
		}
		?>
		<div class="nsof-font-selector nsof-field-subcontainer">
			<select name="<?php echo esc_attr( $this->element_name ) ?>" id="<?php echo esc_attr( $this->element_id ) ?>" class="nsof-input">
				<option value="default" selected="selected"><?php esc_html_e( 'Use theme font', 'wp-starter-theme' ) ?></option>
				<?php foreach( $widget_font_families as $key => $val ) : ?>
					<option value="<?php echo esc_attr( $key ) ?>" <?php selected( $key, $value ) ?>><?php echo esc_html( $val ) ?></option>
				<?php endforeach; ?>
			</select>
		</div>
		<?php
	}

	protected function sanitize_field_input( $value, $instance ) {
		$sanitized_value = trim( $value );
		// Any alphanumeric character followed by alphanumeric or whitespace characters (except newline),
		// with optional colon and number.
		if( preg_match( '/[\w\d]+[\w\d\t\r ]*(:\d+)?/', $sanitized_value, $sanitized_matches ) ) {
			$sanitized_value = $sanitized_matches[0];
		}
		else {
			$sanitized_value = 'default';
		}

		static $widget_font_families;
		if( empty($widget_font_families) ) {
			$widget_font_families = nsof_add_font_families();
		}
		$keys = array_keys( $widget_font_families );
		if( ! in_array( $sanitized_value, $keys ) ) $sanitized_value = isset( $this->default ) ? $this->default : 'default';

 		return $sanitized_value;
	}
}