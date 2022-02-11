PublishPress Checklists Plugin Bootstrap
=======================================

Demo project to show how to extend the PublishPress Checklists plugin adding custom requirements to the checklist.

## First steps

You can easily extend the PublishPress Checklists plugin cloning and adapting this project. It is a WordPress plugin designed to work as a base for your own plugin.

* Clone this repository
* Rename the repository using your plugin's name
* Refactor the code replacing "publishpress-checklists-plugin-bootstrap" with your plugin's name, but pay attention to the case of the original terms. If the original is lowercase, keep using lower-case. If the origianl is uppercase, keep using upper-case.
* Rename the main plugin file
* Refactor the content of the readme.txt file

## Developing

* Update composer dependencies, running `$ composer update --no-dev`
* Refactor constants using a custom prefix. Replace PUBLISHPRESS_CHECKLISTS_BOOTSTRAP with your custom and unique prefix.
* Refactor the code according to the requirement you want to implement.

## Updating From PublishPress Content Checklist 1.4 to PublishPress Checklists 2.0

PublishPress Checklists v2.0 was released on November 2019 converting the plugin from an add-on of PublishPress to a standalone and free plugin, available in the WordPress plugins directory.
Some namespaces, methods, and HTML attributes changed. In order to make your plugin compatible with the new standards, please, check the changelog:

 * CHANGED: PublishPress is not required anymore;
 * CHANGED: PublishPress Content Checklist was renamed to PublishPress Checklists;
 * CHANGED: Script dependency, handle changed from "pp-checklist-requirements" to "pp-checklists-global-checklists";
 * CHANGED: The prefix for HTML elements of checklist items changed from "pp-checklist-req-" to "pp-checklists-req-";
 * CHANGED: The JS object changed from "PP_Content_Checklist" to "PP_Checklists";
 * CHANGED: The filter "pp_checklist_post_type_requirements" changed to "publishpress_checklists_post_type_requirements";
 * CHANGED: The filter "pp_checklists_enqueue_scripts" changed to "publishpress_checklists_enqueue_scripts";
 * CHANGED: The class "PublishPress\Content_checklist\Requirement\Base_simple" changed to "PublishPress\Checklists\Core\Requirement\Base_simple";
 * CHANGED: The interface "PublishPress\Addon\Content_checklist\Requirement\Interface_required" changed to "PublishPress\Checklists\Core\Requirement\Interface_required";
 * CHANGED: The action "pp_checklist_load_addons" changed to "publishpress_checklists_load_addons";
