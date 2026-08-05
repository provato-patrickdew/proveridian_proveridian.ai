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
		'key'    => 'group_pv_form_section',
		'title'  => 'Form Section Fields',
		'fields' => array(

			array(
				'key'     => 'field_pv_form_section_eyebrow',
				'label'   => 'Eyebrow',
				'name'    => 'eyebrow',
				'type'    => 'text',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'     => 'field_pv_form_section_headline',
				'label'   => 'Headline',
				'name'    => 'headline',
				'type'    => 'text',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'   => 'field_pv_form_section_lede',
				'label' => 'Lede',
				'name'  => 'lede',
				'type'  => 'textarea',
				'rows'  => 2,
			),
			array(
				'key'          => 'field_pv_form_section_points',
				'label'        => 'Proof Points',
				'name'         => 'points',
				'type'         => 'repeater',
				'layout'       => 'block',
				'button_label' => 'Add Point',
				'sub_fields'   => array(
					array(
						'key'   => 'field_pv_form_section_point_title',
						'label' => 'Title',
						'name'  => 'title',
						'type'  => 'text',
					),
					array(
						'key'   => 'field_pv_form_section_point_text',
						'label' => 'Text',
						'name'  => 'text',
						'type'  => 'textarea',
						'rows'  => 2,
					),
				),
			),
			array(
				'key'          => 'field_pv_form_section_contact_note',
				'label'        => 'Contact Note',
				'name'         => 'contact_note',
				'type'         => 'wysiwyg',
				'tabs'         => 'visual',
				'toolbar'      => 'basic',
				'media_upload' => 0,
				'instructions' => 'Optional short note under the points, e.g. a mailto link.',
			),
			array(
				'key'     => 'field_pv_form_section_form_heading',
				'label'   => 'Form Heading',
				'name'    => 'form_heading',
				'type'    => 'text',
				'wrapper' => array( 'width' => '50' ),
			),
			array(
				'key'          => 'field_pv_form_section_form_shortcode',
				'label'        => 'Form Shortcode',
				'name'         => 'form_shortcode',
				'type'         => 'text',
				'instructions' => 'Paste the Contact Form 7 shortcode.',
				'placeholder'  => '[contact-form-7 id="..." title="..."]',
				'wrapper'      => array( 'width' => '50' ),
			),

		),
		'location' => array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/block-form-section',
				),
			),
		),
	) );
} );
