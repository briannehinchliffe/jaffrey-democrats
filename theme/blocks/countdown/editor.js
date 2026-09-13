(function (wp) {
	const { registerBlockType } = wp.blocks;
	const { useBlockProps, InspectorControls } = wp.blockEditor;
	const { PanelBody, TextControl, DateTimePicker, Disabled } = wp.components;
	const ServerSideRender = wp.serverSideRender;
	const { createElement: el, Fragment } = wp.element;

	registerBlockType('jaffrey-democrats/countdown', {
		edit: function (props) {
			const blockProps = useBlockProps();
			const { attributes, setAttributes } = props;

			return el(
				Fragment,
				{},
				el(
					InspectorControls,
					{},
					el(
						PanelBody,
						{ title: 'Countdown Settings', initialOpen: true },
						el(TextControl, {
							label: 'Event Label',
							value: attributes.label,
							onChange: (value) =>
								setAttributes({ label: value }),
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
