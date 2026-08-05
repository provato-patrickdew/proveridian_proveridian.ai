/**
 * File smooth-scroll.js.
 *
 * Smoothly scrolls to same-page anchor targets (menu items and any in-page
 * links using href="#id"). Uses a requestAnimationFrame tween rather than CSS
 * scroll-behavior, and offsets for the sticky site header so the target isn't
 * hidden beneath it.
 */
( function() {
	// Respect users who prefer reduced motion — jump instantly instead.
	const prefersReducedMotion = window.matchMedia( '(prefers-reduced-motion: reduce)' ).matches;

	const DURATION = 600; // ms

	// easeInOutCubic — slow start and end, quick in the middle.
	function ease( t ) {
		return t < 0.5 ? 4 * t * t * t : 1 - Math.pow( -2 * t + 2, 3 ) / 2;
	}

	// Current sticky-header height, read live so it stays correct if it changes.
	function headerOffset() {
		const header = document.getElementById( 'masthead' );
		return header ? header.getBoundingClientRect().height : 0;
	}

	function scrollToTarget( target ) {
		const start = window.pageYOffset;
		const end = start + target.getBoundingClientRect().top - headerOffset();
		const distance = end - start;

		if ( prefersReducedMotion || Math.abs( distance ) < 1 ) {
			window.scrollTo( 0, end );
			return;
		}

		let startTime = null;

		function step( now ) {
			if ( startTime === null ) {
				startTime = now;
			}
			const elapsed = Math.min( ( now - startTime ) / DURATION, 1 );
			window.scrollTo( 0, start + distance * ease( elapsed ) );

			if ( elapsed < 1 ) {
				window.requestAnimationFrame( step );
			}
		}

		window.requestAnimationFrame( step );
	}

	document.addEventListener( 'click', function( event ) {
		const link = event.target.closest( 'a[href*="#"]' );

		if ( ! link ) {
			return;
		}

		// Only handle links pointing at the current page.
		if ( link.pathname !== window.location.pathname || link.hostname !== window.location.hostname ) {
			return;
		}

		const hash = link.hash;

		// Ignore bare "#" and links without a hash.
		if ( ! hash || hash === '#' ) {
			return;
		}

		let target;
		try {
			target = document.querySelector( hash );
		} catch ( e ) {
			return; // Malformed selector — let the browser handle it.
		}

		if ( ! target ) {
			return;
		}

		event.preventDefault();

		// Close the mobile menu if it's open.
		const nav = document.getElementById( 'site-navigation' );
		if ( nav && nav.classList.contains( 'toggled' ) ) {
			nav.classList.remove( 'toggled' );
			const button = nav.getElementsByTagName( 'button' )[ 0 ];
			if ( button ) {
				button.setAttribute( 'aria-expanded', 'false' );
			}
		}

		scrollToTarget( target );

		// Keep the URL and focus in sync without an extra jump.
		if ( history.pushState ) {
			history.pushState( null, '', hash );
		}
		target.setAttribute( 'tabindex', '-1' );
		target.focus( { preventScroll: true } );
	} );
}() );
