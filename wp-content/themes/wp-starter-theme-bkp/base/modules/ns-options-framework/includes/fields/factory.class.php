<?php

/**
 * Class NSOF_Field_Factory
 * @since  1.0.0
 */
class NSOF_Field_Factory {

	private static $instance;

	public static function getInstance() {
		if( ! isset( NSOF_Field_Factory::$instance ) ) {
			NSOF_Field_Factory::$instance = new NSOF_Field_Factory();
		}
		return NSOF_Field_Factory::$instance;
	}


	/**
	 * Utility function to get a field name for a widget field.
	 *
	 * @param $field_name
	 * @param array $container
	 * @return mixed|string
	 */
	public function nsof_get_field_name( $field_name, $container = array() ) {
		if( empty($container) ) {
			return 'nsof-field['.$field_name.']';
		}

		// We also need to add the container fields
		$container_extras = '';
		foreach($container as $r) {
			$container_extras .= '[' . $r['name'] . ']';

			if( $r['type'] == 'repeater' ) {
				$container_extras .= '[#' . $r['name'] . '#]';
			}
		}

		//$name = $this->get_field_name( '{{{FIELD_NAME}}}' );
		//$name = 'nsof-field[_i_]'.$container_extras.'[' . esc_attr($field_name) . ']';
		$name = 'nsof-field'.$container_extras.'[' . esc_attr($field_name) . ']';

		return $name;
	}



		/**
	 * Get the ID of this field.
	 *
	 * @param $field_name
	 * @param array $container
	 * @param boolean $is_template
	 *
	 * @return string
	 */
	public function nsof_get_field_id( $field_name, $container = array(), $is_template = false ) {
		if( empty($container) ) {
			return $field_name;
		}
		else {
			$name = array();
			foreach ( $container as $container_item ) {
				$name[] = $container_item['name'];
			}
			$name[] = $field_name;
			//$field_id_base = $this->get_field_id(implode('-', $name));
			//$field_id_base = '_i_-'.$field_name;
			$field_id_base = $field_name;
			if ( $is_template ) {
				return $field_id_base . '-_id_';
			}
			if ( ! isset( $this->field_ids[ $field_id_base ] ) ) {
				$this->field_ids[ $field_id_base ] = 1;
			}
			$curId = $this->field_ids[ $field_id_base ]++;
			return $field_id_base . '-' . $curId;
		}
	}


	public function create_field( $field_name, $field_options, $for_repeater = array(), $is_template = false, $args = array() ) {

		$element_id = $this->nsof_get_field_id( $field_name, $for_repeater, $is_template );
		$element_name = $this->nsof_get_field_name( $field_name, $for_repeater );

		//in some scenarios we need to have names simple as string
		if( isset($args['string_name']) && $args['string_name'] ){
			$element_name = $field_name;
		}

		if ( empty( $field_options['type'] ) ) {
			$field_options['type'] = 'text';
			$field_options['label'] = __( 'This field does not have a type. Please specify a type for it to be rendered correctly.', 'wp-starter-theme' );
		}
		$field_class = $this->get_field_class_name( $field_options['type'] );

		// If we still don't have a class use the 'NSOF_Field_Error' class to indicate this to the user.
		if( ! class_exists( $field_class ) ) {
			return new NSOF_Field_Error('', '', '',
				array(
					'type' => 'error',
					'message' => 'The class \'' . $field_class . '\' could not be found. Please make sure you specified the correct field type and that the class exists.'
				)
			);
		}

		return new $field_class( $field_name, $element_id, $element_name, $field_options, $for_repeater );
	}


	private function get_field_class_name( $field_type ) {

		$field_class_type = implode( '_', array_map( 'ucfirst', explode( '-', $field_type ) ) );
		$class_prefixes = $this->get_class_prefixes();
		$class_found = false;
		$field_class = '';
		foreach( $class_prefixes as $class_prefix ) {
			$field_class = $class_prefix . $field_class_type;
			if ( class_exists( $field_class ) ) {
				$class_found = true;
				break;
			}
		}
		// If we can't find the custom class, attempt fall back to the 'NSOF_Field_' prefix.
		if ( ! $class_found ) {
			$field_class = 'NSOF_Field_' . $field_class_type;
		}
		return $field_class;
	}

	private function get_class_prefixes() {
		return apply_filters( 'nsof_field_class_prefixes', array( 'NSOF_Field_' ) );
	}
}