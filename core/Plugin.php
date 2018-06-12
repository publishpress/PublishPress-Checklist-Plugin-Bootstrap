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

defined('ABSPATH') or die('No direct script access allowed.');

/**
 * Class Plugin
 *
 * @package PublishPress_Checklist_Bootstrap
 */
class Plugin
{
    /**
     * Initialize the plugin's class.
     */
    public function init()
    {
        /**
         *
         */
        add_action('pp_checklist_load_addons', [$this, 'action_load_addons']);
    }

    /**
     * Action triggered before load requirements, but after loading the add-ons.
     * We use this to set the hooks to load our custom filters.
     */
    public function action_load_addons()
    {
        add_action('pp_checklist_enqueue_scripts', [$this, 'enqueue_admin_scripts']);
        add_filter('pp_checklist_post_type_requirements', [$this, 'filter_post_type_requirements'], 10, 2);
    }

    /**
     * Enqueue scripts and stylesheets for the admin pages.
     */
    public function enqueue_admin_scripts()
    {
        wp_enqueue_script(
            'pp-checklist-bootstrap-admin',
            plugins_url('/assets/js/requirements.js', PP_CHECKLIST_BOOTSTRAP_PLUGIN_FILE),
            ['jquery', 'pp-checklist-requirements'],
            PUBLISHPRESS_WOOCOMMERCE_CHECKLIST_VERSION,
            true
        );
    }

    /**
     * Set the requirements list for the given post type
     *
     * @param  array  $requirements
     * @param  string $post_type
     *
     * @return array
     */
    public function filter_post_type_requirements($requirements, $post_type)
    {
        $classes = [];

        switch ($post_type) {
            case 'page':
                $classes = [
                    '\\PublishPress_Checklist_Bootstrap\\Requirement\\Custom_Text',
                ];
                break;
        }

        if (!empty($classes)) {
            $requirements = array_merge($requirements, $classes);
        }

        return $requirements;
    }
}
