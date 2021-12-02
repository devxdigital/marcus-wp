<?php
/**
 * Loads all classes found with the prefixes
 *
 * @since  	  1.0.0
 * @package   NSOF_Class_Loader
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


if ( ! class_exists( 'NSOF_Class_Loader' ) ) {

	class NSOF_Class_Loader {

		public function __construct(){

			$class_prefixes = apply_filters( 'nsof_field_class_prefixes', array( 'NSOF_Field_' ) );
			$this->_add_class_prefixes( $class_prefixes );

			$class_paths = apply_filters( 'nsof_field_class_paths', array( plugin_dir_path( __FILE__ ).'fields/' ) );
			$this->_add_class_paths( $class_paths );

			$this->_register();
		}


		/**
		 * Add class prefixes
		 * @param string $class_prefixes
		 */
		public function _add_class_prefixes( $class_prefixes ) {

			if( !isset( $this->class_prefixes ) ) $this->class_prefixes = array();
			$this->class_prefixes = array_merge( $this->class_prefixes, $class_prefixes );
		}



		/**
		 * Add class paths
		 * @param string $class_paths
		 */
		public function _add_class_paths( $class_paths ) {

			if( !isset( $this->class_paths ) ) $this->class_paths = array();
			$this->class_paths = array_merge( $this->class_paths, $class_paths );
		}



		/**
		 * Load all class files
		 * @param  string $field_classname
		 * @return included file
		 */
		public function _load_field_class( $field_classname ) {

			$valid_classname = false;
			$class_prefix = '';

			foreach ( $this->class_prefixes as $class_prefix ) {
				$valid_classname = strpos( $field_classname, $class_prefix ) !== false;
				if( $valid_classname ) break;
			}
			if ( ! $valid_classname ) return;

			$filename = strtolower( str_replace( '_', '-', str_replace( $class_prefix, '', $field_classname ) ) );

			foreach( $this->class_paths as $class_path ) {
				$filepath = $class_path . $filename . '.class.php';
				if ( file_exists( $filepath ) ) {
					require_once $filepath;
				}
			}

		}


		/**
		 * Check class instances
		 * @return [type] [description]
		 */
		public function _register() {
			spl_autoload_register( array( $this, '_load_field_class' ) );
		}

	}

}
new NSOF_Class_Loader;