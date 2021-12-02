<?php

/**
 * Class NSOF_Field_Slider
 * @since  1.0.0
 */
class NSOF_Field_Slider extends NSOF_Field_Base {

	/**
	 * The minimum value of the allowed range.
	 *
	 * @access protected
	 * @var int
	 */
	protected $min;
	/**
	 * The maximum value of the allowed range.
	 *
	 * @access protected
	 * @var int
	 */
	protected $max;

	protected function render_field( $value, $instance ) {
		?>
		<div class="nsof-slider-value"><?php echo ! empty( $value ) ? esc_html( $value ) : 0 ?></div>
		<div class="nsof-slider-wrapper">
			<div class="nsof-value-slider"></div>
		</div>
		<input type="number" class="nsof-input" name="<?php echo esc_attr(  $this->element_name ) ?>" id="<?php echo esc_attr( $this->element_id ) ?>"
			value="<?php echo !empty( $value ) ? esc_attr( $value ) : 0 ?>"
			min="<?php echo isset( $this->min ) ? intval( $this->min ) : 0 ?>"
			max="<?php echo isset( $this->max ) ? intval( $this->max ) : 100 ?>" />
		<?php
	}

	protected function sanitize_field_input( $value, $instance ) {
		return (float) $value;
	}

}