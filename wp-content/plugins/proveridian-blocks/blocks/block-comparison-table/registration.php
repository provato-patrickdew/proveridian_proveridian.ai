<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

add_action( 'acf/include_fields', function() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group( array(
		'key'    => 'group_pv_comparison_table',
		'title'  => 'Comparison Table Fields',
		'fields' => array(

			array(
				'key'           => 'field_pv_comparison_table_eyebrow',
				'label'         => 'Eyebrow',
				'name'          => 'eyebrow',
				'type'          => 'text',
				'default_value' => 'How It Compares to standard chat bots',
			),
			array(
				'key'           => 'field_pv_comparison_table_headline',
				'label'         => 'Headline',
				'name'          => 'headline',
				'type'          => 'text',
				'default_value' => 'A chatbot subscription governs nothing and enables no one.',
			),
			array(
				'key'           => 'field_pv_comparison_table_col_dimension',
				'label'         => 'Dimension Column Header',
				'name'          => 'col_dimension',
				'type'          => 'text',
				'default_value' => 'Dimension',
				'wrapper'       => array( 'width' => '33' ),
			),
			array(
				'key'           => 'field_pv_comparison_table_col_competitor',
				'label'         => 'Competitor Column Header',
				'name'          => 'col_competitor',
				'type'          => 'text',
				'default_value' => 'Public AI chatbots',
				'wrapper'       => array( 'width' => '33' ),
			),
			array(
				'key'           => 'field_pv_comparison_table_col_proveridian',
				'label'         => 'ProVeridian Column Header',
				'name'          => 'col_proveridian',
				'type'          => 'text',
				'default_value' => 'ProVeridian',
				'wrapper'       => array( 'width' => '33' ),
			),
			array(
				'key'          => 'field_pv_comparison_table_rows',
				'label'        => 'Rows',
				'name'         => 'rows',
				'type'         => 'repeater',
				'layout'       => 'table',
				'button_label' => 'Add Row',
				'sub_fields'   => array(
					array(
						'key'   => 'field_pv_comparison_table_row_dimension',
						'label' => 'Dimension',
						'name'  => 'dimension',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_pv_comparison_table_row_competitor',
						'label' => 'Competitor Cell',
						'name'  => 'competitor',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_pv_comparison_table_row_proveridian',
						'label' => 'ProVeridian Cell',
						'name'  => 'proveridian',
						'type'  => 'text',
					),
				),
			),

		),
		'location' => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/block-comparison-table',
				),
			),
		),
	) );
} );
