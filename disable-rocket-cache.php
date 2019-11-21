<?php
/**
 * Plugin Name: disable-rocket-cache
 * Description: This plugin will disable the WP Rocket cache and still be able to use the other features (if enabled). Adapted from (https://github.com/wp-media/wp-rocket-helpers/tree/master/cache/wp-rocket-no-cache)
 * Version: 1.0
 * Author: Trent Schneweis
 * Author URI: https://www.linkedin.com/in/trentschneweis
 */
 
//Prevent direct access to the file.
defined( 'ABSPATH' ) or die();

//Disable page caching for WP Rocket (you can still use the other features)
add_filter( 'do_rocket_generate_caching_files', '__return_false' );

//Define function clear_managed_host_cache and execute the managed_clear_cache();
function clear_managed_host_cache(){
if(function_exists('managed_clear_cache')){
managed_clear_cache();
}
}

//Call clear_managed_host_cache function
add_action( 'after_rocket_clean_domain', 'clear_managed_host_cache' );


?>
