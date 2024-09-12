<?php

namespace AunPro;

use AunLite\AbstractDataExtiontion;

class AunLiteExtention extends AbstractDataExtiontion {

	public function add_item_extention_data( $extentions ) {
		$extentions[$this->get_namespace()] = [
			'phone' => get_option('aunpro_phone', ''),
			'email' => get_option('aunpro_email', ''),
		];

		return $extentions;
	}

	public function add_extention_schema( $properties ) {
		$properties[$this->get_namespace()] = [
			'type' => 'object',
			'required' => true,
			'properties' => [
				'phone' => [
					'description' => esc_html__('Phone of the person.', 'your-text-domain'),
					'type'        => 'number',
					'required'    => true,
				],
				'email' => [
					'description' => esc_html__('Email of the person.', 'your-text-domain'),
					'type'        => 'string',
					'format'      => 'email',
					'required'    => true,
				],
			]
		];

		return $properties;
	}

	public function get_namespace(): string {
		return 'aun-pro';
	}

	public function enqueue_demo_sites_scripts(): void {
		error_log( print_r( 'enqueue_demo_sites_scripts....', 1 ) );

		$demo_sites_script_assets = AUN_PRO_DIR_PATH . 'build/main.asset.php';

		if (file_exists($demo_sites_script_assets)) {
			$assets = include $demo_sites_script_assets;
			wp_enqueue_script(
				'demo_sites_scripts_pro',
				AUN_PRO_DIR_URL . 'build/main.js',
				$assets['dependencies'],
				$assets['version'],
				true
			);
		}
	}

	public function save_extention_data( $extention ): void {
		update_option('aunpro_phone', $extention['phone']);
		update_option('aunpro_email', $extention['email']);
	}
}
