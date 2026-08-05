<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Get Blocks
 */
function proveridian_get_the_blocks( $thepath ) {
	$blocks = scandir( $thepath );
	return $blocks;
}
