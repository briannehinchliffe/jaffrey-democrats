import { registerBlockType } from '@wordpress/blocks';
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl, DateTimePicker } from '@wordpress/components';
import { CountdownUI } from './CountdownUI'; // Visual component from initial setup
import metadata from './block.json';

registerBlockType(metadata.name, {
	edit: ({ attributes, setAttributes }) => {
		const blockProps = useBlockProps();
		const { targetDate, expiredText } = attributes;

		return (
			<div {...blockProps}>
				<InspectorControls>
					<PanelBody title="Countdown Settings">
						<TextControl
							label="Expired Text"
							value={expiredText}
							onChange={(value) =>
								setAttributes({ expiredText: value })
							}
						/>
						<DateTimePicker
							currentDate={targetDate}
							onChange={(newDate) =>
								setAttributes({ targetDate: newDate })
							}
							is12Hour={false}
						/>
					</PanelBody>
				</InspectorControls>

				<CountdownUI
					dateString={targetDate}
					expiredText={expiredText}
				/>
			</div>
		);
	},

	// Dynamic blocks return null in save() because render.php renders the front-end
	save: () => null,
});
