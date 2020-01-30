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

(function ($, _) {
    'use strict';

    if ('undefined' === typeof objectL10n_checklists_bootstrap) {
        return true;
    }

    if (PP_Checklists.is_gutenberg_active()) {
        /**
         * For Gutemberg
         */
        if ($('#pp-checklists-req-custom_text').length > 0) {
            wp.data.subscribe(
                function () {
                    var content = PP_Checklists.getEditor().getEditedPostAttribute('content');

                    if (typeof content == 'undefined') {
                        return;
                    }

                    // Make the test to check if the requirement is currently valid.
                    var is_valid = content.search(objectL10n_checklists_bootstrap.required_word) >= 0;

                    $('#pp-checklists-req-custom_text').trigger(
                        PP_Checklists.EVENT_UPDATE_REQUIREMENT_STATE,
                        is_valid
                    );
                }
            );
        }
    } else {
        /**
         * For the Classic Editor
         */
        var $content = $('#content');
        var editor;

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
            is_valid = text.search(objectL10n_checklists_bootstrap.required_word) >= 0;

            /**
             * Triggers an update in the element on the checklist. Use the ID of the item added to the checklist.
             * #pp-checklists-req-<requirement_name>.
             *
             * The first param is the name of the event. Use always PP_Content_Checklist.EVENT_UPDATE_REQUIREMENT_STATE
             * The second param is the current status of the requirement.
             */
            $('#pp-checklists-req-custom_text').trigger(
                PP_Checklists.EVENT_UPDATE_REQUIREMENT_STATE,
                is_valid
            );
        }

        // For the editor.
        $(document).on(PP_Checklists.EVENT_TINYMCE_LOADED, function(event, tinymce) {
            editor = tinymce.editors['content'];

            if (typeof editor !== 'undefined') {

                editor.onInit.add(function () {
                    /**
                     * Bind the words count update triggers.
                     *
                     * When a node change in the main TinyMCE editor has been triggered.
                     * When a key has been released in the plain text content editor.
                     */

                    if (editor.id !== 'content') {
                        return;
                    }

                    editor.on('nodechange keyup', _.debounce(update, 500));
                    $content.on('input keyup', _.debounce(update, 500));

                    // Force an initial update.
                    update();
                });
            }
        });

        $content.on('input keyup', _.debounce(update, 500));
        update();
    }
})(jQuery, _);
