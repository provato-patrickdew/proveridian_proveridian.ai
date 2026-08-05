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
		'key'    => 'group_pv_pain_points',
		'title'  => 'Pain Points Fields',
		'fields' => array(

			array(
				'key'           => 'field_pv_pain_points_eyebrow',
				'label'         => 'Eyebrow',
				'name'          => 'eyebrow',
				'type'          => 'text',
				'default_value' => 'Pain Points',
				'wrapper'       => array( 'width' => '50' ),
			),
			array(
				'key'           => 'field_pv_pain_points_accent',
				'label'         => 'Eyebrow Accent Color',
				'name'          => 'accent',
				'type'          => 'select',
				'choices'       => array(
					'amber'  => 'Amber (alert)',
					'teal'   => 'Teal (intelligence)',
					'purple' => 'Purple (governance)',
					'gray'   => 'Gray (neutral)',
				),
				'default_value' => 'amber',
				'wrapper'       => array( 'width' => '50' ),
			),
			array(
				'key'           => 'field_pv_pain_points_headline',
				'label'         => 'Headline',
				'name'          => 'headline',
				'type'          => 'text',
				'default_value' => 'AI is already in your organization. It is neither enabled nor governed.',
			),
			array(
				'key'           => 'field_pv_pain_points_lede',
				'label'         => 'Lede',
				'name'          => 'lede',
				'type'          => 'textarea',
				'rows'          => 2,
				'default_value' => 'Knowledge workers adopted the tools first, one vendor at a time. The output is inconsistent, the exposure lands on IT and security, and leadership has nothing to point to.',
			),
			array(
				'key'          => 'field_pv_pain_points_cards',
				'label'        => 'Cards',
				'name'         => 'cards',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add Card',
				'sub_fields'   => array(
					array(
						'key'     => 'field_pv_pain_points_card_icon',
						'label'   => 'Icon',
						'name'    => 'icon',
						'type'    => 'select',
						'choices' => array(
							'shield-alert' => 'Shield Alert',
							'database'     => 'Database',
							'credit-card'  => 'Credit Card',
							'eye'          => 'Eye',
						),
						'default_value' => 'shield-alert',
						'wrapper' => array( 'width' => '25' ),
					),
					array(
						'key'     => 'field_pv_pain_points_card_accent',
						'label'   => 'Accent Color',
						'name'    => 'accent',
						'type'    => 'select',
						'choices' => array(
							'amber'  => 'Amber (alert)',
							'gray'   => 'Gray (neutral)',
							'purple' => 'Purple (governance)',
							'teal'   => 'Teal (intelligence)',
						),
						'default_value' => 'amber',
						'wrapper' => array( 'width' => '25' ),
					),
					array(
						'key'     => 'field_pv_pain_points_card_title',
						'label'   => 'Title',
						'name'    => 'title',
						'type'    => 'text',
						'wrapper' => array( 'width' => '50' ),
					),
					array(
						'key'   => 'field_pv_pain_points_card_text',
						'label' => 'Text',
						'name'  => 'text',
						'type'  => 'textarea',
						'rows'  => 3,
					),
				),
			),

		),
		'location' => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/block-pain-points',
				),
			),
		),
	) );
} );
