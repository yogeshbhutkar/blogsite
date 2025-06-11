<?php
/**
 * Code to autoload classes in the Shadow Fade theme.
 *
 * @package shadow_fade
 * @subpackage shadow_fade/inc/helpers
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registers an autoloader function that loads classes based on their namespace and file path.
 *
 * @param string $param - The fully-qualified class name.
 *
 * @return void
 */
spl_autoload_register(
	function ( string $param ) {
		/**
		 * The base directory where the classes are stored.
		 *
		 * @var string $base_directory
		 */
		$base_directory = 'shadow-fade';

		/**
		 * The root namespace of the application.
		 *
		 * @var string $root_namespace
		 */
		$root_namespace = 'ShadowFade';

		/**
		 * Splits the fully-qualified class name into an array.
		 *
		 * @var array $split
		 */
		$split = explode( '\\', $param );

		if ( $split[0] !== $root_namespace ) {
			return;
		}

		$split_count = count( $split );
		for ( $local_count = 0; $local_count < $split_count - 1; $local_count++ ) {
			$split[ $local_count ] = strtolower( $split[ $local_count ] );
		}

		/**
		 * Gets the last element of the array and converts it to lowercase.
		 *
		 * @var string $last_element
		 */
		$last_element = strtolower( $split[ count( $split ) - 1 ] );

		/**
		 * The prefix to be added to the file name.
		 *
		 * @var string $prefix
		 */
		$prefix = '';

		// Check if the last element is a singleton, if so, add a trait prefix.
		switch ( $last_element ) {
			case 'singleton':
				$prefix = 'trait';
				break;
			default:
				$prefix = 'class';
				break;
		}

		/**
		 * Converts the class name to lowercase and adds a hyphen before each capital letter.
		 *
		 * @var string $file_name
		 */
		$file_name = sprintf( '%1$s%2$s', $prefix, strtolower( preg_replace( '/([A-Z])/', '-$1', $split[ count( $split ) - 1 ] ) ) );

		// Remove all underscores from the file name.
		$file_name = str_replace( '_', '', $file_name );

		/**
		 * Replaces the last element of the array with the file name.
		 */
		$split[ count( $split ) - 1 ] = sprintf( '%s.php', $file_name );

		$split[0] = $base_directory;

		/**
		 * Combines the array elements to form the file path.
		 *
		 * @var string $file_path
		 */
		$file_path = sprintf( '%1$s/%2$s', dirname( SHADOW_FADE_DIR, 1 ), implode( '/', $split ) );

		if ( file_exists( $file_path ) ) {
			require_once $file_path;
		}
	}
);
