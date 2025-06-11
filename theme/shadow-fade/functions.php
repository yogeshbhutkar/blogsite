<?php
/**
 * Functions and definitions for the Shadow Fade theme.
 *
 * @package shadow_fade
 * @author Yogesh Bhutkar
 */

use ShadowFade\Inc\Classes\Init;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'SHADOW_FADE_SITE_URL' ) ) {
	define( 'SHADOW_FADE_SITE_URL', site_url() );
}

if ( ! defined( 'SHADOW_FADE_DIR' ) ) {
	define( 'SHADOW_FADE_DIR', untrailingslashit( get_theme_file_path() ) );
}

if ( ! defined( 'SHADOW_FADE_URI' ) ) {
	define( 'SHADOW_FADE_URI', untrailingslashit( get_theme_file_uri() ) );
}

require_once SHADOW_FADE_DIR . '/inc/helpers/autoloader.php';

/**
 * Instantiates the main class.
 *
 * @return void
 */
function shadow_fade_load_instance() {
	Init::get_instance();
}

if ( function_exists( 'shadow_fade_load_instance' ) ) {
	shadow_fade_load_instance();
}
