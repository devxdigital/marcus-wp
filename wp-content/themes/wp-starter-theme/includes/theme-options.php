<?php
/**
 * Set theme options page fields
 */


add_filter('nsof_form_fields', 'nsof_theme_options');

function nsof_theme_options( $fields ){

    $fields['nsof-theme-options'] = array(
        'type' => 'page',
        'prop' => array(
            'mode' => 'submenu',
            'parent_slug' => 'themes.php',
            'page_title' => __('NSOF Theme Options', 'wp-starter-theme'),
            'menu_title' => __('Theme Options', 'wp-starter-theme'),
            'capability' => 'manage_options',
            'menu_slug' => 'nsof-theme-options',
            'icon_url' => '',
            'position' => 6,
        ),
        'fields' => array(

            'tablist1' => array(
                'type' => 'tablist',
                'mode' => 'left',
                'fields' => array(
                    //Header Tab
                    'tab2' => array(
                    	'type' => 'tab',
                        'label' => 'Header',
                        'fields' => array(
                            'show_adminbar' => array(
                                'type' => 'radio',
                                'label' => __('Show Admin Bar', 'wp-starter-theme'),
                                'default' => '1',
                                'options' => array(
                                    '1' => 'Yes',
                                    '0' => 'No'
                                )
                            ),
                            'main_logo' => array(
                                'type' => 'media',
                                'label' => __('Logo Image', 'wp-starter-theme'),
                                'description' => __('Upload your logo image, this will overwrite "Logo Text"', 'wp-starter-theme'),
                            ),
                        	'is_header_sticky' => array(
                                'type' => 'radio',
                                'label' => __('Make Header Sticky', 'wp-starter-theme'),
                                'description' => __('Would you like to have a sticky header?', 'wp-starter-theme'),
                                'default' => 'no',
                                'options' => array(
						            'header_sticky ' => 'Yes',
						            'no' => 'No',
						            'header_sticky_on_desktop ' => 'Desktop only',
						            'header_sticky_on_small_devices ' => 'Mobile & Tablet only',
						        )
                            ),
                    	)
                	),
                	//Footer Tab
                	'tab3' => array(
                    	'type' => 'tab',
                        'label' => 'Footer',
                        'fields' => array(
                        	'copyright_text' => array(
								'type' => 'textarea',
                                'label' => __('Copyright text', 'wp-starter-theme'),
								'default' => html_entity_decode('&copy; %year% %name%'),
								'description' => __('Available data: %year% (current year), %name% (site name)', 'wp-starter-theme'),
                            ),
                    	)
                	),
                     'tab5' => array(
                        'type' => 'tab',
                        'label' => 'Styling',
                        'fields' => array(

                                            'elements_list' => array(
                                                'type' => 'tablist',
                                                'mode' => 'left',
                                                'fields' => array(
                                                    'h1_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'H1 &lt;h1&gt;',
                                                        'fields' => array(
                                                            'h1_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'h1_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '36',
                                                            ),
                                                            'h1_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'h1_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'h1_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'h1_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h1_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h1_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h1_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h1_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h1_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h1_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h1_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h1_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h1_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    ),
                                                    'h2_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'H2 &lt;h2&gt;',
                                                        'fields' => array(
                                                            'h2_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'h2_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '30',
                                                            ),
                                                            'h2_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'h2_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'h2_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'h2_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h2_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h2_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h2_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h2_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h2_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h2_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h2_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h2_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h2_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    ),
                                                    'h3_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'H3 &lt;h3&gt;',
                                                        'fields' => array(
                                                            'h3_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'h3_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '24',
                                                            ),
                                                            'h3_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'h3_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'h3_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'h3_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h3_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h3_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h3_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h3_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h3_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h3_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h3_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h3_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h3_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    ),
                                                    'h4_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'H4 &lt;h4&gt;',
                                                        'fields' => array(
                                                            'h4_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'h4_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '18',
                                                            ),
                                                            'h4_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'h4_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'h4_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'h4_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h4_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h4_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h4_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h4_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h4_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h4_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h4_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h4_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h4_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    ),
                                                    'h5_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'H5 &lt;h5&gt;',
                                                        'fields' => array(
                                                            'h5_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'h5_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '14',
                                                            ),
                                                            'h5_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'h5_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'h5_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'h5_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h5_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h5_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h5_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h5_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h5_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h5_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h5_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h5_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h5_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    ),
                                                    'h6_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'H6 &lt;h6&gt;',
                                                        'fields' => array(
                                                            'h6_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'h6_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '12',
                                                            ),
                                                            'h6_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'h6_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'h6_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'h6_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h6_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h6_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h6_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h6_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h6_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h6_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h6_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h6_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'h6_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    ),
                                                    'paragraph_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'Paragraph &lt;p&gt;',
                                                        'fields' => array(
                                                            'paragraph_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'paragraph_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '14',
                                                            ),

                                                            'paragraph_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'paragraph_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'paragraph_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'paragraph_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'paragraph_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'paragraph_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'paragraph_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'paragraph_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'paragraph_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'paragraph_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'paragraph_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'paragraph_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'paragraph_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    ),
                                                    'pre_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'Pre &lt;pre&gt;',
                                                        'fields' => array(
                                                            'pre_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'pre_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '14',
                                                            ),

                                                            'pre_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'pre_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'pre_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'pre_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'pre_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'pre_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'pre_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'pre_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'pre_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'pre_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'pre_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'pre_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'pre_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    ),
                                                    'blockquote_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'Blockquote &lt;blockquote&gt;',
                                                        'fields' => array(
                                                            'blockquote_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'blockquote_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '18',
                                                            ),

                                                            'blockquote_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'blockquote_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'blockquote_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'blockquote_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'blockquote_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'blockquote_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'blockquote_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'blockquote_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'blockquote_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'blockquote_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'blockquote_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'blockquote_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'blockquote_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    ),
                                                    'ol_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'Ordered List &lt;ol&gt;',
                                                        'fields' => array(
                                                            'ol_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'ol_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),

                                                            'ol_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'ol_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'ol_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'ol_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    ),
                                                    'ol_li_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'Ordered List Item &lt;ol&gt; &lt;li&gt; ',
                                                        'fields' => array(
                                                            'ol_li_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'ol_li_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),

                                                            'ol_li_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'ol_li_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'ol_li_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'ol_li_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_li_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_li_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_li_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_li_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_li_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_li_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_li_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_li_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ol_li_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    ),
                                                    'ul_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'Unordered List  &lt;ul&gt;',
                                                        'fields' => array(
                                                            'ul_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'ul_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),

                                                            'ul_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'ul_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'ul_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'ul_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    ),

                                                'ul_li_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'Unordered List Item  &lt;ul&gt; &lt;li&gt;',
                                                        'fields' => array(
                                                            'ul_li_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'ul_li_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),

                                                            'ul_li_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'ul_li_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'ul_li_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'ul_li_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_li_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_li_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_li_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_li_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_li_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_li_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_li_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_li_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'ul_li_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    ),
                                                'custom_1_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'Custom Style 1',
                                                        'fields' => array(
                                                            'custom_1_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'custom_1_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),

                                                            'custom_1_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'custom_1_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'custom_1_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'custom_1_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_1_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_1_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_1_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_1_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_1_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_1_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_1_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_1_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_1_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    ),
                                                'custom_2_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'Custom Style 2',
                                                        'fields' => array(
                                                            'custom_2_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'custom_2_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),

                                                            'custom_2_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'custom_2_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'custom_2_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'custom_2_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_2_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_2_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_2_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_2_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_2_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_2_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_2_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_2_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_2_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    ),
                                            'custom_3_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'Custom Style 3',
                                                        'fields' => array(
                                                            'custom_3_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'custom_3_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),

                                                            'custom_3_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'custom_3_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'custom_3_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'custom_3_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_3_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_3_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_3_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_3_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_3_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_3_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_3_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_3_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_3_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    ),
                                            'custom_4_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'Custom Style 4',
                                                        'fields' => array(
                                                            'custom_4_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'custom_4_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),

                                                            'custom_4_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'custom_4_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'custom_4_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'custom_4_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_4_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_4_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_4_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_4_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_4_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_4_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_4_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_4_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_4_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    ),
                                            'custom_5_tab' => array(
                                                        'type' => 'tab',
                                                        'label' => 'Custom Style 5',
                                                        'fields' => array(
                                                            'custom_5_font' => array(
                                                                'type' => 'font',
                                                                'label' => __('Select a font', 'wp-starter-theme'),
                                                            ),
                                                            'custom_5_font_size' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Font size', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),

                                                            'custom_5_color' => array(
                                                                'type' => 'color',
                                                                'label' => __('Font Color', 'wp-starter-theme'),
                                                                'default' => '',
                                                            ),
                                                            'custom_5_font_weight' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Weight', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Weight',
                                                                    'normal ' => 'normal',
                                                                    'bold' => 'bold',
                                                                    'bolder ' => 'bolder',
                                                                    'lighter ' => 'lighter',
                                                                ),
                                                            ),
                                                            'custom_5_font_style' => array(
                                                                'type' => 'select',
                                                                'label' => __('Font Style', 'wp-starter-theme'),
                                                                'default' => '',
                                                                'options' => array(
                                                                    '' => 'Choose Font Style',
                                                                    'normal ' => 'normal',
                                                                    'italic' => 'italic',
                                                                    'oblique ' => 'oblique',
                                                                ),
                                                            ),
                                                            'custom_5_line_height' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Line Height', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_5_letter_spacing' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Letter Spacing', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_5_margin_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_5_margin_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_5_margin_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_5_margin_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Margin Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_5_padding_top' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Top', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_5_padding_right' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Right', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_5_padding_bottom' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Bottom', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                            'custom_5_padding_left' => array(
                                                                'type' => 'measurement',
                                                                'label' => __( 'Padding Left', 'wp-starter-theme' ),
                                                                'unit' => 'px',
                                                                'default' => '',
                                                            ),
                                                        ),
                                                    )
                                                ),
                                            ),



                                        // ),
                                    // ),
                                // ),
                            // ),
                        )
                    ),
                )
            ),

        ),
    );

    return $fields;
}