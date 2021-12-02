<?php

/**
 *
 * This class is used when a field class can't be found to display an error message to the user.
 *
 * Class NSOF_Field_Error
 * @since  1.0.0
 */
class NSOF_Field_Error extends NSOF_Field_Base {

	/**
	 * An error message to display.
	 *
	 * @access protected
	 * @var string
	 */
	protected $message;

	protected function render_field( $value, $instance ) {
		printf( $this->message );
	}

	protected function sanitize_field_input( $value, $instance ) {
		return $value;
	}
}