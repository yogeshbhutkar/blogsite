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

const body = document.body;
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

			// Update the body class based on the theme mode.
			body.classList.toggle( 'is-dark', isDark );

			// Save the theme mode preference in localStorage.
			localStorage.setItem( 'theme-mode', isDark ? 'dark' : 'light' );
		},
	},
	callbacks: {
		onInit() {
			const themePreference = localStorage.getItem('theme-mode');

			if ( !themePreference && prefersDark ) {
				// Update state and the corresponding dependents.
				state.isDark = true;
				body.classList.add( 'is-dark' );
				localStorage.setItem( 'theme-mode', 'dark' );
				return;
			}

			const isStoredPreferenceDark = themePreference === 'dark';
			body.classList.toggle( 'is-dark', isStoredPreferenceDark );
			state.isDark = isStoredPreferenceDark;
		},
	},
};

type Store = ServerState & typeof storeDef;

const { state } = store<Store>( 'shadow-fade/theme-mode-switch', storeDef );
