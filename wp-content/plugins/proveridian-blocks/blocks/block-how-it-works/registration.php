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
		'key'    => 'group_pv_how_it_works',
		'title'  => 'How It Works Fields',
		'fields' => array(

			array(
				'key'           => 'field_pv_how_it_works_eyebrow',
				'label'         => 'Eyebrow',
				'name'          => 'eyebrow',
				'type'          => 'text',
				'default_value' => 'How it works',
			),
			array(
				'key'           => 'field_pv_how_it_works_headline',
				'label'         => 'Headline',
				'name'          => 'headline',
				'type'          => 'text',
				'default_value' => 'Enablement on top. Governance underneath.',
			),
			array(
				'key'           => 'field_pv_how_it_works_lede',
				'label'         => 'Lede',
				'name'          => 'lede',
				'type'          => 'textarea',
				'rows'          => 3,
				'default_value' => 'Employees never write a prompt from scratch. They pick the AI Skill for the job, and ProVeridian applies policy, permissions, and spending limits at the model boundary — whichever vendor\'s model runs behind it.',
			),
			array(
				'key'          => 'field_pv_how_it_works_steps',
				'label'        => 'Steps',
				'name'         => 'steps',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add Step',
				'instructions' => 'The first step gets the teal accent border automatically.',
				'sub_fields'   => array(
					array(
						'key'     => 'field_pv_how_it_works_step_label',
						'label'   => 'Step Label',
						'name'    => 'label',
						'type'    => 'text',
						'placeholder' => 'Step 01',
						'wrapper' => array( 'width' => '30' ),
					),
					array(
						'key'     => 'field_pv_how_it_works_step_title',
						'label'   => 'Title',
						'name'    => 'title',
						'type'    => 'text',
						'wrapper' => array( 'width' => '70' ),
					),
					array(
						'key'   => 'field_pv_how_it_works_step_text',
						'label' => 'Text',
						'name'  => 'text',
						'type'  => 'textarea',
						'rows'  => 3,
					),
				),
			),
			array(
				'key'           => 'field_pv_how_it_works_image_left',
				'label'         => 'Left Image',
				'name'          => 'image_left',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
				'instructions'  => 'Leave empty to show the dashed placeholder panel.',
				'wrapper'       => array( 'width' => '50' ),
			),
			array(
				'key'           => 'field_pv_how_it_works_image_right',
				'label'         => 'Right Image',
				'name'          => 'image_right',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
				'instructions'  => 'Leave empty to show the dashed placeholder panel.',
				'wrapper'       => array( 'width' => '50' ),
			),

		),
		'location' => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/block-how-it-works',
				),
			),
		),
	) );
} );
