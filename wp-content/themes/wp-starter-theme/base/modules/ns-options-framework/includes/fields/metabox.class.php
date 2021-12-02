<?php
/**
 * Class NSOF_Field_Metabox
 * @since  1.0.0
 */
class NSOF_Field_Metabox extends NSOF_Field_Base {

	protected $NSOF;
	protected $prop;


	public function initialize(){

		$this->NSOF = NSOF::getInstance();

		$this->prop = $this->NSOF->set_defaults(
			array(
				'id'           => 'unique_id_here',
				'label'        => 'Metabox Label',
				'object_types' => array('post'),
				'taxonomies'   => array('category'),
				'show_on'      => '',
				'context'      => 'normal',
				'priority'     => 'core',
				'metakey'      => 'nsof-metabox',
				'settings'     => 'general',
			),
			$this->field_options['prop']
		);

		$this->init_hooks( $this->prop['object_types'] );
	}



	/**
	 * Init hook for specified object types
	 * @since  1.0.0
	 * @param  array $types
	 * @return null
	 */
	private function init_hooks( $types ){

		if( is_array( $types ) ){

			foreach ($types as $type) {
				$this->run_hooks_for( $type );
			}
		}
	}



	/**
	 * Run the hooks for a certain type
	 * @since  1.0.0
	 * @param  string $type
	 * @return null
	 */
	private function run_hooks_for( $type ){

		switch ( $type ) {
			case 'term':
				$this->term_hooks();
				break;

			case 'user':
				$this->user_hooks();
				break;

			case 'comment':
				$this->comment_hooks();
				break;

			case 'settings':
				$this->settings_hooks();
				break;

			default:
				$this->post_hooks();
				break;
		}
	}



	/**
	 * Check whether to show or not the metabox on certain object type
	 * @return [boolean]
	 */
	protected function show_on(){

		if( is_array($this->prop['show_on']) && isset($this->prop['show_on']['value']) ){
			if( is_array($this->prop['show_on']['value']) && !in_array($this->NSOF->get_id(), $this->prop['show_on']['value']) ){
				return false;
			}
		}

		return true;
	}



	/**
	 * Add fields to a certain type
	 * @since  1.0.0
	 * @param array $data
	 */
	private function add_fields( $data ) {

		if( !is_array($data) ){
			return;
		}

		$class = isset( $data['args']['class'] ) ? $data['args']['class'] : '';
		$value = get_metadata( $data['meta_type'], $data['object_id'], $data['meta_key'], true);

		if( isset( $this->field_options['fields'] ) ){
			$this->NSOF->render_form_fields( $this->field_options['fields'], $value, array('css_classes' => $class ) );
		}
	}



	/**
	 * Save data for a certain type
	 * @since  1.0.0
	 * @param  array $data
	 */
	private function save_data_fields( $data ){

		if( !is_array($data) ){
			return;
		}

		update_metadata( $data['meta_type'], $data['object_id'], $data['meta_key'], $data['meta_value'] );
	}



	/**
	 * Add metabox to object types
	 * @since  1.0.0
	 * @return null
	 */
	public function add_metabox() {

		if( is_array($this->prop['object_types']) ){

			foreach ( $this->prop['object_types'] as $post_type ) {

				add_meta_box(
					$this->prop['id'],
					$this->prop['label'],
					array( $this, 'metabox_callback' ),
					$post_type,
					$this->prop['context'],
					$this->prop['priority']
				);
			}
		}
	}



	/**
	 * Content of metabox
	 * @since  1.0.0
	 * @return null
	 */
	public function metabox_callback(){

		$this->add_fields( array(
			'meta_type' => $this->NSOF->get_type(),
			'object_id' => $this->NSOF->get_id(),
			'meta_key'  => $this->prop['metakey'],
			'args' => array(
				'class' => 'nsof-metabox'
			),
		) );
	}




