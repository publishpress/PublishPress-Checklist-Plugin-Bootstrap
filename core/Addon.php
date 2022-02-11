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

namespace PublishPressChecklistsBootstrap;

defined('ABSPATH') or die('No direct script access allowed.');

/**
 * Class Plugin
 *
 * @package PublishPressChecklistsBootstrap
 */
class Addon
{
    /**
     * Action triggered before load requirements, but after loading the add-ons.
     * We use this to set the hooks to load our custom filters.
     */
    public static function init()
    {
        add_filter('publishpress_checklists_post_type_requirements', [__CLASS__, 'register_post_type_requirement'], 10, 2);

        add_action('publishpress_checklists_enqueue_scripts', [__CLASS__, 'enqueue_admin_scripts']);
        add_filter('mce_external_plugins', [__CLASS__, 'add_mce_plugin']);
    }

    /**
     * Set the requirements list for the given post type
     *
     * @param array $requirements
     * @param string $post_type
     *
     * @return array
     */
    public static function register_post_type_requirement($requirements, $post_type)
    {
        $classes = [];

        switch ($post_type) {
            case 'page':
            case 'post':
                $classes = [
                    '\\PublishPressChecklistsBootstrap\\Requirement\\Custom_Text',
                ];
                break;
        }

        if (! empty($classes)) {
            $requirements = array_merge($requirements, $classes);
        }

        return $requirements;
    }

    /**
     * Enqueue scripts and stylesheets for the admin pages.
     */
    public static function enqueue_admin_scripts()
    {
        wp_enqueue_script(
            'pp-checklists-bootstrap-admin',
            plugins_url('/assets/js/requirements.js', PUBLISHPRESS_CHECKLISTS_BOOTSTRAP_PLUGIN_FILE),
            ['jquery', 'pp-checklists-requirements'],
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
    public static function add_mce_plugin($plugin_array)
    {
        $plugin_array['PUBLISHPRESS_CHECKLISTS_BOOTSTRAP'] =
            plugin_dir_url(PUBLISHPRESS_CHECKLISTS_BOOTSTRAP_PLUGIN_FILE)
            . 'assets/js/tinymce-pp-checklists-bootstrap.js';

        return $plugin_array;
    }
}
