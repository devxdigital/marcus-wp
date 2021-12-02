<?php
/**
 * Class NSOF_Field_Tablist
 * @since  1.0.0
 */
class NSOF_Field_Tablist extends NSOF_Field_Container_Base {

	protected $NSOF;
	protected $mode = '';

	public function initialize(){

		$this->NSOF = NSOF::getInstance();
	}


	protected function render_field( $value, $instance ) {

		//if we don't have fields stop here
		if( !$this->fields || !is_array($this->fields) ){
			return;
		}

		//check if we have mode
        if(isset($this->field_options['mode']) && !empty($this->field_options['mode'])){
     		$this->mode = 'tabs-'.$this->field_options['mode'];
        }

		?>

	    <div class="nsof-tabs <?php echo $this->mode;?>">
			<div class="tab-links" role="tablist">
				<?php $this->render_tab_nav($this->fields); ?>
			</div>

			<div class="tab-content">
				<?php $this->render_tab_pane($this->fields, $value);?>
			</div>
		</div>

		<?php

	}



	/**
	 * Render navigation of tablist
	 * @since  1.0.0
	 * @param  array $items
	 * @return string|null
	 */
	protected function render_tab_nav( $items = null ){

		if( !is_array($items) ){
			return;
		}

		$index = 0;
		foreach( $items as $tab_nav ):

			$tab_nav_label = isset($tab_nav['label']) ? $tab_nav['label'] : 'Tab Label';
			$is_active = $index == 0 ? 'active' : '';
			?>

			<div class="<?php echo $is_active;?>">
				<a href="#" role="tab" data-toggle="tab"><?php echo $tab_nav_label;?></a>
			</div>

			<?php
			$index++;
		endforeach;
	}



	/**
	 * Render the content of each tab
	 * @since  1.0.0
	 * @param  array  $items
	 * @return string|null
	 */
	protected function render_tab_pane( $items = null, $value='' ){

		if( !is_array($items) ){
			return;
		}

		$index = 0;
		foreach( $items as $field_name => $tab_pane ):

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
		endforeach;
	}


	public function enqueue_scripts() {

		wp_enqueue_style( 'nsof-tablist', NSOF_URI.'/assets/css/fields/tablist.css', array() );
		wp_enqueue_script( 'nsof-tablist', NSOF_URI.'/assets/js/fields/tablist.js', array( 'jquery'), '', true );
	}

	protected function sanitize_field_input( $value, $instance ){}

	protected function render_before_field( $value, $instance ) {}

    protected function render_field_description() {}

}