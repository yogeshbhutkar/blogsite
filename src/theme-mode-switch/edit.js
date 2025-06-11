/**
 * WordPress dependencies
 */
import { useBlockProps } from '@wordpress/block-editor';
import { useInstanceId } from '@wordpress/compose';

function useUniqueId() {
	const instanceId = useInstanceId( Edit );
	return `switch-${instanceId}`;
}

export default function Edit() {
	const uniqueId = useUniqueId();

	return (
		<div { ...useBlockProps() }>
			<label for={uniqueId}>
				<input
					id={uniqueId}
					type="checkbox"
					role="switch"
					disabled
				/>
				<span class="theme-mode-switch__slider"></span>
			</label>
		</div>
	);
}
