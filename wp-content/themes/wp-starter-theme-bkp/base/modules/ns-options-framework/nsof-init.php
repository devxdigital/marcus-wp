<?php
/**
 * Plugin Name: NS Options Framework
 * Plugin URI: http://nego-solutions.com
 * Description: It's a powerful framework for building page options, metaboxes/extra fields in post, page, comments, {custom_post_type}, terms, users or even settings page.
 * Version: 1.0.0
 * Author: Cosmin Schiopu
 * Author URI: http://nego-solutions.com
 *
 * Text Domain: nsof
 * Domain Path: /i18n/languages/
 *
 * @package NS Options Framework
 * @author Nego Solutions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}



if ( ! class_exists( 'NS_OptionsFramework' ) ) {


	final class NS_OptionsFramework{

		public $version = '1.0.0';


		/**
		 * How this module is suppose to work (inside of theme or as a plugin)
		 * @var string
		 */
		protected $mode = 'theme'; //'theme' or 'plugin'

		/**
		 * The path of NSOF in theme folder
		 * @var string
		 */
		protected $theme_path = '/base/modules/ns-options-framework';



		public function __construct(){

			include_once('includes/includer.php');

			$this->define_constants();

			add_action('init', array($this, 'init_nsof_base'), 99);
		}


		public function init_nsof_base(){
			$nsof_base = new NSOF;
			$nsof_base->run_factory();
		}



		/**
		 * Define NSOF Constants
		 */
		private function define_constants() {

			$upload_dir = wp_upload_dir();

			$this->define( 'NSOF_VERSION', $this->version );
			$this->define( 'NSOF_DELIMITER', '|' );

			if($this->mode == 'theme'){

				$this->define( 'NSOF_URI', get_template_directory_uri().$this->theme_path );
				$this->define( 'NSOF_PATH', get_template_directory().$this->theme_path );

			}elseif($this->mode == 'plugin'){
				$this->define( 'NSOF_URI', plugin_dir_url( __FILE__ ) );
				$this->define( 'NSOF_PATH', plugin_dir_path( __FILE__ ) );
			}
		}

		/**
		 * Define constant if not already set
		 * @param  string $name
		 * @param  string|bool $value
		 */
		private function define( $name, $value ) {
			if ( ! defined( $name ) ) {
				define( $name, $value );
			}
		}


	}


}
new NS_OptionsFramework;


