<?php

/**
 * Class NSOF_Field_Icon
 * @since  1.0.0
 */
class NSOF_Field_Icon extends NSOF_Field_Base {

	protected function render_field( $value, $instance ) {
		static $widget_icon_families;
		if( empty( $widget_icon_families ) ) $widget_icon_families = apply_filters('nsof_icon_families', array() );

		list( $value_family, $null ) = !empty($value) ? explode('-', $value, 2) : array('fontawesome', '');

		?>

		<div class="nsof-icon-selector-current">
			<div class="nsof-icon"><span></span></div>
			<label><?php _e('Choose Icon', 'wp-starter-theme') ?></label>
		</div>

		<div class="nsof-icon-selector nsof-field-subcontainer">
			<select class="nsof-icon-family" >
				<?php foreach( $widget_icon_families as $family_id => $family_info ) : ?>
					<option value="<?php echo esc_attr( $family_id ) ?>"
						<?php selected( $value_family, $family_id ) ?>><?php echo esc_html( $family_info['name'] ) ?> (<?php echo count( $family_info['icons'] ) ?>)</option>
				<?php endforeach; ?>
			</select>

			<input type="hidden" name="<?php echo esc_attr( $this->element_name ) ?>" value="<?php echo esc_attr( $value ) ?>" class="nsof-icon-icon nsof-input" />

			<div class="nsof-icon-icons"></div>
		</div>

		<?php
	}

	protected function sanitize_field_input( $value, $instance ) {
		$sanitized_value = $value;
		// Alphanumeric characters and hyphens.
		if( preg_match( '/[\w\d]+[\w\d-]*/', $sanitized_value, $sanitized_matches ) ) {
			$sanitized_value = $sanitized_matches[0];
		}
		else {
			$sanitized_value = '';
		}
		list( $value_family, $value_icon ) = ( ! empty( $sanitized_value ) && strpos( $sanitized_value, '-' ) !== false ) ? explode( '-', $sanitized_value, 2 ) : array('', '');

		static $widget_icon_families;
		if( empty( $widget_icon_families ) ) {
			$widget_icon_families = apply_filters( 'nsof_icon_families', array() );
		}
		if( ! ( isset( $widget_icon_families[$value_family] ) && isset( $widget_icon_families[$value_family]['icons'][$value_icon] ) ) ) {
			$sanitized_value = isset( $this->default ) ? $this->default : '';
		}

		return $sanitized_value;
	}

}