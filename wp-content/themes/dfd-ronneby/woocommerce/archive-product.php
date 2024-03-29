<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

global $dfd_ronneby;

$options = array(
	'woo_category_stun_header' => false,
	'woo_category_layout' => false,
	'woo_category_sidebars' => '1col-fixed',
	'woo_category_cat_tag' => false,
);

foreach($options as $option => $default) {
	if(isset($dfd_ronneby[$option]) && !empty($dfd_ronneby[$option])) {
		$options[$option] = $dfd_ronneby[$option];
	}
}

if($options['woo_category_stun_header'] != 'off') {
	get_template_part('templates/header/top', 'woocommerce');
}

if($options['woo_category_cat_tag'] != 'off') {
	?>
	<div class="blog-top row <?php echo esc_attr($options['woo_category_layout']) ?>">
		<div class="twelve columns">
			<?php get_template_part('templates/woo', 'top'); ?>
		</div>
	</div>
<?php } ?>

<section id="layout" class="dfd-woo-category-loop dfd-equal-height-children">

	<div class="row module dfd-woo-archive <?php echo esc_attr($options['woo_category_layout']) ?>">
		<?php
		if(!empty($options['woo_category_sidebars']) && $options['woo_category_sidebars']) {
			switch($options['woo_category_sidebars']) {
				case '3c-l-fixed':
					$dfd_layout = 'sidebar-left2';
					$dfd_width = 'six dfd-eq-height';
					break;
				case '3c-r-fixed':
					$dfd_layout = 'sidebar-right2';
					$dfd_width = 'six dfd-eq-height';
					break;
				case '2c-l-fixed':
					$dfd_layout = 'sidebar-left';
					$dfd_width = 'nine dfd-eq-height';
					break;
				case '2c-r-fixed':
					$dfd_layout = 'sidebar-right';
					$dfd_width = 'nine dfd-eq-height';
					break;
				case '3c-fixed':
					$dfd_layout = 'sidebar-both';
					$dfd_width = 'six dfd-eq-height';
					break;
				case '1col-fixed':
				default:
					$dfd_layout = '';
					$dfd_width = 'twelve';
			}
			?>
			<div class="blog-section <?php echo esc_attr($dfd_layout) ?>">
				<section id="main-content" role="main" class="<?php echo esc_attr($dfd_width) ?> columns">
		<?php
		} else {
			set_layout('archive', true);
		}
		?>
			<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>

				<h2 class="widget-title  text-left woo-page-title">
					<span><?php woocommerce_page_title(); ?></span>
				</h2>

			<?php endif; ?>
			
			<div class="clear"></div>
			
            <?php
			 /**
			 * Hook: woocommerce_archive_description.
			 *
			 * @hooked woocommerce_taxonomy_archive_description - 10
			 * @hooked woocommerce_product_archive_description - 10
			 */
			do_action('woocommerce_archive_description');
			?>
			
			<div class="clear"></div>
			
			
            <?php if (have_posts()) : ?>
			
				<div class="dfd-woo-category-wrap">

					<div class="dfd-woo-category">

						<?php
						/**
						 * woocommerce_before_shop_loop hook
						 *
						 * @hooked woocommerce_result_count - 20
						 * @hooked woocommerce_catalog_ordering - 30
						 */

						remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

						do_action('woocommerce_before_shop_loop');

						?>

						<?php woocommerce_product_loop_start(); ?>

						<?php
							global $woocommerce_loop;
							if(isset($dfd_ronneby['woo_category_columns']) && !empty($dfd_ronneby['woo_category_columns']))
								$woocommerce_loop['columns'] =  apply_filters( 'loop_shop_columns', (int) $dfd_ronneby['woo_category_columns']);
							else
								$woocommerce_loop['columns'] = 3;
						?>
						<?php while (have_posts()) : the_post(); ?>
						
							<?php
							/**
							 * Hook: woocommerce_shop_loop.
							 *
							 * @hooked WC_Structured_Data::generate_product_data() - 10
							 */
							do_action( 'woocommerce_shop_loop' );
							?>
						
							<?php wc_get_template_part('content', 'product'); ?>

							<?php endwhile; // end of the loop. ?>

						<?php woocommerce_product_loop_end(); ?>

						<?php
						/**
						 * woocommerce_after_shop_loop hook
						 *
						 * @hooked woocommerce_pagination - 10
						 */
						do_action('woocommerce_after_shop_loop');
						?>
					</div>

				</div>

            <?php else : ?>

				<?php do_action( 'woocommerce_no_products_found' ); ?>

            <?php endif; ?>

	
		<?php
			if(!empty($options['woo_category_sidebars']) && $options['woo_category_sidebars']) { ?>
				</section>
				<?php
				if (($options['woo_category_sidebars'] == "2c-l-fixed") || ($options['woo_category_sidebars'] == "3c-fixed")) {
					?>
					<aside class="three columns dfd-eq-height" id="left-sidebar">
						<?php dynamic_sidebar('shop-sidebar-product-list-left'); ?>
					</aside>
					<?php
					echo ' </div>';
				}
				if (($options['woo_category_sidebars'] == "3c-l-fixed")){
					?>
					<aside class="three columns dfd-eq-height" id="right-sidebar">
						<?php dynamic_sidebar('shop-sidebar-product-list'); ?>
					</aside>
					<?php
					echo ' </div>';
					?>
					<aside class="three columns dfd-eq-height" id="left-sidebar">
						<?php dynamic_sidebar('shop-sidebar-product-list-left'); ?>
					</aside>
					<?php
				}
				if ($options['woo_category_sidebars'] == "3c-r-fixed"){
					?>
					<aside class="three columns dfd-eq-height" id="left-sidebar">
						<?php dynamic_sidebar('shop-sidebar-product-list-left'); ?>
					</aside>
					<?php
					echo ' </div>';
				}
				if (($options['woo_category_sidebars'] == "2c-r-fixed") || ($options['woo_category_sidebars'] == "3c-fixed") || ($options['woo_category_sidebars'] == "3c-r-fixed") ) {
					?>
					<aside class="three columns dfd-eq-height" id="right-sidebar">
						<?php dynamic_sidebar('shop-sidebar-product-list'); ?>
					</aside>
					<?php
				}
			} else {
				set_layout('archive', false);
			}
			?>

		</div>
    </div>
</section>

<?php get_footer();