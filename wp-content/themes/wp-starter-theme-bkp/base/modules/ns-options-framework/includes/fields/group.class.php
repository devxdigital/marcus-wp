<?php
/**
 * Class NSOF_Field_Group
 * @since  1.0.0
 */
class NSOF_Field_Group extends NSOF_Field_Container_Base {

	protected $NSOF;

	public function initialize(){

		$this->NSOF = NSOF::getInstance();
	}

	protected function render_field( $value, $instance ) {
		echo '<pre>'.print_r($this->fields,1).'</pre>';
		//$this->create_and_render_sub_fields( $value, array( 'name' => $this->base_name, 'type' => 'group' ) );


		?>

	    <div class="nsof-tabs tabs-left">

			<!-- Nav tabs -->
			<div class="tab-links" role="tablist">
				<?php echo $this->render_tab_nav( $this->fields ); ?>
			</div>


			<!-- Tab panes -->
			<div class="tab-content">
				<?php
				$index = 0;
				foreach( $this->fields as $field_name => $tab_pane ):

					$is_active = $index == 0 ? 'active' : '';

					$parent_container = array(
						'name' => $this->base_name,
						'type' => 'tablist'
					);

					if( ! in_array( $parent_container, $this->parent_container, true ) ){
						$this->parent_container[] = $parent_container;
					}
					?>

					<div role="tabpanel" class="nsof-tab-pane <?php echo $is_active;?>">
						<?php
						$values = isset( $value[$field_name] ) ? $value[$field_name] : null;

						$field = $this->NSOF->FACTORY->create_field( $field_name, $tab_pane, $this->parent_container );
						$field->render( $values );

						?>
					</div>

				<?php
				$index++;
				endforeach;?>
			</div>

		</div>

		<?php
	}


	/**
	 * Render navigation of tablist
	 * @since  1.0.0
	 * @param  array $data
	 * @return string|null
	 */
	protected function render_tab_nav($data){

		if( is_array($data) && count($data) > 0 ){

			$output = '';
			$index = 0;

			foreach ($data as $tab_nav){

				$is_active = $index == 0 ? 'active' : '';

				if(isset($tab_nav['type']) && $tab_nav['type']=='tablist'){

					$output .= '<div class="group-name"><a href="#">ceva aici</a></div>';
					$output .= '<div class="group-child">'.$this->render_tab_nav($tab_nav['fields']).'</div>';
				}else{

					$output .= '<div class="'.$is_active.'"><a href="#" role="tab" data-toggle="tab">'.$tab_nav['label'].'</a></div>';
				}
				$index++;
			}

			return $output;
		}
	}


	public function enqueue_scripts() {

		wp_enqueue_style( 'nsof-tablist', NSOF_URI.'/assets/css/fields/tablist.css', array() );
		wp_enqueue_script( 'nsof-tablist', NSOF_URI.'/assets/js/fields/tablist.js', array( 'jquery'), '', true );
	}

	protected function sanitize_field_input( $value, $instance ){}

	protected function render_before_field( $value, $instance ) {}

    protected function render_field_description() {}

}