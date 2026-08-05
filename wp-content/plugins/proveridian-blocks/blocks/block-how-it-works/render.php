<?php
// Custom className
$className = 'pv-block-how-it-works';
$globalClassName = $className;
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

// Optional anchor id from block supports
$anchorAttr = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';

// Preview Image
if ( ! empty( $block['data']['_is_preview'] ) ) { ?>
	<figure>
		<img src="<?php echo plugin_dir_url( __FILE__ ); ?>screencap.png" alt="Preview of the How It Works block">
	</figure>
<?php } else {
	// Pull ACF fields
	$eyebrow     = get_field( 'eyebrow' );
	$headline    = get_field( 'headline' );
	$lede        = get_field( 'lede' );
	$steps       = get_field( 'steps' );
	$image_left  = get_field( 'image_left' );
	$image_right = get_field( 'image_right' );
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

		<?php if ( $lede ) : ?>
			<p class="<?php echo esc_attr( $globalClassName ); ?>-lede"><?php echo esc_html( $lede ); ?></p>
		<?php endif; ?>

		<?php if ( $steps ) : ?>
			<div class="<?php echo esc_attr( $globalClassName ); ?>-grid">
				<?php foreach ( $steps as $step ) : ?>
					<div class="<?php echo esc_attr( $globalClassName ); ?>-step">
						<?php if ( $step['label'] ) : ?>
							<span class="<?php echo esc_attr( $globalClassName ); ?>-step-label"><?php echo esc_html( $step['label'] ); ?></span>
						<?php endif; ?>
						<?php if ( $step['title'] ) : ?>
							<h3 class="<?php echo esc_attr( $globalClassName ); ?>-step-title"><?php echo esc_html( $step['title'] ); ?></h3>
						<?php endif; ?>
						<?php if ( $step['text'] ) : ?>
							<p class="<?php echo esc_attr( $globalClassName ); ?>-step-text"><?php echo esc_html( $step['text'] ); ?></p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<div class="<?php echo esc_attr( $globalClassName ); ?>-media-grid">
			<?php foreach ( array( $image_left, $image_right ) as $media_image ) : ?>
				<?php if ( ! empty( $media_image['url'] ) ) : ?>
					<div class="<?php echo esc_attr( $globalClassName ); ?>-media">
						<img src="<?php echo esc_url( $media_image['url'] ); ?>" alt="<?php echo esc_attr( $media_image['alt'] ); ?>">
					</div>
				<?php else : ?>
					<div class="<?php echo esc_attr( $globalClassName ); ?>-media-placeholder">
						<span>Image placeholder</span>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>

	</div>
</section>

<?php } // end else ?>
