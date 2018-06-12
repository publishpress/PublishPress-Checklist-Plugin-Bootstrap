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

namespace PublishPress_Checklist_Bootstrap\Requirement;

defined( 'ABSPATH' ) or die( 'No direct script access allowed.' );

use PublishPress\Addon\Content_checklist\Requirement\Base_simple;

/**
 * Class Plugin
 *
 * @package PublishPress_Checklist_Bootstrap
 */
class Custom_Text extends Base_simple {
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
			'publishpress-checklist-plugin-bootstrap' );
		$this->lang['label']          = esc_html__( 'Say "PublishPress" in the content',
			'publishpress-checklist-plugin-bootstrap' );
	}

	/**
	 * Returns the current status of the requirement.
	 *
	 * @param  stdClass $post
	 * @param  mixed    $option_value
	 *
	 * @return mixed
	 */
	public function get_current_status( $post, $option_value ) {
		$product = $this->get_product( $post->ID );

		$sku = $product->get_sku();

		return ! empty( $sku );
	}
}
