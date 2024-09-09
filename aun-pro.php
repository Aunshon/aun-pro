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


function demo_sites_enqueue_scripts_styles_pro_pro()
{
	$demo_sites_script_assets = plugin_dir_path(__FILE__) . 'build/main.asset.php';


	// Check if we are on the Post Editor and the post type is "post".
	if (file_exists($demo_sites_script_assets)) {
		$assets = include $demo_sites_script_assets;
		wp_enqueue_script(
			'demo_sites_scripts_pro',
			plugin_dir_url(__FILE__) . 'build/main.js',
			$assets['dependencies'],
			$assets['version'],
			true
		);

//		wp_enqueue_style(
//			'demo_sites_styles',
//			plugin_dir_url(__FILE__) . 'build/index.css',
//			array(),
//			$assets['version']
//		);
	}
}
add_action('admin_enqueue_scripts', 'demo_sites_enqueue_scripts_styles_pro_pro');


function aun_add_phone_schema( $schema ) {
	$schema['phone']  = array(
        'description' => esc_html__('Phone of the person.', 'your-text-domain'),
       'type'        => 'number',
        'required'    => true,
	);

	return $schema;
}
add_filter( 'aun_lite_schema', 'aun_add_phone_schema' );


function aun_save_phone_data( $data, $request ) {
	$phone = sanitize_text_field( $request['phone'] );

	$data['phone'] = $phone;

	return $data;
}
add_filter( 'aun_save_data_before', 'aun_save_phone_data', 10, 2 );
