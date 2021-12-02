<?php

/**
 * Class NSOF_Field_Checkbox
 * @since  1.0.0
 */
class NSOF_Field_Checkbox extends NSOF_Field_Base {

	protected function render_field( $value, $instance ) {

		?>
		<label for="<?php echo esc_attr( $this->element_id ) ?>">
			<input type="checkbox" name="<?php echo esc_attr( $this->element_name ) ?>" id="<?php echo esc_attr( $this->element_id ) ?>"
			       class="acspress-of-input" <?php checked( !empty( $value ) ) ?> />
			
		</label>
		<?php
	}

	protected function render_field_label( $value, $instance ) {
		parent::render_field_label( $value, $instance );
		// Empty override. This field renders it's own label in the render_field() function.
	}


	protected function sanitize_field_input( $value, $instance ) {
		return ! empty( $value );
	}

}