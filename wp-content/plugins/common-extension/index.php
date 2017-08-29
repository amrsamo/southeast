<?php 
/*
* Plugin Name: Common Extension
* Plugin URI: http://raytheme.com/
* Description: This plugin is mandatory for common Theme.
* Version: 1.0
* Author: em40
* Author URI: http://em40.com/
*
* Text Domain: common
* Domain Path: /languages/
*/


// Secure it
if ( ! defined( 'ABSPATH' ) ) exit;

// define constants 
define( 'EM40_EXTENSION_DIR' , trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'EM40_EXTENSION_URI' , trailingslashit( plugin_dir_url( __FILE__ ) ) );

// Load plugin class files
require_once( EM40_EXTENSION_DIR. 'includes/shortcode.php' );
require_once( EM40_EXTENSION_DIR. 'includes/about_us_widget.php' );
require_once( EM40_EXTENSION_DIR. 'includes/post-type.php' );
require_once( EM40_EXTENSION_DIR. 'includes/widget-recent-posts.php' );
// Load plugin class files
require_once( EM40_EXTENSION_DIR. 'includes/class-layer-common.php' );
// Instantiate Plugin
if ( !function_exists('common_extension_init') ) {
	function common_extension_init() {

		global $Common_Layers_Extension;
		$Common_Layers_Extension = Common_Layers_Extension::get_instance();
		// Localization
		load_plugin_textdomain('common', FALSE, dirname(plugin_basename(__FILE__)) . "/languages");		
		
	}
}
add_action( 'plugins_loaded', 'common_extension_init' );



