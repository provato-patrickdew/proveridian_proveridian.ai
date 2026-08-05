<?php
// Custom className
$className = 'pv-block-audience-tabs';
$globalClassName = $className;
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

// Optional anchor id from block supports
$anchorAttr = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';

// Preview Image
if ( ! empty( $block['data']['_is_preview'] ) ) { ?>
	<figure>
		<img src="<?php echo plugin_dir_url( __FILE__ ); ?>screencap.png" alt="Preview of the Audience Tabs block">
	</figure>
<?php } else {
	// Pull ACF fields
	$eyebrow             = get_field( 'eyebrow' );
	$headline            = get_field( 'headline' );
	$tabs                = get_field( 'tabs' );
	$primary_cta_label   = get_field( 'primary_cta_label' );
	$primary_cta_url     = get_field( 'primary_cta_url' );
	$secondary_cta_label = get_field( 'secondary_cta_label' );
	$secondary_cta_url   = get_field( 'secondary_cta_url' );

	// Inline lucide icons keyed by the tab icon select field
	$icons = array(
		'play'         => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 5a2 2 0 0 1 3.008-1.728l11.997 6.998a2 2 0 0 1 .003 3.458l-12 7A2 2 0 0 1 5 19z"></path></svg>',
		'shield-alert' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path><path d="M12 8v4"></path><path d="M12 16h.01"></path></svg>',
		'trending-up'  => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 7h6v6"></path><path d="m22 7-8.5 8.5-5-5L2 17"></path></svg>',
	);

	$check_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><path d="m9 12 2 2 4-4"></path></svg>';
?>

<section class="<?php echo esc_attr( $className ); ?>"<?php echo $anchorAttr; ?>>
	<div class="<?php echo esc_attr( $globalClassName ); ?>-inner">

		<span class="<?php echo esc_attr( $globalClassName ); ?>-rule"></span>

		<?php if ( $eyebrow ) : ?>
			<span class="<?php echo esc_attr( $globalClassName ); ?>-eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
		<?php endif; ?>

		<?php if ( $headline ) : ?>
			<h2 class="<?php echo esc_attr( $globalClassName ); ?>-headline"><?php echo esc_html( $headline ); ?></h2>
		<?php endif; ?>

		<?php if ( $tabs ) : ?>

			<div class="<?php echo esc_attr( $globalClassName ); ?>-tablist" role="tablist">
				<?php foreach ( $tabs as $i => $tab ) :
					$tab_icon = $tab['icon'] ?: 'play';
				?>
					<button type="button" role="tab" class="<?php echo esc_attr( $globalClassName ); ?>-tab<?php echo 0 === $i ? ' is-active' : ''; ?>" aria-selected="<?php echo 0 === $i ? 'true' : 'false'; ?>">
						<?php echo isset( $icons[ $tab_icon ] ) ? $icons[ $tab_icon ] : ''; ?>
						<?php echo esc_html( $tab['label'] ); ?>
					</button>
				<?php endforeach; ?>
			</div>

			<?php foreach ( $tabs as $i => $tab ) : ?>
				<div class="<?php echo esc_attr( $globalClassName ); ?>-panel<?php echo 0 === $i ? ' is-active' : ''; ?>">
					<div class="<?php echo esc_attr( $globalClassName ); ?>-pitch">
						<?php if ( $tab['heading'] ) : ?>
							<h3 class="<?php echo esc_attr( $globalClassName ); ?>-pitch-heading"><?php echo esc_html( $tab['heading'] ); ?></h3>
						<?php endif; ?>
						<?php if ( $tab['body'] ) : ?>
							<p class="<?php echo esc_attr( $globalClassName ); ?>-pitch-body"><?php echo esc_html( $tab['body'] ); ?></p>
						<?php endif; ?>

						<?php if ( $primary_cta_label || $secondary_cta_label ) : ?>
							<div class="<?php echo esc_attr( $globalClassName ); ?>-ctas">
								<?php if ( $primary_cta_label ) : ?>
									<a href="<?php echo esc_url( $primary_cta_url ?: '#' ); ?>" class="<?php echo esc_attr( $globalClassName ); ?>-btn-primary">
										<?php echo esc_html( $primary_cta_label ); ?>
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
									</a>
								<?php endif; ?>
								<?php if ( $secondary_cta_label ) : ?>
									<a href="<?php echo esc_url( $secondary_cta_url ?: '#' ); ?>" class="<?php echo esc_attr( $globalClassName ); ?>-btn-secondary">
										<?php echo esc_html( $secondary_cta_label ); ?>
									</a>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>

					<?php if ( $tab['points'] ) : ?>
						<div class="<?php echo esc_attr( $globalClassName ); ?>-points">
							<?php foreach ( $tab['points'] as $point ) : ?>
								<div class="<?php echo esc_attr( $globalClassName ); ?>-point">
									<span class="<?php echo esc_attr( $globalClassName ); ?>-point-check"><?php echo $check_icon; ?></span>
									<div class="<?php echo esc_attr( $globalClassName ); ?>-point-content">
										<?php if ( $point['title'] ) : ?>
											<span class="<?php echo esc_attr( $globalClassName ); ?>-point-title"><?php echo esc_html( $point['title'] ); ?></span>
										<?php endif; ?>
										<?php if ( $point['text'] ) : ?>
											<span class="<?php echo esc_attr( $globalClassName ); ?>-point-text"><?php echo esc_html( $point['text'] ); ?></span>
										<?php endif; ?>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>

		<?php endif; ?>

	</div>
</section>

<?php } // end else ?>
