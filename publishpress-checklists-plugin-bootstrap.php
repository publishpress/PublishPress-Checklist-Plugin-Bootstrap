<?php
/**
 * PublishPress Checklists Plugin Bootstrap.
 *
 * This is a demo of how to extend the PublishPress Checklists add-on.
 *
 * @link        https://publishpress.com/addons/content-checklist/
 * @package     PublishPress\Checklists_plugin_bootstrap
 * @author      PublishPress <help@publishpress.com>
 * @copyright   Copyright (C) 2019 PublishPress. All rights reserved.
 * @license     GPLv2 or later
 * @since       1.0.0
 *
 * @publishpress-checklists-plugin-bootstrap
 * Plugin Name: PublishPress Checklists Plugin Bootstrap
 * Plugin URI:  https://publishpress.com/
 * Version: 2.0.0
 * Description: Add a custom checklist as example to content
 * Author:      PublishPress
 * Author URI:  https://publishpress.com
 */

if ( ! defined('ABSPATH')) {
    die('No direct script access allowed.');
}

// Avoid to load it twice.
if ( ! defined('PUBLISHPRESS_CHECKLISTS_BOOTSTRAP_LOADED')) {

    /**
     * Call the composer's autoload. We advise to use it for your own libraries.
     */
    $autoloadPath = __DIR__ . '/vendor/autoload.php';
    if (file_exists($autoloadPath)) {
        require_once $autoloadPath;
    }

    /**
     * Define the plugin's name.
     */
    if ( ! defined('PUBLISHPRESS_CHECKLISTS_BOOTSTRAP_PLUGIN_NAME')) {
        define('PUBLISHPRESS_CHECKLISTS_BOOTSTRAP_PLUGIN_NAME', 'PublishPress Checklists Plugin Bootstrap');
    }

    // Define the constant to store the plugins' file path.
    define('PUBLISHPRESS_CHECKLISTS_BOOTSTRAP_PLUGIN_FILE',
        'publishpress-checklists-plugin-bootstrap/publishpress-checklists-plugin-bootstrap.php');

    // Define the constant to store the plugin version
    define('PUBLISHPRESS_CHECKLISTS_BOOTSTRAP_VERSION', '2.0.0');


    // Define a constant to be a flag saying it is already loaded.
    define('PUBLISHPRESS_CHECKLISTS_BOOTSTRAP_LOADED', 1);

    // Initialize the plugin's code.
    $addon = new PublishPress_Checklists_Bootstrap\Addon;

    add_action('publishpress_checklists_load_addons', [$addon, 'action_load_addons']);
}
