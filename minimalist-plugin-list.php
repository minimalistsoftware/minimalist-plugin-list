<?php
/*
Plugin Name: minimalist-plugin-list
Plugin URI: https://minimalist.software
Description: List plugins installed with versions
Author: Minimalist Software
Version: 0.1
Author URI: https://minimalist.software
*/

function list_plugins() {

	 if ( ! function_exists( 'get_plugins' ) ) {
	    require_once ABSPATH . 'wp-admin/includes/plugin.php';
	 }
	return get_plugins();
}

add_action( 'rest_api_init', function () {
	register_rest_route( 'plugin-list/v1', 'plugins', array(
		'methods' => 'GET',
		'callback' => 'list_plugins',
		));
	}
);