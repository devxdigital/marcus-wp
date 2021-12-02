<?php

/**
 * Class NSOF_Field_Checkboxes
 * @since  1.0.0
 */
class NSOF_Field_Checkboxes extends NSOF_Field_Base {

	protected $options;

	protected function render_field( $value, $instance ) {

		if ( ! isset( $this->options ) || empty( $this->options ) ) {
			return;
		}

		foreach( $this->options as $k => $v ) {

			$values = $value;

			if( is_array($value) ){

				if(array_key_exists( $k, $value ) || in_array( $k, $value )){
					$values = $k;
				}else{
					$values = '';
				}
			}
			?>
			<label for="<?php echo esc_attr( $this->element_id . '-' . $k ) ?>">
				<input type="checkbox"
					   name="<?php echo esc_attr( $this->element_name );?>[<?php echo $k;?>]"
					   id="<?php echo esc_attr( $this->element_id . '-' . $k ) ?>"
				       class="nsof-input" <?php checked( $k, $values ) ?> />
				<?php echo esc_html( $v ) ?>
			</label>
			<?php
		}
	}

	protected function render_field_label( $value, $instance ) {

		if ( isset( $this->options ) || !empty( $this->options ) ) {
			parent::render_field_label( $value, $instance );
		}
	}


	protected function sanitize_field_input( $value, $instance ) {
		return ! empty( $value );
	}

}