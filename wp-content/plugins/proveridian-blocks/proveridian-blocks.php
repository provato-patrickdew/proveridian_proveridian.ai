<?php
/**
 * Plugin Name: ProVeridian Blocks
 * Plugin URI: https://proveridian.ai
 * Description: Custom ACF blocks for the Proveridian website.
 * Version: 1.1.1
 * Author: The Provato Group
 * Author URI: https://theprovatogroup.com
 * Text Domain: proveridian-blocks
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Define local variables
$path         = plugin_dir_path( __FILE__ );
$url          = plugin_dir_url( __FILE__ );
$includespath = plugin_dir_path( __FILE__ ) . 'includes/';

// Loop to include all includes, ignores index.php files
foreach ( glob( $includespath . '/**/*.php' ) as $include ) {
	if ( basename( $include ) !== 'index.php' ) {
		include_once $include;
	}
}

// Register custom block category
add_filter( 'block_categories_all', 'proveridian_blocks_acf_block_categories', 10, 2 );

function proveridian_blocks_acf_block_categories( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'proveridian-blocks',
				'title' => __( 'ProVeridian Blocks', 'proveridian-blocks' ),
			),
		)
	);
}