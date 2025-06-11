<?php
/**
 * Base trait to implement singleton pattern.
 *
 * @package shadow_fade
 * @subpackage shadow_fade/inc/traits
 */

namespace ShadowFade\Inc\Traits;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Singleton trait
 */
trait Singleton {
	/**
	 * Instance of the class
	 *
	 * @var object
	 */
	private static $instance = null;

	/**
	 * Getter for singleton instance.
	 *
	 * @return object
	 */
	public static function get_instance() {

		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}
}
