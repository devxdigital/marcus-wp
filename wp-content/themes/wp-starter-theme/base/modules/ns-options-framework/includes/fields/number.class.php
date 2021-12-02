<?php

/**
 * Class NSOF_Field_Number
 * @since  1.0.0
 */
class NSOF_Field_Number extends NSOF_Field_Text_Input_Base {

	protected function get_input_classes() {
		$input_classes = parent::get_input_classes();
		$input_classes[] = 'nsof-input-number';
		return $input_classes;
	}

	protected function sanitize_field_input( $value, $instance ) {
		return ( $value === '' ) ? false : (float) $value;
	}
}