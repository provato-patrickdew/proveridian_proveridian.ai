<?php
// Custom className
$className = 'pv-block-hero';
$globalClassName = $className;
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

// Optional anchor id from block supports
$anchorAttr = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';

// Preview Image
if ( ! empty( $block['data']['_is_preview'] ) ) { ?>
	<figure>
		<img src="<?php echo plugin_dir_url( __FILE__ ); ?>screencap.png" alt="Preview of the Hero block">
	</figure>
<?php } else {
	// Pull ACF fields
	$headline_line_1 = get_field( 'headline_line_1' ) ?: 'One platform.';
	$headline_line_2 = get_field( 'headline_line_2' ) ?: 'Every employee.';
	$headline_accent = get_field( 'headline_accent' ) ?: 'Complete AI control.';
	$lede                = get_field( 'lede' );
	$primary_cta_label   = get_field( 'primary_cta_label' );
	$primary_cta_url     = get_field( 'primary_cta_url' );
	$secondary_cta_label = get_field( 'secondary_cta_label' );
	$secondary_cta_url   = get_field( 'secondary_cta_url' );
	$image               = get_field( 'image' );
?>

<section class="<?php echo esc_attr( $className ); ?>"<?php echo $anchorAttr; ?>>
	<div class="<?php echo esc_attr( $globalClassName ); ?>-inner">
		<div class="<?php echo esc_attr( $globalClassName ); ?>-grid">

			<div class="<?php echo esc_attr( $globalClassName ); ?>-content">
				<h1 class="<?php echo esc_attr( $globalClassName ); ?>-headline">
					<?php echo esc_html( $headline_line_1 ); ?><br>
					<?php echo esc_html( $headline_line_2 ); ?><br>
					<span><?php echo esc_html( $headline_accent ); ?></span>
				</h1>

				<?php if ( $lede ) : ?>
					<p class="<?php echo esc_attr( $globalClassName ); ?>-lede">
						<?php echo esc_html( $lede ); ?>
					</p>
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
								<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 17a2 2 0 0 1-2 2H6.828a2 2 0 0 0-1.414.586l-2.202 2.202A.71.71 0 0 1 2 21.286V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2z"></path></svg>
								<?php echo esc_html( $secondary_cta_label ); ?>
							</a>
						<?php endif; ?>

					</div>
				<?php endif; ?>
			</div>

			<?php if ( ! empty( $image['url'] ) ) : ?>
				<div class="<?php echo esc_attr( $globalClassName ); ?>-media">
					<img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>">
				</div>
			<?php else : ?>
				<div class="<?php echo esc_attr( $globalClassName ); ?>-media-placeholder">
					<span>Image placeholder</span>
				</div>
			<?php endif; ?>

		</div>
	</div>
</section>

<?php } // end else ?>
