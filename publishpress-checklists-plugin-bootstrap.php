<?php
/**
 * PublishPress Checklists Plugin Bootstrap.
 *
 * This is a demo of how to extend the PublishPress Checklists add-on.
 *
 * @link        https://publishpress.com/addons/content-checklist/
 * @package     PublishPress\Checklists_plugin_bootstrap
 * @author      PublishPress <help@publishpress.com>
 * @copyright   Copyright (C) 2021 PublishPress. All rights reserved.
 * @license     GPLv2 or later
 * @since       1.0.0
 *
 * @publishpress-checklists-plugin-bootstrap
 * Plugin Name: PublishPress Checklists Plugin Bootstrap
 * Plugin URI:  https://publishpress.com/
 * Version: 2.0.2
 * Description: Add a custom checklist as example to content
 * Author:      PublishPress
 * Author URI:  https://publishpress.com
 */

if (! defined('ABSPATH')) {
    die('No direct script access allowed.');
}

// Avoid loading the plugin twice.
if (! defined('PUBLISHPRESS_CHECKLISTS_BOOTSTRAP_LOADED')) {
    /**
     * Call the composer's autoload. We advise to use it for your own libraries.
     */
    $autoloadPath = __DIR__ . '/vendor/autoload.php';
    if (file_exists($autoloadPath)) {
        require_once $autoloadPath;
    }

    // Define the constant to store the plugins' file path.
    define(
        'PUBLISHPRESS_CHECKLISTS_BOOTSTRAP_PLUGIN_FILE',
        'publishpress-checklists-plugin-bootstrap/publishpress-checklists-plugin-bootstrap.php'
    );

    // Define the constant to store the plugin version
    define('PUBLISHPRESS_CHECKLISTS_BOOTSTRAP_VERSION', '2.0.2');


    // Define a constant to be a flag saying it is already loaded.
    define('PUBLISHPRESS_CHECKLISTS_BOOTSTRAP_LOADED', 1);

    // Initialize the plugin's code.
    add_action('publishpress_checklists_load_addons', ['PublishPressChecklistsBootstrap\\Addon', 'init']);
}
