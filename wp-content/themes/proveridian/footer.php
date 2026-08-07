<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package proveridian
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-footer-inner">
			<a class="site-footer-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/images/proveridian-lockup-horizontal-reversed-3200x653.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
			</a>
			<p class="site-footer-tagline"><?php echo esc_html( get_bloginfo( 'description' ) ?: 'Governed AI enablement for the enterprise. Built and backed by The Provato Group.' ); ?></p>
			<?php
			if ( has_nav_menu( 'menu-2' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'menu-2',
						'menu_id'        => 'footer-menu',
						'container'      => 'nav',
						'container_class' => 'site-footer-nav',
						'depth'          => 1,
					)
				);
			}
			?>
		</div><!-- .site-footer-inner -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
