<?php
/**
 * Initializes the theme.
 *
 * @package shadow_fade
 * @subpackage shadow_fade/inc/classes
 */

namespace ShadowFade\Inc\Classes;

use ShadowFade\Inc\Traits\Singleton;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Init
 *
 * Initializes the theme and loads up the blocks.
 */
final class Init {

	use Singleton;

	/**
	 * Constructor
	 */
	protected function __construct() {
		add_action( 'init', array( $this, 'setup_blocks' ) );
		add_action( 'wp_head', array( $this, 'setup_theme_classes' ) );
	}

	/**
	 * Setup the blocks
	 *
	 * @return void
	 */
	public function setup_blocks() {

		/**
		 * Registers the block(s) metadata from the `blocks-manifest.php`
		 * and registers the block type(s) based on the registered block
		 * metadata. (Introduced in WP 6.8)
		 */
		if ( function_exists( 'wp_register_block_types_from_metadata_collection' ) ) {
			wp_register_block_types_from_metadata_collection(
				sprintf( '%s/build', SHADOW_FADE_DIR ),
				sprintf( '%s/build/blocks-manifest.php', SHADOW_FADE_DIR ),
			);
			return;
		}

		/**
		 * Registers the block(s) metadata from the `blocks-manifest.php` file.
		 * Added to WP 6.7 to improve the performance of block type registration.
		 */
		if ( function_exists( 'wp_register_block_metadata_collection' ) ) {
			wp_register_block_metadata_collection(
				sprintf( '%s/build', SHADOW_FADE_DIR ),
				sprintf( '%s/build/blocks-manifest.php', SHADOW_FADE_DIR ),
			);
		}

		/**
		 * Registers the block type(s) in the `blocks-manifest.php` file.
		 */
		$manifest_path = sprintf( '%s/build/blocks-manifest.php', SHADOW_FADE_DIR );
		if ( ! is_readable( $manifest_path ) ) {
			return;
		}

		$manifest_data = require $manifest_path;
		foreach ( array_keys( $manifest_data ) as $block_type ) {
			register_block_type(
				sprintf( '%1$s/build/%2$s', SHADOW_FADE_DIR, $block_type )
			);
		}
	}

	/**
	 * Setup theme classes
	 *
	 * Adds the .is-dark class to the DOM based on user stored preference.
	 *
	 * @return void
	 */
	public function setup_theme_classes() {
		?>
		<script>
			(function() {
				const themePreference = localStorage.getItem('theme-mode');
				const prefersDark =
					window.matchMedia &&
					window.matchMedia( '(prefers-color-scheme: dark)' ).matches;
				document.documentElement.classList.toggle(
					'is-dark', themePreference === 'dark' || ! themePreference && prefersDark
				);
			})();
		</script>
		<?php
	}
}
