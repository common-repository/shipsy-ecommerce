<?php
/**
 * Shipsy internal API to get endpoints.
 *
 * @link       https://shipsy.io/
 * @since      1.0.3
 *
 * @package    Shipsy_Econnect
 * @subpackage Shipsy_Econnect/admin/apis
 */

/** Shipsy internal API to get endpoints. */

require SHIPSY_ECONNECT_PATH . 'config/settings.php';
require_once SHIPSY_ECONNECT_PATH . 'admin/helper/helper.php';

$request = shipsy_sanitize_array( $_REQUEST );  // phpcs:ignore
$api     = $request['api'];

$result = array();

if ( array_key_exists( $api, $ENDPOINTS ) ) {  // phpcs:ignore
	$result['data'] = array(
		'url'     => shipsy_get_endpoint( $api ),    // phpcs:ignore
		'success' => true,
	);
} else {
	$result['error'] = array(
		'message' => 'Invalid API requested',
		'success' => false,
	);
}
wp_send_json( $result );
