( function( api ) {

	// Extends our custom "vw-handyman-services" section.
	api.sectionConstructor['vw-handyman-services'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );