<?php
/**
 * The template for displaying product category thumbnails within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.7.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product_layout, $milton_options;

// Extra Classes
$classes[] = 'shop-column';

?>
<?php
global $product_layout;

$shop_layout = isset( $milton_options['shop-column-layout'] ) && esc_attr( $milton_options['shop-column-layout'] );
$shop_gutter = isset( $milton_options['shop-gutter'] ) && esc_attr( $milton_options['shop-gutter'] );
$shop_gutter_value = isset( $milton_options['shop-gutter-value'] ) && esc_attr( $milton_options['shop-gutter-value'] );
$shop_animation = isset( $milton_options['shop-animation'] ) && esc_attr( $milton_options['shop-animation'] );
$shop_animation_style = isset( $milton_options['shop-animation-style'] ) && esc_attr( $milton_options['shop-animation-style'] );
$shop_animation_delay = isset( $milton_options['shop-animation-delay'] ) && esc_attr( $milton_options['shop-animation-delay'] );
$shop_animation_duration = isset( $milton_options['shop-animation-duration'] ) && esc_attr( $milton_options['shop-animation-duration'] );
$shop_animation_offset = isset( $milton_options['shop-animation-offset'] ) && esc_attr( $milton_options['shop-animation-offset'] );

$shop_layout = ( !empty($product_layout) ) ? $product_layout : $shop_layout; 

switch($shop_layout){
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
}


global $delay, $i;
$product_layout = null;
$shop_style = $shop_attr = '';

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

<li <?php wc_product_cat_class( $classes, $category ); ?> style="<?php echo esc_attr( $shop_style ); ?>" <?php echo wp_kses_post( $shop_attr ); ?>>
	<?php
	/**
	 * woocommerce_before_subcategory hook.
	 *
	 * @hooked woocommerce_template_loop_category_link_open - 10
	 */
	do_action( 'woocommerce_before_subcategory', $category );

	/**
	 * woocommerce_before_subcategory_title hook.
	 *
	 * @hooked woocommerce_subcategory_thumbnail - 10
	 */
	do_action( 'woocommerce_before_subcategory_title', $category );

	/**
	 * woocommerce_shop_loop_subcategory_title hook.
	 *
	 * @hooked woocommerce_template_loop_category_title - 10
	 */
	do_action( 'woocommerce_shop_loop_subcategory_title', $category );

	/**
	 * woocommerce_after_subcategory_title hook.
	 */
	do_action( 'woocommerce_after_subcategory_title', $category );

	/**
	 * woocommerce_after_subcategory hook.
	 *
	 * @hooked woocommerce_template_loop_category_link_close - 10
	 */
	do_action( 'woocommerce_after_subcategory', $category ); ?>
</li>
