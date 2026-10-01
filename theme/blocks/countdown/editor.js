(function (wp) {
	const { registerBlockType } = wp.blocks;
	const { useBlockProps, InspectorControls } = wp.blockEditor;
	const { PanelBody, TextControl, DateTimePicker, SelectControl, Disabled } =
		wp.components;
	const ServerSideRender = wp.serverSideRender;
	const { createElement: el, Fragment } = wp.element;

	registerBlockType('jaffrey-democrats/countdown', {
		edit: function (props) {
			const blockProps = useBlockProps();
			const { attributes, setAttributes } = props;
			const isDaysOnly = attributes.displayMode === 'daysOnly';

			return el(
				Fragment,
				{},
				el(
					InspectorControls,
					{},
					el(
						PanelBody,
						{ title: 'Countdown Settings', initialOpen: true },
						el(SelectControl, {
							label: 'Display Mode',
							value: attributes.displayMode || 'full',
							options: [
								{
									label: 'Full Countdown (D:H:M:S)',
									value: 'full',
								},
								{ label: 'Days Only', value: 'daysOnly' },
							],
							onChange: (value) =>
								setAttributes({ displayMode: value }),
						}),
						el(TextControl, {
							label: 'Event Label',
							value: attributes.label,
							onChange: (value) =>
								setAttributes({ label: value }),
						}),
						isDaysOnly &&
							el(TextControl, {
								label: 'Days Caption',
								value: attributes.daysCaption,
								onChange: (value) =>
									setAttributes({ daysCaption: value }),
							}),
						el(TextControl, {
							label: 'Expired Message Text',
							value: attributes.expiredText,
							onChange: (value) =>
								setAttributes({ expiredText: value }),
						}),
						el(
							'div',
							{ style: { marginTop: '1rem' } },
							el(
								'label',
								{
									style: {
										display: 'block',
										marginBottom: '8px',
										fontWeight: '600',
									},
								},
								'Target Date & Time'
							),
							el(DateTimePicker, {
								currentDate: attributes.targetDate,
								onChange: (newDate) =>
									setAttributes({ targetDate: newDate }),
								is12Hour: true,
							})
						)
					)
				),
				el(
					'div',
					blockProps,
					el(
						Disabled,
						{},
						el(ServerSideRender, {
							block: 'jaffrey-democrats/countdown',
							attributes: attributes,
						})
					)
				)
			);
		},
		save: function () {
			return null;
		},
	});
})(window.wp);
