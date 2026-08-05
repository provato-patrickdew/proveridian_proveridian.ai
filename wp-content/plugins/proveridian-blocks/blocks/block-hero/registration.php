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
		'key'    => 'group_pv_hero',
		'title'  => 'Hero Fields',
		'fields' => array(

			array(
				'key'           => 'field_pv_hero_headline_line_1',
				'label'         => 'Headline Line 1',
				'name'          => 'headline_line_1',
				'type'          => 'text',
				'default_value' => 'One platform.',
				'wrapper'       => array( 'width' => '33' ),
			),
			array(
				'key'           => 'field_pv_hero_headline_line_2',
				'label'         => 'Headline Line 2',
				'name'          => 'headline_line_2',
				'type'          => 'text',
				'default_value' => 'Every employee.',
				'wrapper'       => array( 'width' => '33' ),
			),
			array(
				'key'           => 'field_pv_hero_headline_accent',
				'label'         => 'Headline Accent Line',
				'name'          => 'headline_accent',
				'type'          => 'text',
				'default_value' => 'Complete AI control.',
				'wrapper'       => array( 'width' => '33' ),
			),
			array(
				'key'           => 'field_pv_hero_lede',
				'label'         => 'Lede',
				'name'          => 'lede',
				'type'          => 'textarea',
				'rows'          => 3,
				'default_value' => 'An AI enablement platform with governance built in. Every knowledge worker gets approved AI Skills connected to your own systems, across whichever AI vendors you allow. Employees move faster. IT keeps the controls. Leadership sees all of it.',
			),
			array(
				'key'          => 'field_pv_hero_primary_cta_label',
				'label'        => 'Primary CTA Label',
				'name'         => 'primary_cta_label',
				'type'         => 'text',
				'instructions' => 'Leave empty to hide the button.',
				'wrapper'      => array( 'width' => '25' ),
			),
			array(
				'key'         => 'field_pv_hero_primary_cta_url',
				'label'       => 'Primary CTA URL',
				'name'        => 'primary_cta_url',
				'type'        => 'text',
				'placeholder' => '/request-a-demo/',
				'wrapper'     => array( 'width' => '25' ),
			),
			array(
				'key'          => 'field_pv_hero_secondary_cta_label',
				'label'        => 'Secondary CTA Label',
				'name'         => 'secondary_cta_label',
				'type'         => 'text',
				'instructions' => 'Leave empty to hide the button.',
				'wrapper'      => array( 'width' => '25' ),
			),
			array(
				'key'         => 'field_pv_hero_secondary_cta_url',
				'label'       => 'Secondary CTA URL',
				'name'        => 'secondary_cta_url',
				'type'        => 'text',
				'placeholder' => '/contact/',
				'wrapper'     => array( 'width' => '25' ),
			),
			array(
				'key'           => 'field_pv_hero_image',
				'label'         => 'Hero Image',
				'name'          => 'image',
				'type'          => 'image',
				'return_format' => 'array',
				'preview_size'  => 'medium',
				'instructions'  => 'Leave empty to show the dashed placeholder panel.',
			),

		),
		'location' => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/block-hero',
				),
			),
		),
	) );
} );
