<?php
/**
 * PublishPress Checklist Plugin Bootstrap.
 *
 * This is a demo of how to extend the PublishPress Checklist add-on.
 *
 * @link        https://publishpress.com/addons/content-checklist/
 * @package     PublishPress\Checklist_plugin_bootstrap
 * @author      PublishPress <help@publishpress.com>
 * @copyright   Copyright (C) 2018 PublishPress. All rights reserved.
 * @license     GPLv2 or later
 * @since       1.0.0
 *
 * @publishpress-checklist-plugin-bootstrap
 * Plugin Name: PublishPress Checklist Plugin Bootstrap
 * Plugin URI:  https://publishpress.com/
 * Version: 1.0.0
 * Description: Add a custom checklist as example to content
 * Author:      PublishPress
 * Author URI:  https://publishpress.com
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'No direct script access allowed.' );
}

// Avoid to load it twice.
if ( ! defined( 'PP_CHECKLIST_BOOTSTRAP_LOADED' ) ) {

	/**
	 * Call the composer's autoload. We advise to use it for your own libraries.
	 */
	$autoloadPath = __DIR__ . '/vendor/autoload.php';
	if ( file_exists( $autoloadPath ) ) {
		require_once $autoloadPath;
	}

	/**
	 * Define the plugin's name.
	 */
	if ( ! defined( 'PP_CHECKLIST_BOOTSTRAP_PLUGIN_NAME' ) ) {
		define( 'PP_CHECKLIST_BOOTSTRAP_PLUGIN_NAME', 'PublishPress Checklist Plugin Bootstrap' );
	}

	// Define the constant to store the plugins' file path.
	define( 'PP_CHECKLIST_BOOTSTRAP_PLUGIN_FILE',
		'publishpress-checklist-plugin-bootstrap/publishpress-checklist-plugin-bootstrap.php' );

	/**
	 * Define here the minimum version of PublishPress required by your code.
	 * Use the most recent release when starting developing.
	 */
	if ( ! defined( 'PP_CHECKLIST_BOOTSTRAP_MIN_PARENT_VERSION' ) ) {
		define( 'PP_CHECKLIST_BOOTSTRAP_MIN_PARENT_VERSION', '1.12.0' );
	}

	/**
	 * Instantiate the PublishPress Add-on Framework. It is a simple framework
	 * used to check PublishPress requirements. It is a dependency managed using
	 * composer.
	 */
	$initializer = new PublishPressAddonFramework\Initializer(
		PP_CHECKLIST_BOOTSTRAP_PLUGIN_NAME,
		PP_CHECKLIST_BOOTSTRAP_MIN_PARENT_VERSION
	);

	// Check if PublishPress is installed and at the correct version.
	if ( $initializer->is_publishpress_installed() ) {

		// Define a constant to be a flag saying it is already loaded.
		define( 'PP_CHECKLIST_BOOTSTRAP_LOADED', 1 );

		// Initialize the plugin's code.
		$plugin = new PublishPress_Checklist_Bootstrap\Plugin;
		$plugin->init();
	}
}
