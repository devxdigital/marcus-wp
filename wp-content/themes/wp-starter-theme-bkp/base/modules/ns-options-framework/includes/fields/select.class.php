<?php

/**
 * Class NSOF_Field_Select
 * @since  1.0.0
 */
class NSOF_Field_Select extends NSOF_Field_Base {
	/**
	 * The list of options which may be selected.
	 *
	 * @access protected
	 * @var array
	 */
	protected $options;
	/**
	 * If present, this string is included as a disabled (not selectable) value at the top of the list of options. If
	 * there is no default value, it is selected by default. You might even want to leave the label value blank when
	 * you use this.
	 *
	 * @access protected
	 * @var string
	 */
	protected $prompt;
	/**
	 * Determines whether this is a single or multiple select field.
	 *
	 * @access protected
	 * @var bool
	 */
	protected $multiple;
	/**
	 * Css classes
	 *
	 * @access protected
	 * @var string|array
	 */
	protected $class;


	protected $remote;

	protected function render_field( $value, $instance ) {

		$field_name = !empty( $this->multiple ) ? esc_attr( $this->element_name ).'[]' : esc_attr( $this->element_name );
		$is_multiple = !empty( $this->multiple ) ? 'data-tags="true" multiple' : '';
		$classes = is_array($this->class) ? 'nsof-input '.esc_attr( implode(' ', $this->class) ) : 'nsof-input '.$this->class;


		if(!empty($this->remote)){
			$attr_remote = "data-remote='".json_encode($this->remote)."'";
		}


		?>
		<select <?php echo $attr_remote;?> name="<?php echo $field_name;?>" id="<?php echo esc_attr( $this->element_id ) ?>" class="<?php echo $classes;?>" <?php echo $is_multiple; ?> style="width: 100%;" >
			<?php
			if ( empty( $this->multiple ) && isset( $this->prompt ) ){
				echo '<option value="default" disabled="disabled" selected="selected">'.esc_html( $this->prompt ).'</option>';
			}

			//if there are remote options
			if( isset( $this->remote ) && !empty( $this->remote ) ){
				if(is_array($value)){
					foreach($value as $id){
						$option_label = $this->get_option_label($this->remote['search'], $id);
						echo '<option value="'.$id.'" selected="selected">'.$option_label.'</option>';
					}
				}else if(!empty($value)){
					$option_label = $this->get_option_label($this->remote['search'], $value);
					echo '<option value="'.$value.'" selected="selected">'.$option_label.'</option>';
				}
			}

			//if there  are normal options
			if( !isset( $this->remote ) && isset( $this->options ) && !empty( $this->options ) ){
				foreach( $this->options as $key => $val ){
					if( is_array( $value ) ) {
						$selected = selected( true, in_array( $key, $value ), false );
					}else {
						$selected = selected( $key, $value, false );
					}
					echo '<option value="'.esc_attr( $key ).'" '.$selected.'>'.esc_html( $val ).'</option>';
				}
			}
			?>
		</select>
		<?php
	}


	protected function get_option_label($search, $val){
		global $wpdb;

		$option_label = $val;

		if( isset($search['users']) ){
			$return = $search['return'];
			$user = get_userdata($val);
			$option_label = $user->$return;
		}

		if( isset($search['object_types']) ){
			$return = $search['return'];
			$data = $wpdb->get_row( $wpdb->prepare(
				"SELECT * FROM $wpdb->posts WHERE ID = %d",
				$val
			));
			$option_label = $data->$return;
		}

		if( isset($search['terms']) ){
			$return = $search['return'];
			$data = $wpdb->get_row( $wpdb->prepare(
				"SELECT * FROM $wpdb->terms WHERE term_id = %d",
				$val
			));
			$option_label = $data->$return;
		}

		if( isset($search['comments']) ){
			$return = $search['return'];
			$data = $wpdb->get_row( $wpdb->prepare(
				"SELECT * FROM $wpdb->comments WHERE comment_ID = %d",
				$val
			));
			$option_label = $data->$return;
		}

		return $option_label;
	}

	protected function sanitize_field_input( $value, $instance ) {
		$values = is_array( $value ) ? $value : array( $value );
		$keys = array_keys( $this->options );
		$sanitized_value = array();
		foreach( $values as $value ) {
			if ( !in_array( $value, $keys ) ) {
				$sanitized_value[] = isset( $this->default ) ? $this->default : false;
			}
			else {
				$sanitized_value[] = $value;
			}
		}

		return count( $sanitized_value ) == 1 ? $sanitized_value[0] : $sanitized_value;
	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'nsof-select2', NSOF_URI.'/assets/css/fields/select2.css', array() );
		wp_enqueue_script( 'nsof-select2', NSOF_URI.'/assets/js/fields/select2.min.js', array( 'jquery'), '', true );
		wp_enqueue_script( 'nsof-select2-init', NSOF_URI.'/assets/js/fields/select2-init.js', array( 'nsof-select2'), '', true );
	}

}