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
		'key'    => 'group_pv_cta_banner',
		'title'  => 'CTA Banner Fields',
		'fields' => array(

			array(
				'key'           => 'field_pv_cta_banner_headline_light',
				'label'         => 'Headline (light weight)',
				'name'          => 'headline_light',
				'type'          => 'text',
				'default_value' => 'Adopt AI with confidence.',
				'wrapper'       => array( 'width' => '50' ),
			),
			array(
				'key'           => 'field_pv_cta_banner_headline_strong',
				'label'         => 'Headline (semibold)',
				'name'          => 'headline_strong',
				'type'          => 'text',
				'default_value' => 'Govern it with control.',
				'wrapper'       => array( 'width' => '50' ),
			),
			array(
				'key'           => 'field_pv_cta_banner_body',
				'label'         => 'Body',
				'name'          => 'body',
				'type'          => 'textarea',
				'rows'          => 3,
				'default_value' => 'A 30-minute walkthrough covers AI Skills for your roles, your policy and audit requirements, and what a first rollout looks like for leadership, IT, and employees.',
			),
			array(
				'key'          => 'field_pv_cta_banner_primary_cta_label',
				'label'        => 'Primary CTA Label',
				'name'         => 'primary_cta_label',
				'type'         => 'text',
				'instructions' => 'Leave empty to hide the button.',
				'wrapper'      => array( 'width' => '25' ),
			),
			array(
				'key'         => 'field_pv_cta_banner_primary_cta_url',
				'label'       => 'Primary CTA URL',
				'name'        => 'primary_cta_url',
				'type'        => 'text',
				'placeholder' => '/request-a-demo/',
				'wrapper'     => array( 'width' => '25' ),
			),
			array(
				'key'          => 'field_pv_cta_banner_secondary_cta_label',
				'label'        => 'Secondary CTA Label',
				'name'         => 'secondary_cta_label',
				'type'         => 'text',
				'instructions' => 'Leave empty to hide the button.',
				'wrapper'      => array( 'width' => '25' ),
			),
			array(
				'key'         => 'field_pv_cta_banner_secondary_cta_url',
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
					'value'    => 'acf/block-cta-banner',
				),
			),
		),
	) );
} );
