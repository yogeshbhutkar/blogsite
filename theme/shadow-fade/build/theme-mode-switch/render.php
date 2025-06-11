<?php
/**
 * Server render the dark mode toggle.
 *
 * @package shadow-fade
 */

// Generate a unique ID for the switch.
$unique_id = wp_unique_id( 'switch-' );

// Adds the global state.
wp_interactivity_state(
	'shadow-fade/theme-mode-switch',
	array(
		'isDark'     => false,
		'darkLabel'  => esc_html__( 'Switch to light theme, currently dark.', 'shadow-fade' ),
		'lightLabel' => esc_html__( 'Switch to dark theme, currently light.', 'shadow-fade' ),
	)
);

$block_attributes = get_block_wrapper_attributes(
	array(
		'data-wp-interactive' => 'shadow-fade/theme-mode-switch',
	)
);
?>

<div <?php echo wp_kses_data( $block_attributes ); ?>>
	<label
		for="<?php echo esc_attr( $unique_id ); ?>"
	>
		<input
			id="<?php echo esc_attr( $unique_id ); ?>"
			type="checkbox"
			role="switch"
			data-wp-init="callbacks.onInit"
			data-wp-bind--checked="state.isDark"
			data-wp-bind--aria-checked="state.isDark"
			data-wp-bind--aria-label="state.generateAriaLabel"
			data-wp-on--change="actions.toggleThemeMode"
		/>
		<span class="theme-mode-switch__slider"></span>
	</label>
</div>
