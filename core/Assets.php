<?php
/**
 * PublishPress Checklists Plugin Bootstrap.
 *
 * @link        https://publishpress.com/addons/content-checklist/
 * @package     PublishPress\Checklists_plugin_bootstrap
 * @author      PublishPress <help@publishpress.com>
 * @copyright   Copyright (C) 2019 PublishPress. All rights reserved.
 * @license     GPLv2 or later
 * @since       1.0.0
 */

namespace PublishPress_Checklists_Bootstrap;

defined('ABSPATH') or die('No direct script access allowed.');

/**
 * Class Plugin
 *
 * @package PublishPress_Checklists_Bootstrap
 */
class Assets
{
    /**
     * Enqueue scripts and stylesheets for the admin pages.
     */
    public function enqueue_admin_scripts()
    {
        wp_enqueue_script(
            'pp-checklists-bootstrap-admin',
            plugins_url('/assets/js/requirements.js', PUBLISHPRESS_CHECKLISTS_BOOTSTRAP_PLUGIN_FILE),
            ['jquery', 'pp-checklists-global-checklists'],
            PUBLISHPRESS_CHECKLISTS_BOOTSTRAP_VERSION,
            true
        );

        wp_localize_script(
            'pp-checklists-bootstrap-admin',
            'objectL10n_checklists_bootstrap',
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
     * @param array $plugin_array
     *
     * @return array
     */
    public function add_mce_plugin($plugin_array)
    {
        $plugin_array['PUBLISHPRESS_CHECKLISTS_BOOTSTRAP'] =
            plugin_dir_url(PUBLISHPRESS_CHECKLISTS_BOOTSTRAP_PLUGIN_FILE)
            . 'assets/js/tinymce-pp-checklists-bootstrap.js';

        return $plugin_array;
    }
}
