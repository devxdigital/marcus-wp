<?php

/**
 * Class NSOF_Field_Measurement
 * @since  1.0.0
 */
class NSOF_Field_Measurement extends NSOF_Field_Text_Input_Base {

	protected function get_input_classes() {
		$input_classes = parent::get_input_classes();
		$input_classes[] = 'nsof-input-measurement';
		return $input_classes;
	}

	/**
	 * Parse a value into a unit and value.
	 * @since  1.0.0
	 * @param $value
	 * @return array
	 */
	protected function get_render_values( $value ) {
		preg_match('/(\d+)([a-z%]+)*/', $value, $matches);
		$num_matches = count( $matches );
		$val = array();
		$val['value'] = $num_matches > 1 ? $matches[1] : null;
		$val['unit'] = $num_matches > 2 ? $matches[2] : null;
		return $val;
	}

	protected function render_field( $value, $instance ) {
		$value_parts = $this->get_render_values($value);
		parent::render_field( $value_parts['value'], $instance );
	}

	protected function render_after_field( $value, $instance ) {
		$value_parts = $this->get_render_values($value);
		$unit = $value_parts['unit'];
		if ( is_null( $unit ) ) {
			$unit_name = $this->get_unit_field_name( $this->base_name );

			if( !empty( $instance[ $unit_name ] ) ) {
				$unit = $instance[ $unit_name ];
			}
			else if ( isset( $this->default ) ) {
				$default_parts = $this->get_render_values($this->default);
				$unit = $default_parts['unit'];
			}
		}
		?>
		<select class="nsof-input nsof-measurement-select-unit"
				name="<?php echo esc_attr( substr($this->element_name, 0, -1) . '_unit]', $this->parent_container ) ?>">
			<?php foreach ( nsof_measurements_list() as $measurement ):?>
				<option value="<?php echo esc_attr( $measurement ) ?>" <?php selected( $measurement, $unit, true ); ?>><?php echo esc_html( $measurement ) ?></option>
			<?php endforeach?>
		</select>
		<div class="clear"></div>
		<?php
		//Still want the default description, if there is one.
		parent::render_after_field( $value, $instance );
	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'nsof-measurement-field', NSOF_URI.'/assets/css/nsof-measurement-field.css', array() );
	}

	// This is doing sanitization and is being used to concatenate the numeric measurement value and the selected
	// measurement unit.
	protected function sanitize_field_input( $value, $instance ) {
		//Get the property name of the unit field
		$unit_name = $this->get_unit_field_name( $this->base_name );

		//Initialize with default value, if any.
		$default_parts = $this->get_render_values($this->default);
		$unit = $default_parts['unit'];
		if( isset( $instance[ $unit_name ] ) ) {
			$units = nsof_measurements_list();
			if ( in_array( $instance[ $unit_name ], $units ) ) {
				$unit = $instance[ $unit_name ];
			}
			unset( $instance[ $unit_name ] );
		}

		$value = ( $value === '' ) ? false : (float) $value;
		$value .= $unit;
		return $value;
	}

	/**
	 * Get the name of the dropdown field rendered to allow the user to select a measurement unit.
	 * @since  1.0.0
	 */
	public function get_unit_field_name( $base_name ) {
		$v_name = $base_name;
		if( strpos($v_name, '][') !== false ) {
			// Remove this splitter
			$v_name = substr( $v_name, strrpos($v_name, '][') + 2 );
		}
		return $v_name . '_unit';
	}
}