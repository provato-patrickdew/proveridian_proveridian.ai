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
		'key'    => 'group_pv_benefit_cards',
		'title'  => 'Benefit Cards Fields',
		'fields' => array(

			array(
				'key'           => 'field_pv_benefit_cards_eyebrow',
				'label'         => 'Eyebrow',
				'name'          => 'eyebrow',
				'type'          => 'text',
				'default_value' => 'Who Benefits from ProVeridian',
			),
			array(
				'key'           => 'field_pv_benefit_cards_headline',
				'label'         => 'Headline',
				'name'          => 'headline',
				'type'          => 'text',
				'default_value' => 'Three groups have to say yes. Governed enablement answers all three.',
			),
			array(
				'key'           => 'field_pv_benefit_cards_lede',
				'label'         => 'Lede',
				'name'          => 'lede',
				'type'          => 'textarea',
				'rows'          => 2,
				'default_value' => 'Leadership wants confidence. IT wants control. Employees want the work to get easier. One platform serves all three at the same time.',
			),
			array(
				'key'          => 'field_pv_benefit_cards_cards',
				'label'        => 'Cards',
				'name'         => 'cards',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add Card',
				'sub_fields'   => array(
					array(
						'key'     => 'field_pv_benefit_cards_card_icon',
						'label'   => 'Icon',
						'name'    => 'icon',
						'type'    => 'select',
						'choices' => array(
							'trending-up' => 'Trending Up',
							'wrench'      => 'Wrench',
							'users'       => 'Users',
						),
						'default_value' => 'trending-up',
						'wrapper' => array( 'width' => '25' ),
					),
					array(
						'key'     => 'field_pv_benefit_cards_card_accent',
						'label'   => 'Icon Color',
						'name'    => 'accent',
						'type'    => 'select',
						'choices' => array(
							'teal'   => 'Teal (intelligence)',
							'purple' => 'Purple (governance)',
							'amber'  => 'Amber (alert)',
						),
						'default_value' => 'teal',
						'wrapper' => array( 'width' => '25' ),
					),
					array(
						'key'     => 'field_pv_benefit_cards_card_label',
						'label'   => 'Audience Label',
						'name'    => 'label',
						'type'    => 'text',
						'wrapper' => array( 'width' => '50' ),
					),
					array(
						'key'   => 'field_pv_benefit_cards_card_title',
						'label' => 'Title',
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_pv_benefit_cards_card_text',
						'label' => 'Text',
						'name'  => 'text',
						'type'  => 'textarea',
						'rows'  => 2,
					),
					array(
						'key'          => 'field_pv_benefit_cards_card_points',
						'label'        => 'Checklist Points',
						'name'         => 'points',
						'type'         => 'repeater',
						'layout'       => 'table',
						'button_label' => 'Add Point',
						'sub_fields'   => array(
							array(
								'key'   => 'field_pv_benefit_cards_card_point_text',
								'label' => 'Point',
								'name'  => 'text',
								'type'  => 'text',
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
					'value'    => 'acf/block-benefit-cards',
				),
			),
		),
	) );
} );
