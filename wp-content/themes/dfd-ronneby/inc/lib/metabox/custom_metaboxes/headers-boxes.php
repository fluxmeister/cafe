<?php
/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
 */
if ( ! defined( 'ABSPATH' ) ) { exit; }

add_filter( 'cmb_meta_boxes', 'stunnig_headers_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */

function stunnig_headers_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'stunnig_headers_';
	
	$meta_boxes[] = array(
		'id'         => 'dfd-header_img_metabox',
		'title'      => esc_attr__('Stunning header options', 'dfd'),
		'pages'      => array('page','post','my-product','product','gallery'),
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'type' => 'title',
				'id' => 'stun_header_element_heading',
				'name' => esc_html__('Stunning header settings','dfd'),
			),
			array(
                'type' => 'file',
	            'id'   => $prefix . 'bg_img',
	            'name' => esc_html__('Background image','dfd'),
				'tooltip_text' => esc_html__('Select image pattern for stunning header background', 'dfd'),
				'std'  => '',
                'save_id' => false, // save ID using true
	        ),
			array(
				'type' => 'select',
				'id' => $prefix . 'bg_img_position',
				'name' => esc_html__('Background image position','dfd'),
				'tooltip_text' => esc_html__('The background position sets the starting position of a background image', 'dfd'),
				'std'  => '',
				'options' => Dfd_Theme_Helpers::get_bgposition_redux(),
			),
			array(
				'type' => 'select',
				'id' => 'stun_header_bg_size',
				'name' => esc_html__('Background size', 'dfd'),
				'tooltip_text' => esc_html__('Adjust the background image displaying', 'dfd'),
				'std'  => '',
				'options' => Dfd_Theme_Helpers::get_bgsize('metaboxes'),
			),
			array(
                'type' => 'colorpicker',
                'id'   => $prefix . 'bg_color',
                'name' => esc_html__('Background color', 'dfd'),
                'tooltip_text' => esc_html__('The background color will be shown if the image is not set for the stunning header', 'dfd'),
                'std'  => '',
                'save_id' => false, // save ID using true
            ),
            array(
                'type'	=> 'text',
                'id'	=> $prefix . 'subtitle',
                'name'	=> esc_html__('Page subtitle', 'dfd'),
                'tooltip_text'	=> esc_html__('Enter page subtitle text to be displayed in stunning header', 'dfd'),
            ),
			array(
				'type' => 'radio_inline_triple',
				'id' => 'stan_header_breadcrumbs',
				'name' => esc_attr__('Breadcrumbs','dfd'),
				'tooltip_text'	=> esc_html__('Allows you to show or hide the navigation links in stunning header. If you choose theme default the displaying will correspond to the theme options settings', 'dfd'),
				'std'  => '',
				'options' => array(
					array( 'name' => esc_attr__('Theme default', 'dfd'), 'value' => '', ),
					array( 'name' => esc_attr__('Enable', 'dfd'), 'value' => '1', ),
					array( 'name' => esc_attr__('Disable', 'dfd'), 'value' => 'off', ),
				),
			),
			array(
				'type' => 'select',
				'id' => 'stan_header_breadcrumbs_style',
				'name' => esc_attr__('Breadcrumbs style','dfd'),
				'tooltip_text'	=> esc_html__('Choose the style of the breadcrumbs. If you choose theme default the style will correspond to the theme options settings', 'dfd'),
				'std'  => '',
				'options' => array(
					array( 'name' => esc_attr__('Inherit from theme options', 'dfd'), 'value' => '', ),
					array( 'name' => esc_attr__('Theme default', 'dfd'), 'value' => 'simple', ),
					array( 'name' => esc_attr__('Transparent background', 'dfd'), 'value' => 'transparent-bg', ),
				),
				'dep_option'    => 'stan_header_breadcrumbs',
				'dep_values'    => '1',
			),
            array(
                'type'	=> 'text',
                'id'	=> $prefix . 'custom_height',
                'name'	=> esc_attr__('Stunning header height in px', 'dfd'),
                'tooltip_text'	=> esc_html__('Allows you to set the stunning header height', 'dfd'),
            ),
			array(
				'type' => 'select',
				'id' => $prefix . 'text_alignment',
				'name' => esc_html__('Text alignment', 'dfd'),
				'tooltip_text'	=> esc_html__('Choose the text position in stunning header. If you choose theme default the displaying will correspond to the theme options settings', 'dfd'),
				'std'  => '',
				'options' => array(
					array( 'name' => esc_attr__('Theme default', 'dfd'), 'value' => '', ),
					array( 'name' => esc_attr__('Center', 'dfd'), 'value' => 'text-center', ),
					array( 'name' => esc_attr__('Left', 'dfd'), 'value' => 'text-left', ),
					array( 'name' => esc_attr__('Right', 'dfd'), 'value' => 'text-right', ),
				),
			),
			array(
				'type'	=> 'radio_inline_double',
				'id'	=> $prefix . 'stan_header_fixed',
				'name'	=> esc_attr__('Fixed background position', 'dfd'),
				'tooltip_text'	=> esc_html__('This option allows you to enable or disable the fixed image position for the stunning header background', 'dfd'),
				'options' => array(
					array( 'name' => esc_attr__('On', 'dfd'), 'value' => '1', ),
					array( 'name' => esc_attr__('Off', 'dfd'), 'value' => 'off', ),
				),
			),
			array(
				'type'	=> 'radio_inline_triple',
				'id'	=> $prefix . 'stan_header_bgcheck',
				'name'	=> esc_attr__('Background color scheme style', 'dfd'),
				'tooltip_text'	=> esc_html__('According to the color scheme you choose the text colors will be changed to make it more readable', 'dfd'),
				'options' => array(
					array( 'name' => esc_attr__('Light', 'dfd'), 'value' => 'off', ),
					array( 'name' => esc_attr__('Dark', 'dfd'), 'value' => '1', ),
				),
			),
			array(
				'type' => 'radio_inline_double',
				'id' => 'dfd_stun_video_enable',
				'name' => esc_attr__('Stunning header video','dfd'),
				'tooltip_text'	=> esc_html__('Allows you to set video background for the stunning header.', 'dfd'),
				'std'  => '',
				'options' => array(
					array( 'name' => esc_attr__('Enable', 'dfd'), 'value' => 'enable', ),
					array( 'name' => esc_attr__('Disable', 'dfd'), 'value' => '', ),
				),
			),
			array(
				'type' => 'select',
				'id' => 'dfd_stun_video_style',
				'name' => esc_attr__('Stunning header video source','dfd'),
				'std'  => '',
				'options' => array(
					array( 'name' => esc_attr__('None', 'dfd'), 'value' => '', ),
					array( 'name' => esc_attr__('Self-hosted video', 'dfd'), 'value' => 'self-hosted', ),
					array( 'name' => esc_attr__('oEmbed Youtube video', 'dfd'), 'value' => 'youtube', ),
					array( 'name' => esc_attr__('oEmbed Vimeo video', 'dfd'), 'value' => 'vimeo', ),
				),
				'dep_option'    => 'dfd_stun_video_enable',
				'dep_values'    => 'enable',
			),
			array(
				'type' => 'select',
				'id' => 'dfd_stun_video_type',
				'name' => esc_attr__('Stunning header background video style','dfd'),
				'std'  => '',
				'options' => array(
					array( 'name' => esc_attr__('Background', 'dfd'), 'value' => 'bacground-video', ),
					array( 'name' => esc_attr__('Full screen video', 'dfd'), 'value' => 'full-screen-video', ),
				),
				'dep_option'    => 'dfd_stun_video_style',
				'dep_values'    => 'youtube,vimeo',
			),
			array(
                'type'	=> 'text',
                'id'	=> 'dfd_stun_bg_youtube_id',
                'name'	=> esc_attr__('Youtube video ID', 'dfd'),
                'tooltip_text'	=> esc_html__('Look at the URL of that page, and at the end of it, you should see a combination of numbers and letters after an equal sign (=).', 'dfd'),
				'dep_option'    => 'dfd_stun_video_style',
				'dep_values'    => 'youtube',
            ),
			array(
                'type'	=> 'text',
                'id'	=> 'dfd_stun_bg_vimeo_id',
                'name'	=> esc_attr__('Vimeo video ID', 'dfd'),
                'tooltip_text'	=> esc_html__('Copy the numeric code that appears at the end of its URL at the top of your browser window', 'dfd'),
				'dep_option'    => 'dfd_stun_video_style',
				'dep_values'    => 'vimeo',
            ),
            array(
                'type'	=> 'file',
                'id'	=> 'dfd_stun_header_self_hosted_mp4',
                'name' =>  esc_attr__('Self hosted video in mp4 format', 'dfd'),
				'dep_option'    => 'dfd_stun_video_style',
				'dep_values'    => 'self-hosted',
            ),
            array(
                'type'	=> 'file',
                'id'	=> 'dfd_stun_header_self_hosted_webm',
                'name' =>  esc_attr__('Self hosted video file in webM format', 'dfd'),
				'dep_option'    => 'dfd_stun_video_style',
				'dep_values'    => 'self-hosted',
            ),
			array(
				'type'	=> 'radio_inline_triple',
				'id'	=> 'dfd_stun_header_video_loop',
				'name'	=> esc_attr__('Loop video', 'dfd'),
				'std' => '1',
				'options' => array(
					array( 'name' => esc_attr__('Disable', 'dfd'), 'value' => 'off', ),
					array( 'name' => esc_attr__('Enable', 'dfd'), 'value' => '1', ),
				),
				'dep_option'    => 'dfd_stun_video_enable',
				'dep_values'    => 'enable',
			),
			array(
				'type'	=> 'radio_inline_triple',
				'id'	=> 'dfd_stun_header_video_mute',
				'name'	=> esc_attr__('Mute video', 'dfd'),
				'std' => '1',
				'options' => array(
					array( 'name' => esc_attr__('Disable', 'dfd'), 'value' => 'off', ),
					array( 'name' => esc_attr__('Enable', 'dfd'), 'value' => '1', ),
				),
				'dep_option'    => 'dfd_stun_video_enable',
				'dep_values'    => 'enable',
			),
		),
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}
