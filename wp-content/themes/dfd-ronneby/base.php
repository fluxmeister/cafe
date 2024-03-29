<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }

get_header();

global $dfd_ronneby;
$body_class = $main_wrap_class = $data_atts = '';
if(DfdMetaboxSettings::get('dfd_enable_page_spacer')) {
	$body_class .=  ' dfd-custom-padding-html';
}
if(DfdMetaboxSettings::get('crum_page_custom_footer_parallax')) {
	$main_wrap_class .= ' dfd-parallax-footer';
}
$header_data_width = 1101;
if(isset($dfd_ronneby['header_responsive_breakpoint']) && $dfd_ronneby['header_responsive_breakpoint'] != '') {
	$header_data_width = $dfd_ronneby['header_responsive_breakpoint'];
}
$data_atts .=  ' data-header-responsive-width="'.esc_attr($header_data_width).'"';

if(isset($dfd_ronneby['enable_images_lazy_load']) && $dfd_ronneby['enable_images_lazy_load'] == 'on' && isset($dfd_ronneby['lazy_load_offset']) && $dfd_ronneby['lazy_load_offset'] != '') {
	$data_atts .= ' data-lazy-load-offset="'.$dfd_ronneby['lazy_load_offset'].'%"';
}
$data_atts .= ' data-share-pretty="'.esc_attr__('Share', 'dfd').'" data-next-pretty="'.esc_attr__('next', 'dfd').'" data-prev-pretty="'.esc_attr__('prev', 'dfd').'"';
?>

<body <?php body_class($body_class); ?> data-directory="<?php echo get_template_directory_uri() ?>" <?php echo wp_kses_data($data_atts) ?>>
	<?php
	if (isset($dfd_ronneby['site_preloader_enabled']) && strcmp($dfd_ronneby['site_preloader_enabled'],'1')===0) {
		require_once get_template_directory().'/templates/preloader.php';
	}
	?>
	<?php if(!empty($body_class) && $body_class != '') : ?>
		<span class="dfd-frame-line line-top"></span>
		<span class="dfd-frame-line line-bottom"></span>
		<span class="dfd-frame-line line-left"></span>
		<span class="dfd-frame-line line-right"></span>
	<?php endif; ?>
	<?php
	get_template_part('templates/side-area');

	if(isset($dfd_ronneby['site_boxed']) && $dfd_ronneby['site_boxed']) { ?>
		<div class="boxed_layout">
	<?php } ?>
	<?php get_template_part('templates/section', 'header'); ?>
	<div id="main-wrap" class="<?php echo esc_attr($main_wrap_class); ?>">
		<div id="change_wrap_div">
			<?php include dfd_template_path(); ?>
		</div>
		<div class="body-back-to-top align-right"><i class="dfd-added-font-icon-right-open"></i></div>
		<?php /*get_template_part('templates/section', 'twitter-panel');*/ ?>
<?php get_footer();