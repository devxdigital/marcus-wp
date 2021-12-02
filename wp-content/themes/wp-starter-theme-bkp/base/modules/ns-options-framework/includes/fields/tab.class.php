<?php
/**
 * Class NSOF_Field_Tab
 * @since  1.0.0
 */
class NSOF_Field_Tab extends NSOF_Field_Container_Base {

	protected $NSOF;

	public function initialize(){

		$this->NSOF = NSOF::getInstance();
	}


	protected function render_field( $value, $instance ) {

		$this->create_and_render_sub_fields( $value, array( 'name' => $this->base_name, 'type' => 'tab' ) );
	}



	protected function sanitize_field_input( $value, $instance ){}

	protected function render_before_field( $value, $instance ) {}

    protected function render_field_description() {}

}