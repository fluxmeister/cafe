<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
global $post, $dfd_ronneby;
# For stylechanger - "Show header top panel" option
/*
$show_header_top_panel = !!(strcmp($dfd_ronneby['header_top_panel'], 'on') === 0);
 * Was added for stylechanger, deprecated
 * 
if (isset($_POST['show_header_top_panel'])) {
	$show_header_top_panel = !!intval($_POST['show_header_top_panel']);
}
*/

$show_header_top_panel = isset($dfd_ronneby['header_first_top_panel']) && strcmp($dfd_ronneby['header_first_top_panel'], 'on') === 0;

$header_logo_position = '';
if (!empty($post) && is_object($post)) {
	$page_id = $post->ID;

	$logo_position = get_post_meta($page_id, 'dfd_headers_logo_position', true);
	$header_logo_position = !empty($logo_position) ? $logo_position : 'left';
}
/*
 * Was added for stylechanger, deprecated
 * 
if (isset($_POST['header_logo_position'])) {
	$header_logo_position = $_POST['header_logo_position'];
}
*/
if(empty($header_logo_position)) {
	$header_logo_position = 'left';
}

if(isset($dfd_ronneby['header_first_soc_icons_hover_style']) && !empty($dfd_ronneby['header_first_soc_icons_hover_style'])) {
	$header_soc_icons_hover_style = 'dfd-soc-icons-hover-style-'.$dfd_ronneby['header_first_soc_icons_hover_style'];
} else {
	$header_soc_icons_hover_style = 'dfd-soc-icons-hover-style-1';
}
$header_container_class = 'dfd-enable-mega-menu';
if(!isset($dfd_ronneby['header_first_sticky']) || strcmp($dfd_ronneby['header_first_sticky'], 'off') !== 0) {
	$header_container_class .= ' dfd-enable-headroom';
}
$header_container_class .= ($show_header_top_panel) ? ' with-top-panel' : ' without-top-panel';
//$header_container_class .= (isset($dfd_ronneby['enable_sticky_header']) && strcmp($dfd_ronneby['enable_sticky_header'], 'off') === 0) ? ' sticky-header-disabled' : ' sticky-header-enabled';
if(class_exists('Dfd_Ronneby_Core_Plugin')) {
	$header_container_class .= (isset($dfd_ronneby['head_first_enable_buttons']) && strcmp($dfd_ronneby['head_first_enable_buttons'], '1') === 0) ? '' : ' dfd-header-buttons-disabled';
}

