/**
 * WordPress dependencies
 */
import { store } from '@wordpress/interactivity';

type ServerState = {
	state: {
		isDark: boolean;
		darkLabel: string;
		lightLabel: string;
	};
};

const documentElement = document.documentElement;
const prefersDark =
	window.matchMedia &&
	window.matchMedia( '(prefers-color-scheme: dark)' ).matches;

const storeDef = {
	state: {
		get generateAriaLabel(): string {
			return state.isDark ? state.darkLabel : state.lightLabel;
		},
	},
	actions: {
		toggleThemeMode( event: Event & { target: HTMLInputElement } ) {
			const isDark = event.target.checked;
			state.isDark = isDark;

			// Update the class based on the theme mode.
			documentElement.classList.toggle( 'is-dark', isDark );

			// Save the theme mode preference in localStorage.
			localStorage.setItem( 'theme-mode', isDark ? 'dark' : 'light' );
		},
	},
	callbacks: {
		onInit() {
			const themePreference = localStorage.getItem('theme-mode');
			state.isDark = themePreference === 'dark' || ! themePreference && prefersDark;
		},
	},
};

type Store = ServerState & typeof storeDef;

const { state } = store<Store>( 'shadow-fade/theme-mode-switch', storeDef );
