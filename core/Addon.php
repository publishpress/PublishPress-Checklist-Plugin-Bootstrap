<?php
/**
 * PublishPress Checklists Plugin Bootstrap.
 *
 * @link        https://publishpress.com/addons/content-checklist/
 * @package     PublishPress\Checklists_plugin_bootstrap
 * @author      PublishPress <help@publishpress.com>
 * @copyright   Copyright (C) 2021 PublishPress. All rights reserved.
 * @license     GPLv2 or later
 * @since       1.0.0
 */

namespace PublishPress_Checklists_Bootstrap;

defined( 'ABSPATH' ) or die( 'No direct script access allowed.' );

/**
 * Class Plugin
 *
 * @package PublishPress_Checklists_Bootstrap
 */
class Addon {
	/**
	 * Action triggered before load requirements, but after loading the add-ons.
	 * We use this to set the hooks to load our custom filters.
	 */
	public function action_load_addons() {
		add_filter( 'publishpress_checklists_post_type_requirements', [ $this, 'filter_post_type_requirements' ], 10, 2 );

		$assets = new Assets();

		add_action( 'publishpress_checklists_enqueue_scripts', [ $assets, 'enqueue_admin_scripts' ] );
		add_filter( 'mce_external_plugins', [ $assets, 'add_mce_plugin' ] );
	}

	/**
	 * Set the requirements list for the given post type
	 *
	 * @param  array  $requirements
	 * @param  string $post_type
	 *
	 * @return array
	 */
	public function filter_post_type_requirements( $requirements, $post_type ) {
		$classes = [];

		switch ( $post_type ) {
			case 'page':
			case 'post':
				$classes = [
					'\\PublishPress_Checklists_Bootstrap\\Requirement\\Custom_Text',
				];
				break;
		}

		if ( ! empty( $classes ) ) {
			$requirements = array_merge( $requirements, $classes );
		}

		return $requirements;
	}
}
