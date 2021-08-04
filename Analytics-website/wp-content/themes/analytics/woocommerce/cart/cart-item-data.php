<?php
/**
 * Cart item data (when outputting non-flat)
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-item-data.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version 	2.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// var_dump($item_data);
?>
<dl class="variation">
	<?php foreach ( $item_data as $data ) : ?>
	<!-- echo $data['key']; -->
		 <!-- <dt class="variation-<?php echo sanitize_html_class( $data['key'] ); ?>"><?php echo wp_kses_post( $data['key'] ); ?>:</dt> -->
		 
		<dt class="variation-<?php echo sanitize_html_class( $data['key'] ); ?>">
		
		<?php 
		if(wp_kses_post( $data['key']) == "Campaign Name") { 
			
			echo "<h5>[".$data['display']."]</h5>"; 
		
		}if(wp_kses_post( $data['key']) == "Link Group") { 
			
			$links = $data['display']; 
			$links = explode(",",$links);
			$total_link = count($links) - 1;
			echo "With [".$total_link."] links </br>";

			for ($i=0; $i < $total_link; $i++) { 
				echo "<span>[".trim($links[$i])."]</span> </br>";
			}
		}?></dt>


	<?php endforeach;?>

	<?php if(count($item_data) >= 4 &&  $item_data[count($item_data) -1]['key']  == "Add Auto Top-Up"){
		// var_dump($item_data);
		echo "<dt class='auto-top-up'>Auto Top-Up selected for this item</dt>";
	}?>
</dl>
