<?php
/**
 * Single Product Share
 *
 * Sharing plugins can hook into here or you can add your own code directly.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/share.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

global $milton_options;

if( isset( $milton_options['shop-sharing-panel'] ) && $milton_options['shop-sharing-panel'] == '1' ){
	function woocommerce_shop_sharing_panel(){ 
		global $milton_options; ?>
        <div class=" shop-sharing-buttons">
            <ul class="list-inline">
                <?php  if($milton_options['shop-sharing-icons'][1] == '1'){ ?>
                    <li><a href="http://www.facebook.com/sharer.php?u=<?php esc_url( the_permalink() );?>/&amp;t=<?php echo esc_html( str_replace( ' ', '%20', the_title('', '', false) ) ); ?>"><i class="fa fa-facebook"></i></a></li>
                <?php  }?>
                <?php  if($milton_options['shop-sharing-icons'][2] == '1'){ ?>
                    <li><a href="https://twitter.com/intent/tweet?text=<?php echo esc_html( str_replace( ' ', '%20', the_title('', '', false) ) ); ?>-<?php esc_url( the_permalink() ); ?>"><i class="fa fa-twitter"></i></a></li>
                <?php  }?>
                <?php  if($milton_options['shop-sharing-icons'][3] == '1'){ ?>             
                    <li><a href="https://plus.google.com/share?url=<?php esc_url( the_permalink() );?>"><i class="fa fa-google-plus"></i></a></li>
                <?php  }?>
                <?php  if($milton_options['shop-sharing-icons'][4] == '1'){ ?>             
                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php esc_url( the_permalink() );?>&title=<?php echo esc_html( str_replace( ' ', '%20', the_title('', '', false) ) ); ?>"><i class="fa fa-linkedin"></i></a></li>
                <?php  }?>
            </ul>
        </div>
	<?php }
	add_action( 'woocommerce_share', 'woocommerce_shop_sharing_panel' );
}
?>
<?php do_action( 'woocommerce_share' ); // Sharing plugins can hook into here 

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */