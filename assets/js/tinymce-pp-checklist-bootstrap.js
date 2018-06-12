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

(function ($, tinymce, _) {
    'use strict';

    if ('undefined' === typeof objectL10n_checklist_bootstrap) {
        return true;
    }

    var editor = tinyMCE.editors['content'];

    // We hook the script on the TinyMCE init's event.
    editor.onInit.add(function () {
        var $content = $('#content'),
            content_editor;

        /**
         * Get the content from TinyMCE on each update to calculate the status of the requirement.
         */
        function update () {
            var text,
                count,
                is_valid = false;

            // Get the content from the post editor.
            if (!content_editor || content_editor.isHidden()) {
                text = $content.val();
            } else {
                text = content_editor.getContent({format: 'raw'});
            }

            // Make the test to check if the requirement is currently valid.
            is_valid = text.search(objectL10n_checklist_bootstrap.required_word) >= 0;

            /**
             * Triggers an update in the element on the checklist. Use the ID of the item added to the checklist.
             * #pp-checklist-req-<requirement_name>.
             *
             * The first param is the name of the event. Use always PP_Content_Checklist.EVENT_UPDATE_REQUIREMENT_STATE
             * The second param is the current status of the requirement.
             */
            $('#pp-checklist-req-custom_text').trigger(
                PP_Content_Checklist.EVENT_UPDATE_REQUIREMENT_STATE,
                is_valid
            );
        }

        /**
         * Bind the word checker update triggers.
         *
         * When a node change in the main TinyMCE editor has been triggered.
         * When a key has been released in the plain text content editor.
         */

        if (editor.id !== 'content') {
            return;
        }

        content_editor = editor;

        editor.on('nodechange keyup', _.debounce(update, 500));
        $content.on('input keyup', _.debounce(update, 500));

        // Force an initial update.
        update();
    });
})(jQuery, tinymce, _);
