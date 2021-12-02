<?php

/**
 * Class NSOF_Field_Textarea
 * @since  1.0.0
 */
class NSOF_Field_Textarea extends NSOF_Field_Text_Input_Base {
	/**
	 * The number of visible rows in the textarea.
	 *
	 * @access protected
	 * @var int
	 */
	protected $rows;

	protected function render_field( $value, $instance ) {

		$rows        = !empty( $this->rows ) ? intval( $this->rows ) : 5;
		$is_readonly = !empty( $this->readonly ) ? 'readonly' : '';
		$placeholder = !empty( $this->placeholder ) ? esc_attr( $this->placeholder) : '';

		?>
		<textarea type="text" name="<?php echo esc_attr( $this->element_name ) ?>" <?php $this->render_CSS_classes( $this->get_input_classes() );?> id="<?php echo esc_attr( $this->element_id ) ?>" placeholder="<?php echo $placeholder;?>" rows="<?php echo $rows;?>" <?php echo $is_readonly;?> ><?php echo stripslashes(esc_textarea( $value )) ?></textarea>
		<?php
	}
}