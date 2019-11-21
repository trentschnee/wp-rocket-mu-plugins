<?php
/**
 * Plugin Name: disable-rocket-cache-admin
 * Description: This plugin will prevent caching for administrators. Adapted from (https://github.com/wp-media/wp-rocket-helpers/tree/master/cache/wp-rocket-no-cache-for-admins)
 * Version: 1.0
 * Author: Trent Schneweis
 * Author URI: https://www.linkedin.com/in/trentschneweis
 */
 
//Prevent direct access to the file.
defined( 'ABSPATH' ) or die();

// Declare donotcache function
function donotcache() {
		define( 'DONOTCACHEPAGE', true );
    return true;
}
// Declare handle_cache_for_admins function
function handle_cache_for_admins() {
	// Only for admins.
	if ( ! current_user_can( 'administrator' ) ) {
		return false;
	}
	//  Only when WP Rocket is active.
	if ( ! function_exists( 'get_rocket_option' ) ) {
		return false;
	}
	// Only when cache for logged-in users is active.
	if ( ! get_rocket_option( 'cache_logged_user' ) ) {
		return false;
	}
	// Finally: prevent caching for administrators.
	add_action( 'template_redirect', 'donotcache' );
	return true;
}
add_action( 'init', 'handle_cache_for_admins' );
?>
