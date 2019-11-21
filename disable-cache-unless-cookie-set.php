/**
 * Plugin Name: disable-cache-unless-cookie-set
 * Description: This plugin will prevent caching to any user unless a cookie named "origin_country" is set. Then it will serve the right cache version pertaining to the country.
 * Version: 1.0
 * Author: Trent Schneweis
 * Author URI: https://www.linkedin.com/in/trentschneweis
 */
 
// Prevent direct access to the file.
defined( 'ABSPATH' ) or die();
// Declare donotcache function
function donotcache() {
		define( 'DONOTCACHEPAGE', true );
    return true;
}
// Declare handle_cookie_cache function
function handle_cookie_cache() {
// If the origin_country is unset, then don't cache
if(!isset($_COOKIE['origin_country'])) {
	// Disable caching on current page
	add_action( 'template_redirect', 'donotcache' );
  return true;
}
else{
$lang = $_COOKIE["origin_country"];
}


}
add_action( 'init', 'handle_cookie_cache' );
?>
