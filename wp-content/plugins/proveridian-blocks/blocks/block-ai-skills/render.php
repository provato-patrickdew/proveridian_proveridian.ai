<?php
// Custom className
$className = 'pv-block-ai-skills';
$globalClassName = $className;
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

// Optional anchor id from block supports
$anchorAttr = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';

// Preview Image
if ( ! empty( $block['data']['_is_preview'] ) ) { ?>
	<figure>
		<img src="<?php echo plugin_dir_url( __FILE__ ); ?>screencap.png" alt="Preview of the AI Skills block">
	</figure>
<?php } else {
	// Pull ACF fields
	$eyebrow      = get_field( 'eyebrow' );
	$headline     = get_field( 'headline' );
	$lede         = get_field( 'lede' );
	$benefits     = get_field( 'benefits' );
	$interstitial = get_field( 'interstitial' );
	$departments  = get_field( 'departments' );

	// Inline lucide icons keyed by the icon select fields
	$benefit_icons = array(
		'circle-check' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"></circle><path d="m9 12 2 2 4-4"></path></svg>',
		'zap'          => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 14a1 1 0 0 1-.78-1.63l9.9-10.2a.5.5 0 0 1 .86.46l-1.92 6.02A1 1 0 0 0 13 10h7a1 1 0 0 1 .78 1.63l-9.9 10.2a.5.5 0 0 1-.86-.46l1.92-6.02A1 1 0 0 0 11 14z"></path></svg>',
		'book-open'    => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 7v14"></path><path d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z"></path></svg>',
	);

	$department_icons = array(
		'chart-pie' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 12c.552 0 1.005-.449.95-.998a10 10 0 0 0-8.953-8.951c-.55-.055-.998.398-.998.95v8a1 1 0 0 0 1 1z"></path><path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path></svg>',
		'briefcase' => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path><rect width="20" height="14" x="2" y="6" rx="2"></rect></svg>',
		'send'      => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.536 21.686a.5.5 0 0 0 .937-.024l6.5-19a.496.496 0 0 0-.635-.635l-19 6.5a.5.5 0 0 0-.024.937l7.93 3.18a2 2 0 0 1 1.112 1.11z"></path><path d="m21.854 2.147-10.94 10.939"></path></svg>',
		'workflow'  => '<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="8" height="8" x="3" y="3" rx="2"></rect><path d="M7 11v4a2 2 0 0 0 2 2h4"></path><rect width="8" height="8" x="13" y="13" rx="2"></rect></svg>',
	);
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

		<?php if ( $benefits ) : ?>
			<div class="<?php echo esc_attr( $globalClassName ); ?>-benefits">
				<?php foreach ( $benefits as $benefit ) :
					$benefit_icon = $benefit['icon'] ?: 'circle-check';
				?>
					<div class="<?php echo esc_attr( $globalClassName ); ?>-benefit">
						<span class="<?php echo esc_attr( $globalClassName ); ?>-benefit-icon">
							<?php echo isset( $benefit_icons[ $benefit_icon ] ) ? $benefit_icons[ $benefit_icon ] : ''; ?>
						</span>
						<?php if ( $benefit['title'] ) : ?>
							<h3 class="<?php echo esc_attr( $globalClassName ); ?>-benefit-title"><?php echo esc_html( $benefit['title'] ); ?></h3>
						<?php endif; ?>
						<?php if ( $benefit['text'] ) : ?>
							<p class="<?php echo esc_attr( $globalClassName ); ?>-benefit-text"><?php echo esc_html( $benefit['text'] ); ?></p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>

		<?php if ( $interstitial ) : ?>
			<p class="<?php echo esc_attr( $globalClassName ); ?>-interstitial"><?php echo esc_html( $interstitial ); ?></p>
		<?php endif; ?>

		<?php if ( $departments ) : ?>
			<div class="<?php echo esc_attr( $globalClassName ); ?>-departments">
				<?php foreach ( $departments as $department ) :
					$department_icon = $department['icon'] ?: 'chart-pie';
				?>
					<div class="<?php echo esc_attr( $globalClassName ); ?>-department">
						<div class="<?php echo esc_attr( $globalClassName ); ?>-department-header">
							<span class="<?php echo esc_attr( $globalClassName ); ?>-department-icon">
								<?php echo isset( $department_icons[ $department_icon ] ) ? $department_icons[ $department_icon ] : ''; ?>
							</span>
							<?php if ( $department['name'] ) : ?>
								<span class="<?php echo esc_attr( $globalClassName ); ?>-department-name"><?php echo esc_html( $department['name'] ); ?></span>
							<?php endif; ?>
						</div>
						<?php if ( $department['skills'] ) : ?>
							<div class="<?php echo esc_attr( $globalClassName ); ?>-department-skills">
								<?php foreach ( $department['skills'] as $skill ) : ?>
									<div class="<?php echo esc_attr( $globalClassName ); ?>-department-skill">
										<?php if ( $skill['title'] ) : ?>
											<span class="<?php echo esc_attr( $globalClassName ); ?>-department-skill-title"><?php echo esc_html( $skill['title'] ); ?></span>
										<?php endif; ?>
										<?php if ( $skill['text'] ) : ?>
											<span class="<?php echo esc_attr( $globalClassName ); ?>-department-skill-text"><?php echo esc_html( $skill['text'] ); ?></span>
										<?php endif; ?>
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