	/**
	 * Hooks for POST/PAGE/CPTs
	 * @since  1.0.0
	 * @return null
	 */
	public function post_hooks() {

		if( !$this->show_on() ){
			return;
		}

		add_action( 'add_meta_boxes', array( $this, 'add_metabox' ) );
		add_action( 'add_attachment', array( $this, 'post_save' ) );
		add_action( 'edit_attachment', array( $this, 'post_save' ) );
		add_action( 'save_post', array( $this, 'post_save' ));
	}



	/**
	 * Save data from POST/PAGE/CPTs metaboxes
	 * @since  1.0.0
	 * @param  int    $post_id Post ID
	 * @return null
	 */
	public function post_save( $post_id ) {

		$this->save_data_fields( array(
			'meta_type'  => $this->NSOF->get_type(),
			'object_id'  => $post_id,
			'meta_key'   => $this->prop['metakey'],
			'meta_value' => $_POST['nsof-field'],
		) );
	}



	/**
	 * Hooks for COMMENTS
	 * @return null
	 */
	public function comment_hooks() {

		if( !$this->show_on() ){
			return;
		}

		add_action( 'add_meta_boxes_comment', array( $this, 'add_metabox' ) );
		add_action( 'edit_comment', array( $this, 'comment_save' ) );
	}



	/**
	 * Save data from COMMENTS fields
	 * @param  int    $comment_id
	 * @return null
	 */
	public function comment_save( $comment_id ) {

		if( isset($_POST['nsof-field']) ){

			$this->save_data_fields( array(
				'meta_type'  => 'comment',
				'object_id'  => $comment_id,
				'meta_key'   => $this->prop['metakey'],
				'meta_value' => $_POST['nsof-field'],
			) );
		}
	}



	/**
	 * Hooks for TERMS
	 * @return null
	 */
	public function term_hooks() {

		if ( ! function_exists( 'get_term_meta' ) ) {
			wp_die( __( 'Term Metadata is a WordPress > 4.4 feature. Please upgrade your WordPress install.', 'wp-starter-theme' ) );
		}

		foreach ( $this->prop[ 'taxonomies' ] as $taxonomy ) {

			if( !$this->show_on() ){
				return;
			}

			add_action( "{$taxonomy}_edit_form", array( $this, 'term_metabox' ), 8, 2 );
			add_action( "{$taxonomy}_add_form_fields", array( $this, 'term_metabox' ), 8, 2 );
		}

		add_action( 'created_term', array( $this, 'term_save' ), 10, 3 );
		add_action( 'edited_terms', array( $this, 'term_save' ), 10, 2 );
		//add_action( 'delete_term', array( $this, 'delete_term' ), 10, 3 );
	}



	/**
	 * Add fields to TERMS
	 * @return null
	 */
	public function term_metabox(){

		$class = 'nsof-metabox-table-term';

		//if we are on "Add new"
		if( !$this->NSOF->get_id()){
			$class = 'nsof-metabox-table-new_term';
		}

		$this->add_fields( array(
			'meta_type' => 'term',
			'object_id' => $this->NSOF->get_id(),
			'meta_key'  => $this->prop['metakey'],
			'args' => array(
				'class' => $class
			),
		) );
	}



	/**
	 * Save data from TERMS fields
	 * @param  int    $term_id  Term ID
	 * @param  int    $tt_id    Term Taxonomy ID
	 * @param  string $taxonomy Taxonomy
	 * @return null
	 */
	public function term_save( $term_id, $tt_id, $taxonomy = '' ) {
		//$taxonomy = $taxonomy ? $taxonomy : $tt_id;

		if( isset($_POST['nsof-field']) ){

			$this->save_data_fields( array(
				'meta_type'  => 'term',
				'object_id'  => $term_id,
				'meta_key'   => $this->prop['metakey'],
				'meta_value' => $_POST['nsof-field'],
			) );
		}
	}



