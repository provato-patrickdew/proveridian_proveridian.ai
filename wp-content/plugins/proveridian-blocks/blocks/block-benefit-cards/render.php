<?php
// Custom className
$className = 'pv-block-benefit-cards';
$globalClassName = $className;
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

// Optional anchor id from block supports
$anchorAttr = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';

// Preview Image
if ( ! empty( $block['data']['_is_preview'] ) ) { ?>
	<figure>
		<img src="<?php echo plugin_dir_url( __FILE__ ); ?>screencap.png" alt="Preview of the Benefit Cards block">
	</figure>
<?php } else {
	// Pull ACF fields
	$eyebrow  = get_field( 'eyebrow' );
	$headline = get_field( 'headline' );
	$lede     = get_field( 'lede' );
	$cards    = get_field( 'cards' );

	// Inline lucide icons keyed by the icon select field
	$icons = array(
		'trending-up' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 7h6v6"></path><path d="m22 7-8.5 8.5-5-5L2 17"></path></svg>',
		'wrench'      => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m14 13-8.381 8.38a1 1 0 0 1-3.001-3l8.384-8.381"></path><path d="m16 16 6-6"></path><path d="m21.5 10.5-8-8"></path><path d="m8 8 6-6"></path><path d="m8.5 7.5 8 8"></path></svg>',
		'users'       => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><path d="M16 3.128a4 4 0 0 1 0 7.744"></path><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><circle cx="9" cy="7" r="4"></circle></svg>',
	);

	$check_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6 9 17l-5-5"></path></svg>';
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

		<?php if ( $cards ) : ?>
			<div class="<?php echo esc_attr( $globalClassName ); ?>-grid">
				<?php foreach ( $cards as $card ) :
					$card_icon   = $card['icon'] ?: 'trending-up';
					$card_accent = $card['accent'] ?: 'teal';
				?>
					<div class="<?php echo esc_attr( $globalClassName ); ?>-card">
						<span class="<?php echo esc_attr( $globalClassName ); ?>-card-icon is-<?php echo esc_attr( $card_accent ); ?>">
							<?php echo isset( $icons[ $card_icon ] ) ? $icons[ $card_icon ] : ''; ?>
						</span>
						<?php if ( $card['label'] ) : ?>
							<span class="<?php echo esc_attr( $globalClassName ); ?>-card-label"><?php echo esc_html( $card['label'] ); ?></span>
						<?php endif; ?>
						<?php if ( $card['title'] ) : ?>
							<h3 class="<?php echo esc_attr( $globalClassName ); ?>-card-title"><?php echo esc_html( $card['title'] ); ?></h3>
						<?php endif; ?>
						<?php if ( $card['text'] ) : ?>
							<p class="<?php echo esc_attr( $globalClassName ); ?>-card-text"><?php echo esc_html( $card['text'] ); ?></p>
						<?php endif; ?>
						<?php if ( $card['points'] ) : ?>
							<div class="<?php echo esc_attr( $globalClassName ); ?>-card-points">
								<?php foreach ( $card['points'] as $point ) : ?>
									<div class="<?php echo esc_attr( $globalClassName ); ?>-card-point">
										<span class="<?php echo esc_attr( $globalClassName ); ?>-card-point-check"><?php echo $check_icon; ?></span>
										<span class="<?php echo esc_attr( $globalClassName ); ?>-card-point-text"><?php echo esc_html( $point['text'] ); ?></span>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	</div>
</section>

<?php } // end else ?>
