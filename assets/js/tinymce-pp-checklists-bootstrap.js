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

// Based on the TinyMCE words count display found at /wp-admin/js/post.js
// Ignored if Gutenberg is in use.

if (typeof wp !== 'undefined' && typeof wp.blocks === 'undefined') {
    (function ($, document, tinymce) {
        'use strict';

        // We trigger an event to make sure the editor is available.
        $(document).trigger(PP_Checklists.EVENT_TINYMCE_LOADED, tinymce);
    })(jQuery, document, tinymce);
}
