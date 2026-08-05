<?php
// Custom className
$className = 'pv-block-cta-banner';
$globalClassName = $className;
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

// Optional anchor id from block supports
$anchorAttr = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';

// Preview Image
if ( ! empty( $block['data']['_is_preview'] ) ) { ?>
	<figure>
		<img src="<?php echo plugin_dir_url( __FILE__ ); ?>screencap.png" alt="Preview of the CTA Banner block">
	</figure>
<?php } else {
	// Pull ACF fields
	$headline_light  = get_field( 'headline_light' ) ?: 'Adopt AI with confidence.';
	$headline_strong = get_field( 'headline_strong' ) ?: 'Govern it with control.';
	$body                = get_field( 'body' );
	$primary_cta_label   = get_field( 'primary_cta_label' );
	$primary_cta_url     = get_field( 'primary_cta_url' );
	$secondary_cta_label = get_field( 'secondary_cta_label' );
	$secondary_cta_url   = get_field( 'secondary_cta_url' );
?>

<section class="<?php echo esc_attr( $className ); ?>"<?php echo $anchorAttr; ?>>
	<div class="<?php echo esc_attr( $globalClassName ); ?>-inner">

		<img class="<?php echo esc_attr( $globalClassName ); ?>-mark" src="<?php echo plugin_dir_url( __FILE__ ); ?>mark.png" alt="">

		<h2 class="<?php echo esc_attr( $globalClassName ); ?>-headline">
			<?php echo esc_html( $headline_light ); ?>
			<span><?php echo esc_html( $headline_strong ); ?></span>
		</h2>

		<?php if ( $body ) : ?>
			<p class="<?php echo esc_attr( $globalClassName ); ?>-body"><?php echo esc_html( $body ); ?></p>
		<?php endif; ?>

		<?php if ( $primary_cta_label || $secondary_cta_label ) : ?>
			<div class="<?php echo esc_attr( $globalClassName ); ?>-ctas">

				<?php if ( $primary_cta_label ) : ?>
					<a href="<?php echo esc_url( $primary_cta_url ?: '#' ); ?>" class="<?php echo esc_attr( $globalClassName ); ?>-btn-primary">
						<?php echo esc_html( $primary_cta_label ); ?>
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg>
					</a>
				<?php endif; ?>

				<?php if ( $secondary_cta_label ) : ?>
					<a href="<?php echo esc_url( $secondary_cta_url ?: '#' ); ?>" class="<?php echo esc_attr( $globalClassName ); ?>-btn-secondary">
						<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path><rect x="2" y="4" width="20" height="16" rx="2"></rect></svg>
						<?php echo esc_html( $secondary_cta_label ); ?>
					</a>
				<?php endif; ?>

			</div>
		<?php endif; ?>

	</div>
</section>

<?php } // end else ?>
