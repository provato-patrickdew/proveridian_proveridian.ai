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
		'key'    => 'group_pv_ai_skills',
		'title'  => 'AI Skills Fields',
		'fields' => array(

			array(
				'key'           => 'field_pv_ai_skills_eyebrow',
				'label'         => 'Eyebrow',
				'name'          => 'eyebrow',
				'type'          => 'text',
				'default_value' => 'AI Skills',
			),
			array(
				'key'           => 'field_pv_ai_skills_headline',
				'label'         => 'Headline',
				'name'          => 'headline',
				'type'          => 'text',
				'default_value' => 'Your expertise, taught once.',
			),
			array(
				'key'           => 'field_pv_ai_skills_lede',
				'label'         => 'Lede',
				'name'          => 'lede',
				'type'          => 'textarea',
				'rows'          => 3,
				'default_value' => 'A skill is a packaged set of instructions that teaches AI to carry out one recurring task the way your organization wants it done. Write it down once, the way you would train a new hire on a single responsibility. After that it runs whenever the task comes up, for everyone.',
			),
			array(
				'key'          => 'field_pv_ai_skills_benefits',
				'label'        => 'Benefit Tiles',
				'name'         => 'benefits',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add Benefit',
				'sub_fields'   => array(
					array(
						'key'     => 'field_pv_ai_skills_benefit_icon',
						'label'   => 'Icon',
						'name'    => 'icon',
						'type'    => 'select',
						'choices' => array(
							'circle-check' => 'Circle Check',
							'zap'          => 'Lightning Bolt',
							'book-open'    => 'Open Book',
						),
						'default_value' => 'circle-check',
						'wrapper' => array( 'width' => '30' ),
					),
					array(
						'key'     => 'field_pv_ai_skills_benefit_title',
						'label'   => 'Title',
						'name'    => 'title',
						'type'    => 'text',
						'wrapper' => array( 'width' => '70' ),
					),
					array(
						'key'   => 'field_pv_ai_skills_benefit_text',
						'label' => 'Text',
						'name'  => 'text',
						'type'  => 'textarea',
						'rows'  => 2,
					),
				),
			),
			array(
				'key'           => 'field_pv_ai_skills_interstitial',
				'label'         => 'Interstitial Line',
				'name'          => 'interstitial',
				'type'          => 'text',
				'default_value' => 'Every department has recurring work worth teaching once.',
			),
			array(
				'key'          => 'field_pv_ai_skills_departments',
				'label'        => 'Department Cards',
				'name'         => 'departments',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add Department',
				'sub_fields'   => array(
					array(
						'key'     => 'field_pv_ai_skills_department_icon',
						'label'   => 'Icon',
						'name'    => 'icon',
						'type'    => 'select',
						'choices' => array(
							'chart-pie' => 'Pie Chart',
							'briefcase' => 'Briefcase',
							'send'      => 'Send',
							'workflow'  => 'Workflow',
						),
						'default_value' => 'chart-pie',
						'wrapper' => array( 'width' => '50' ),
					),
					array(
						'key'     => 'field_pv_ai_skills_department_name',
						'label'   => 'Department Name',
						'name'    => 'name',
						'type'    => 'text',
						'wrapper' => array( 'width' => '50' ),
					),
					array(
						'key'          => 'field_pv_ai_skills_department_skills',
						'label'        => 'Skills',
						'name'         => 'skills',
						'type'         => 'repeater',
						'layout'       => 'block',
						'button_label' => 'Add Skill',
						'sub_fields'   => array(
							array(
								'key'   => 'field_pv_ai_skills_department_skill_title',
								'label' => 'Skill Title',
								'name'  => 'title',
								'type'  => 'text',
							),
							array(
								'key'   => 'field_pv_ai_skills_department_skill_text',
								'label' => 'Skill Text',
								'name'  => 'text',
								'type'  => 'textarea',
								'rows'  => 2,
							),
						),
					),
				),
			),

		),
		'location' => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/block-ai-skills',
				),
			),
		),
	) );
} );
