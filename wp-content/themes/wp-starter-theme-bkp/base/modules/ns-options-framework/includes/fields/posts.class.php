<?php

/**
 * Class NSOF_Field_Posts
 * @since  1.0.0
 */
class NSOF_Field_Posts extends NSOF_Field_Base {

	protected function render_field( $value, $instance ) {
		nsof_post_selector_admin_form_field( is_array( $value ) ? '' : $value, $this->element_name );
	}

	protected function sanitize_field_input( $value, $instance ) {
		// Posts selector functions handle sanitization.
		return $value;
	}

}