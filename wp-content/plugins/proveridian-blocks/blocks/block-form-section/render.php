<?php
// Custom className
$className = 'pv-block-form-section';
$globalClassName = $className;
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

// Optional anchor id from block supports
$anchorAttr = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';

// Preview Image
if ( ! empty( $block['data']['_is_preview'] ) ) { ?>
	<figure>
		<img src="<?php echo plugin_dir_url( __FILE__ ); ?>screencap.png" alt="Preview of the Form Section block">
	</figure>
<?php } else {
	// Pull ACF fields
	$eyebrow        = get_field( 'eyebrow' );
	$headline       = get_field( 'headline' );
	$lede           = get_field( 'lede' );
	$points         = get_field( 'points' );
	$contact_note   = get_field( 'contact_note' );
	$form_heading   = get_field( 'form_heading' );
	$form_shortcode = get_field( 'form_shortcode' );

	$check_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><path d="m9 12 2 2 4-4"></path></svg>';
?>

<section class="<?php echo esc_attr( $className ); ?>"<?php echo $anchorAttr; ?>>
	<div class="<?php echo esc_attr( $globalClassName ); ?>-inner">

		<span class="<?php echo esc_attr( $globalClassName ); ?>-rule"></span>

		<?php if ( $eyebrow ) : ?>
			<span class="<?php echo esc_attr( $globalClassName ); ?>-eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
		<?php endif; ?>

		<?php if ( $headline ) : ?>
			<h1 class="<?php echo esc_attr( $globalClassName ); ?>-headline"><?php echo esc_html( $headline ); ?></h1>
		<?php endif; ?>

		<?php if ( $lede ) : ?>
			<p class="<?php echo esc_attr( $globalClassName ); ?>-lede"><?php echo esc_html( $lede ); ?></p>
		<?php endif; ?>

		<div class="<?php echo esc_attr( $globalClassName ); ?>-grid">

			<div class="<?php echo esc_attr( $globalClassName ); ?>-pitch">
				<?php if ( $points ) : ?>
					<div class="<?php echo esc_attr( $globalClassName ); ?>-points">
						<?php foreach ( $points as $point ) : ?>
							<div class="<?php echo esc_attr( $globalClassName ); ?>-point">
								<span class="<?php echo esc_attr( $globalClassName ); ?>-point-check"><?php echo $check_icon; ?></span>
								<div>
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

				<?php if ( $contact_note ) : ?>
					<div class="<?php echo esc_attr( $globalClassName ); ?>-note">
						<?php echo wp_kses_post( $contact_note ); ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="<?php echo esc_attr( $globalClassName ); ?>-card">
				<?php if ( $form_heading ) : ?>
					<h2 class="<?php echo esc_attr( $globalClassName ); ?>-card-heading"><?php echo esc_html( $form_heading ); ?></h2>
				<?php endif; ?>
				<?php if ( $form_shortcode ) : ?>
					<?php echo do_shortcode( $form_shortcode ); ?>
				<?php endif; ?>
			</div>

		</div>

	</div>
</section>

<?php } // end else ?>
