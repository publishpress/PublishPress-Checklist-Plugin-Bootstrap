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

namespace PublishPress_Checklists_Bootstrap\Requirement;

defined( 'ABSPATH' ) or die( 'No direct script access allowed.' );

use PublishPress\Checklists\Core\Requirement\Base_simple;
use PublishPress\Checklists\Core\Requirement\Interface_required;

/**
 * Class Plugin
 *
 * @package PublishPress_Checklists_Bootstrap
 */
class Custom_Text extends Base_simple implements Interface_required {
	/**
	 * The name of the requirement, in a slug format
	 *
	 * @var string
	 */
	public $name = 'custom_text';

	/**
	 * Initialize the language strings for the instance
	 *
	 * @return void
	 */
	public function init_language() {
		$this->lang['label_settings'] = esc_html__( 'Say "PublishPress" in the content',
			'publishpress-checklists-plugin-bootstrap' );
		$this->lang['label']          = esc_html__( 'Say "PublishPress" in the content',
			'publishpress-checklists-plugin-bootstrap' );
	}

	/**
	 * Returns the current status of the requirement, the status read when opening the post
	 * form for example.
	 *
	 * @param  stdClass $post
	 * @param  mixed    $option_value
	 *
	 * @return bool
	 */
	public function get_current_status( $post, $option_value ) {
		// The current status will be true if the post's content has the word "PublishPress"
		$expected_word = 'PublishPress';

		// Yeah, I know it will not match only entire words, but fragments too. But this is
		// just an example of what you can test here. Just make sure to return a boolean value.
		return substr_count( $post->post_content, $expected_word ) > 0;
	}
}