	/**
	 * Hooks for USERS
	 * @return null
	 */
	public function user_hooks() {

		if( !$this->show_on() ){
			return;
		}

		add_action( 'show_user_profile', array( $this, 'user_metabox' ) );
		add_action( 'edit_user_profile', array( $this, 'user_metabox' ) );
		add_action( 'user_new_form', array( $this, 'user_metabox' ) );
		// add_action( 'user_new_form', array( $this, 'user_new_metabox' ) );
		add_action( 'personal_options_update', array( $this, 'user_save' ) );
		add_action( 'edit_user_profile_update', array( $this, 'user_save' ) );
		add_action( 'user_register', array( $this, 'user_save' ) );
	}



	/**
	 * Add fields to USERS
	 * @return null
	 */
	public function user_metabox(){

		//Display Metabox Label as a Section Title in profile only
		if( $this->NSOF->get_id()){
			echo '<h2>'.$this->prop['label'].'</h2>';
		}

		$this->add_fields( array(
			'meta_type' => 'user',
			'object_id' => $this->NSOF->get_id(),
			'meta_key'  => $this->prop['metakey'],
			'args' => array(
				'class' => 'nsof-metabox-table-user'
			),
		) );
	}



	/**
	 * Save data from USERS fields
	 * @return null
	 */
	public function user_save( $user_id ){

		if( isset($_POST['nsof-field']) ){

			$this->save_data_fields( array(
				'meta_type'  => 'user',
				'object_id'  => $user_id,
				'meta_key'   => $this->prop['metakey'],
				'meta_value' => $_POST['nsof-field'],
			) );
		}
	}



	/**
	 * Hooks for SETTINGS page/subpages
	 * @return null
	 */
	public function settings_hooks( ) {
        add_filter( 'admin_init' , array( $this , 'settings_metabox' ) );
    }



    /**
	 * Add fields to SETTINGS page/subpages
	 * @return string
	 */
    public function settings_metabox() {

    	//these field types are not supported for settings page
    	$not_supported = array( 'section', 'repeater', 'checkboxes', 'tablist', 'tab', 'page' );

    	//if we have a settings
    	if( is_array($this->prop['settings']) ){

			$id    = isset($this->prop['settings']['id']) ? $this->prop['settings']['id'] : '';
			$label = isset($this->prop['settings']['label']) ? $this->prop['settings']['label'] : '';
			$desc  = isset($this->prop['settings']['description']) ? $this->prop['settings']['description'] : '';
			$page  = isset($this->prop['settings']['page']) ? $this->prop['settings']['page'] : 'general';

    		add_settings_section( $id, $label, function() use ($desc) { echo $desc; }, $page );
    	}


    	//loop through the fields
    	foreach( $this->field_options['fields'] as $field_name => $field_options){

    		if( in_array( $field_options['type'], $not_supported) ){
    			continue;
    		}

			$label   = isset($field_options['label']) ? $field_options['label'] : '';
			$value   = get_option( $field_name, '' );
			$args    = array('string_name' => true);
			$page    = isset($this->prop['settings']['page']) ? $this->prop['settings']['page'] : 'general';
			$section = isset($this->prop['settings']['id']) ? $this->prop['settings']['id'] : '';

    		register_setting( $page, $field_name );

			//if we have a settings
    		if( is_array($this->prop['settings']) ){

		        add_settings_field(
		        	$field_name,
		        	'<label for="'.$field_name.'">'. $label .'</label>' ,
		        	function() use ( $field_name, $field_options, $value, $args ) {
		        		$this->NSOF->create_render_and_wrap_field( $field_name, $field_options, $value, $args );
		        	},
		        	$page,
		        	$section
		    	);

	    	}else{

	    		add_settings_field(
		        	$field_name,
		        	'<label for="'.$field_name.'">'.$label.'</label>' ,
		        	function() use ( $field_name, $field_options, $value, $args ) {
		        		$this->NSOF->create_render_and_wrap_field( $field_name, $field_options, $value, $args );
		        	},
		        	$this->prop['settings']
		    	);
	    	}
    	}

    }






	protected function render_field( $value, $instance ) {}
	protected function sanitize_field_input( $value, $instance ){}


}