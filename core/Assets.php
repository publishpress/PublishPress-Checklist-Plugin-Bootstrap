<?php
/**
 * PublishPress Checklist Plugin Bootstrap.
 *
 * @link        https://publishpress.com/addons/content-checklist/
 * @package     PublishPress\Checklist_plugin_bootstrap
 * @author      PublishPress <help@publishpress.com>
 * @copyright   Copyright (C) 2018 PublishPress. All rights reserved.
 * @license     GPLv2 or later
 * @since       1.0.0
 */

namespace PublishPress_Checklist_Bootstrap;

defined( 'ABSPATH' ) or die( 'No direct script access allowed.' );

/**
 * Class Plugin
 *
 * @package PublishPress_Checklist_Bootstrap
 */
class Assets {
	/**
	 * Enqueue scripts and stylesheets for the admin pages.
	 */
	public function enqueue_admin_scripts() {
		wp_enqueue_script(
			'pp-checklist-bootstrap-admin',
			plugins_url( '/assets/js/requirements.js', PUBLISHPRESS_CHECKLIST_BOOTSTRAP_PLUGIN_FILE ),
			[ 'jquery', 'pp-checklist-requirements' ],
            PUBLISHPRESS_CHECKLIST_BOOTSTRAP_VERSION,
			true
		);

		wp_localize_script(
			'pp-checklist-bootstrap-admin',
			'objectL10n_checklist_bootstrap',
			[
				'required_word' => 'PublishPress',
			]
		);
	}

	/**
	 * Add the MCE plugin file to make the interface between the editor and
	 * the requirement meta box. This was the unique way that worked, making
	 * it loaded before the MCE is initialized, allowing to configure it.
	 *
	 * @param array  $plugin_array
	 *
	 * @return array
	 */
	public function add_mce_plugin( $plugin_array ) {
		$plugin_array['PUBLISHPRESS_CHECKLIST_BOOTSTRAP'] =
			plugin_dir_url( PUBLISHPRESS_CHECKLIST_BOOTSTRAP_PLUGIN_FILE )
			. 'assets/js/tinymce-pp-checklist-bootstrap.js';

		return $plugin_array;
	}
}
