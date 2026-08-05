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
		'key'    => 'group_pv_audience_tabs',
		'title'  => 'Audience Tabs Fields',
		'fields' => array(

			array(
				'key'           => 'field_pv_audience_tabs_eyebrow',
				'label'         => 'Eyebrow',
				'name'          => 'eyebrow',
				'type'          => 'text',
				'default_value' => 'Ideal Users',
				'wrapper'       => array( 'width' => '50' ),
			),
			array(
				'key'           => 'field_pv_audience_tabs_headline',
				'label'         => 'Headline',
				'name'          => 'headline',
				'type'          => 'text',
				'default_value' => 'Find your organization on this list.',
				'wrapper'       => array( 'width' => '50' ),
			),
			array(
				'key'          => 'field_pv_audience_tabs_tabs',
				'label'        => 'Tabs',
				'name'         => 'tabs',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add Tab',
				'sub_fields'   => array(
					array(
						'key'     => 'field_pv_audience_tabs_tab_icon',
						'label'   => 'Tab Icon',
						'name'    => 'icon',
						'type'    => 'select',
						'choices' => array(
							'play'         => 'Play',
							'shield-alert' => 'Shield Alert',
							'trending-up'  => 'Trending Up',
						),
						'default_value' => 'play',
						'wrapper' => array( 'width' => '30' ),
					),
					array(
						'key'     => 'field_pv_audience_tabs_tab_label',
						'label'   => 'Tab Label',
						'name'    => 'label',
						'type'    => 'text',
						'wrapper' => array( 'width' => '70' ),
					),
					array(
						'key'   => 'field_pv_audience_tabs_tab_heading',
						'label' => 'Panel Heading',
						'name'  => 'heading',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_pv_audience_tabs_tab_body',
						'label' => 'Panel Body',
						'name'  => 'body',
						'type'  => 'textarea',
						'rows'  => 3,
					),
					array(
						'key'          => 'field_pv_audience_tabs_tab_points',
						'label'        => 'Proof Points',
						'name'         => 'points',
						'type'         => 'repeater',
						'layout'       => 'block',
						'button_label' => 'Add Point',
						'sub_fields'   => array(
							array(
								'key'   => 'field_pv_audience_tabs_tab_point_title',
								'label' => 'Title',
								'name'  => 'title',
								'type'  => 'text',
							),
							array(
								'key'   => 'field_pv_audience_tabs_tab_point_text',
								'label' => 'Text',
								'name'  => 'text',
								'type'  => 'textarea',
								'rows'  => 2,
							),
						),
					),
				),
			),
			array(
				'key'          => 'field_pv_audience_tabs_primary_cta_label',
				'label'        => 'Primary CTA Label',
				'name'         => 'primary_cta_label',
				'type'         => 'text',
				'instructions' => 'Leave empty to hide the button.',
				'wrapper'      => array( 'width' => '25' ),
			),
			array(
				'key'         => 'field_pv_audience_tabs_primary_cta_url',
				'label'       => 'Primary CTA URL',
				'name'        => 'primary_cta_url',
				'type'        => 'text',
				'placeholder' => '/request-a-demo/',
				'wrapper'     => array( 'width' => '25' ),
			),
			array(
				'key'          => 'field_pv_audience_tabs_secondary_cta_label',
				'label'        => 'Secondary CTA Label',
				'name'         => 'secondary_cta_label',
				'type'         => 'text',
				'instructions' => 'Leave empty to hide the button.',
				'wrapper'      => array( 'width' => '25' ),
			),
			array(
				'key'         => 'field_pv_audience_tabs_secondary_cta_url',
				'label'       => 'Secondary CTA URL',
				'name'        => 'secondary_cta_url',
				'type'        => 'text',
				'placeholder' => '/contact/',
				'wrapper'     => array( 'width' => '25' ),
			),

		),
		'location' => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/block-audience-tabs',
				),
			),
		),
	) );
} );
