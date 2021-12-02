<?php

/**
 * Class NSOF_Field_Repeater
 * @since  1.0.0
 */
class NSOF_Field_Repeater extends NSOF_Field_Container_Base {

	/**
	 *  A default label for each repeated item.
	 *
	 * @access protected
	 * @var string
	 */
	protected $item_name;
	/**
	 * This associative array describes how the repeater may retrieve the item labels from HTML elements as they are
	 * updated. The options are:
	 *  - selector string A JQuery selector which is used to find an element from which to retrieve the item label.
	 *  - update_event string The JavaScript event on which to bind and update the item label.
	 *  - value_method string The JavaScript function which should be used to retrieve the item label from an element.
	 *
	 * @access protected
	 * @var array
	 */
	protected $item_label;
	/**
	 * The maximum number of repeated items to display before adding a scrollbar to the repeater.
	 *
	 * @access protected
	 * @var int
	 */
	protected $scroll_count;
	/**
	 * Whether or not items may be added to or removed from this repeater by user interaction.
	 *
	 * @access protected
	 * @var bool
	 */
	protected $readonly;

	protected function render_field( $value, $instance ) {
		if( !isset( $this->fields ) || empty( $this->fields ) ) return;
		$container = array( 'name' => $this->base_name, 'type' => 'repeater' );
		$item_label = isset( $this->item_label ) ? $this->item_label : null;
		if ( ! empty( $item_label ) ) {
			// convert underscore naming convention to camelCase for javascript and encode as json string
			$item_label = wp_parse_args( $item_label, array(
				'update_event' => 'change',
				'value_method' => 'val'
			) );
			$item_label = nsof_underscores_to_camel_case( $item_label );
			$item_label = json_encode( $item_label );
		}
		if( empty( $this->item_name ) ) $this->item_name = __( 'Item', 'wp-starter-theme' );
		?>
		<div class="nsof-field-repeater"
		     data-item-name="<?php echo esc_attr( $this->item_name ) ?>"
		     data-repeater-name="<?php echo esc_attr( $this->base_name ) ?>"
		     data-element-name="<?php echo esc_attr( $this->element_name ) ?>"
			<?php echo ! empty( $item_label ) ? 'data-item-label="' . esc_attr( $item_label ) . '"' : '' ?>
			<?php echo ! empty( $this->scroll_count ) ? 'data-scroll-count="' . esc_attr( $this->scroll_count ) . '"' : '' ?>
			<?php if( ! empty( $this->readonly ) ) echo 'readonly' ?>>
			<div class="nsof-field-repeater-top">
				<div class="nsof-field-repeater-expend"></div>
				<h3><?php echo esc_html( $this->label ) ?></h3>
			</div>
			<div class="nsof-field-repeater-items">
				<?php
				if( is_array( $value ) ) {
					foreach( $value as $v ) {
						?>
						<div class="nsof-field-repeater-item ui-draggable">
							<div class="nsof-field-repeater-item-top">
								<div class="nsof-field-expand"></div>
								<?php if( empty( $this->readonly ) ) : ?>
									<div class="nsof-field-copy"></div>
									<div class="nsof-field-remove"></div>
								<?php endif; ?>
								<h4><?php echo esc_html( $this->item_name ) ?></h4>
							</div>
							<div class="nsof-field-repeater-item-form">
								<?php
								$this->create_and_render_sub_fields( $v, $container );
								?>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
			<?php if( empty( $this->readonly ) ) : ?>
				<div class="nsof-field-repeater-footer">
					<div class="nsof-field-repeater-add"><?php esc_html_e( 'Add New', 'wp-starter-theme' ) ?></div>
				</div>
			<?php endif; ?>
			<?php
			ob_start();
			$this->create_and_render_sub_fields( null, $container, true );
			$rpt_fields = ob_get_clean();
			$rpt_fields = preg_replace( '/\s+name\s*=\s*/', ' data-name=', $rpt_fields );
			?>
			<div class="nsof-field-repeater-item-html" style="display: none;">
				<?php echo $rpt_fields; ?>
			</div>
		</div>
		<?php
	}

	protected function render_field_label( $value, $instance ) {
		// Empty override. This field renders it's own label in the render_field() function.
	}

	/**
	 * Go over the items in the repeater and sanitize each one using the container sanitization function.
	 *
	 * @param mixed $value
	 *
	 * @return array|mixed
	 */
	function sanitize_field_input( $value, $instance ){
		if( empty($value) ) return array();

		foreach( $value as &$el ) {
			$el = parent::sanitize_field_input( $el, $instance );
		}

		return $value;
	}
}