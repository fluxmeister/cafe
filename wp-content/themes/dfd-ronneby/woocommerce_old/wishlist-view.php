<?php
/**
 * Wishlist page template
 *
 * @author Your Inspiration Themes
 * @package YITH WooCommerce Wishlist
 * @version 2.0.5
 */
?>

<form id="yith-wcwl-form" class="<?php echo (count($wishlist_items)> 0) ? '' : 'wishlist-empty'; ?>" action="<?php echo esc_url( YITH_WCWL()->get_wishlist_url( 'view' . ( $wishlist_meta['is_default'] != 1 ? '/' . $wishlist_meta['wishlist_token'] : '' ) ) ) ?>" method="post">
    <!-- TITLE -->
    <?php
    do_action( 'yith_wcwl_before_wishlist_title' );

    if( ! empty( $page_title ) ) :
    ?>
        <div class="wishlist-title <?php echo ( $wishlist_meta['is_default'] != 1 && $is_user_owner ) ? 'wishlist-title-with-form' : ''?>">
            <?php echo apply_filters( 'yith_wcwl_wishlist_title', '<h2>' . $page_title . '</h2>' ); ?>
            <?php if( $wishlist_meta['is_default'] != 1 && $is_user_owner ): ?>
                <a class="btn button show-title-form">
                    <?php echo apply_filters( 'yith_wcwl_edit_title_icon', '<i class="fa fa-pencil"></i>' )?>
                    <?php esc_html_e( 'Edit title', 'dfd' ) ?>
                </a>
            <?php endif; ?>
        </div>
        <?php if( $wishlist_meta['is_default'] != 1 && $is_user_owner ): ?>
            <div class="hidden-title-form">
                <input type="text" value="<?php echo esc_attr($page_title) ?>" name="wishlist_name"/>
                <button>
                    <?php echo apply_filters( 'yith_wcwl_save_wishlist_title_icon', '<i class="fa fa-check"></i>' )?>
                    <?php esc_html_e( 'Save', 'dfd' )?>
                </button>
                <a class="hide-title-form btn button">
                    <?php echo apply_filters( 'yith_wcwl_cancel_wishlist_title_icon', '<i class="fa fa-remove"></i>' )?>
                    <?php esc_html_e( 'Cancel', 'dfd' )?>
                </a>
            </div>
        <?php endif; ?>
    <?php
    endif;

	do_action( 'yith_wcwl_before_wishlist' ); ?>

    <!-- WISHLIST TABLE -->
    <table class="shop_table cart wishlist_table" cellspacing="0" data-pagination="<?php echo esc_attr( $pagination )?>" data-per-page="<?php echo esc_attr( $per_page )?>" data-page="<?php echo esc_attr( $current_page )?>" data-id="<?php echo esc_attr( $wishlist_meta['ID'] )?>" data-token="<?php echo ! empty( $wishlist_meta['wishlist_token'] ) ? esc_attr( $wishlist_meta['wishlist_token'] ) : '' ?>">
		<thead>
		<tr>
			<?php if( $show_cb ) : ?>
				<th class="product-checkbox">
					<input type="checkbox" value="" name="" id="bulk_add_to_cart"/>
				</th>
			<?php endif; ?>

			<?php if( $is_user_owner ): ?>
			<th class="product-remove"></th>
			<?php endif; ?>

			<th class="product-thumbnail"></th>

			<th class="product-name">
				<span class="nobr"><?php echo apply_filters( 'yith_wcwl_wishlist_view_name_heading', __( 'Product Name', 'dfd' ) ) ?></span>
			</th>

			<?php if( $show_price ) : ?>
				<th class="product-price">
					<span class="nobr">
						<?php echo apply_filters( 'yith_wcwl_wishlist_view_price_heading', __( 'Unit Price', 'dfd' ) ) ?>
					</span>
				</th>
			<?php endif ?>

			<?php if( $show_stock_status ) : ?>
				<th class="product-stock-stauts">
					<span class="nobr">
						<?php echo apply_filters( 'yith_wcwl_wishlist_view_stock_heading', __( 'Stock Status', 'dfd' ) ) ?>
					</span>
				</th>
			<?php endif ?>

			<?php if( $show_add_to_cart ) : ?>
				<th class="product-add-to-cart"></th>
			<?php endif ?>
		</tr>
		</thead>

		<tbody>
        <?php
        if( count( $wishlist_items ) > 0 ) : ?>
			<?php foreach( $wishlist_items as $item ) :
                global $product;
	            if( function_exists( 'wc_get_product' ) ) {
		            $product = wc_get_product( $item['prod_id'] );
	            }
	            else{
		            $product = get_product( $item['prod_id'] );
	            }

                if( $product !== false && $product->exists() ) :
	                $availability = $product->get_availability();
	                $stock_status = $availability['class'];
	                ?>
                    <tr id="yith-wcwl-row-<?php echo esc_attr($item['prod_id']) ?>" data-row-id="<?php echo esc_attr($item['prod_id']) ?>">
	                    <?php if( $show_cb ) : ?>
		                    <td class="product-checkbox">
			                    <input type="checkbox" value="<?php echo esc_attr( $item['prod_id'] ) ?>" name="add_to_cart[]" <?php echo ( $product->product_type != 'simple' ) ? 'disabled="disabled"' : '' ?>/>
		                    </td>
	                    <?php endif ?>
                        <?php if( $is_user_owner ): ?>
                        <td class="product-remove">
                            <div>
                                <a href="<?php echo esc_url( add_query_arg( 'remove_from_wishlist', $item['prod_id'] ) ) ?>" class="remove remove_from_wishlist" title="<?php esc_attr_e( 'Remove this product', 'dfd' ) ?>">&times;</a>
                            </div>
                        </td>
                        <?php endif; ?>

                        <td class="product-thumbnail">
                            <a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item['prod_id'] ) ) ) ?>">
                                <?php echo wp_kses_post($product->get_image()) ?>
                            </a>
                        </td>

                        <td class="product-name">
                            <a href="<?php echo esc_url( get_permalink( apply_filters( 'woocommerce_in_cart_product', $item['prod_id'] ) ) ) ?>"><?php echo apply_filters( 'woocommerce_in_cartproduct_obj_title', $product->get_title(), $product ) ?></a>
                        </td>

                        <?php if( $show_price ) : ?>
                            <td class="product-price">
                                <?php
                                if( $product->price != '0' ) {
                                    $wc_price = function_exists('wc_price') ? 'wc_price' : 'woocommerce_price';

                                    if( $price_excl_tax ) {
                                        echo apply_filters( 'woocommerce_cart_item_price_html', $wc_price( $product->get_price_excluding_tax() ), $item, '' );
                                    }
                                    else {
                                        echo apply_filters( 'woocommerce_cart_item_price_html', $wc_price( $product->get_price() ), $item, '' );
                                    }
                                }
                                else {
                                    echo apply_filters( 'yith_free_text', __( 'Free!', 'dfd' ) );
                                }
                                ?>
                            </td>
                        <?php endif ?>

                        <?php if( $show_stock_status ) : ?>
                            <td class="product-stock-status">
                                <?php
                                if( $stock_status == 'out-of-stock' ) {
                                    $stock_status = "Out";
                                    echo '<span class="wishlist-out-of-stock">' . esc_html__( 'Out of Stock', 'dfd' ) . '</span>';
                                } else {
                                    $stock_status = "In";
                                    echo '<span class="wishlist-in-stock">' . esc_html__( 'In Stock', 'dfd' ) . '</span>';
                                }
                                ?>
                            </td>
                        <?php endif ?>

                        <?php if( $show_add_to_cart ) : ?>
                            <td class="product-add-to-cart">
                                <?php if( isset( $stock_status ) && $stock_status != 'Out' ): ?>
                                    <?php
                                    if( function_exists( 'wc_get_template' ) ) {
                                        wc_get_template( 'loop/add-to-cart.php' );
                                    }
                                    else{
                                        wc_get_template( 'loop/add-to-cart.php' );
                                    }
                                    ?>
                                <?php endif ?>
                            </td>
                        <?php endif ?>
                    </tr>
                <?php
                endif;
            endforeach;
        else: ?>
            <td colspan="6" class="wishlist-empty">
				<h1><?php esc_html_e('Wish', 'dfd') ?></h1>
				<p class="wishlist-empty-text"><?php esc_html_e( 'No products in the list', 'dfd' ) ?></p>
				<?php if(class_exists('WooCommerce')) : ?>
					<p class="wishlist-empty-subtext"><?php esc_html_e('Check the shop to find great items that you will definitely like', 'dfd') ?></p>
					<p class="return-to-shop"><a class="button wc-backward" href="<?php echo apply_filters( 'woocommerce_return_to_shop_redirect', get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"><?php esc_html_e( 'Return To Shop', 'dfd' ) ?></a></p>
				<?php endif; ?>
			</td>
        <?php
        endif;

        if( ! empty( $page_links ) ) : ?>
            <tr>
                <td colspan="6"><?php echo wp_kses_post($page_links) ?></td>
            </tr>
        <?php endif ?>
        </tbody>

        <?php if( $is_user_logged_in ): ?>
            <tfoot>
            <tr>
	            <?php if( $show_cb ) : ?>
		            <td class="product-checkbox" >
			            <a href="#" class="button alt" id="custom_add_to_cart"><?php echo esc_attr( $add_to_cart_text )?></a>
		            </td>
	            <?php endif; ?>

                <?php if ( $is_user_owner && $wishlist_meta['wishlist_privacy'] != 2 && $share_enabled ) : ?>
                    <td colspan="<?php echo ( $is_user_logged_in && $is_user_owner && $show_ask_estimate_button && $count > 0 ) ? 4 : 6 ?>">
                        <?php yith_wcwl_get_template( 'share.php', $share_atts ); ?>
                    </td>
                <?php endif; ?>

                <?php
                if ( $is_user_owner && $show_ask_estimate_button && $count > 0 ): ?>
                    <td colspan="<?php echo ( $is_user_owner && $wishlist_meta['wishlist_privacy'] != 2 && $share_enabled ) ? 2 : 6 ?>">
                        <a href="<?php echo ( $additional_info ) ? '#ask_an_estimate_popup' : $ask_estimate_url ?>" class="btn button ask-an-estimate-button" <?php echo ( $additional_info ) ? 'data-rel="prettyPhoto[ask_an_estimate]"' : '' ?> >
                            <?php echo apply_filters( 'yith_wcwl_ask_an_estimate_icon', '<i class="fa fa-shopping-cart"></i>' )?>
                            <?php esc_html_e( 'Ask an estimate of costs', 'dfd' ) ?>
                        </a>
                    </td>
                <?php
                endif;
                ?>

                <?php do_action( 'yith_wcwl_after_wishlist_share' ); ?>
            </tr>
            </tfoot>
        <?php endif; ?>

    </table>

    <?php wp_nonce_field( 'yith_wcwl_edit_wishlist_action', 'yith_wcwl_edit_wishlist' ); ?>

    <?php if( $wishlist_meta['is_default'] != 1 ): ?>
        <input type="hidden" value="<?php echo wp_kses_post($wishlist_meta['wishlist_token']) ?>" name="wishlist_id" id="wishlist_id">
    <?php endif; ?>

    <?php do_action( 'yith_wcwl_after_wishlist' ); ?>
</form>

<?php if( $additional_info ): ?>
	<div id="ask_an_estimate_popup">
		<form action="<?php echo $ask_estimate_url ?>" method="post">
			<?php if( ! empty( $additional_info_label ) ):?>
				<label for="additional_notes"><?php echo esc_html( $additional_info_label ) ?></label>
			<?php endif; ?>
			<textarea id="additional_notes" name="additional_notes"></textarea>

			<button class="btn button ask-an-estimate-button ask-an-estimate-button-popup" >
				<?php echo apply_filters( 'yith_wcwl_ask_an_estimate_icon', '<i class="fa fa-shopping-cart"></i>' )?>
				<?php _e( 'Ask an estimate of costs', 'dfd' ) ?>
			</button>
		</form>
	</div>
<?php endif; ?>