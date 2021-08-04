<div class="<?php if ( 1 == $required ) echo 'required-product-addon'; ?> product-addon items product-addon-<?php echo sanitize_title( $name ); ?>">

	<?php do_action( 'wc_product_addon_start', $addon ); ?>

	<?php if ( $name ) : ?>
		<label class="addon-name"><?php echo wptexturize( $name ); ?> <?php if ( 1 == $required ) echo '<abbr class="required" title="' . __( 'Required field', 'woocommerce-product-addons' ) . '">*</abbr>'; ?></label>
	<?php endif; ?>

	<?php if ( $description ) : ?>
		<?php echo '<div class="addon-description"><div class="heading">'. wptexturize( $name ).'</div>' . wpautop( wptexturize( $description ) ) . '</div>'; ?>
	<?php endif; ?>

	<?php do_action( 'wc_product_addon_options', $addon ); ?>
