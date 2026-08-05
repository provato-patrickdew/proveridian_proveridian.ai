<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Load Blocks
 */
function proveridian_load_the_blocks() {
	$path       = plugin_dir_path( __DIR__ ) . '../';
	$url        = plugin_dir_url( __DIR__ ) . '../';
	$blockspath = $path . 'blocks/';
	$blocksurl  = $url . 'blocks/';

	$blocks = proveridian_get_the_blocks( $blockspath );

	foreach ( $blocks as $block ) {
		if ( file_exists( $blockspath . $block . '/block.json' ) ) {
			register_block_type( $blockspath . $block . '/block.json' );

			if ( file_exists( $blockspath . $block . '/style.css' ) ) {
				wp_register_style( 'block-' . $block, $blocksurl . $block . '/style.css', null, 1 );
			}

			if ( file_exists( $blockspath . $block . '/registration.php' ) ) {
				include_once $blockspath . $block . '/registration.php';
			}
		}
	}
}
add_action( 'init', 'proveridian_load_the_blocks', 1 );
