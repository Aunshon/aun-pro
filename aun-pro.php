<?php
/**
 * Plugin Name:       Aun Pro
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       aun-lite
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once __DIR__ . '/vendor/autoload.php';

define( "AUN_PRO_DIR_PATH", plugin_dir_path( __FILE__ ) );
define( "AUN_PRO_DIR_URL", plugin_dir_url( __FILE__ ) );

add_action('plugins_loaded', function () {
	new \AunPro\AunLiteExtention();
});
