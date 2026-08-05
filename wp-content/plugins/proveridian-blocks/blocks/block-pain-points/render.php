<?php
// Custom className
$className = 'pv-block-pain-points';
$globalClassName = $className;
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

// Optional anchor id from block supports
$anchorAttr = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';

// Preview Image
if ( ! empty( $block['data']['_is_preview'] ) ) { ?>
	<figure>
		<img src="<?php echo plugin_dir_url( __FILE__ ); ?>screencap.png" alt="Preview of the Pain Points block">
	</figure>
<?php } else {
	// Pull ACF fields
	$eyebrow  = get_field( 'eyebrow' );
	$accent   = get_field( 'accent' ) ?: 'amber';
	$headline = get_field( 'headline' );
	$lede     = get_field( 'lede' );
	$cards    = get_field( 'cards' );

	// Inline lucide icons keyed by the icon select field
	$icons = array(
		'shield-alert' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"></path><path d="M12 8v4"></path><path d="M12 16h.01"></path></svg>',
		'database'     => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M3 5V19A9 3 0 0 0 21 19V5"></path><path d="M3 12A9 3 0 0 0 21 12"></path></svg>',
		'credit-card'  => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 7V4a1 1 0 0 0-1-1H5a2 2 0 0 0 0 4h15a1 1 0 0 1 1 1v4h-3a2 2 0 0 0 0 4h3a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1"></path><path d="M3 5v14a2 2 0 0 0 2 2h15a1 1 0 0 0 1-1v-4"></path></svg>',
		'eye'          => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle></svg>',
	);
?>

<section class="<?php echo esc_attr( $className ); ?>"<?php echo $anchorAttr; ?>>
	<div class="<?php echo esc_attr( $globalClassName ); ?>-inner">

		<span class="<?php echo esc_attr( $globalClassName ); ?>-rule is-<?php echo esc_attr( $accent ); ?>"></span>

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
					$card_accent = $card['accent'] ?: 'amber';
					$card_icon   = $card['icon'] ?: 'shield-alert';
				?>
					<div class="<?php echo esc_attr( $globalClassName ); ?>-card is-<?php echo esc_attr( $card_accent ); ?>">
						<span class="<?php echo esc_attr( $globalClassName ); ?>-card-rail" aria-hidden="true"></span>
						<span class="<?php echo esc_attr( $globalClassName ); ?>-card-icon">
							<?php echo isset( $icons[ $card_icon ] ) ? $icons[ $card_icon ] : ''; ?>
						</span>
						<?php if ( $card['title'] ) : ?>
							<h3 class="<?php echo esc_attr( $globalClassName ); ?>-card-title"><?php echo esc_html( $card['title'] ); ?></h3>
						<?php endif; ?>
						<?php if ( $card['text'] ) : ?>
							<p class="<?php echo esc_attr( $globalClassName ); ?>-card-text"><?php echo esc_html( $card['text'] ); ?></p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

	</div>
</section>

<?php } // end else ?>
