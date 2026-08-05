<?php
// Custom className
$className = 'pv-block-comparison-table';
$globalClassName = $className;
if ( ! empty( $block['className'] ) ) {
	$className .= ' ' . $block['className'];
}

// Optional anchor id from block supports
$anchorAttr = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';

// Preview Image
if ( ! empty( $block['data']['_is_preview'] ) ) { ?>
	<figure>
		<img src="<?php echo plugin_dir_url( __FILE__ ); ?>screencap.png" alt="Preview of the Comparison Table block">
	</figure>
<?php } else {
	// Pull ACF fields
	$eyebrow         = get_field( 'eyebrow' );
	$headline        = get_field( 'headline' );
	$col_dimension   = get_field( 'col_dimension' ) ?: 'Dimension';
	$col_competitor  = get_field( 'col_competitor' ) ?: 'Public AI chatbots';
	$col_proveridian = get_field( 'col_proveridian' ) ?: 'ProVeridian';
	$rows            = get_field( 'rows' );
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

		<?php if ( $rows ) : ?>
			<div class="<?php echo esc_attr( $globalClassName ); ?>-grid">

				<div class="<?php echo esc_attr( $globalClassName ); ?>-head <?php echo esc_attr( $globalClassName ); ?>-head-dimension"><?php echo esc_html( $col_dimension ); ?></div>
				<div class="<?php echo esc_attr( $globalClassName ); ?>-head <?php echo esc_attr( $globalClassName ); ?>-head-competitor"><?php echo esc_html( $col_competitor ); ?></div>
				<div class="<?php echo esc_attr( $globalClassName ); ?>-head <?php echo esc_attr( $globalClassName ); ?>-head-proveridian">
					<img src="<?php echo plugin_dir_url( __FILE__ ); ?>mark.png" alt="">
					<?php echo esc_html( $col_proveridian ); ?>
				</div>

				<?php foreach ( $rows as $row ) : ?>
					<div class="<?php echo esc_attr( $globalClassName ); ?>-cell <?php echo esc_attr( $globalClassName ); ?>-cell-dimension"><?php echo esc_html( $row['dimension'] ); ?></div>
					<div class="<?php echo esc_attr( $globalClassName ); ?>-cell <?php echo esc_attr( $globalClassName ); ?>-cell-competitor" data-col="<?php echo esc_attr( $col_competitor ); ?>"><?php echo esc_html( $row['competitor'] ); ?></div>
					<div class="<?php echo esc_attr( $globalClassName ); ?>-cell <?php echo esc_attr( $globalClassName ); ?>-cell-proveridian" data-col="<?php echo esc_attr( $col_proveridian ); ?>"><?php echo esc_html( $row['proveridian'] ); ?></div>
				<?php endforeach; ?>

			</div>
		<?php endif; ?>

	</div>
</section>

<?php } // end else ?>
