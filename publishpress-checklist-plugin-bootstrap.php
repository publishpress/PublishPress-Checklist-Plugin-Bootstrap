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
if ( ! defined( 'PUBLISHPRESS_CHECKLIST_BOOTSTRAP_LOADED' ) ) {

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
	if ( ! defined( 'PUBLISHPRESS_CHECKLIST_BOOTSTRAP_PLUGIN_NAME' ) ) {
		define( 'PUBLISHPRESS_CHECKLIST_BOOTSTRAP_PLUGIN_NAME', 'PublishPress Checklist Plugin Bootstrap' );
	}

	// Define the constant to store the plugins' file path.
	define( 'PUBLISHPRESS_CHECKLIST_BOOTSTRAP_PLUGIN_FILE',
		'publishpress-checklist-plugin-bootstrap/publishpress-checklist-plugin-bootstrap.php' );

    // Define the constant to store the plugin version
    define( 'PUBLISHPRESS_CHECKLIST_BOOTSTRAP_VERSION', '1.0.0' );

	/**
	 * Define here the minimum version of PublishPress required by your code.
	 * Use the most recent release when starting developing.
	 */
	if ( ! defined( 'PUBLISHPRESS_CHECKLIST_BOOTSTRAP_MIN_PARENT_VERSION' ) ) {
		define( 'PUBLISHPRESS_CHECKLIST_BOOTSTRAP_MIN_PARENT_VERSION', '1.12.0' );
	}

	/**
	 * Instantiate the PublishPress Add-on Library. It is a simple library
	 * used to check PublishPress requirements. It is a dependency managed by
	 * composer.
	 */
	$initializer = new PublishPressAddonLibrary\Initializer(
		PUBLISHPRESS_CHECKLIST_BOOTSTRAP_PLUGIN_NAME,
		PUBLISHPRESS_CHECKLIST_BOOTSTRAP_MIN_PARENT_VERSION
	);

	// Check if PublishPress is installed and at the correct version.
	if ( $initializer->isPublishPressInstalled() ) {

		// Define a constant to be a flag saying it is already loaded.
		define( 'PUBLISHPRESS_CHECKLIST_BOOTSTRAP_LOADED', 1 );

		// Initialize the plugin's code.
		$addon  = new PublishPress_Checklist_Bootstrap\Addon;

		add_action( 'pp_checklist_load_addons', [ $addon, 'action_load_addons' ] );
	}
}
