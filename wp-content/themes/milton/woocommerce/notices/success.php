<?php
/**
 * Show messages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/notices/success.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! $notices ){
	return;
}
global $milton_options, $post; 

$page_layout = esc_attr( get_post_meta( $post->ID, 'page_layout', true ) );

if( isset( $milton_options['shop-single-layout'] ) && $page_layout == '' ){
	$page_layout = esc_attr( $milton_options['shop-single-layout'] );
}
?>
<div class="woocommerce-notice-container <?php esc_attr( $page_layout ); ?>">
<?php foreach ( $notices as $notice ) : ?>
	<div class="woocommerce-message"<?php echo wc_get_notice_data_attr( $notice ); ?>><?php echo wc_kses_notice( $notice['notice'] ); ?></div>
<?php endforeach; ?>
</div>
