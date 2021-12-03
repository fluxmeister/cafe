<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

wc_print_notices();

?>

<div class="cart-empty-page cart-empty">
	
	<h1><?php esc_html_e('Empty', 'dfd'); ?></h1>
	
	<p class="cart-empty-text"><?php esc_html_e( 'Your cart is currently', 'dfd' ) ?></p>
	
	<p class="cart-empty-subtext"><?php esc_html_e( 'You may check out all the available products and buy some in the shop.', 'dfd' ) ?></p>

	<?php do_action( 'woocommerce_cart_is_empty' );
	
	if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
		<p class="return-to-shop">
			<a class="button wc-backward" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
				<?php esc_html_e( 'Return to shop', 'dfd' ) ?>
			</a>
		</p>
	<?php endif; ?>
</div>