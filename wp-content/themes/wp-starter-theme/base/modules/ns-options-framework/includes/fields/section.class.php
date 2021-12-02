<?php

/**
 * Class NSOF_Field_Section
 * @since  1.0.0
 */
class NSOF_Field_Section extends NSOF_Field_Container_Base {

	protected function render_field( $value, $instance ) {
		?>
		<div class="nsof-section <?php if( $this->state == 'closed' ) echo 'nsof-section-hide'; ?>"><?php
		if ( !isset( $this->fields ) || empty($this->fields ) ) {
			echo '</div>';
			return;
		}
		$this->create_and_render_sub_fields( $value, array( 'name' => $this->base_name, 'type' => 'section' ) );
		?>
			<input type="hidden"
			       name="<?php echo esc_attr( $this->element_name . '[field_container_state]' ) ?>" id="<?php echo esc_attr( $this->element_id . '-field_container_state' ) ?>"
			       class="nsof-input nsof-field-container-state" value="<?php echo esc_attr( $this->state ) ?>"/>
		</div><?php
	}

}