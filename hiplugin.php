<?php
/*
Plugin Name: HIP Plugin
Plugin URI: https://webtechstreet.com/
Description: The entire collection of MY Plugin modules.
Version: 1.5.3
Author: Suhail Gour
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}




define( 'HIP_FILE', __FILE__ );
define( 'HIP_URL', plugins_url( '/', __FILE__ ) );
define( 'HIP_PATH', plugin_dir_path( __FILE__ ) );
define( 'HIP_SCRIPT_SUFFIX', defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min' );
define( 'HIP_VERSION', '1.5.3');


require_once HIP_PATH.'/includes/bootstrap.php';