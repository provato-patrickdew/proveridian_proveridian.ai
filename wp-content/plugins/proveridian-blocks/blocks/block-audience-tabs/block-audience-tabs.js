// pv-block-audience-tabs.js
// Tab switching for the Audience Tabs block

document.addEventListener( 'DOMContentLoaded', function () {
	var audienceTabsBlocks = document.querySelectorAll( '.pv-block-audience-tabs' );

	audienceTabsBlocks.forEach( function ( block ) {
		var tabs   = block.querySelectorAll( '.pv-block-audience-tabs-tab' );
		var panels = block.querySelectorAll( '.pv-block-audience-tabs-panel' );

		tabs.forEach( function ( tab, index ) {
			tab.addEventListener( 'click', function () {
				tabs.forEach( function ( t ) {
					t.classList.remove( 'is-active' );
					t.setAttribute( 'aria-selected', 'false' );
				} );
				panels.forEach( function ( p ) {
					p.classList.remove( 'is-active' );
				} );

				tab.classList.add( 'is-active' );
				tab.setAttribute( 'aria-selected', 'true' );
				if ( panels[ index ] ) {
					panels[ index ].classList.add( 'is-active' );
				}
			} );
		} );
	} );
} );
