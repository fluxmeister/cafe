<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
global $dfd_ronneby;
if(isset($dfd_ronneby['footer_soc_icons_hover_style']) && !empty($dfd_ronneby['footer_soc_icons_hover_style'])) {
	$footer_soc_icons_hover_style = 'dfd-soc-icons-hover-style-'.$dfd_ronneby['footer_soc_icons_hover_style'];
} else {
	$footer_soc_icons_hover_style = 'dfd-soc-icons-hover-style-1';
}
if(!class_exists('Dfd_Ronneby_Core_Plugin')) { ?>
	<div class="row">
		<div class="twelve columns text-center">
			<div class="footer-logo">
				<a href="<?php echo esc_url(get_home_url()) ?>" alt="<?php esc_html_e('Footer logo', 'dfd') ?>"><img src="<?php echo esc_url(get_template_directory_uri()) .'/assets/img/logo.png'; ?>" alt="logo" class="foot-logo" /></a>
			</div>
			<div class="dfd-footer-copyright">
				<?php echo esc_html_e('© DynamicFrameworks- Elite ThemeForest Author.', 'dfd'); ?>
			</div>
		</div>
	</div>
<?php } else { ?>
	<div class="row">
		<div class="twelve columns text-center">
			<?php if(isset($dfd_ronneby['logo_footer']['url']) && $dfd_ronneby['logo_footer']['url'] && isset($dfd_ronneby['enable_footer_logo']) && strcmp($dfd_ronneby['enable_footer_logo'], '1') === 0) : ?>
				<div class="footer-logo">
					<a href="<?php echo esc_url(get_home_url()) ?>" alt="<?php esc_html_e('Footer logo', 'dfd') ?>"><img src="<?php echo esc_url($dfd_ronneby['logo_footer']['url']); ?>" alt="logo" class="foot-logo" /></a>
				</div>
			<?php endif; ?>
			<?php if(isset($dfd_ronneby['enable_footer_soc_icons']) && strcmp($dfd_ronneby['enable_footer_soc_icons'], '1') === 0) : ?>
				<div class="widget soc-icons <?php echo esc_attr($footer_soc_icons_hover_style) ?>">
					<?php Dfd_Theme_Helpers::socialNetworks(true); ?>
				</div>
			<?php endif; ?>
			<?php if(isset($dfd_ronneby['enable_footer_menu']) && strcmp($dfd_ronneby['enable_footer_menu'], '1') === 0) : ?>
				<div class="dfd-footer-menu">
					<?php wp_nav_menu(array('theme_location' => 'footer_menu', 'depth'=>1, 'container' => 'nav', 'fallback_cb' => 'false', 'menu_class' => 'footer-menu', 'walker' => new Dfd_Clean_Walker())); ?>
				</div>
			<?php endif; ?>
			<?php if(isset($dfd_ronneby['footer_copyright_position']) && strcmp($dfd_ronneby['footer_copyright_position'], 'footer') === 0 && isset($dfd_ronneby['copyright_footer'])) : ?>
				<div class="dfd-footer-copyright">
					<?php echo wp_kses_post($dfd_ronneby['copyright_footer']); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php }