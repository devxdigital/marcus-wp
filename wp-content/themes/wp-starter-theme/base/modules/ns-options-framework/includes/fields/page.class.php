<?php
/**
 * Class NSOF_Field_Page
 * @since  1.0.0
 */
class NSOF_Field_Page extends NSOF_Field_Base {

	protected $NSOF;
	protected $prop;

	public function initialize(){

		$this->NSOF = NSOF::getInstance();

		$this->prop = $this->NSOF->set_defaults(
			array(
				'mode'        => 'menu',
				'parent_slug' => 'options-general.php',
				'page_title'  => 'This is the page title',
				'menu_title'  => '(NSOF) Menu',
				'capability'  => 'manage_options',
				'menu_slug'   => 'nsof_slug_page',
				'icon_url'    => '',
				'position'    => 6,
			),
			$this->field_options['prop']
		);

		add_action( 'wp_ajax_nsofsaveformdata', array( $this , 'save_form_data' ) );
		add_action( 'admin_menu', array( $this, 'add_page'));
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts'));
	}



	/**
	 * Add page item menu
	 */
	public function add_page(){

		if($this->prop['mode'] == 'submenu'){

			add_submenu_page(
				$this->prop['parent_slug'],
				$this->prop['page_title'],
				$this->prop['menu_title'],
				$this->prop['capability'],
				$this->prop['menu_slug'],
				array( $this, 'render_content')
			);

		}else{

			add_menu_page(
				$this->prop['page_title'],
				$this->prop['menu_title'],
				$this->prop['capability'],
				$this->prop['menu_slug'],
				array( $this, 'render_content'),
				$this->prop['icon_url'],
				$this->prop['position']
			);
		}
	}



	/**
	 * Save data from a page form
	 * @since  1.0.0
	 * @return string
	 */
	public function save_form_data() {

		$datakey = sanitize_text_field($_POST['current_page']);
		$data    = $_POST['nsof-field'];

		update_option( $datakey, $data );

		$output = '<div class="updated notice" style="margin: 15px 0;">';
			$output .= '<p>Options have been saved!</p>';
			$output .= '<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>';
		$output .= '</div>';

		echo $output;

		wp_die();
	}



	/**
	 * Render page content
	 * @return string
	 */
	public function render_content(){

		// echo '<pre>'.print_r(nsof_get_option('bbgb', 'field6'),1).'</pre>';
		// echo '<pre>'.print_r(nsof_get_option('bbgb'),1).'</pre>';

		$value = get_option( $this->prop['menu_slug'] );

		echo '<div class="wrap">';
			echo '<div class="nsof-content-wapper nsof-options-page">';

				if( !empty( $this->prop['page_title'] ) ){
					echo '<h1 id="nsof-page-title">'.$this->prop['page_title'].'</h1>';
				}

				if( isset( $this->field_options['fields'] ) ){
					$this->NSOF->render_form_fields( $this->field_options['fields'], $value, array('has_form' => true) );
				}

			echo '</div>';
		echo '</div>';

	}



	public function enqueue_scripts() {
		wp_enqueue_style( 'nsof-page-field', NSOF_URI.'/assets/css/fields/page.css', array() );
	}



	protected function render_field( $value, $instance ) {}
	protected function sanitize_field_input( $value, $instance ){}

}