?>
<?php get_template_part('templates/header/block', 'search'); ?>
<div id="header-container" class="<?php echo Dfd_Theme_Helpers::getHeaderStyle(); ?> <?php echo esc_attr($header_container_class); ?>">
	<section id="header">
		<?php if ($show_header_top_panel) : ?>
			<div class="header-top-panel">
				<div class="row">
					<div class="columns twelve header-info-panel">
						<?php get_template_part('templates/header/block', 'topinfo'); ?>
						
						<?php if(isset($dfd_ronneby['header_first_login']) && $dfd_ronneby['header_first_login']) { ?>
							<?php get_template_part('templates/header/block', 'login'); ?>
						<?php } ?>
						
						<?php if(isset($dfd_ronneby['head_first_show_header_soc_icons']) && $dfd_ronneby['head_first_show_header_soc_icons']) { ?>
							<div class="widget soc-icons <?php echo esc_attr($header_soc_icons_hover_style) ?>">
								<?php echo Dfd_Theme_Helpers::socialNetworks(true); ?>
							</div>
						<?php } ?>
						<?php if(isset($dfd_ronneby['head_first_enable_top_panel_wishlist_link']) && $dfd_ronneby['head_first_enable_top_panel_wishlist_link']) {
							if(method_exists('Dfd_Ronneby_Wishlist_Helpers', 'wishlistButton')) {
								echo Dfd_Ronneby_Wishlist_Helpers::wishlistButton();
							}
						} ?>
						<?php get_template_part('templates/header/block', 'additional_header_menu'); ?>
					</div>
					<?php get_template_part('templates/header/block', 'toppanel'); ?>
				</div>
			</div>
		<?php endif; ?>
		<?php if (strcmp($header_logo_position, 'top-left') === 0 || strcmp($header_logo_position, 'top-center') === 0 || strcmp($header_logo_position, 'top-right') === 0) : ?>
			<div class="logo-wrap header-top-logo-panel">
				<div class="row">
					<div class="columns twelve">
						<?php get_template_part('templates/header/block', 'custom_logo'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		<div class="header-wrap">
			<div class="row decorated">
				<div class="columns twelve header-main-panel">
					<div class="header-col-left">
						<?php if (strcmp($header_logo_position, 'right') !== 0) : ?>
							<div class="mobile-logo">
								<?php if(isset($dfd_ronneby['mobile_logo_image']['url']) && $dfd_ronneby['mobile_logo_image']['url']) : ?>
									<a href="<?php echo home_url() ?>" title="<?php esc_attr_e('Home','dfd'); ?>"><img src="<?php echo esc_url($dfd_ronneby['mobile_logo_image']['url']); ?>" alt="logo"/></a>
								<?php else : ?>
									<?php get_template_part('templates/header/block', 'custom_logo'); ?>
								<?php endif; ?>
							</div>
						<?php endif; ?>
						<?php if (strcmp($header_logo_position, 'left') === 0) : ?>
							<?php get_template_part('templates/header/block', 'custom_logo'); ?>
						<?php endif; ?>
						<?php if (strcmp($header_logo_position, 'right') === 0) : ?>
							<div class="header-icons-wrapper">
								<?php get_template_part('templates/header/block', 'responsive-menu'); ?>
								<?php get_template_part('templates/header/block', 'side_area'); ?>
								<?php get_template_part('templates/header/block', 'lang_sel'); ?>
								<?php get_template_part('templates/header/search', 'button'); ?>
								<?php
								if(class_exists('WooCommerce') && method_exists('Dfd_Ronneby_Woo_Helpers', 'woocommerceTotalCart')) {
									echo Dfd_Ronneby_Woo_Helpers::woocommerceTotalCart();
								}
								?>
							</div>
						<?php endif; ?>
					</div>
					<div class="header-col-right text-center clearfix">
							<?php if (strcmp($header_logo_position, 'right') !== 0) : ?>
								<div class="header-icons-wrapper">
									<?php get_template_part('templates/header/block', 'responsive-menu'); ?>
									<?php get_template_part('templates/header/block', 'side_area'); ?>
									<?php get_template_part('templates/header/block', 'lang_sel'); ?>
									<?php get_template_part('templates/header/search', 'button'); ?>
									<?php
									if(class_exists('WooCommerce') && method_exists('Dfd_Ronneby_Woo_Helpers', 'woocommerceTotalCart')) {
										echo Dfd_Ronneby_Woo_Helpers::woocommerceTotalCart();
									}
									?>
								</div>
							<?php endif; ?>
							<?php if (strcmp($header_logo_position, 'right') === 0) : ?>
								<div class="mobile-logo">
									<?php if(isset($dfd_ronneby['mobile_logo_image']['url']) && $dfd_ronneby['mobile_logo_image']['url']) : ?>
										<a href="<?php echo home_url() ?>" title="<?php esc_attr_e('Home','dfd'); ?>"><img src="<?php echo esc_url($dfd_ronneby['mobile_logo_image']['url']); ?>" alt="logo"/></a>
									<?php else : ?>
										<?php get_template_part('templates/header/block', 'custom_logo'); ?>
									<?php endif; ?>
								</div>
								<?php get_template_part('templates/header/block', 'custom_logo'); ?>
							<?php endif; ?>
					</div>
					<div class="header-col-fluid">
						<?php if(isset($dfd_ronneby['custom_logo_fixed_header']['url']) && $dfd_ronneby['custom_logo_fixed_header']['url']) : ?>
							<a href="<?php echo home_url(); ?>" title="<?php esc_attr_e('Home', 'dfd') ?>" class="fixed-header-logo">
								<img src="<?php echo esc_url($dfd_ronneby['custom_logo_fixed_header']['url']); ?>" alt="logo"/>
							</a>
						<?php elseif(!class_exists('Dfd_Ronneby_Core_Plugin')) : ?>
							<a href="<?php echo home_url(); ?>" title="<?php esc_attr_e('Home', 'dfd') ?>" class="fixed-header-logo">
								<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/logo-dark.png" alt="logo"/>
							</a>
						<?php endif; ?>
						<?php get_template_part('templates/header/block', 'main_menu'); ?>
					</div>
				</div>
			</div>
		</div>
		<?php if (strcmp($header_logo_position, 'bottom-left') === 0 || strcmp($header_logo_position, 'bottom-center') === 0 || strcmp($header_logo_position, 'bottom-right') === 0) : ?>
			<div class="logo-wrap header-top-logo-panel">
				<div class="row">
					<div class="columns twelve">
						<?php get_template_part('templates/header/block', 'custom_logo'); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</section>
	<?php if (strcmp($header_logo_position, 'middle') === 0) : ?>
		<div class="logo-wrap header-top-logo-panel">
			<div class="row">
				<div class="columns twelve">
					<?php get_template_part('templates/header/block', 'custom_logo'); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>