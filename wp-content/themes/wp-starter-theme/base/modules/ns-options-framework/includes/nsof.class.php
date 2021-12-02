<?php
/**
 * The base of options framework
 *
 * @since     1.0.0
 * @package   NSOF
 * @author    NegoSolutions
 * @license   GPL-2.0+
 * @link      http://nego-solutions.com
 *
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


if ( ! class_exists( 'NSOF' ) ) {

	final class NSOF{

		protected static $_instance = null;

		protected $parent_container = array();

		protected $top_levels       = array('page', 'metabox');

		protected $nsof_fields;

		/**
		 * Store NSOF_Field_Factory Class instance
		 * @since 1.0.0
		 * @var public
		 */
		public $FACTORY;



		public static function getInstance() {
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}


		public function __construct(){

			global $nsof_form_fields;

			$this->FACTORY = NSOF_Field_Factory::getInstance();
			$this->init_hooks();
			$this->nsof_fields = apply_filters('nsof_form_fields', $nsof_form_fields);
		}



		/**
		 * Let's run our hooks
		 * @since  1.0.0
		 * @return null
		 */
		private function init_hooks() {

			add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		}



		/**
		 * Merge defaults with the given args
		 * @since  1.0.0
		 * @param  string $key
		 * @return string|null
		 */
		public function set_defaults( $defaults = null, $args = null, $key = null ){

			if( $args != null && is_array($args) ){
				return nsof_smart_array_merge($defaults, $args);
			}

			if ( array_key_exists( $key, $defaults ) ) {
				return $defaults[ $key ];
			}
		}



		/**
		 * Get object id from global space if no id is provided
		 * @since  1.0.0
		 * @param  integer $id Object ID
		 * @return integer $id Object ID
		 */
		public function get_id( $id = 0 ) {
			global $pagenow;

			if ( $id ) {
				return $id;
			}


			// Try to get our object ID from the global space
			switch ( $this->get_type() ) {
				case 'user':
					$id = isset( $_REQUEST['user_id'] ) ? $_REQUEST['user_id'] : $id;
					$id = ! $id && 'user-new.php' != $pagenow && isset( $GLOBALS['user_ID'] ) ? $GLOBALS['user_ID'] : $id;
					break;

				case 'comment':
					$id = isset( $_REQUEST['c'] ) ? $_REQUEST['c'] : $id;
					$id = ! $id && isset( $GLOBALS['comments']->comment_ID ) ? $GLOBALS['comments']->comment_ID : $id;
					break;

				case 'term':
					$id = isset( $_REQUEST['tag_ID'] ) ? $_REQUEST['tag_ID'] : $id;
					break;

				default:
					$id = isset( $GLOBALS['post']->ID ) ? $GLOBALS['post']->ID : $id;
					$id = isset( $_REQUEST['post'] ) ? $_REQUEST['post'] : $id;
					break;
			}

			return $id;
		}



		/**
		 * Returns the object type
		 * @since  1.0.0
		 * @return string Object type
		 */
		public function get_type( $type = '' ) {
			global $pagenow;

			if ( $type ) {
				return $type;
			}

			if ( in_array( $pagenow, array( 'user-edit.php', 'profile.php', 'user-new.php' ), true ) ) {
				return 'user';

			} elseif ( in_array( $pagenow, array( 'edit-comments.php', 'comment.php' ), true ) ) {
				return 'comment';

			} elseif ( 'edit-tags.php' == $pagenow ) {
				return 'term';

			} else {
				return 'post';
			}
		}



		/**
		 * Process the options and create fields
		 * @since  1.0.0
		 * @param  object $field_class - Field Class
		 * @return string
		 */
		public function run_factory( $field_class = null ){

			$processed_options = $this->process_fields( $field_class );

			if ( !empty( $processed_options['notice'] ) ) {
				add_action( 'admin_notices', array( $this, 'no_fields_found' ), 1 );
				return;
			}

			if( isset( $processed_options['found_top_levels'] ) ){

				foreach ( $processed_options['found_top_levels'] as $fields ) {
					$this->FACTORY->create_field( $fields['field_name'], $fields['field_data'] );
				}
			}
		}



		public function create_render_and_wrap_field( $field_name, $field_options, $value = null, $args = array() ){

			$form_id = 'nsof_form_'.md5( uniqid( rand(), true ) );
			$this_class = get_class($this);
			?>
			<div class="nsof-form nsof-form-main " id="<?php echo $form_id;?>" data-class="<?php echo $this_class;?>">
				<?php
				$field = $this->FACTORY->create_field( $field_name, $field_options, array(), false, $args );
				$field->render( $value );

				$field_js_vars = $field->get_javascript_variables();
				$fields_javascript_variables = array();

				if( ! empty( $field_js_vars ) ) {
					$fields_javascript_variables[$field_name] = $field_js_vars;
				}
				$field->enqueue_scripts();
				?>
			</div>

			<script type="text/javascript">
			( function($) {
				if(typeof window.nsof_field_javascript_variables == 'undefined') window.nsof_field_javascript_variables = {};
				window.nsof_field_javascript_variables["<?php echo $this_class ?>"] = <?php echo json_encode( $fields_javascript_variables ) ?>;

				if(typeof $.fn.nsofSetupForm != 'undefined') {
					$('#<?php echo $form_id ?>').nsofSetupForm();
				}
				else {
					// Init once admin scripts have been loaded
					$( document).on('nsofadminloaded', function(){
						$('#<?php echo $form_id ?>').nsofSetupForm();
					});
				}
			} )( jQuery );
			</script>

			<?php
		}



		/**
		 * Render form fields by given options
		 * @since  1.0.0
		 * @param  array $nsof_fields - options for creating fields
		 * @param  array $value        - the current instance value of the fields
		 * @param  array $args         - extra arguments
		 * @return string
		 */
		public function render_form_fields( $nsof_fields = array(), $value = array(), $args = array() ){

			if( !is_array($nsof_fields ) || count( $nsof_fields ) == 0 ) {
				echo 'Processing Form Fields has failed, please check!';
	        	return;
			}

			$form_id          = 'nsof_form_'.md5( uniqid( rand(), true ) );
			$this_class       = get_class($this);
			$has_form         = isset($args['has_form']) ? $args['has_form'] : false;
			$parent_container = isset($args['parent_container']) ? $args['parent_container'] : null;
			$css_classes      = '';

			//check what extra CSS classes we have
			if( isset($args['css_classes']) ){
				if( is_array($args['css_classes']) ){
					$css_classes = implode(' ', $args['css_classes']);
				}else{
					$css_classes = $args['css_classes'];
				}
			}


			//check if we set a parent container
			if( isset( $parent_container )) {
				if( ! in_array( $parent_container, $this->parent_container, true ) ){
					$this->parent_container[] = $parent_container;
				}
			}


			if ($has_form) {

				$current_page = isset( $_GET['page'] ) ? $_GET['page'] : '' ;

				?>
				<form id="nsof-form-options" method="post">
					<div data-response ></div>
					<input type='hidden' name='current_page' value='<?php echo $current_page; ?>'>
				<?php
			}
			?>

			<div class="nsof-form nsof-form-main <?php echo $css_classes;?>" id="<?php echo $form_id;?>" data-class="<?php echo $this_class;?>">

				<?php
				foreach( $nsof_fields as $field_name => $field_options ) {

					$values = isset( $value[$field_name] ) ? $value[$field_name] : null;

					$field = $this->FACTORY->create_field( $field_name, $field_options, $this->parent_container );
					$field->render( $values );

					$field_js_vars = $field->get_javascript_variables();
					$fields_javascript_variables = array();

					if( ! empty( $field_js_vars ) ) {
						$fields_javascript_variables[$field_name] = $field_js_vars;
					}
					$field->enqueue_scripts();

				}
				?>

			</div>

			<script type="text/javascript">
			( function($) {
				if(typeof window.nsof_field_javascript_variables == 'undefined') window.nsof_field_javascript_variables = {};
				window.nsof_field_javascript_variables["<?php echo $this_class ?>"] = <?php echo json_encode( $fields_javascript_variables ) ?>;

				if(typeof $.fn.nsofSetupForm != 'undefined') {
					$('#<?php echo $form_id ?>').nsofSetupForm();
				}
				else {
					// Init once admin scripts have been loaded
					$( document).on('nsofadminloaded', function(){
						$('#<?php echo $form_id ?>').nsofSetupForm();
					});
				}
			} )( jQuery );
			</script>


			<?php
			if ($has_form) { ?>

					<button type="submit" id="nsof-save-action" class="button button-primary button-large">
						<div class="loading-spinner small" data-spinner='{"left": "20%"}'></div> Save
					</button>

				</form>

			<?php
			}
		}



		/**
		 * Process Form Fields
		 * @since  1.0.0
		 * @param  object $field_class - Field Class
		 * @return array
		 */
		public function process_fields( $field_class = null ) {

			$found_top_levels = array();
			$broken_types = array();


			//check if we have an instance of Field Class and get levels and form fields
			if ( $field_class == null ) {
				$nsof_fields = $this->nsof_fields;
				$accepted_types = $this->top_levels;
			} else {
				$nsof_fields = $field_class->field_options['fields'];
				$accepted_types = $field_class->accepted_levels;
			}

			//if we do not have fields defined let's stop here and show notice
			if ( !is_array( $nsof_fields ) || count( $nsof_fields ) == 0 ) {
				add_action( 'admin_notices', array( $this, 'no_fields_found' ), 1 );
				return;
			}


			//walk through the form fields and check what types we have
			foreach ( $nsof_fields as $field_name => $field_data) {
		       if ( isset($field_data['type']) && in_array( $field_data['type'], $accepted_types ) ) {
		           $found_top_levels[] = array( 'field_name' => $field_name, 'field_data' => $field_data );
		       } else {
		       		$broken_types[] = array( 'field_name' => $field_name, 'field_data' => $field_data );
		       }
			}

			return array( 'notice' => $broken_types, 'found_top_levels' => $found_top_levels );
		}



		/**
		 * Get a value by a certain given key
		 * @since  1.0.0
		 * @param  string $key
		 * @param  array  $arr
		 * @param  string $output
		 * @return string|null
		 */
		public function get_value_by_key( $key = '', $arr = array(), $output = '' ){

			if( is_array($arr) && count($arr) >0 ){

				array_walk(
					$arr,
					function($v, $k, $u) {
						if($k === $u[0]) $u[1] = $v;
					},
					array($key, &$output)
				);

				if( empty($output) ){

					foreach($arr as $k =>  $item){

						if(is_array($item)){
							$output = $this->get_value_by_key($key, $item, $output);
						}
					}
				}
			}

			return $output;
		}




		public function no_fields_found() {
    		echo '<div class="update-nag notice" style="display: block;"><p>You do not have any fields set for NS Options Framework yet !</p></div>';
		}



		/**
		 * Enqueue the admin page stuff.
		 */
		public function admin_enqueue_scripts($prefix) {

			//if( $prefix != 'plugins_page_so-widgets-plugins' ) return;

			wp_enqueue_style( 'nsof-fontawesome', NSOF_URI.'/assets/css/font-awesome.min.css', array( ), '' );

			wp_enqueue_style( 'wp-color-picker' );
			wp_enqueue_style( 'nsof-admin', NSOF_URI.'/assets/css/admin.css', array( ), '' );


			wp_enqueue_script( 'wp-color-picker' );
			wp_enqueue_media();
			wp_enqueue_script( 'nsof-save-form', NSOF_URI.'/assets/js/save-form.js', array(), '', true );
			wp_enqueue_script( 'nsof-admin', NSOF_URI.'/assets/js/admin.js', array(), '', true );

			//wp_enqueue_script( 'jquery');

			wp_enqueue_script( 'jquery-form');

			wp_localize_script( 'nsof-admin', 'nsOptions', array(
				'ajaxurl' => wp_nonce_url( admin_url('admin-ajax.php'), 'nsof_action', '_nsof_nonce' ),
				'sure' => __('Are you sure?', 'wp-starter-theme')
			));



			if ( ! wp_script_is( 'nsof-admin-posts-selector' ) ) {

				wp_enqueue_style( 'nsof-admin-posts-selector', NSOF_URI.'/assets/css/post-selector.css', array() );
				wp_enqueue_script( 'nsof-admin-posts-selector', NSOF_URI.'/assets/js/posts-selector.js', array( 'jquery', 'jquery-ui-sortable', 'jquery-ui-autocomplete', 'underscore', 'backbone' ), '', true );

				wp_localize_script( 'nsof-admin-posts-selector', 'nsofPostsSelectorTpl', array(
					'ajaxurl' => wp_nonce_url( admin_url('admin-ajax.php'), 'nsof_action', '_nsof_nonce' ),
					'modal' => file_get_contents( NSOF_PATH.'/includes/tpl/posts-selector/modal.html' ),
					'postSummary' => file_get_contents( NSOF_PATH.'/includes/tpl/posts-selector/post.html' ),
					'foundPosts' => '<div class="nsof-post-count-message">' . sprintf( __('This query returns <a href="#" class="preview-query-posts">%s posts</a>.', 'wp-starter-theme'), '<%= foundPosts %>') . '</div>',
					'fields' => nsof_post_selector_form_fields(),
					'selector' => file_get_contents( NSOF_PATH.'/includes/tpl/posts-selector/selector.html' ),
				) );

				wp_localize_script( 'nsof-admin-posts-selector', 'nsofPostsSelectorVars', array(
					'modalTitle' => __('Select posts', 'wp-starter-theme'),
				) );
			}

		}


	}

}