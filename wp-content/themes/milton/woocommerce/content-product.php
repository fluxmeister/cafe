<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product, $woocommerce_loop, $milton_options, $i, $delay;

// Ensure visibility
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}

// Extra post classes
$classes[] = 'shop-column';
?>
<?php
global $product_layout;
$shop_column_layout = isset( $milton_options['shop-column-layout'] ) ? esc_attr( $milton_options['shop-column-layout'] ) : ''; 
$shop_column_layout = !empty($product_layout) ? $product_layout : $shop_column_layout; 

switch($shop_column_layout){
    case '1':
        $classes[] = 'col-xs-12 col-sm-12 col-md-12';
        break;
    case '2':
        $classes[] = 'col-xs-12 col-sm-12 col-md-6';
        break;
    case '3':
        $classes[] = 'col-xs-12 col-sm-6 col-md-4';
        break;
    case '4':
        $classes[] = 'col-xs-12 col-sm-6 col-md-3';
        break;
    case '5':
        $classes[] = 'col-xs-12 col-sm-6 col-md-3 col-lg-2_5';
        break;
    case '6':
        $classes[] = 'col-xs-12 col-sm-6 col-md-3 col-lg-2';
        break;
    default:
    	$classes[] = 'col-xs-12 col-sm-6 col-md-4';
}
$product_layout = null;
$shop_style = $shop_attr = '';

$shop_layout = esc_attr( $shop_column_layout );
$shop_gutter = isset( $milton_options['shop-gutter'] ) && esc_attr( $milton_options['shop-gutter'] );
$shop_gutter_value = isset( $milton_options['shop-gutter-value'] ) && esc_attr( $milton_options['shop-gutter-value'] );
$shop_animation = isset( $milton_options['shop-animation'] ) && esc_attr( $milton_options['shop-animation'] );
$shop_animation_style = isset( $milton_options['shop-animation-style'] ) && esc_attr( $milton_options['shop-animation-style'] );
$shop_animation_delay = isset( $milton_options['shop-animation-delay'] ) && esc_attr( $milton_options['shop-animation-delay'] );
$shop_animation_duration = isset( $milton_options['shop-animation-duration'] ) && esc_attr( $milton_options['shop-animation-duration'] );
$shop_animation_offset = isset( $milton_options['shop-animation-offset'] ) && esc_attr( $milton_options['shop-animation-offset'] );

if( $shop_animation == '1' ){
	if( $i >= $shop_layout ){
        $delay = $i = 0;
    }
    $delay += $shop_animation_delay;
    $duration = $shop_animation_duration;
    $i += 1;
	$classes[] = ' animate';
	$shop_attr = ' data-animation="'.esc_attr($shop_animation_style).'" data-animation-offset="'.esc_attr($shop_animation_offset).'%"';
	$shop_style = ' -webkit-animation-duration: '.$duration.'s; -webkit-animation-delay: '.$delay.'s; animation-duration: '.$duration.'s; animation-delay: '.$delay.'s;';
}

if( $shop_gutter == '1' ){
	$shop_style .= ' margin: '.intval($shop_gutter_value/2).'px 0; padding: 0 '.intval($shop_gutter_value/2).'px;';
}
?>
<li <?php wc_product_class( $classes, $product ); ?> style="<?php echo esc_attr( $shop_style ); ?>" <?php echo wp_kses_post( $shop_attr ); ?>>
	
	<?php
	echo '<div class="product-thumbnail">';

	/**
	 * Hook: woocommerce_before_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_open - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item' );

	/**
	 * Hook: woocommerce_before_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_show_product_loop_sale_flash - 10
	 * @hooked woocommerce_template_loop_product_thumbnail - 10
	 */
	do_action( 'woocommerce_before_shop_loop_item_title' );

	do_action( 'agni_template_loop_product_link_close' ); 

	echo '<div class="buttons product-buttons">';
	
	do_action( 'woocommerce_after_shop_loop_item' ); 
	
	echo '</div>'; 
	
	if( defined( 'YITH_WCWL' ) ){
		echo do_shortcode('[yith_wcwl_add_to_wishlist]');
	}

	echo '</div>';
	/**
	 * Hook: woocommerce_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_product_title - 10
	 */
	echo '<div class="product-content">';
	do_action( 'woocommerce_shop_loop_item_title' );

	/**
	 * Hook: woocommerce_after_shop_loop_item_title hook.
	 *
	 * @hooked woocommerce_template_loop_rating - 5
	 * @hooked woocommerce_template_loop_price - 10
	 */
	echo '<div class="product-meta">';
	do_action( 'woocommerce_after_shop_loop_item_title' );
	echo '</div>';
	echo '</div>';
	/**
	 * Hook: woocommerce_after_shop_loop_item hook.
	 *
	 * @hooked woocommerce_template_loop_product_link_close - 5
	 * @hooked woocommerce_template_loop_add_to_cart - 10
	 */
	?>

</li>
