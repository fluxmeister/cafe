<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB2 directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_CMB2
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/*
 * Post format
 */
add_action( 'cmb2_init', 'agni_post_format_meta' );
function agni_post_format_meta() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'post_format_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$quote_post_option = new_cmb2_box( array(
		'id'            => $prefix . 'quote_post_options',
		'title'         => esc_html__( 'Quote Post Options', 'milton' ),
		'object_types'  => array( 'post' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	$quote_post_option->add_field( array(
			'name' => esc_html__('Quote Text', 'milton' ),
			'id' => $prefix.'quote_text',
			'type' => 'textarea_small'
	) );
	$quote_post_option->add_field( array(
			'name' => esc_html__('Quote author', 'milton' ),
			'id' => $prefix.'quote_cite',
			'type' => 'text_small'
	) );
	
	$link_post_option = new_cmb2_box( array(
		'id'            => $prefix . 'link_post_options',
		'title'         => esc_html__( 'Link Post Options', 'milton' ),
		'object_types'  => array( 'post' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
	) );

	$link_post_option->add_field( array( 
		'name'	=> esc_html__('Link', 'milton' ), 
		'desc'	=> esc_html__('Type URL to display into the post', 'milton' ), 
		'id'	=> $prefix.'link_url', 
		'type'	=> 'text_url',
	) );
	
	$audio_post_option = new_cmb2_box( array(
		'id'            => $prefix . 'audio_post_options',
		'title'         => esc_html__( 'Audio Post Options', 'milton' ),
		'object_types'  => array( 'post' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
	) );

	$audio_post_option->add_field( array( 
		'name'	=> esc_html__('Self Hosted Audio Link', 'milton' ), 
		'id'	=> $prefix.'audio_url', 
		'type'	=> 'file'
	) );
	
	$video_post_option = new_cmb2_box( array(
		'id'            => $prefix . 'video_post_options',
		'title'         => esc_html__( 'Video Post Options', 'milton' ),
		'object_types'  => array( 'post' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, 
	) );

	$video_post_option->add_field( array( 
		'name'	=> esc_html__('Self Hosted Video Link', 'milton' ), 
		'desc'	=> esc_html__('Fill one of any video source info!!..', 'milton' ), 
		'id'	=> $prefix.'video_url', 
		'type'	=> 'file'
	) );
	$video_post_option->add_field( array( 
		'name'	=> esc_html__('Video Poster', 'milton' ), 
		'desc'	=> esc_html__('Only applicable for self hosted video', 'milton' ), 
		'id'	=> $prefix.'video_poster', 
		'type'	=> 'file'
	) );
	$video_post_option->add_field( array( 
		'name'	=> esc_html__('Embed Link', 'milton' ), 
		'desc'	=> esc_html__('enter the youtube, vimeo or any video embed link ', 'milton' ), 
		'id'	=> $prefix.'video_embed_url', 
		'type'	=> 'textarea_small',
		'sanitization_cb' => false
	) );
	
	$gallery_post_option = new_cmb2_box( array(
		'id'            => $prefix . 'gallery_post_options',
		'title'         => esc_html__( 'Gallery Post Options', 'milton' ),
		'object_types'  => array( 'post' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true,
		 
	) );

	$gallery_post_option->add_field( array( 
		'name'	=> esc_html__('Choose Images ', 'milton' ), 
		'id'	=> $prefix . 'gallery_image', 
		'type'	=> 'file_list'			
	) );
}

/*
 * Page Options
 */
add_action( 'cmb2_init', 'agni_page_meta' );

function agni_page_meta() {
	
	// Start with an underscore to hide fields from custom fields list
	$prefix = 'page_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$page_option = new_cmb2_box( array(
		'id'            => $prefix . 'page_options',
		'title'         => esc_html__( 'Page Options', 'milton' ),
		'object_types'  => array( 'page', 'portfolio', 'post', 'product' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

    $page_option->add_field( array(
		'name' => esc_html__( 'Page Layout', 'milton' ),
		'desc' => esc_html__('Inherit will use from the global(Milton -> Page options) settings.  ', 'milton' ),
		'id' => $prefix . 'layout',
		'type'	=> 'select',
		'options' => array( 
			'' 					=> esc_html__('Inherit', 'milton' ), 
            'container'			=> esc_html__('Container', 'milton'),
            'container-fluid'	=> esc_html__('Fullwidth', 'milton'),
		),
        'default'	=> '',
		'before_row' => '<h3>Layout Options</h3>'
	) );

	$page_option->add_field( array(
        'name'             => esc_html__( 'Sidebar', 'milton' ),
		'desc' 			   => esc_html__('This will not applicable for portfolio pages. Sidebar is diabled for portfolio.', 'milton' ),
        'id'               => $prefix . 'sidebar',
        'type'             => 'radio_inline',
        'options'          => array(
            ''		=> esc_html__('Inherit', 'milton'),
            'no-sidebar'		=> esc_html__('No Sidebar', 'milton'),
            'has-sidebar'	=> esc_html__('Right Sidebar', 'milton'),
            'has-sidebar left'		=> esc_html__('Left Sidebar', 'milton'),
        ),
        'default'			=> ''
    ) );

	$page_option->add_field( array(
		'name' => esc_html__('Agni Slider List', 'milton' ),
		'desc' => esc_html__('Here, you can choose the slider which is created under Agni Slider Menu(left side).', 'milton' ),
		'id' => $prefix.'agni_sliders',
		'type' => 'select',
		'options' => agni_posttype_options( array( 'post_type' => 'agni_slides'), true ),
		'before_row' => '<h3>Content Options</h3>'
	) );

	$page_option->add_field( array(
		'name'	=> esc_html__('Background Color', 'milton' ), 
		'id'	=> $prefix.'bg_color', 
		'type'	=> 'colorpicker',
		'default' => '',
	) );
	$page_option->add_field( array(
		'name' => esc_html__( 'Dark Mode', 'milton' ),
		'id' => $prefix . 'dark_mode',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('Inherit', 'milton' ), 
			'1' => esc_html__('Yes', 'milton' ), 
			'0' => esc_html__('No', 'milton' ), 
		),
        'default'	=> '',
	) );

	$page_option->add_field( array(
		'name' => esc_html__('Remove Title', 'milton' ),
		'desc' => esc_html__('Inherit will use from the global(option panel) settings. This option will not applicable for Shop single, portfolio template, latest post pages.', 'milton' ),
		'id' => $prefix.'remove_title',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('Inherit', 'milton' ), 
			'1' => esc_html__('Yes', 'milton' ), 
			'0' => esc_html__('No', 'milton' ), 
		),
		'default' => '',
	) );
	$page_option->add_field( array(
		'name'	=> esc_html__('Title Alignment', 'milton' ),
		'id'	=> $prefix . 'title_align',
		'type'	=> 'radio_inline',
		'options' => array( 
			''		=> esc_html__('Inherit', 'milton'),
			'left' => esc_html__('Left', 'milton' ), 
			'center' => esc_html__('Center', 'milton' ), 
			'right' => esc_html__('Right', 'milton' ), 
		),
		'default'  => ''
	) );

	$page_option->add_field( array(
		'name' => esc_html__('Menu Choice', 'milton' ),
		'id' => $prefix.'menu_choice',
		'type'	=> 'select',
		'options' => agni_registered_menus( true ),
		'default' => '',
		'before_row' => '<h3>Menu Options</h3>'
	) );
	$page_option->add_field( array(
		'name' => esc_html__('Fullwidth', 'milton' ),
		'id' => $prefix.'menu_fullwidth',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('Inherit', 'milton' ), 
			'1' => esc_html__('Yes', 'milton' ), 
			'0' => esc_html__('No', 'milton' ), 
		),
		'default' => '',
	) );

	$page_option->add_field( array(
		'name' => esc_html__('Transparent Menu', 'milton' ),
		'id' => $prefix.'transparent',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('Inherit', 'milton' ), 
			'1' => esc_html__('Yes', 'milton' ), 
			'0' => esc_html__('No', 'milton' ), 
		),
		'default' => '',
	) );

	$page_option->add_field( array(
		'name' => esc_html__('Reverse Menu Skin', 'milton' ),
		'desc' => esc_html__('It will reverse(interchange) your current header menu bar skin.', 'milton' ),
		'id' => $prefix.'skin_reverse',
		'type'	=> 'checkbox',
		'default' => '',
	) );

	$page_option->add_field( array(
		'name' => esc_html__('Footer Bar', 'milton' ),
		'id' => $prefix.'footer_bar',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('Inherit', 'milton' ), 
			'1' => esc_html__('Enable', 'milton' ), 
			'0' => esc_html__('Disable', 'milton' ), 
		),
		'default' => '',
		'before_row' => '<h3>Footer Options</h3>'
	) );

	$page_option->add_field( array(
		'name' => esc_html__('Footer Bar Choice', 'milton' ),
		'desc' => esc_html__('Choose footer bar. ', 'milton' ),
		'id' => $prefix.'footer_bar_choice',
		'type'	=> 'select',
		'options' => array( 
			''  => '', 
			'1' => esc_html__('Content Block', 'milton' ), 
			'0' => esc_html__('Widget Bar', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'footer_bar' ,
 			'data-conditional-value' => '1',
 		),
		'default' => '',
	) );

	$page_option->add_field( array(
		'name' => esc_html__( 'Footer Bar Fullwidth', 'milton' ),
		'id' => $prefix . 'footer_bar_fullwidth',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('Inherit', 'milton' ), 
			'1' => esc_html__('Yes', 'milton' ), 
			'0' => esc_html__('No', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'footer_bar_choice' ,
 			'data-conditional-value' => '0',
 		),
        'default'	=> '',
	) );
	$page_option->add_field( array(
		'name' => esc_html__('Content Block Choice', 'milton' ),
		'desc' => esc_html__('Choose footer bar. ', 'milton' ),
		'id' => $prefix.'footer_bar_contentblock',
		'type'	=> 'select',
		'options' => agni_posttype_options( array( 'post_type' => 'agni_block'), true ),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'footer_bar_choice' ,
 			'data-conditional-value' => '1',
 		),
	) );

	$page_option->add_field( array(
		'name' => esc_html__('Footer Info.', 'milton' ),
		'id' => $prefix.'footer_text',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('Inherit', 'milton' ), 
			'1' => esc_html__('Enable', 'milton' ), 
			'0' => esc_html__('Disable', 'milton' ), 
		),
		'default' => '',
	) );
}

/*
 * Portfolio
 */
add_action( 'cmb2_init', 'agni_portfolio_meta' );
function agni_portfolio_meta() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'portfolio_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$portfolio_option = new_cmb2_box( array(
		'id'            => $prefix . 'portfolio_options',
		'title'         => esc_html__( 'Portfolio Options', 'milton' ),
		'object_types'  => array( 'portfolio' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	// Portfolio Layout Settings
	$portfolio_option->add_field( array( 
        'name'             => esc_html__( 'Portfolio Layout', 'milton' ),
        'id'               => $prefix . 'layout',
        'type'             => 'radio_image',
        'options'          => array(
            'plain'			=> esc_html__('Plain/Simple Portfolio', 'milton'),
            'side'			=> esc_html__('Side Portfolio', 'milton'),
            'full'			=> esc_html__('Fullwidth Portfolio', 'milton'),
            'zigzag'		=> esc_html__('ZigZag Portfolio', 'milton'),
        ),
        'images_path'      => AGNI_FRAMEWORK_URL . '/template/img/',
        'images'           => array(
            'plain'			=> 'portfolio-layout-0.jpg',
            'side'			=> 'portfolio-layout-1.jpg',
            'full'			=> 'portfolio-layout-2.jpg',
            'zigzag'		=> 'portfolio-layout-3.jpg',
        ),
        'default'			=> 'plain',
        'before_row' => '<h3>Portfolio Layout Options</h3>'
    ) );

    $portfolio_option->add_field( array(
		'name' => esc_html__('Media Position', 'milton' ),
		'desc' => esc_html__('Choose the position of the media to display. Behind Content option will display the content at right side only when you trigger.', 'milton' ),
		'id' => $prefix.'media_position',
		'type'	=> 'select',
		'options' => array( 
			'top' => esc_html__('At Top', 'milton' ), 
			'bottom' => esc_html__('At Bottom', 'milton' ), 
			//'behind' => esc_html__('Behind Content', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'layout' ,
 			'data-conditional-value' => json_encode(array('full', 'zigzag')),
 		),
		'default' => 'top',
	) );

	$portfolio_option->add_field( array(
		'name' => esc_html__('Columns Count', 'milton' ),
		'desc'	=> esc_html__('No. of Columns for Media. Note: Total column count should be 12. ', 'milton' ), 
		'id' => $prefix.'media_side_column_count',
		'type'	=> 'select',
		'options' => array( 
			'2' => esc_html__('2 Columns', 'milton' ), 
			'3' => esc_html__('3 Columns', 'milton' ), 
			'4' => esc_html__('4 Columns', 'milton' ), 
			'5' => esc_html__('5 Columns', 'milton' ),
			'6' => esc_html__('6 Columns', 'milton' ), 
			'7' => esc_html__('7 Columns', 'milton' ), 
			'8' => esc_html__('8 Columns', 'milton' ), 
			'9' => esc_html__('9 Columns', 'milton' ), 
			'10' => esc_html__('10 Columns', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'layout' ,
 			'data-conditional-value' => 'side',
 		),
		'default' => '6',
		'row_classes' => 'agni-slide-col agni-slide-animate-in',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-animate-container">'
	) );
	$portfolio_option->add_field( array(
		'name' => esc_html__('Media Columns Count', 'milton' ),
		'desc'	=> esc_html__('No. of Columns for Content.', 'milton' ), 
		'id' => $prefix.'content_side_column_count',
		'type'	=> 'select',
		'options' => array( 
			'2' => esc_html__('2 Columns', 'milton' ), 
			'3' => esc_html__('3 Columns', 'milton' ), 
			'4' => esc_html__('4 Columns', 'milton' ), 
			'5' => esc_html__('5 Columns', 'milton' ),
			'6' => esc_html__('6 Columns', 'milton' ), 
			'7' => esc_html__('7 Columns', 'milton' ), 
			'8' => esc_html__('8 Columns', 'milton' ), 
			'9' => esc_html__('9 Columns', 'milton' ), 
			'10' => esc_html__('10 Columns', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'layout' ,
 			'data-conditional-value' => 'side',
 		),
 		'show_names' => false,
		'default' => '6',
		'row_classes' => 'agni-slide-col agni-slide-animate-in',
		'after_row' => '</div>'
	) );
	$portfolio_option->add_field( array(
		'name' => esc_html__('Alignment', 'milton' ),
		'desc'	=> esc_html__('.', 'milton' ), 
		'id' => $prefix.'side_alignment',
		'type'	=> 'radio_inline',
		'options' => array( 
			'mc' => esc_html__('Media + Content', 'milton' ), 
			'cm' => esc_html__('Content + Media', 'milton' )
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'layout' ,
 			'data-conditional-value' => 'side',
 		),
 		'default' => 'mc'
	) );
	$portfolio_option->add_field( array( 
		'name'	=> esc_html__('Content Sticky', 'milton' ),
		'id'	=> $prefix.'side_content_sticky',
		'type'	=> 'checkbox',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'layout' ,
 			'data-conditional-value' => 'side',
 		),
	) );

	$portfolio_option->add_field( array( 
		'name'	=> esc_html__('Media Gap(Gutter)', 'milton' ),
		'desc'	=> esc_html__('Enable to show the gutter between each media', 'milton' ), 
		'id'	=> $prefix.'media_gutter',
		'type'	=> 'radio_inline',
		'options' => array( 
			'yes' => esc_html__('Yes', 'milton' ), 
			'no' => esc_html__('No', 'milton' )
		),
 		'default' => 'yes'
	) );
	$portfolio_option->add_field( array( 
		'name'	=> esc_html__('Gutter Value', 'milton' ), 
		'desc'	=> esc_html__('Gap between each media item. Enter values in px. Don\'t include "px" string', 'milton' ), 
		'id'	=> $prefix.'media_gutter_value', 
		'type'	=> 'text_small',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'media_gutter' ,
 			'data-conditional-value' => 'yes',
 		),
		'default' => '30',
	) );

	$portfolio_layout_repeatable = $portfolio_option->add_field( array(
		'id'          => $prefix . 'layout_repeatable',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => esc_html__( 'Media {#}', 'milton' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add another Media', 'milton' ),
			'remove_button' => esc_html__( 'Remove Media', 'milton' ),
			'sortable'      => true, // beta
		)
	) );

	$portfolio_option->add_group_field( $portfolio_layout_repeatable, array(
		'name' => esc_html__('Columns Count', 'milton' ),
		'desc'	=> esc_html__('No. of Columns for Media.', 'milton' ), 
		'id' => 'media_zigzag_column_count',
		'type'	=> 'select',
		'options' => array( 
			'2' => esc_html__('2 Columns', 'milton' ), 
			'3' => esc_html__('3 Columns', 'milton' ), 
			'4' => esc_html__('4 Columns', 'milton' ), 
			'5' => esc_html__('5 Columns', 'milton' ),
			'6' => esc_html__('6 Columns', 'milton' ), 
			'7' => esc_html__('7 Columns', 'milton' ), 
			'8' => esc_html__('8 Columns', 'milton' ), 
			'9' => esc_html__('9 Columns', 'milton' ), 
			'10' => esc_html__('10 Columns', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'layout' ,
 			'data-conditional-value' => 'zigzag',
 		),
		'default' => '6',
		'row_classes' => 'agni-slide-col agni-slide-animate-in',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-animate-container">'
	) );
	$portfolio_option->add_group_field( $portfolio_layout_repeatable, array(
		//'name' => esc_html__('Media Columns Count', 'milton' ),
		'desc'	=> esc_html__('No. of Columns for Description.', 'milton' ), 
		'id' => 'description_zigzag_column_count',
		'type'	=> 'select',
		'options' => array( 
			'2' => esc_html__('2 Columns', 'milton' ), 
			'3' => esc_html__('3 Columns', 'milton' ), 
			'4' => esc_html__('4 Columns', 'milton' ), 
			'5' => esc_html__('5 Columns', 'milton' ),
			'6' => esc_html__('6 Columns', 'milton' ), 
			'7' => esc_html__('7 Columns', 'milton' ), 
			'8' => esc_html__('8 Columns', 'milton' ), 
			'9' => esc_html__('9 Columns', 'milton' ), 
			'10' => esc_html__('10 Columns', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'layout' ,
 			'data-conditional-value' => 'zigzag',
 		),
 		'show_names' => false,
		'default' => '6',
		'row_classes' => 'agni-slide-col agni-slide-animate-in',
		'after_row' => '</div>'
	) );
	$portfolio_option->add_group_field( $portfolio_layout_repeatable, array(
		'name' => esc_html__('Alignment', 'milton' ),
		'id' => 'media_zigzag_alignment',
		'type'	=> 'radio_inline',
		'options' => array( 
			'md' => esc_html__('Media + Description', 'milton' ), 
			'dm' => esc_html__('Description + Media', 'milton' )
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'layout' ,
 			'data-conditional-value' => 'zigzag',
 		),
 		'default' => '1'
	) );

	$portfolio_option->add_group_field( $portfolio_layout_repeatable, array(
		'name' => esc_html__('Description', 'milton' ),
		'desc'	=> esc_html__('It will display the description about this image/section at side.', 'milton' ), 
		'id' => 'description_zigzag',
		'type' => 'textarea',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'layout' ,
 			'data-conditional-value' => 'zigzag',
 		),
	) );
	//Vertical align

	$portfolio_option->add_group_field( $portfolio_layout_repeatable, array(
		'name' => esc_html__('Media Type', 'milton' ),
		'id' => 'media_type',
		'type'	=> 'radio_inline',
		'options' => array( 
			'image' => esc_html__('Image', 'milton' ), 
			'gallery' => esc_html__('Gallery/Slider', 'milton' ), 
			'beforeafter' => esc_html__('Before-After', 'milton' ), 
			//'video' => esc_html__('Video', 'milton' ), 
		),
		'default' => 'image',
	) );

	$portfolio_option->add_group_field( $portfolio_layout_repeatable, array( 
		'name'	=> esc_html__('Choose Image', 'milton' ), 
		'id'	=> 'media_image', 
		'type'	=> 'file',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $portfolio_layout_repeatable, 'media_type' ) ),
 			'data-conditional-value' => json_encode( array( 'image', 'beforeafter' ) ),
 		),
	) );

	$portfolio_option->add_group_field( $portfolio_layout_repeatable, array(
		'name'	=> esc_html__('Choose Images ', 'milton' ), 
		'id'	=> 'media_gallery', 
		'type'	=> 'file_list',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $portfolio_layout_repeatable, 'media_type' ) ),
 			'data-conditional-value' => 'gallery',
 		),	
	) );

	$portfolio_option->add_group_field( $portfolio_layout_repeatable, array(
		'name' => esc_html__('Show Image(s) Caption', 'milton' ),
		'desc'	=> esc_html__('It will display the caption of the image(s) at the bottom.', 'milton' ), 
		'id' => 'media_caption',
		'type' => 'checkbox',
	) );
	$portfolio_option->add_group_field( $portfolio_layout_repeatable, array(
		'name' => esc_html__('On Click', 'milton' ),
		'id' => 'media_onclick',
		'type'	=> 'select',
		'options' => array( 
			'1' => esc_html__('None', 'milton' ), 
			'2' => esc_html__('Attachment Image', 'milton' ), 
			'3' => esc_html__('Lightbox', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $portfolio_layout_repeatable, 'media_type' ) ),
 			'data-conditional-value' => json_encode( array( 'image', 'gallery') ),
 		),
		'default' => '1',
	) );

	$portfolio_option->add_group_field( $portfolio_layout_repeatable, array(
		'name' => esc_html__('Gallery Choice', 'milton' ),
		'id' => 'gallery_choice',
		'type'	=> 'radio_inline',
		'options' => array( 
			'gallery' => esc_html__('Grid Gallery', 'milton' ), 
			'carousel' => esc_html__('Carousel', 'milton' ), 
			'' => esc_html__('None', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $portfolio_layout_repeatable, 'media_type' ) ),
 			'data-conditional-value' => 'gallery',
 		),
		'default' => '',
	) );
	$portfolio_option->add_group_field( $portfolio_layout_repeatable, array(
		'name' => esc_html__('Grid Style', 'milton' ),
		'id' => 'media_grid_layout',
		'type'	=> 'select',
		'options' => array( 
			'fitRows' => esc_html__('FitRows(Default)', 'milton' ), 
			'masonry' => esc_html__('Masonry', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $portfolio_layout_repeatable, 'gallery_choice' ) ),
 			'data-conditional-value' => 'gallery'
 		),
		'default' => 'fitRows'
	) );
	$portfolio_option->add_group_field( $portfolio_layout_repeatable, array(
		'name' => esc_html__('Number of Images', 'milton' ),
		'desc'	=> esc_html__('images per row.', 'milton' ), 
		'id' => 'media_images_row',
		'type'	=> 'select',
		'options' => array( 
			'1' => esc_html__('1', 'milton' ), 
			'2' => esc_html__('2', 'milton' ), 
			'3' => esc_html__('3', 'milton' ), 
			'4' => esc_html__('4', 'milton' ), 
			'5' => esc_html__('5', 'milton' ),
			'6' => esc_html__('6', 'milton' ),
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $portfolio_layout_repeatable, 'gallery_choice' ) ),
 			'data-conditional-value' => json_encode( array('gallery', 'carousel') )
 		),
		'default' => '3'
	) );
	$portfolio_option->add_group_field( $portfolio_layout_repeatable, array(
		'name' => esc_html__('Carousel Holder', 'milton' ),
		'id' => 'media_carousel_type',
		'type'	=> 'select',
		'options' => array( 
			'img-carousel' => esc_html__('Img tag', 'milton' ), 
			'bg-carousel' => esc_html__('Background Image', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $portfolio_layout_repeatable, 'gallery_choice' ) ),
 			'data-conditional-value' => 'carousel'
 		),
		'default' => 'img-carousel'
	) );
	$portfolio_option->add_group_field( $portfolio_layout_repeatable, array( 
		'name'	=> esc_html__('Carousel Height', 'milton' ), 
		'desc' => esc_html__( 'You can use px, em, %, etc. or enter just number and it will use pixels. Tip. for 100% Viewport height use "100vh"', 'milton' ),
		'id'	=> 'media_carousel_height', 
		'type'	=> 'text',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $portfolio_layout_repeatable, 'media_carousel_type' ) ),
 			'data-conditional-value' => 'bg-carousel'
 		),
		'default' => '500'
	) );

	$portfolio_option->add_group_field( $portfolio_layout_repeatable, array( 
		'name'	=> esc_html__('Choose After Image', 'milton' ), 
		'id'	=> 'media_image_2', 
		'type'	=> 'file',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $portfolio_layout_repeatable, 'media_type' ) ),
 			'data-conditional-value' => 'beforeafter',
 		),
	) );

	$portfolio_option->add_group_field( $portfolio_layout_repeatable, array(
		'name' => esc_html__('Show After Image Caption', 'milton' ),
		'desc'	=> esc_html__('It will display the caption of the image(s) at the bottom.', 'milton' ), 
		'id' => 'media_caption_2',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $portfolio_layout_repeatable, 'media_image_2' ) ),
 		),
	) );

	// Portfolio Additional Settings
	$portfolio_option->add_field( array( 
		'name'	=> esc_html__('Project Title', 'milton' ), 
		'id'	=> $prefix.'project_title', 
		'type'	=> 'text',
		'before_row' => '<h3>Portfolio Additional Settings</h3>'
	) );
	$portfolio_option->add_field( array( 
		'name' => esc_html__('Project Description', 'milton' ),
		'desc'	=> esc_html__('It will display the description of the project.', 'milton' ), 
		'id' => $prefix.'project_description',
		'attributes' => array(
			'rows' => '6'
		),
		'type' => 'textarea',
	) );
	$portfolio_option->add_field( array( 
		'name'	=> esc_html__('Project Details', 'milton' ), 
		'id'	=> $prefix.'project_detail', 
		'type'	=> 'textarea_small',
		'attributes' => array(
			'placeholder' => 'Date : 27 Oct 2016',
			'rows'        => 1,
			'columns'        => 30,
		),
		'repeatable' => true,
	) );

	$portfolio_option->add_field( array( 
		'name'	=> esc_html__('Project Link Text', 'milton' ), 
		'desc'	=> esc_html__('value for the project link button.', 'milton' ), 
		'id'	=> $prefix.'project_link', 
		'type'	=> 'text_small',
	) );
	$portfolio_option->add_field( array( 
		'name'	=> esc_html__('Project Link URL', 'milton' ), 
		'desc'	=> esc_html__('url for the project link button.', 'milton' ), 
		'id'	=> $prefix.'project_link_url', 
		'type'	=> 'text_url',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'project_link' ,
 		),
	) );
	$portfolio_option->add_field( array(
		'name' => esc_html__('Addiitonal Details Style', 'milton' ),
		'id' => $prefix.'additional_details_style',
		'type'	=> 'select',
		'options' => array( 
			'1' => esc_html__('Side by Side (Description + Details)', 'milton' ), 
			'2' => esc_html__('Side by Side (Details + Description)', 'milton' ), 
			'3' => esc_html__('One by One (Description + Details)', 'milton' ), 
			'4' => esc_html__('One by One (Details + Description)', 'milton' ), 
		),
		'default' => '1',
	) );

	$portfolio_option->add_field( array( 
		'name'	=> esc_html__('Portfolio Navigation', 'milton' ),
		'id'	=> $prefix.'navigation',
		//'type'	=> 'radio_image',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('Inherit', 'milton' ), 
			'1' => esc_html__('Enable', 'milton' ), 
			'0' => esc_html__('Disable', 'milton' ),
		),
		'default' => '',
	) );

	// Portfolio Thumbnail Options
	$portfolio_option->add_field( array( 
		'name'	=> esc_html__('Portfolio Custom Link', 'milton' ), 
		'desc'	=> esc_html__('This custom link will replace the actual portfolio single page link.', 'milton' ), 
		'id'	=> $prefix.'thumbnail_custom_link', 
		'type'	=> 'text_url',
		'before_row' => '<h3>Portfolio Thumbnail Settings</h3>'
	) );
	$portfolio_option->add_field( array( 
		'name'	=> esc_html__('Portfolio Thumbnail Width', 'milton' ),
		'desc'	=> esc_html__('It will be ignored, if you\'re using carousels.', 'milton'),
		'id'	=> $prefix.'thumbnail_width',
		'type'	=> 'radio_inline',
		'options' => array( 
			'width1x' => esc_html__('1x', 'milton' ), 
			//'width1_5x' => esc_html__('1.5x', 'milton' ), 
			'width2x' => esc_html__('2x', 'milton' ), 
			'width3x' => esc_html__('3x', 'milton' ), 
		),
		'default' => 'width1x',
	) );
	$portfolio_option->add_field( array( 
		'name'	=> esc_html__('Portfolio Thumbnail Height', 'milton' ),
		'desc'	=> esc_html__('It will be ignored, If you\'re using carousels or If you disabled the Portfolio Thumbnails Hard Crop at Milton/Portfolio Settings & Shortcode elements.', 'milton'),
		'id'	=> $prefix.'thumbnail_height',
		'type'	=> 'radio_inline',
		'options' => array( 
			'height1x' => esc_html__('1x', 'milton' ), 
			//'height1_5x' => esc_html__('1.5x', 'milton' ), 
			'height2x' => esc_html__('2x', 'milton' ), 
			'height3x' => esc_html__('3x', 'milton' ), 
		),
		'default' => 'height1x',
	) );
	$portfolio_option->add_field( array( 
		'name'	=> esc_html__('Portfolio Thumbnail Hover Style', 'milton' ),
		'id'	=> $prefix.'thumbnail_hover_style',
		//'type'	=> 'radio_image',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('Inherit', 'milton' ), 
			'1' => esc_html__('Style 1', 'milton' ), 
			'2' => esc_html__('Style 2', 'milton' ), 
			'3' => esc_html__('Style 3', 'milton' ), 
			'4' => esc_html__('Style 4', 'milton' ), 
			'5' => esc_html__('Style 5', 'milton' ), 
			'6' => esc_html__('Style 6', 'milton' ), 
			'7' => esc_html__('Style 7', 'milton' )
		),
		'default' => '',
	) );
	$portfolio_option->add_field( array( 
		'name'	=> esc_html__('Hover Background Color', 'milton' ), 
		'id'	=> $prefix.'thumbnail_hover_bg_color', 
		'type'	=> 'rgba_colorpicker',
 		'default' => ''
	) );
	$portfolio_option->add_field( array( 
		'name'	=> esc_html__('Hover Content Color', 'milton' ), 
		'id'	=> $prefix.'thumbnail_hover_color', 
		'type'	=> 'colorpicker',
	) );
	$portfolio_option->add_field( array( 
		'name'	=> esc_html__('Keep Hovered', 'milton' ),
		'id'	=> $prefix.'thumbnail_native_hover',
		'type'	=> 'checkbox',
	) );
}

add_action( 'cmb2_init', 'agni_product_thumbnail_meta' );
function agni_product_thumbnail_meta() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'product_thumbnail_';

	$product_option = new_cmb2_box( array(
		'id'            => $prefix . 'product_options',
		'title'         => esc_html__( 'Product Additional Image', 'milton' ),
		'object_types'  => array( 'product' ), // Post type
		'context'       => 'side',
		'priority'      => 'low',
		'show_names'    => true, // Show field names on the left
	) );	
	
	$product_option->add_field( array(
		'name'	=> esc_html__('Additional featured Image', 'milton' ), 
		'desc' => esc_html__('This image will be shown when you hover the product thumbnail.', 'milton' ),
		'id'	=> $prefix.'features_image', 
		'type'	=> 'file',
	    'options' => array(
	        'url' => false, // Hide the text input for the url
	    ),
	    'text'    => array(
	        'add_upload_file_text' => 'Add Featured Image' // Change upload button text. Default: "Add or Upload File"
	    ),
		'show_names'    => false,
	) );
}

add_action( 'cmb2_init', 'agni_term_options_meta' );
function agni_term_options_meta() {
	
	// Start with an underscore to hide fields from custom fields list
	$prefix = 'terms_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$term_option = new_cmb2_box( array(
		'id'            => $prefix . 'term_options',
		'title'         => esc_html__( 'Term Options', 'milton' ),
		'object_types'  => array( 'term' ), // Post type
		'taxonomies'       => array( 'category', 'post_tag', 'types', 'product_cat' ), // Tells CMB2 which taxonomies should have these fields
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );
	$term_option->add_field( array(
		'name' => esc_html__('Agni Slider List', 'milton' ),
		'desc' => esc_html__('Here, you can choose the slider which is created under Agni Slider Menu(left side).', 'milton' ),
		'id' => $prefix.'agni_sliders',
		'type' => 'select',
		'options' => agni_posttype_options( array( 'post_type' => 'agni_slides'), true ),
	) );
}

/**
 * Page Header Options
 */
add_action( 'cmb2_init', 'agni_page_header_meta' );
function agni_page_header_meta() {
	
	// Start with an underscore to hide fields from custom fields list
	$prefix = 'page_header_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$page_header_option = new_cmb2_box( array(
		'id'            => $prefix . 'page_header_options',
		'title'         => esc_html__( 'Page Header Options', 'milton' ),
		'object_types'  => array( 'page', 'post', 'portfolio', 'product' ), // Post type add "term" for category & tags
		//'taxonomies'       => array( 'category', 'post_tag', 'types', 'product_cat' ), // Tells CMB2 which taxonomies should have these fields
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	$page_header_option->add_field( array(
		'name'	=> esc_html__('Background Choice', 'milton' ),
		'id'	=> $prefix.'bg_choice',
		'type'	=> 'radio_inline',
		'options' => array( 
			'bg_color' => esc_html__('BG Color', 'milton' ), 
			'bg_image' => esc_html__('BG Image', 'milton' ), 
			'bg_video' => esc_html__('BG Video', 'milton' ), 
			'bg_featured' => esc_html__('BG Featured Image', 'milton' ), 
		),
		'default'  => 'bg_image',
		'before_row' => '<h3>Background Options</h3>'
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Background Color', 'milton' ), 
		'id'	=> $prefix.'bg_color', 
		'type'	=> 'colorpicker',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'bg_choice' ,
 			'data-conditional-value' => 'bg_color',
 		)
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Background Image', 'milton' ), 
		'id'	=> $prefix.'bg_image', 
		'type'	=> 'file',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'bg_choice' ,
 			'data-conditional-value' => 'bg_image',
 		)
	) );
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Background Position', 'milton' ),
		'id'	=> $prefix.'bg_image_position',
		'type'	=> 'select',
		'options' => array( 
			'left top' => esc_html__('left top', 'milton' ), 
			'left center' => esc_html__('left center', 'milton' ), 
			'left bottom' => esc_html__('left bottom', 'milton' ), 
			'right top' => esc_html__('right top', 'milton' ), 
			'right center' => esc_html__('right center', 'milton' ), 
			'right bottom' => esc_html__('right bottom', 'milton' ), 
			'center top' => esc_html__('center top', 'milton' ), 
			'center center' => esc_html__('center center', 'milton' ), 
			'center bottom' => esc_html__('center bottom', 'milton' ), 
		),
		'default' => 'center center',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'bg_choice' ,
 			'data-conditional-value' => json_encode( array( 'bg_image', 'bg_featured' ) ),
 		)
	) );
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Background Repeat', 'milton' ),
		'id'	=> $prefix.'bg_image_repeat',
		'type'	=> 'select',
		'options' => array( 
			'repeat' => esc_html__('repeat', 'milton' ), 
			'no-repeat' => esc_html__('no-repeat', 'milton' ), 
		),
		'default' => 'repeat',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'bg_choice' ,
 			'data-conditional-value' => json_encode( array( 'bg_image', 'bg_featured' ) ),
 		)
	) );
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Background Size', 'milton' ),
		'id'	=> $prefix.'bg_image_size',
		'type'	=> 'select',
		'options' => array( 
			'cover' => esc_html__('cover', 'milton' ), 
			'auto' => esc_html__('auto', 'milton' ), 
		),
		'default' => 'cover',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'bg_choice' ,
 			'data-conditional-value' => json_encode( array( 'bg_image', 'bg_featured' ) ),
 		)
	) );

	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Background Video Source', 'milton' ),
		'id'	=> $prefix.'bg_video_src', 
		'type'	=> 'radio_inline',
		'options' => array( 
			'' => esc_html__('No Source', 'milton' ), 
			'1' => esc_html__('YouTube', 'milton' ), 
			'2' => esc_html__('Selfhosted/Vimeo', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'bg_choice' ,
 			'data-conditional-value' => 'bg_video',
 		)
	) );
	$page_header_option->add_field( array(  
		'name'	=> esc_html__('Video URL', 'milton' ), 
		'desc'	=> esc_html__('video url only from youtube!', 'milton' ), 
		'id'	=> $prefix.'bg_video_src_yt', 
		'type'	=> 'text_url',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'bg_video_src' ,
			'data-conditional-value' => '1',
		)
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Fallback image for mobile & tablets', 'milton' ), 
		'id'	=> $prefix.'bg_video_src_yt_fallback', 
		'type'	=> 'file',
		'attributes' => array(
			'data-conditional-id' => $prefix . 'bg_video_src_yt' ,
		)
	) );
	$page_header_option->add_field( array(  
		'name'	=> esc_html__('Video URL', 'milton' ), 
		'desc'	=> esc_html__('Choose the media from your local server', 'milton' ), 
		'id'	=> $prefix.'bg_video_src_sh',
		'type'	=> 'file',
		'attributes' => array(
			'data-conditional-id' => $prefix . 'bg_video_src' ,
			'data-conditional-value' => '2',
		)
	) );
	
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Poster URL', 'milton' ), 
		'desc'	=> esc_html__('This poster will be displayed before video get started', 'milton' ),
		'id'	=> $prefix.'bg_video_src_sh_poster', 
		'type'	=> 'file',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'bg_video_src_sh' ,
		)
	) );

	$page_header_option->add_field( array( 
		'name' => esc_html__('Autoplay', 'milton' ),
		'desc' => esc_html__('Enable to make video autoplay.', 'milton' ),
		'id' => $prefix.'bg_video_autoplay',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'bg_video_src' ,
 			'data-conditional-value' => json_encode(array('1', '2')),
 		)
	) );
	$page_header_option->add_field( array( 
		'name' => esc_html__('Loop', 'milton' ),
		'desc' => esc_html__('Enable to make video loop.', 'milton' ),
		'id' => $prefix.'bg_video_loop',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'bg_video_src' ,
 			'data-conditional-value' => json_encode(array('1', '2')),
 		)
	) );
	$page_header_option->add_field( array( 
		'name' => esc_html__('Muted', 'milton' ),
		'desc' => esc_html__('Enable to make video quiet.', 'milton' ),
		'id' => $prefix.'bg_video_muted',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'bg_video_src' ,
 			'data-conditional-value' => json_encode(array('1', '2')),
 		)
	) );

	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Volumne Level', 'milton' ), 
		'desc'	=> esc_html__('Enter your volume level. it will not applicable if video is muted.', 'milton' ), 
		'id'	=> $prefix.'bg_video_volume', 
		'type'	=> 'text_small',
		'default' => '50',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '0',
			'max'  => '100',
			'step'  => '1',
			'data-conditional-id'    => $prefix . 'bg_video_src' ,
			'data-conditional-value' => '1',
		),
	) );

	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Video Quality', 'milton' ),
		'desc'	=> esc_html__('choose your video quality by default.', 'milton' ),
		'id'	=> $prefix.'bg_video_quality', 
		'type'	=> 'radio_inline',
		'options' => array( 
			'default' => esc_html__('Default', 'milton' ), 
			'hd720' => esc_html__('HD 720p', 'milton' ), 
			'hd1080' => esc_html__('FullHD 1080p', 'milton' ), 
		),
		'default' => 'default',
		'attributes' => array(
 			'data-conditional-id'    => $prefix . 'bg_video_src' ,
			'data-conditional-value' => '1',
 		)
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Video Start at/Stop at', 'milton' ), 
		'desc'	=> esc_html__('Video Start at value', 'milton' ), 
		'id'	=> $prefix.'bg_video_start_at', 
		'type'	=> 'text_small',
		'default' => '0',
		'attributes' => array(
 			'data-conditional-id'    => $prefix . 'bg_video_src' ,
			'data-conditional-value' => '1',
 		),
		'row_classes' => 'agni-slide-col agni-slide-height-desktop',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-height-container">'
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Video Stop At', 'milton' ), 
		'desc'	=> esc_html__('Video Stop at value', 'milton' ), 
		'id'	=> $prefix.'bg_video_stop_at', 
		'type'	=> 'text_small',
		'default' => '0',
		'attributes' => array(
 			'data-conditional-id'    => $prefix . 'bg_video_src' ,
			'data-conditional-value' => '1',
 		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-height-mobile',
		'after_row' => '</div>'
	) );
	
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('BG Overlay Choice', 'milton' ),
		'desc'	=> esc_html__('Gradient Map(Duotone) will not work on IE & Edge.', 'milton' ), 
		'id'	=> $prefix.'bg_overlay_choice', 
		'type'	=> 'radio_inline',
		'options' => array( 
			'1' => esc_html__('Simple', 'milton' ), 
			'2' => esc_html__('Simple Gradient', 'milton' ), 
			'3' => esc_html__('Gradient Map(Duotone)', 'milton' ), 
			'4' => esc_html__('No Overlay', 'milton' ), 
		),
		'default' => '4',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'bg_choice' ,
 			'data-conditional-value' => json_encode( array( 'bg_video','bg_image', 'bg_featured' ) ),
 		)
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('BG Overlay Color', 'milton' ), 
		'desc'	=> esc_html__('This layer will be the overlay of the slider.', 'milton' ), 
		'id'	=> $prefix.'bg_overlay_color', 
		'type'	=> 'rgba_colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'bg_overlay_choice' ,
 			'data-conditional-value' => '1',
 		)
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('BG Gradient Overlay CSS', 'milton' ), 
		'desc'	=> wp_kses( __( 'Get/Type your Gradient CSS. Ref. <a target="_blank" href="http://uigradients.com/">http://uigradients.com/</a> <a target="_blank" href="http://hex2rgba.devoth.com/">HEX to RGBA converter for transparency</a>', 'milton' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ),
		'id'	=> $prefix.'bg_sg_overlay_css', 
		'type'	=> 'textarea_code',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'bg_overlay_choice' ,
 			'data-conditional-value' => '2',
 		)
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('BG Gradient Map(Duotone) Overlay Color 1', 'milton' ), 
		'desc'	=> wp_kses( __( 'Choose the color for Shadows(Dark pixels). <a target="_blank" href="http://demo.agnidesigns.com/milton/documentation/kb/gradient-map-duotone/">See Presets</a>', 'milton' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ),
		'id'	=> $prefix.'bg_gm_overlay_color1', 
		'type'	=> 'colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'bg_overlay_choice' ,
 			'data-conditional-value' => '3',
 		)
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('BG Gradient Map(Duotone) Overlay Color 2', 'milton' ), 
		'desc'	=> esc_html__('Choose the mid-tone color. You can leave this empty for no mid-tone.', 'milton' ), 
		'id'	=> $prefix.'bg_gm_overlay_color2', 
		'type'	=> 'colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'bg_overlay_choice' ,
 			'data-conditional-value' => '3',
 		)
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('BG Gradient Map(Duotone) Overlay Color 3', 'milton' ), 
		'desc'	=> esc_html__('Choose the color for Highlights(White pixels).', 'milton' ), 
		'id'	=> $prefix.'bg_gm_overlay_color3', 
		'type'	=> 'colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'bg_overlay_choice',
 			'data-conditional-value' => '3',
 		)
	) );

	$page_header_option->add_field( array(
		'name' => esc_html__('Particle Ground', 'milton' ),
		'desc' => esc_html__('It will enable the particles for the background.', 'milton' ),
		'id' => $prefix . 'bg_particle_ground',
		'type' => 'checkbox',
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Particle Ground Color', 'milton' ), 
		'desc'	=> esc_html__('Choose the color and transparency for the particle ground.', 'milton' ), 
		'id'	=> $prefix.'bg_particle_ground_color', 
		'type'	=> 'rgba_colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'bg_particle_ground',
 		)
	) );

	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Image', 'milton' ), 
		'id'	=> $prefix.'image', 
		'type'	=> 'file',
		'before_row' => '<h3>Content Options</h3>'
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Max Image width', 'milton' ), 
		'desc'	=> esc_html__('Enter your image width, don\'t include "px" string', 'milton' ), 
		'id'	=> $prefix.'image_size', 
		'type'	=> 'text_small',
		'default' => '240',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '100',
			'max'  => '1000',
			'step'  => '5',
 			//'required' => true,
 			'data-conditional-id'    => $prefix .'image',
 			//'data-conditional-id'    => 'agni_slides_repeatable[{#}][title]',
		),
		'row_classes' => 'agni-slide-col agni-slide-height-desktop',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-height-container">'
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Max Image width', 'milton' ), 
		'desc'	=> esc_html__('Enter your image width for tablets', 'milton' ), 
		'id'	=> $prefix.'image_size_tab', 
		'type'	=> 'text_small',
		'default' => '160',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '40',
			'max'  => '700',
			'step'  => '5',
 			//'required' => true,
 			'data-conditional-id'    => $prefix .'image',
 			//'data-conditional-id'    => 'agni_slides_repeatable[{#}][title]',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-height-tab',
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Max Image width', 'milton' ), 
		'desc'	=> esc_html__('Enter your image width for mobiles', 'milton' ), 
		'id'	=> $prefix.'image_size_mobile', 
		'type'	=> 'text_small',
		'default' => '100',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '20',
			'max'  => '300',
			'step'  => '5',
 			//'required' => true,
 			'data-conditional-id'    => $prefix .'image',
 			//'data-conditional-id'    => 'agni_slides_repeatable[{#}][title]',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-height-mobile',
		'after_row' => '</div>'
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Title Choice', 'milton' ),
		'id'	=> $prefix.'title_choice', 
		'type'	=> 'radio_inline',
		'options' => array( 
			'1' => esc_html__('Custom Title', 'milton' ), 
			'2' => esc_html__('Page Title', 'milton' ), 
		),
		'default' => '1',
	) );
	$page_header_option->add_field( array(
		'name' => esc_html__('Title', 'milton' ),
		'desc' => esc_html__('To use a text effect. Add the texts with delimiter "|" inside <span> tag. For ex. Hello, <span>This is|Sample|Text</span>', 'milton' ),
		'id' => $prefix . 'title',
		'type' => 'text',
		'sanitization_cb' => false,
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'title_choice' ,
 			'data-conditional-value' => '1',
 		)
	) );
	$page_header_option->add_field( array(
		'name' => esc_html__('Title Rotator', 'milton' ),
		'desc' => esc_html__('Check this for Title rotator. it enables the text effects to the title.', 'milton' ),
		'id' => $prefix . 'title_rotator',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix .'title',
		),
	) );
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Choose Rotator Effect', 'milton' ),
		'id'	=> $prefix . 'title_rotator_choice',
		'type'	=> 'select',
		'options' => array( 
			'type letters' => esc_html__('Type', 'milton' ), 
			'zoom' => esc_html__('Zoom', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix .'title_rotator',
		),
		'default'  => 'scale letters'
	) );
	$page_header_option->add_field( array(
		'name' => esc_html__('Title Font', 'milton' ),
		'desc' => esc_html__('It will apply the font to the Title which you choose at "Milton/Theme Options/General Settings/Typography".', 'milton' ),
		'id' => $prefix . 'title_font',
		'type' => 'select',
		'options' => array( 
			'primary-typo' => esc_html__('Primary Font', 'milton' ), 
			'default-typo' => esc_html__('Default Font', 'milton' ), 
			'additional-typo' => esc_html__('Additional Font', 'milton' ), 
			'special-typo' => esc_html__('Special Font', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix .'title_choice',
 			'data-conditional-value' => json_encode( array( '1', '2' ) ),
		),
		'default' => 'primary-typo',
	) );

	$page_header_option->add_field( array(
		'name'	=> esc_html__('Title Font Size', 'milton' ), 
		'desc'	=> esc_html__('Enter your title font size, don\'t include "px" string', 'milton' ), 
		'id'	=> $prefix . 'title_size', 
		'type'	=> 'text_small',
		'default' => '',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '30',
			'max'  => '200',
			'step'  => '1',
 			//'required' => true,
 			'data-conditional-id'    => $prefix .'title_choice',
 			'data-conditional-value' => json_encode( array( '1', '2' ) ),
		),
	) );
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Title Color', 'milton' ), 
		'desc'	=> esc_html__('Choose the color for title', 'milton' ), 
		'id'	=> $prefix . 'title_color', 
		'type'	=> 'colorpicker',
		'default' => '#f0f0f0',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix .'title_choice',
 			'data-conditional-value' => json_encode( array( '1', '2' ) ),
 		)
	) );
	$page_header_option->add_field( array(
		'name' => esc_html__('Description', 'milton' ),
		'id' => $prefix . 'desc',
		'type' => 'textarea_small',
		'sanitization_cb' => false,
		'attributes'  => array(
	        'placeholder' => 'A small amount of text',
	        'rows'        => 2,
	    ),
	) );
	$page_header_option->add_field( array(
		'name' => esc_html__('Description Font', 'milton' ),
		'desc' => esc_html__('It will apply the font to the Description which you choose at "Milton/Theme Options/General Settings/Typography".', 'milton' ),
		'id' => $prefix . 'desc_font',
		'type' => 'select',
		'options' => array( 
			'primary-typo' => esc_html__('Primary Font', 'milton' ), 
			'default-typo' => esc_html__('Default Font', 'milton' ), 
			'additional-typo' => esc_html__('Additional Font', 'milton' ), 
			'special-typo' => esc_html__('Special Font', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix .'desc',
		),
		'default' => 'default-typo',
	) );
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Description Font Size', 'milton' ), 
		'desc'	=> esc_html__('Enter your title font size, don\'t include "px" string', 'milton' ), 
		'id'	=> $prefix . 'desc_size', 
		'type'	=> 'text_small',
		'default' => '',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '15',
			'max'  => '60',
			'step'  => '1',
			//'required' => true,
 			'data-conditional-id'    => $prefix .'desc',
 			//'data-conditional-id'    => 'agni_slides_repeatable[{#}][title]',
		),
	) );
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Description Color ', 'milton' ), 
		'desc'	=> esc_html__('choose the description color', 'milton' ), 
		'id'	=> $prefix . 'desc_color', 
		'type'	=> 'colorpicker',
		'default' => '#f0f0f0',
		'attributes' => array(
 			'data-conditional-id'    => $prefix .'desc',
 		)
	) );

	$page_header_option->add_field( array(
		'name' => esc_html__('Divide Line', 'milton' ),
		'desc' => esc_html__('Checking this for FadeInUp animation.', 'milton' ),
		'id' => $prefix . 'line',
		'type' => 'checkbox',
	) );
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Divide Line Color ', 'milton' ), 
		'desc'	=> esc_html__('choose the description color', 'milton' ), 
		'id'	=> $prefix . 'line_color', 
		'type'	=> 'colorpicker',
		'default' => '#f0f0f0',
		'attributes' => array(
 			'data-conditional-id'    => $prefix .'line',
 		)
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Button 1', 'milton' ), 
		'desc'	=> esc_html__('button 1 info', 'milton' ), 
		'id'	=> $prefix . 'button1', 
		'type'	=> 'text_small'
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Button 1 Icon', 'milton' ),
		'id'	=> $prefix . 'button1_icon',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('No icon', 'milton' ), 
			'fa fa-play' => esc_html__('Play', 'milton' ), 
			'fa fa-download' => esc_html__('Download', 'milton' ), 
			'fa fa-mobile' => esc_html__('Mobile', 'milton' ), 
			'fa fa-heart' => esc_html__('Heart', 'milton' ), 
			'fa fa-diamond' => esc_html__('Diamond', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
			'data-conditional-id' => $prefix .'button1',
		)
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Button 1 Icon Style', 'milton' ),
		'id'	=> $prefix . 'button1_icon_style',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('Default', 'milton' ), 
			'has-big-btn' => esc_html__('Big Rounded', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
			'data-conditional-id' => $prefix .'button1_icon',
		)
	) );
	$page_header_option->add_field( array(
		'name' => esc_html__('Hide Button 1 Text', 'milton' ),
		'desc' => esc_html__('It will hide the button text.', 'milton' ),
		'id' => $prefix . 'button1_text_hide',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix .'button1_icon',
 			//'data-conditional-value' => 'on',
 		),
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Button 1 URL', 'milton' ), 
		'desc'	=> esc_html__('button href', 'milton' ), 
		'id'	=> $prefix . 'button1_url', 
		'type'	=> 'text_url',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix .'button1',
 			//'data-conditional-value' => 'on',
 		)
	) );
	
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Button 1 Style', 'milton' ),
		'id'	=> $prefix . 'button1_style',
		'type'	=> 'select',
		'options' => array( 
			'default' => esc_html__('Default', 'milton' ), 
			'primary' => esc_html__('Primary', 'milton' ), 
			'accent' => esc_html__('Accent', 'milton' ), 
			'white' => esc_html__('White', 'milton' ), 
		),
		'default' => 'white',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix .'button1',
 			//'data-conditional-value' => 'on',
 		),
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Button 1 Type', 'milton' ),
		'id'	=> $prefix . 'button1_type',
		'type'	=> 'radio_inline',
		'options' => array( 
			'btn-normal' => esc_html__('background', 'milton' ), 
			'btn-alt' => esc_html__('Bordered', 'milton' ), 
			'btn-plain' => esc_html__('Plain', 'milton' ), 
		),
		'default' => 'btn-alt',
		'attributes' => array(
			'data-conditional-id' => $prefix .'button1',
		)
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Button 1 Radius', 'milton' ), 
		'desc'	=> esc_html__('You can use px, em, %, etc. or enter just number and it will use pixels.', 'milton' ), 
		'id'	=> $prefix . 'button1_radius', 
		'type'	=> 'text_small',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix .'button1',
 			//'data-conditional-value' => 'on',
 		),
	) );
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Button 1 Target', 'milton' ),
		'id'	=> $prefix . 'button1_target',
		'type'	=> 'select',
		'options' => array( 
			'_self' => esc_html__('Same Window', 'milton' ), 
			'_blank' => esc_html__('New Window', 'milton' ), 
		),
		'default' => '_self',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix .'button1',
 			//'data-conditional-value' => 'on',
 		),
	) );
	$page_header_option->add_field( array(
		'name' => esc_html__('Button 1 has Lightbox Video?', 'milton' ),
		'desc' => esc_html__('Checking this for FadeInDown animation.', 'milton' ),
		'id' => $prefix . 'button1_lightbox',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix .'button1',
 			//'data-conditional-value' => 'on',
 		),
	) );	
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Button 2', 'milton' ), 
		'desc'	=> esc_html__('button 2 info', 'milton' ), 
		'id'	=> $prefix . 'button2', 
		'type'	=> 'text_small'
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Button 2 Icon', 'milton' ),
		'id'	=> $prefix . 'button2_icon',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('No icon', 'milton' ), 
			'fa fa-play' => esc_html__('Play', 'milton' ), 
			'fa fa-download' => esc_html__('Download', 'milton' ), 
			'fa fa-mobile' => esc_html__('Mobile', 'milton' ), 
			'fa fa-heart' => esc_html__('Heart', 'milton' ), 
			'fa fa-diamond' => esc_html__('Diamond', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
			'data-conditional-id' => $prefix .'button2',
		)
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Button 2 Icon Style', 'milton' ),
		'id'	=> $prefix . 'button2_icon_style',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('Default', 'milton' ), 
			'has-big-btn' => esc_html__('Big Rounded', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
			'data-conditional-id' => $prefix .'button2_icon',
		)
	) );
	$page_header_option->add_field( array(
		'name' => esc_html__('Hide Button 2 Text', 'milton' ),
		'desc' => esc_html__('It will hide the button text.', 'milton' ),
		'id' => $prefix . 'button2_text_hide',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix .'button2_icon',
 			//'data-conditional-value' => 'on',
 		),
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Button 2 URL', 'milton' ), 
		'desc'	=> esc_html__('button href', 'milton' ), 
		'id'	=> $prefix . 'button2_url', 
		'type'	=> 'text_url',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix .'button2',
 			//'data-conditional-value' => 'on',
 		)
	) );
	
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Button 2 Style', 'milton' ),
		'id'	=> $prefix . 'button2_style',
		'type'	=> 'select',
		'options' => array( 
			'default' => esc_html__('Default', 'milton' ), 
			'primary' => esc_html__('Primary', 'milton' ), 
			'accent' => esc_html__('Accent', 'milton' ), 
			'white' => esc_html__('White', 'milton' ), 
		),
		'default' => 'white',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix .'button2',
 			//'data-conditional-value' => 'on',
 		),
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Button 2 Type', 'milton' ),
		'id'	=> $prefix . 'button2_type',
		'type'	=> 'radio_inline',
		'options' => array( 
			'btn-normal' => esc_html__('background', 'milton' ), 
			'btn-alt' => esc_html__('Bordered', 'milton' ), 
			'btn-plain' => esc_html__('Plain', 'milton' ), 
		),
		'default' => 'btn-alt',
		'attributes' => array(
			'data-conditional-id' => $prefix .'button2',
		)
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Button 2 Radius', 'milton' ), 
		'desc'	=> esc_html__('You can use px, em, %, etc. or enter just number and it will use pixels.', 'milton' ), 
		'id'	=> $prefix . 'button2_radius', 
		'type'	=> 'text_small',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix .'button2',
 			//'data-conditional-value' => 'on',
 		),
	) );
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Button 2 Target', 'milton' ),
		'id'	=> $prefix . 'button2_target',
		'type'	=> 'select',
		'options' => array( 
			'_self' => esc_html__('Same Window', 'milton' ), 
			'_blank' => esc_html__('New Window', 'milton' ), 
		),
		'default' => '_self',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix .'button2',
 			//'data-conditional-value' => 'on',
 		),
	) );	
	$page_header_option->add_field( array(
		'name' => esc_html__('Button 2 has Lightbox Video?', 'milton' ),
		'desc' => esc_html__('Checking this for FadeInDown animation.', 'milton' ),
		'id' => $prefix . 'button2_lightbox',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix .'button2',
 			//'data-conditional-value' => 'on',
 		),
	) );

	$page_header_option->add_field( array(
		'name' => esc_html__('Breadcrumb(Navigation)', 'milton' ),
		'desc' => esc_html__('check this to show the navigation link at header', 'milton' ),
		'id'	=> $prefix.'breadcrumb',
		'type'	=> 'checkbox',
	) );
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Breadcrumb Color ', 'milton' ), 
		'desc'	=> esc_html__('choose the description color', 'milton' ), 
		'id'	=> $prefix . 'breadcrumb_color', 
		'type'	=> 'colorpicker',
		'default' => '#f0f0f0',
		'attributes' => array(
 			'data-conditional-id'    => $prefix .'breadcrumb',
 		)
	) );

	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Bottom Arrow Icon', 'milton' ),
		'id'	=> $prefix . 'arrowicon',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('No icon', 'milton' ), 
			'pe-7s-angle-down' => esc_html__('Angle Down', 'milton' ), 
			'pe-7s-angle-down-circle' => esc_html__('Angle Down Circled', 'milton' ), 
			'ion-ios-arrow-thin-down' => esc_html__('Arrow Down', 'milton' ), 
			'pe-7s-bottom-arrow' => esc_html__('Arrow Down Circled', 'milton' ), 
			'pe-7s-mouse' => esc_html__('Mouse', 'milton' ), 
		),
		'default' => '',
	) );
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Bottom Arrow link', 'milton' ), 
		'id'	=> $prefix . 'arrowlink', 
		'type'	=> 'text_url',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix .'arrowicon',
 			//'data-conditional-value' => 'on',
 		),
	) );
	
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Bottom Arrow Color', 'milton' ), 
		'desc'	=> esc_html__('Choose the color for the bottom arrow', 'milton' ), 
		'id'	=> $prefix . 'arrowicon_color', 
		'type'	=> 'colorpicker',
		'attributes' => array(
			//'required' => true, // Will be required only if visible.
			'data-conditional-id' => $prefix .'arrowicon',
		)		
	) );
	$page_header_option->add_field( array(
		'name' => esc_html__('Animation', 'milton' ),
		'desc' => esc_html__('Checking this for FadeInDown animation.', 'milton' ),
		'id' => $prefix . 'animation',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('No Animation', 'milton' ), 
			'fade-in' => esc_html__('fadeIn', 'milton' ), 
			'fade-in-down' => esc_html__('fadeInDown', 'milton' ),
			'fade-in-up' => esc_html__('fadeInUp', 'milton' ),
			'zoom-in' => esc_html__('zoomIn', 'milton' ),
		),
		'default' => '',
	) );
	
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Text Alignment', 'milton' ),
		'id'	=> $prefix . 'text_alignment',
		'type'	=> 'radio_inline',
		'options' => array( 
			'flex-start' => esc_html__( 'Left', 'milton' ), 
			'center' => esc_html__( 'Center', 'milton' ), 
			'flex-end' => esc_html__( 'Right', 'milton' ), 
		),
		'default'  => 'flex-start'
	) );
	
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Vertical Alignment', 'milton' ),
		'id'	=> $prefix . 'vertical_alignment',
		'type'	=> 'radio_inline',
		'options' => array( 
			'flex-start' => esc_html__( 'Top', 'milton' ), 
			'center' => esc_html__( 'Center', 'milton' ), 
			'flex-end' => esc_html__( 'Bottom', 'milton' ), 
		),
		'default'  => 'center'
	) );
	$page_header_option->add_field( array(
		'name'	=> esc_html__('Padding Values', 'milton' ), 
		'desc'	=> esc_html__('Padding Top. You can use px, em, %, etc. or enter just number and it will use pixels.', 'milton' ), 
		'id'	=> $prefix.'padding_top', 
		'type'	=> 'text_small',
		'default' => '0',
		'row_classes' => 'agni-slide-col agni-slide-padding-top',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-padding-container">'
	) );

	$page_header_option->add_field( array(
		//'name'	=> esc_html__('Padding Right', 'milton' ), 
		'desc'	=> esc_html__('Padding Right', 'milton' ), 
		'id'	=> $prefix.'padding_right', 
		'type'	=> 'text_small',
		'default' => '0',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-padding-right'
		
	) );
	$page_header_option->add_field( array(
		//'name'	=> esc_html__('Padding Bottom', 'milton' ), 
		'desc'	=> esc_html__('Padding Bottom', 'milton' ), 
		'id'	=> $prefix.'padding_bottom', 
		'type'	=> 'text_small',
		'default' => '0',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-padding-bottom',
	) );
	$page_header_option->add_field( array(
		//'name'	=> esc_html__('Padding Left', 'milton' ), 
		'desc'	=> esc_html__('Padding Left', 'milton' ), 
		'id'	=> $prefix.'padding_left', 
		'type'	=> 'text_small',
		'default' => '0',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-padding-left',
		'after_row' => '</div>'
	) );

	$page_header_option->add_field( array(
		'name'	=> esc_html__('Page Header Choice', 'milton' ),
		'id'	=> $prefix.'choice',
		'type'	=> 'radio_inline',
		'options' => array( 
			'1' => esc_html__('Full Height(100%)', 'milton' ), 
			'2' => esc_html__('Custom Height', 'milton' ), 
		),
		'default' => '1',
		'before_row' => '<h3>Basic Options</h3>'
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Page Header Height', 'milton' ), 
		'desc'	=> esc_html__('Enter your slider height, don\'t include "px" string', 'milton' ), 
		'id'	=> $prefix.'height', 
		'type'	=> 'text_small',
		'default' => '600',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'choice',
			'data-conditional-value' => '2',
		),
		'row_classes' => 'agni-slide-col agni-slide-height-desktop',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-height-container">'
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Page Header Height(Tablet devices)', 'milton' ), 
		'desc'	=> esc_html__('Height on Tablets', 'milton' ), 
		'id'	=> $prefix.'height_tab', 
		'type'	=> 'text_small',
		'default' => '480',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'choice',
			'data-conditional-value' => '2',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-height-tab',
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Page Header Height(Mobile devices)', 'milton' ), 
		'desc'	=> esc_html__('Height on Mobiles', 'milton' ), 
		'id'	=> $prefix.'height_mobile', 
		'type'	=> 'text_small',
		'default' => '360',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'choice',
			'data-conditional-value' => '2',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-height-mobile',
		'after_row' => '</div>'
	) );
	$page_header_option->add_field( array(
		'name' => esc_html__('Parallax', 'milton' ),
		'desc' => esc_html__('Check this to enable parallax, its purely based on skrollr.', 'milton' ),
		'id' => $prefix.'parallax',
		'type' => 'checkbox',
	) );
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Parallax Value', 'milton' ), 
		'desc'	=> esc_html__('Enter the css property for the slider\'s top at the top of the screen. for eg.transform:translateY(0px); if don\'t want parallax just leave this empty', 'milton' ), 
		'id'	=> $prefix.'parallax_start', 
		'type'	=> 'textarea_small',
		'default'  => 'transform:translateY(0px);',
		'attributes' => array(
	        'rows'        => 2,
	        'placeholder' => 'Parallax Starting Value',
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'parallax',
		),
		'row_classes' => 'agni-slide-col agni-slide-parallax-start',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-parallax-container">'
	) );
	
	$page_header_option->add_field( array( 
		'name'	=> esc_html__('Parallax End Value', 'milton' ), 
		'desc'	=> esc_html__('Enter the css property for the slider\'s bottom when at the top of the screen. for eg.transform:translateY(600px); if don\'t want parallax just leave this empty', 'milton' ), 
		'id'	=> $prefix.'parallax_end', 
		'type'	=> 'textarea_small',
		'default'  => 'transform:translateY(600px);',
		'attributes' => array(
			'rows'        => 2,
			'placeholder' => 'Parallax End Value',
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'parallax',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-parallax-end',
		'after_row' => '</div>'
	) );

}

add_action( 'cmb2_init', 'agni_slider_meta' );
function agni_slider_meta() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'agni_slides_';
	
	$agni_slider_option = new_cmb2_box( array(
		'id'            => $prefix . 'agni_slider_option',
		'title'         => esc_html__( 'Agni Slider Options', 'milton' ),
		'object_types'  => array( 'agni_slides' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );
	$agni_slider_option->add_field( array( 
		'name'	=> esc_html__('Slider Choice', 'milton' ), 
		'desc'	=> esc_html__('choose your slider, And fill the details below. ', 'milton' ), 
		'id'	=> $prefix.'choice', 
		'type'	=> 'radio_inline',
		'options' => array( 
			'slideshow' => esc_html__('Default(Slider/Carousel)', 'milton' ), 	
			'textslider' => esc_html__('Static Background Image/Video', 'milton' ),
			'imageslider' => esc_html__('Static Text', 'milton' ),
			'posttypeslider' => esc_html__('Posttype Slider', 'milton' ),
		)
	) );	
	
	$slideshow_slider_options = new_cmb2_box( array(
		'id'            => $prefix . 'slideshow_options',
		'title'         => esc_html__( 'Slider/Carousel Options', 'milton' ),
		'object_types'  => array( 'agni_slides' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$slideshow_repeatable = $slideshow_slider_options->add_field( array(
		'id'          => $prefix . 'slideshow_repeatable',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => esc_html__( 'Slide {#}', 'milton' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add another Slide', 'milton' ),
			'remove_button' => esc_html__( 'Remove Slide', 'milton' ),
			'sortable'      => true, // beta
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */

	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Background Choice', 'milton' ),
		'id'	=> 'slideshow_bg_choice',
		'type'	=> 'radio_inline',
		'options' => array( 
			'bg_color' => esc_html__('BG Color', 'milton' ), 
			'bg_image' => esc_html__('BG Image', 'milton' ), 
		),
		'default'  => 'bg_image',
		'before_row' => '<h3>Background Options</h3>'
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('Background Color', 'milton' ), 
		'id'	=> 'slideshow_bg_color', 
		'type'	=> 'colorpicker',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_bg_choice' ) ),
 			'data-conditional-value' => 'bg_color',
 		)
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('Background Image', 'milton' ), 
		'id'	=> 'slideshow_bg_image', 
		'type'	=> 'file',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_bg_choice' ) ),
 			'data-conditional-value' => 'bg_image',
 		)
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Background Position', 'milton' ),
		'id'	=> 'slideshow_bg_image_position',
		'type'	=> 'select',
		'options' => array( 
			'left top' => esc_html__('left top', 'milton' ), 
			'left center' => esc_html__('left center', 'milton' ), 
			'left bottom' => esc_html__('left bottom', 'milton' ), 
			'right top' => esc_html__('right top', 'milton' ), 
			'right center' => esc_html__('right center', 'milton' ), 
			'right bottom' => esc_html__('right bottom', 'milton' ), 
			'center top' => esc_html__('center top', 'milton' ), 
			'center center' => esc_html__('center center', 'milton' ), 
			'center bottom' => esc_html__('center bottom', 'milton' ), 
		),
		'default' => 'center center',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_bg_image' ) ),
 		),
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Background Repeat', 'milton' ),
		'id'	=> 'slideshow_bg_image_repeat',
		'type'	=> 'select',
		'options' => array( 
			'repeat' => esc_html__('repeat', 'milton' ), 
			'no-repeat' => esc_html__('no-repeat', 'milton' ), 
		),
		'default' => 'repeat',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_bg_image' ) ),
 		),
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Background Size', 'milton' ),
		'id'	=> 'slideshow_bg_image_size',
		'type'	=> 'select',
		'options' => array( 
			'cover' => esc_html__('cover', 'milton' ), 
			'auto' => esc_html__('auto', 'milton' ), 
		),
		'default' => 'cover',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_bg_image' ) ),
 		),
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('BG Overlay Choice', 'milton' ),
		'id'	=> 'slideshow_bg_overlay_choice', 
		'type'	=> 'radio_inline',
		'options' => array( 
			'1' => esc_html__('Simple', 'milton' ), 
			'2' => esc_html__('Simple Gradient', 'milton' ), 
			'3' => esc_html__('Gradient Map(Duotone)', 'milton' ), 
			'4' => esc_html__('No Overlay', 'milton' ), 
		),
		'default' => '4',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_bg_choice' ) ),
 			'data-conditional-value' => json_encode( array( 'bg_video','bg_image' ) ),
 		)
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('BG Overlay Color', 'milton' ), 
		'desc'	=> esc_html__('This layer will be the overlay of the slider.', 'milton' ), 
		'id'	=> 'slideshow_bg_overlay_color', 
		'type'	=> 'rgba_colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_bg_overlay_choice' ) ),
 			'data-conditional-value' => '1',
 		)
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('BG Gradient Overlay CSS', 'milton' ), 
		'desc'	=> wp_kses( __( 'Get/Type your Gradient CSS. Ref. <a target="_blank" href="http://uigradients.com/">http://uigradients.com/</a> <a target="_blank" href="http://hex2rgba.devoth.com/">HEX to RGBA converter for transparency</a>', 'milton' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ),
		'id'	=> 'slideshow_bg_sg_overlay_css', 
		'type'	=> 'textarea_code',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_bg_overlay_choice' ) ),
 			'data-conditional-value' => '2',
 		)
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('BG Gradient Map(Duotone) Overlay Color 1', 'milton' ), 
		'desc'	=> wp_kses( __( 'Choose the color for Shadows(Dark pixels). <a target="_blank" href="http://demo.agnidesigns.com/milton/documentation/kb/gradient-map-duotone/">See Presets</a>', 'milton' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ),
		'id'	=> 'slideshow_bg_gm_overlay_color1', 
		'type'	=> 'colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_bg_overlay_choice' ) ),
 			'data-conditional-value' => '3',
 		)
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('BG Gradient Map(Duotone) Overlay Color 2', 'milton' ), 
		'desc'	=> esc_html__('Choose the mid-tone color. You can leave this empty for no mid-tone.', 'milton' ), 
		'id'	=> 'slideshow_bg_gm_overlay_color2', 
		'type'	=> 'colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_bg_overlay_choice' ) ),
 			'data-conditional-value' => '3',
 		)
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('BG Gradient Map(Duotone) Overlay Color 3', 'milton' ), 
		'desc'	=> esc_html__('Choose the color for Highlights(White pixels).', 'milton' ), 
		'id'	=> 'slideshow_bg_gm_overlay_color3', 
		'type'	=> 'colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_bg_overlay_choice' ) ),
 			'data-conditional-value' => '3',
 		)
	) );

	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name' => esc_html__('Particle Ground', 'milton' ),
		'desc' => esc_html__('It will enable the particles for the background.', 'milton' ),
		'id' => 'slideshow_bg_particle_ground',
		'type' => 'checkbox',
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(  
		'name'	=> esc_html__('Particle Ground Color', 'milton' ), 
		'desc'	=> esc_html__('Choose the color and transparency for the particle ground.', 'milton' ), 
		'id'	=> 'slideshow_bg_particle_ground_color', 
		'type'	=> 'rgba_colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_bg_particle_ground' ) ),
 		)
	) );

	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
        'name'  => esc_html__('Image', 'milton' ), 
        'id'    => 'slideshow_image', 
        'type'  => 'file',
        'before_row' => '<h3>Content Options</h3>'
    ) );
    $slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
        'name'  => esc_html__('Max Image width', 'milton' ), 
        'desc'  => esc_html__('Enter your image width, don\'t include "px" string', 'milton' ), 
        'id'    => 'slideshow_image_size', 
        'type'  => 'text_small',
        'default' => '240',
        'attributes' => array(
            'type'  => 'number',
            'min'  => '100',
            'max'  => '1000',
            'step'  => '5',
            //'required' => true,
            'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_image' ) ),
        ),
        'row_classes' => 'agni-slide-col agni-slide-height-desktop',
        'before_row' => '<div class="cmb-row agni-slide-row agni-slide-height-container">'
    ) );
    $slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
        //'name'  => esc_html__('Max Image width', 'milton' ), 
        'desc'  => esc_html__('Enter your image width for tablets', 'milton' ), 
        'id'    => 'slideshow_image_size_tab', 
        'type'  => 'text_small',
        'default' => '160',
        'attributes' => array(
            'type'  => 'number',
            'min'  => '40',
            'max'  => '700',
            'step'  => '5',
            //'required' => true,
            'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_image' ) ),
        ),
        'show_names' => false,
        'row_classes' => 'agni-slide-col agni-slide-height-tab',
    ) );
    $slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
        //'name'  => esc_html__('Max Image width', 'milton' ), 
        'desc'  => esc_html__('Enter your image width for mobiles', 'milton' ), 
        'id'    => 'slideshow_image_size_mobile', 
        'type'  => 'text_small',
        'default' => '100',
        'attributes' => array(
            'type'  => 'number',
            'min'  => '20',
            'max'  => '300',
            'step'  => '5',
            //'required' => true,
            'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_image' ) ),
        ),
        'show_names' => false,
        'row_classes' => 'agni-slide-col agni-slide-height-mobile',
        'after_row' => '</div>'
    ) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name' => esc_html__('Title', 'milton' ),
		'desc' => esc_html__('To use a text effect. Add the texts with delimiter "|" inside <span> tag. For ex. Hello, <span>This is|Sample|Text</span>', 'milton' ),
		'id' => 'slideshow_title',
		'type' => 'text',
		'sanitization_cb' => false,
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name' => esc_html__('Title Rotator', 'milton' ),
		'desc' => esc_html__('Check this for Title rotator. it enables the text effects to the title.', 'milton' ),
		'id' => 'slideshow_title_rotator',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_title' ) ),
		),
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Choose Rotator Effect', 'milton' ),
		'id'	=> 'slideshow_title_rotator_choice',
		'type'	=> 'select',
		'options' => array( 
			'type letters' => esc_html__('Type', 'milton' ), 
			'zoom' => esc_html__('Zoom', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_title_rotator' ) ),
		),
		'default'  => 'scale letters'
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name' => esc_html__('Title Font', 'milton' ),
		'desc' => esc_html__('It will apply the font to the Title which you choose at "Milton/Theme Options/General Settings/Typography".', 'milton' ),
		'id' => 'slideshow_title_font',
		'type' => 'select',
		'options' => array( 
			'primary-typo' => esc_html__('Primary Font', 'milton' ), 
			'default-typo' => esc_html__('Default Font', 'milton' ), 
			'additional-typo' => esc_html__('Additional Font', 'milton' ), 
			'special-typo' => esc_html__('Special Font', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_title' ) ),
		),
		'default' => 'primary-typo',
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Title Font Size', 'milton' ), 
		'desc'	=> esc_html__('Enter your title font size, don\'t include "px" string', 'milton' ), 
		'id'	=> 'slideshow_title_size', 
		'type'	=> 'text_small',
		'default' => '',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '30',
			'max'  => '200',
			'step'  => '1',
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_title' ) ),
 			//'data-conditional-id'    => 'agni_slides_slideshow_repeatable[{#}][slideshow_title]',
		),
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Title Color', 'milton' ), 
		'desc'	=> esc_html__('Choose the color for title', 'milton' ), 
		'id'	=> 'slideshow_title_color', 
		'type'	=> 'colorpicker',
		'default' => '#f0f0f0',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_title' ) ),
 			//'data-conditional-id'    => 'agni_slides_slideshow_repeatable[{#}][slideshow_title]',
 		)
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name' => esc_html__('Description', 'milton' ),
		'id' => 'slideshow_desc',
		'type' => 'textarea_small',
		'sanitization_cb' => false,
		'attributes'  => array(
	        'placeholder' => 'A small amount of text',
	        'rows'        => 2,
	    ),
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name' => esc_html__('Description Font', 'milton' ),
		'desc' => esc_html__('It will apply the font to the Description which you choose at "Milton/Theme Options/General Settings/Typography".', 'milton' ),
		'id' => 'slideshow_desc_font',
		'type' => 'select',
		'options' => array( 
			'primary-typo' => esc_html__('Primary Font', 'milton' ), 
			'default-typo' => esc_html__('Default Font', 'milton' ), 
			'additional-typo' => esc_html__('Additional Font', 'milton' ), 
			'special-typo' => esc_html__('Special Font', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_desc' ) ),
		),
		'default' => 'default-typo',
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Description Font Size', 'milton' ), 
		'desc'	=> esc_html__('Enter your title font size, don\'t include "px" string', 'milton' ), 
		'id'	=> 'slideshow_desc_size', 
		'type'	=> 'text_small',
		'default' => '',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '15',
			'max'  => '60',
			'step'  => '1',
			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_desc' ) ),
 			//'data-conditional-id'    => 'agni_slides_slideshow_repeatable[{#}][slideshow_title]',
		),
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Description Color ', 'milton' ), 
		'desc'	=> esc_html__('choose the description color', 'milton' ), 
		'id'	=> 'slideshow_desc_color', 
		'type'	=> 'colorpicker',
		'default' => '#f0f0f0',
		'attributes' => array(
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_desc' ) ),
 		)
	) );

	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name' => esc_html__('Divide Line', 'milton' ),
		'desc' => esc_html__('Checking this for FadeInUp animation.', 'milton' ),
		'id' => 'slideshow_line',
		'type' => 'checkbox',
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Divide Line Color ', 'milton' ), 
		'desc'	=> esc_html__('choose the description color', 'milton' ), 
		'id'	=> 'slideshow_line_color', 
		'type'	=> 'colorpicker',
		'default' => '#f0f0f0',
		'attributes' => array(
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_line' ) ),
 		)
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('Button 1', 'milton' ), 
		'desc'	=> esc_html__('button 1 info', 'milton' ), 
		'id'	=> 'slideshow_button1', 
		'type'	=> 'text_small'
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('Button 1 Icon', 'milton' ),
		'id'	=> 'slideshow_button1_icon',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('No icon', 'milton' ), 
			'fa fa-play' => esc_html__('Play', 'milton' ), 
			'fa fa-download' => esc_html__('Download', 'milton' ), 
			'fa fa-mobile' => esc_html__('Mobile', 'milton' ), 
			'fa fa-heart' => esc_html__('Heart', 'milton' ), 
			'fa fa-diamond' => esc_html__('Diamond', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
			'data-conditional-id' => json_encode( array( $slideshow_repeatable, 'slideshow_button1' ) ),
		)
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('Button 1 Icon Style', 'milton' ),
		'id'	=> 'slideshow_button1_icon_style',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('Default', 'milton' ), 
			'has-big-btn' => esc_html__('Big Rounded', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
			'data-conditional-id' => json_encode( array( $slideshow_repeatable, 'slideshow_button1_icon' ) ),
		)
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name' => esc_html__('Hide Button 1 Text', 'milton' ),
		'desc' => esc_html__('It will hide the button text.', 'milton' ),
		'id' => 'slideshow_button1_text_hide',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_button1_icon_style' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('Button 1 URL', 'milton' ), 
		'desc'	=> esc_html__('button href', 'milton' ), 
		'id'	=> 'slideshow_button1_url', 
		'type'	=> 'text_url',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_button1' ) ),
 			//'data-conditional-value' => 'on',
 		)
	) );
	
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Button 1 Style', 'milton' ),
		'id'	=> 'slideshow_button1_style',
		'type'	=> 'select',
		'options' => array( 
			'default' => esc_html__('Default', 'milton' ), 
			'primary' => esc_html__('Primary', 'milton' ), 
			'accent' => esc_html__('Accent', 'milton' ), 
			'white' => esc_html__('White', 'milton' ), 
		),
		'default' => 'white',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_button1' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('Button 1 Type', 'milton' ),
		'id'	=> 'slideshow_button1_type',
		'type'	=> 'radio_inline',
		'options' => array( 
			'btn-normal' => esc_html__('background', 'milton' ), 
			'btn-alt' => esc_html__('Bordered', 'milton' ), 
			'btn-plain' => esc_html__('Plain', 'milton' ), 
		),
		'default' => 'btn-alt',
		'attributes' => array(
			'data-conditional-id' => json_encode( array( $slideshow_repeatable, 'slideshow_button1' ) ),
		)
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('Button 1 Radius', 'milton' ), 
		'desc'	=> esc_html__('You can use px, em, %, etc. or enter just number and it will use pixels.', 'milton' ), 
		'id'	=> 'slideshow_button1_radius', 
		'type'	=> 'text_small',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_button1' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Button 1 Target', 'milton' ),
		'id'	=> 'slideshow_button1_target',
		'type'	=> 'select',
		'options' => array( 
			'_self' => esc_html__('Same Window', 'milton' ), 
			'_blank' => esc_html__('New Window', 'milton' ), 
		),
		'default' => '_self',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_button1' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name' => esc_html__('Button 1 has Lightbox Video?', 'milton' ),
		'desc' => esc_html__('Checking this for FadeInDown animation.', 'milton' ),
		'id' => 'slideshow_button1_lightbox',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_button1' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );	
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('Button 2', 'milton' ), 
		'desc'	=> esc_html__('button 2 info', 'milton' ), 
		'id'	=> 'slideshow_button2', 
		'type'	=> 'text_small'
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('Button 2 Icon', 'milton' ),
		'id'	=> 'slideshow_button2_icon',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('No icon', 'milton' ), 
			'fa fa-play' => esc_html__('Play', 'milton' ), 
			'fa fa-download' => esc_html__('Download', 'milton' ), 
			'fa fa-mobile' => esc_html__('Mobile', 'milton' ), 
			'fa fa-heart' => esc_html__('Heart', 'milton' ), 
			'fa fa-diamond' => esc_html__('Diamond', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
			'data-conditional-id' => json_encode( array( $slideshow_repeatable, 'slideshow_button2' ) ),
		)
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('Button 2 Icon Style', 'milton' ),
		'id'	=> 'slideshow_button2_icon_style',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('Default', 'milton' ), 
			'has-big-btn' => esc_html__('Big Rounded', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
			'data-conditional-id' => json_encode( array( $slideshow_repeatable, 'slideshow_button2_icon' ) ),
		)
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name' => esc_html__('Hide Button 2 Text', 'milton' ),
		'desc' => esc_html__('It will hide the button text.', 'milton' ),
		'id' => 'slideshow_button2_text_hide',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_button2_icon_style' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('Button 2 URL', 'milton' ), 
		'desc'	=> esc_html__('button href', 'milton' ), 
		'id'	=> 'slideshow_button2_url', 
		'type'	=> 'text_url',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_button2' ) ),
 			//'data-conditional-value' => 'on',
 		)
	) );
	
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Button 2 Style', 'milton' ),
		'id'	=> 'slideshow_button2_style',
		'type'	=> 'select',
		'options' => array( 
			'default' => esc_html__('Default', 'milton' ), 
			'primary' => esc_html__('Primary', 'milton' ), 
			'accent' => esc_html__('Accent', 'milton' ), 
			'white' => esc_html__('White', 'milton' ), 
		),
		'default' => 'white',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_button2' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('Button 2 Type', 'milton' ),
		'id'	=> 'slideshow_button2_type',
		'type'	=> 'radio_inline',
		'options' => array( 
			'btn-normal' => esc_html__('background', 'milton' ), 
			'btn-alt' => esc_html__('Bordered', 'milton' ), 
			'btn-plain' => esc_html__('Plain', 'milton' ), 
		),
		'default' => 'btn-alt',
		'attributes' => array(
			'data-conditional-id' => json_encode( array( $slideshow_repeatable, 'slideshow_button2' ) ),
		)
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('Button 2 Radius', 'milton' ), 
		'desc'	=> esc_html__('You can use px, em, %, etc. or enter just number and it will use pixels.', 'milton' ), 
		'id'	=> 'slideshow_button2_radius', 
		'type'	=> 'text_small',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_button2' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Button 2 Target', 'milton' ),
		'id'	=> 'slideshow_button2_target',
		'type'	=> 'select',
		'options' => array( 
			'_self' => esc_html__('Same Window', 'milton' ), 
			'_blank' => esc_html__('New Window', 'milton' ), 
		),
		'default' => '_self',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_button2' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );	
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name' => esc_html__('Button 2 has Lightbox Video?', 'milton' ),
		'desc' => esc_html__('Checking this for FadeInDown animation.', 'milton' ),
		'id' => 'slideshow_button2_lightbox',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_button2' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );

	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name' => esc_html__('Text Animation', 'milton' ),
		'desc' => esc_html__('Checking this for FadeInDown animation.', 'milton' ),
		'id' => 'slideshow_animation',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('No Animation', 'milton' ), 
			'fade-in' => esc_html__('fadeIn', 'milton' ), 
			'fade-in-down' => esc_html__('fadeInDown', 'milton' ),
			'fade-in-up' => esc_html__('fadeInUp', 'milton' ),
			'zoom-in' => esc_html__('zoomIn', 'milton' ),
		),
		'default' => '',
	) );

	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array( 
		'name'	=> esc_html__('Bottom Arrow Icon', 'milton' ),
		'id'	=> 'slideshow_arrowicon',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('No icon', 'milton' ), 
			'pe-7s-angle-down' => esc_html__('Angle Down', 'milton' ), 
			'pe-7s-angle-down-circle' => esc_html__('Angle Down Circled', 'milton' ), 
			'ion-ios-arrow-thin-down' => esc_html__('Arrow Down', 'milton' ), 
			'pe-7s-bottom-arrow' => esc_html__('Arrow Down Circled', 'milton' ), 
			'pe-7s-mouse' => esc_html__('Mouse', 'milton' ), 
		),
		'default' => '',
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Bottom Arrow link', 'milton' ), 
		'id'	=> 'slideshow_arrowlink', 
		'type'	=> 'text_url',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $slideshow_repeatable, 'slideshow_arrowicon' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );
	
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Bottom Arrow Color', 'milton' ), 
		'desc'	=> esc_html__('Choose the color for the bottom arrow', 'milton' ), 
		'id'	=> 'slideshow_arrowicon_color', 
		'type'	=> 'colorpicker',
		'attributes' => array(
			//'required' => true, // Will be required only if visible.
			'data-conditional-id' => json_encode( array( $slideshow_repeatable, 'slideshow_arrowicon' ) ),
		)		
	) );
	
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Text Alignment', 'milton' ),
		'id'	=> 'slideshow_text_alignment',
		'type'	=> 'radio_inline',
		'options' => array( 
			'flex-start' => esc_html__( 'Left', 'milton' ), 
			'center' => esc_html__( 'Center', 'milton' ), 
			'flex-end' => esc_html__( 'Right', 'milton' ), 
		),
		'default'  => 'flex-start'
	) );
	
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Vertical Alignment', 'milton' ),
		'id'	=> 'slideshow_vertical_alignment',
		'type'	=> 'radio_inline',
		'options' => array( 
			'flex-start' => esc_html__( 'Top', 'milton' ), 
			'center' => esc_html__( 'Center', 'milton' ), 
			'flex-end' => esc_html__( 'Bottom', 'milton' ), 
		),
		'default'  => 'center'
	) );

	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		'name'	=> esc_html__('Padding Values', 'milton' ), 
		'desc'	=> esc_html__('Padding Top. You can use px, em, %, etc. or enter just number and it will use pixels.', 'milton' ), 
		'id'	=> 'slideshow_padding_top', 
		'type'	=> 'text_small',
		'default' => '0',
		'row_classes' => 'agni-slide-col agni-slide-padding-top',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-padding-container">'
	) );

	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		//'name'	=> esc_html__('Padding Right', 'milton' ), 
		'desc'	=> esc_html__('Padding Right', 'milton' ), 
		'id'	=> 'slideshow_padding_right', 
		'type'	=> 'text_small',
		'default' => '0',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-padding-right'
		
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		//'name'	=> esc_html__('Padding Bottom', 'milton' ), 
		'desc'	=> esc_html__('Padding Bottom', 'milton' ), 
		'id'	=> 'slideshow_padding_bottom', 
		'type'	=> 'text_small',
		'default' => '0',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-padding-bottom',
	) );
	$slideshow_slider_options->add_group_field( $slideshow_repeatable, array(
		//'name'	=> esc_html__('Padding Left', 'milton' ), 
		'desc'	=> esc_html__('Padding Left', 'milton' ), 
		'id'	=> 'slideshow_padding_left', 
		'type'	=> 'text_small',
		'default' => '0',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-padding-left',
		'after_row' => '</div>'
	) );

	$slideshow_slider_options->add_field( array(
		'name'	=> esc_html__('Slider Choice', 'milton' ),
		'id'	=> $prefix.'slideshow_choice',
		'type'	=> 'radio_inline',
		'options' => array( 
			'1' => esc_html__('Full Height(100%)', 'milton' ), 
			'2' => esc_html__('Custom Height', 'milton' ), 
		),
		'default' => '1',
		'before_row' => '<h3>Basic Options</h3>'
	) );
	$slideshow_slider_options->add_field( array( 
		'name'	=> esc_html__('Slider Height', 'milton' ), 
		'desc'	=> esc_html__('Enter your slider height, don\'t include "px" string', 'milton' ), 
		'id'	=> $prefix.'slideshow_height', 
		'type'	=> 'text_small',
		'default' => '600',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'slideshow_choice',
			'data-conditional-value' => '2',
		),
		'row_classes' => 'agni-slide-col agni-slide-height-desktop',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-height-container">'
	) );
	$slideshow_slider_options->add_field( array( 
		'name'	=> esc_html__('Slider Height(Tablet devices)', 'milton' ), 
		'desc'	=> esc_html__('Height on Tablets', 'milton' ), 
		'id'	=> $prefix.'slideshow_height_tab', 
		'type'	=> 'text_small',
		'default' => '480',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'slideshow_choice',
			'data-conditional-value' => '2',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-height-tab',
	) );
	$slideshow_slider_options->add_field( array( 
		'name'	=> esc_html__('Slider Height(Mobile devices)', 'milton' ), 
		'desc'	=> esc_html__('Height on Mobiles', 'milton' ), 
		'id'	=> $prefix.'slideshow_height_mobile', 
		'type'	=> 'text_small',
		'default' => '360',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'slideshow_choice',
			'data-conditional-value' => '2',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-height-mobile',
		'after_row' => '</div>'
	) );
	$slideshow_slider_options->add_field( array(
		'name' => esc_html__('Carousel', 'milton' ),
		'desc' => esc_html__('To use slider as a carousel enable this.', 'milton' ),
		'id' => $prefix.'slideshow_carousel',
		'type' => 'checkbox',
	) );
	$slideshow_slider_options->add_field( array( 
		'name'	=> esc_html__('Carousel Items', 'milton' ), 
		'desc'	=> esc_html__('Items per row', 'milton' ), 
		'id'	=> $prefix.'slideshow_carousel_992', 
		'type'	=> 'text_small',
		'default' => '3',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '1',
			'max'  => '5',
			'step'  => '1',
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'slideshow_carousel',
			'data-conditional-value' => 'on',
		),
		'row_classes' => 'agni-slide-col agni-slide-height-desktop',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-height-container">'
	) );
	$slideshow_slider_options->add_field( array( 
		'name'	=> esc_html__('Carousel Items(Tablets)', 'milton' ), 
		'desc'	=> esc_html__('Items per row on Tablets', 'milton' ), 
		'id'	=> $prefix.'slideshow_carousel_768', 
		'type'	=> 'text_small',
		'default' => '2',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '1',
			'max'  => '4',
			'step'  => '1',
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'slideshow_carousel',
			'data-conditional-value' => 'on',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-height-tab',
	) );
	$slideshow_slider_options->add_field( array( 
		'name'	=> esc_html__('Carousel Items(Mobile)', 'milton' ), 
		'desc'	=> esc_html__('Items per row on Mobiles', 'milton' ), 
		'id'	=> $prefix.'slideshow_carousel_0', 
		'type'	=> 'text_small',
		'default' => '1',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '1',
			'max'  => '3',
			'step'  => '1',
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'slideshow_carousel',
			'data-conditional-value' => 'on',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-height-mobile',
		'after_row' => '</div>'
	) );
	$slideshow_slider_options->add_field( array(
		'name' => esc_html__('Margin(Gutter)', 'milton' ),
		'desc' => esc_html__('Enter the margin amount between each item.', 'milton' ),
		'id' => $prefix.'slideshow_carousel_margin',
		'type' => 'text_small',
		'default' => '0',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '0',
			'max'  => '45',
			'step'  => '1',
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'slideshow_carousel',
			'data-conditional-value' => 'on',
		),
	) );
	$slideshow_slider_options->add_field( array(
		'name' => esc_html__('Parallax', 'milton' ),
		'desc' => esc_html__('Check this to enable parallax, its purely based on skrollr.', 'milton' ),
		'id' => $prefix.'slideshow_parallax',
		'type' => 'checkbox',
	) );
	$slideshow_slider_options->add_field( array( 
		'name'	=> esc_html__('Parallax Value', 'milton' ), 
		'desc'	=> esc_html__('Enter the css property for the slider\'s top at the top of the screen. for eg.transform:translateY(0px); if don\'t want parallax just leave this empty', 'milton' ), 
		'id'	=> $prefix.'slideshow_parallax_start', 
		'type'	=> 'textarea_small',
		'default'  => 'transform:translateY(0px);',
		'attributes' => array(
	        'rows'        => 2,
	        'placeholder' => 'Parallax Starting Value',
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'slideshow_parallax',
		),
		'row_classes' => 'agni-slide-col agni-slide-parallax-start',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-parallax-container">'
	) );
	
	$slideshow_slider_options->add_field( array( 
		'name'	=> esc_html__('Parallax End Value', 'milton' ), 
		'desc'	=> esc_html__('Enter the css property for the slider\'s bottom when at the top of the screen. for eg.transform:translateY(600px); if don\'t want parallax just leave this empty', 'milton' ), 
		'id'	=> $prefix.'slideshow_parallax_end', 
		'type'	=> 'textarea_small',
		'default'  => 'transform:translateY(600px);',
		'attributes' => array(
			'rows'        => 2,
			'placeholder' => 'Parallax End Value',
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'slideshow_parallax',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-parallax-end',
		'after_row' => '</div>'
	) );
	$slideshow_slider_options->add_field( array(
		'name'	=> esc_html__('Autoplay', 'milton' ),
		'id'	=> $prefix.'slideshow_autoplay',
		'type'	=> 'checkbox',
	) );
	$slideshow_slider_options->add_field( array(
		'name'	=> esc_html__('Loop', 'milton' ),
		'id'	=> $prefix.'slideshow_loop',
		'type'	=> 'checkbox',
	) );
	$slideshow_slider_options->add_field( array( 
		'name'	=> esc_html__('Transition Duration & Speed', 'milton' ), 
		'desc'	=> esc_html__('Enter your transition duration in ms.', 'milton' ), 
		'id'	=> $prefix.'slideshow_transition_duration', 
		'type'	=> 'text_small',
		'default' => '6000',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '3000',
			'max'  => '20000',
			'step'  => '100'
		),
		'row_classes' => 'agni-slide-col agni-slide-animate-in',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-animate-container">'
	) );
	$slideshow_slider_options->add_field( array( 
		'name'	=> esc_html__('Transition Speed', 'milton' ), 
		'desc'	=> esc_html__('Enter your transition speed in ms.', 'milton' ), 
		'id'	=> $prefix.'slideshow_transition_speed', 
		'type'	=> 'text_small',
		'default' => '400',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '100',
			'max'  => '1200',
			'step'  => '10'
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-animate-out',
		'after_row' => '</div>'
	) );
	$slideshow_slider_options->add_field( array(
		'name'	=> esc_html__('Animation In & Out', 'milton' ),
		'id'	=> $prefix.'slideshow_animate_in',
		'type'	=> 'select',
		'options' => array( 
			'fadeIn' => esc_html__('fadeIn', 'milton' ), 
			'fadeInDown' => esc_html__('fadeInDown', 'milton' ),
			'fadeInRight' => esc_html__('fadeInRight', 'milton' ),
			'fadeInLeft' => esc_html__('fadeInLeft', 'milton' ),
			'fadeInUp' => esc_html__('fadeInUp', 'milton' ),
			'flipInX' => esc_html__('flipInX', 'milton' ),
			'slideInUp' => esc_html__('slideInUp', 'milton' ),
			'slideInDown' => esc_html__('slideInDown', 'milton' ),
			'slideInLeft' => esc_html__('slideInLeft', 'milton' ),
			'slideInRight' => esc_html__('slideInRight', 'milton' ),
			'zoomIn' => esc_html__('zoomIn', 'milton' ),
		),
		'default' => 'slideInRight',
		'row_classes' => 'agni-slide-col agni-slide-animate-in',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-animate-container">'
	) );
	$slideshow_slider_options->add_field( array(
		'name'	=> esc_html__('Animation Out', 'milton' ),
		'id'	=> $prefix.'slideshow_animate_out',
		'type'	=> 'select',
		'options' => array( 
			'fadeOut' => esc_html__('fadeOut', 'milton' ), 
			'fadeOutDown' => esc_html__('fadeOutDown', 'milton' ),
			'fadeOutRight' => esc_html__('fadeOutRight', 'milton' ),
			'fadeOutLeft' => esc_html__('fadeOutLeft', 'milton' ),
			'fadeOutUp' => esc_html__('fadeOutUp', 'milton' ),
			'flipOutX' => esc_html__('flipOutX', 'milton' ),
			'slideOutUp' => esc_html__('slideOutUp', 'milton' ),
			'slideOutDown' => esc_html__('slideOutDown', 'milton' ),
			'slideOutLeft' => esc_html__('slideOutLeft', 'milton' ),
			'slideOutRight' => esc_html__('slideOutRight', 'milton' ),
			'zoomOut' => esc_html__('zoomOut', 'milton' ),
		),
		'default' => 'slideOutLeft',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-animate-out',
		'after_row' => '</div>'
	) );
	$slideshow_slider_options->add_field( array(
		'name'	=> esc_html__('Navigation Arrows', 'milton' ),
		'id'	=> $prefix.'slideshow_navigation',
		'type'	=> 'checkbox',
	) );
	$slideshow_slider_options->add_field( array(
		'name'	=> esc_html__('Pagination Dots', 'milton' ),
		'id'	=> $prefix.'slideshow_pagination',
		'type'	=> 'checkbox',
	) );
	$slideshow_slider_options->add_field( array(
		'name'	=> esc_html__('Mouse Drag', 'milton' ),
		'id'	=> $prefix.'slideshow_mousedrag',
		'type'	=> 'checkbox',
	) );
	
	// Text Slider
	$textslider_slider_options = new_cmb2_box( array(
		'id'            => $prefix . 'textslider_options',
		'title'         => esc_html__( 'Text Slider Options', 'milton' ),
		'object_types'  => array( 'agni_slides' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );
	
	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$textslider_repeatable = $textslider_slider_options->add_field( array(
		'id'          => $prefix . 'textslider_repeatable',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => esc_html__( 'Slide {#}', 'milton' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add another Slide', 'milton' ),
			'remove_button' => esc_html__( 'Remove Slide', 'milton' ),
			'sortable'      => true, // beta
		),
	) );

	/**
	 * Group fields works the same, except ids only need
	 * to be unique to the group. Prefix is not needed.
	 *
	 * The parent field's id needs to be passed as the first argument.
	 */

	$textslider_slider_options->add_group_field( $textslider_repeatable, array( 
        'name'  => esc_html__('Image', 'milton' ), 
        'id'    => 'textslider_image', 
        'type'  => 'file',
        'before_row' => '<h3>Content Options</h3>'
    ) );
    $textslider_slider_options->add_group_field( $textslider_repeatable, array( 
        'name'  => esc_html__('Max Image width', 'milton' ), 
        'desc'  => esc_html__('Enter your image width, don\'t include "px" string', 'milton' ), 
        'id'    => 'textslider_image_size', 
        'type'  => 'text_small',
        'default' => '240',
        'attributes' => array(
            'type'  => 'number',
            'min'  => '100',
            'max'  => '1000',
            'step'  => '5',
            //'required' => true,
            'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_image' ) ),
        ),
        'row_classes' => 'agni-slide-col agni-slide-height-desktop',
        'before_row' => '<div class="cmb-row agni-slide-row agni-slide-height-container">'
    ) );
    $textslider_slider_options->add_group_field( $textslider_repeatable, array( 
        //'name'  => esc_html__('Max Image width', 'milton' ), 
        'desc'  => esc_html__('Enter your image width for tablets', 'milton' ), 
        'id'    => 'textslider_image_size_tab', 
        'type'  => 'text_small',
        'default' => '160',
        'attributes' => array(
            'type'  => 'number',
            'min'  => '40',
            'max'  => '700',
            'step'  => '5',
            //'required' => true,
            'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_image' ) ),
        ),
        'show_names' => false,
        'row_classes' => 'agni-slide-col agni-slide-height-tab',
    ) );
    $textslider_slider_options->add_group_field( $textslider_repeatable, array( 
        //'name'  => esc_html__('Max Image width', 'milton' ), 
        'desc'  => esc_html__('Enter your image width for mobiles', 'milton' ), 
        'id'    => 'textslider_image_size_mobile', 
        'type'  => 'text_small',
        'default' => '100',
        'attributes' => array(
            'type'  => 'number',
            'min'  => '20',
            'max'  => '300',
            'step'  => '5',
            //'required' => true,
            'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_image' ) ),
        ),
        'show_names' => false,
        'row_classes' => 'agni-slide-col agni-slide-height-mobile',
        'after_row' => '</div>'
    ) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name' => esc_html__('Title', 'milton' ),
		'desc' => esc_html__('To use a text effect. Add the texts with delimiter "|" inside <span> tag. For ex. Hello, <span>This is|Sample|Text</span>', 'milton' ),
		'id' => 'textslider_title',
		'type' => 'text',
		'sanitization_cb' => false,
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name' => esc_html__('Title Rotator', 'milton' ),
		'desc' => esc_html__('Check this for Title rotator. it enables the text effects to the title.', 'milton' ),
		'id' => 'textslider_title_rotator',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_title' ) ),
		),
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name'	=> esc_html__('Choose Rotator Effect', 'milton' ),
		'id'	=> 'textslider_title_rotator_choice',
		'type'	=> 'select',
		'options' => array( 
			'type letters' => esc_html__('Type', 'milton' ), 
			'zoom' => esc_html__('Zoom', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_title_rotator' ) ),
		),
		'default'  => 'scale letters'
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name' => esc_html__('Title Font', 'milton' ),
		'desc' => esc_html__('It will apply the font to the Title which you choose at "Milton/Theme Options/General Settings/Typography".', 'milton' ),
		'id' => 'textslider_title_font',
		'type' => 'select',
		'options' => array( 
			'primary-typo' => esc_html__('Primary Font', 'milton' ), 
			'default-typo' => esc_html__('Default Font', 'milton' ), 
			'additional-typo' => esc_html__('Additional Font', 'milton' ), 
			'special-typo' => esc_html__('Special Font', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_title' ) ),
		),
		'default' => 'primary-typo',
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name'	=> esc_html__('Title Font Size', 'milton' ), 
		'desc'	=> esc_html__('Enter your title font size, don\'t include "px" string', 'milton' ), 
		'id'	=> 'textslider_title_size', 
		'type'	=> 'text_small',
		'default' => '',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '30',
			'max'  => '200',
			'step'  => '1',
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_title' ) ),
 			//'data-conditional-id'    => 'agni_slides_textslider_repeatable[{#}][textslider_title]',
		),
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name'	=> esc_html__('Title Color', 'milton' ), 
		'desc'	=> esc_html__('Choose the color for title', 'milton' ), 
		'id'	=> 'textslider_title_color', 
		'type'	=> 'colorpicker',
		'default' => '#f0f0f0',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_title' ) ),
 			//'data-conditional-id'    => 'agni_slides_textslider_repeatable[{#}][textslider_title]',
 		)
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name' => esc_html__('Description', 'milton' ),
		'id' => 'textslider_desc',
		'type' => 'textarea_small',
		'sanitization_cb' => false,
		'attributes'  => array(
	        'placeholder' => 'A small amount of text',
	        'rows'        => 2,
	    ),
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name' => esc_html__('Description Font', 'milton' ),
		'desc' => esc_html__('It will apply the font to the Description which you choose at "Milton/Theme Options/General Settings/Typography".', 'milton' ),
		'id' => 'textslider_desc_font',
		'type' => 'select',
		'options' => array( 
			'primary-typo' => esc_html__('Primary Font', 'milton' ), 
			'default-typo' => esc_html__('Default Font', 'milton' ), 
			'additional-typo' => esc_html__('Additional Font', 'milton' ), 
			'special-typo' => esc_html__('Special Font', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_desc' ) ),
		),
		'default' => 'default-typo',
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name'	=> esc_html__('Description Font Size', 'milton' ), 
		'desc'	=> esc_html__('Enter your title font size, don\'t include "px" string', 'milton' ), 
		'id'	=> 'textslider_desc_size', 
		'type'	=> 'text_small',
		'default' => '',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '15',
			'max'  => '60',
			'step'  => '1',
			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_desc' ) ),
 			//'data-conditional-id'    => 'agni_slides_textslider_repeatable[{#}][textslider_title]',
		),
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name'	=> esc_html__('Description Color ', 'milton' ), 
		'desc'	=> esc_html__('choose the description color', 'milton' ), 
		'id'	=> 'textslider_desc_color', 
		'type'	=> 'colorpicker',
		'default' => '#f0f0f0',
		'attributes' => array(
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_desc' ) ),
 		)
	) );

	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name' => esc_html__('Divide Line', 'milton' ),
		'desc' => esc_html__('Checking this for FadeInUp animation.', 'milton' ),
		'id' => 'textslider_line',
		'type' => 'checkbox',
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name'	=> esc_html__('Divide Line Color ', 'milton' ), 
		'desc'	=> esc_html__('choose the description color', 'milton' ), 
		'id'	=> 'textslider_line_color', 
		'type'	=> 'colorpicker',
		'default' => '#f0f0f0',
		'attributes' => array(
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_line' ) ),
 		)
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array( 
		'name'	=> esc_html__('Button 1', 'milton' ), 
		'desc'	=> esc_html__('button 1 info', 'milton' ), 
		'id'	=> 'textslider_button1', 
		'type'	=> 'text_small'
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array( 
		'name'	=> esc_html__('Button 1 Icon', 'milton' ),
		'id'	=> 'textslider_button1_icon',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('No icon', 'milton' ), 
			'fa fa-play' => esc_html__('Play', 'milton' ), 
			'fa fa-download' => esc_html__('Download', 'milton' ), 
			'fa fa-mobile' => esc_html__('Mobile', 'milton' ), 
			'fa fa-heart' => esc_html__('Heart', 'milton' ), 
			'fa fa-diamond' => esc_html__('Diamond', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
			'data-conditional-id' => json_encode( array( $textslider_repeatable, 'textslider_button1' ) ),
		)
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array( 
		'name'	=> esc_html__('Button 1 Icon Style', 'milton' ),
		'id'	=> 'textslider_button1_icon_style',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('Default', 'milton' ), 
			'has-big-btn' => esc_html__('Big Rounded', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
			'data-conditional-id' => json_encode( array( $textslider_repeatable, 'textslider_button1_icon' ) ),
		)
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array( 
		'name' => esc_html__('Hide Button 1 Text', 'milton' ),
		'desc' => esc_html__('It will hide the button text.', 'milton' ),
		'id' => 'textslider_button1_text_hide',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_button1_icon_style' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array( 
		'name'	=> esc_html__('Button 1 URL', 'milton' ), 
		'desc'	=> esc_html__('button href', 'milton' ), 
		'id'	=> 'textslider_button1_url', 
		'type'	=> 'text_url',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_button1' ) ),
 			//'data-conditional-value' => 'on',
 		)
	) );
	
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name'	=> esc_html__('Button 1 Style', 'milton' ),
		'id'	=> 'textslider_button1_style',
		'type'	=> 'select',
		'options' => array( 
			'default' => esc_html__('Default', 'milton' ), 
			'primary' => esc_html__('Primary', 'milton' ), 
			'accent' => esc_html__('Accent', 'milton' ), 
			'white' => esc_html__('White', 'milton' ), 
		),
		'default' => 'white',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_button1' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array( 
		'name'	=> esc_html__('Button 1 Type', 'milton' ),
		'id'	=> 'textslider_button1_type',
		'type'	=> 'radio_inline',
		'options' => array( 
			'btn-normal' => esc_html__('background', 'milton' ), 
			'btn-alt' => esc_html__('Bordered', 'milton' ), 
			'btn-plain' => esc_html__('Plain', 'milton' ), 
		),
		'default' => 'btn-alt',
		'attributes' => array(
			'data-conditional-id' => json_encode( array( $textslider_repeatable, 'textslider_button1' ) ),
		)
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array( 
		'name'	=> esc_html__('Button 1 Radius', 'milton' ), 
		'desc'	=> esc_html__('You can use px, em, %, etc. or enter just number and it will use pixels.', 'milton' ), 
		'id'	=> 'textslider_button1_radius', 
		'type'	=> 'text_small',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_button1' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name'	=> esc_html__('Button 1 Target', 'milton' ),
		'id'	=> 'textslider_button1_target',
		'type'	=> 'select',
		'options' => array( 
			'_self' => esc_html__('Same Window', 'milton' ), 
			'_blank' => esc_html__('New Window', 'milton' ), 
		),
		'default' => '_self',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_button1' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name' => esc_html__('Button 1 has Lightbox Video?', 'milton' ),
		'desc' => esc_html__('Checking this for FadeInDown animation.', 'milton' ),
		'id' => 'textslider_button1_lightbox',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_button1' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );	
	$textslider_slider_options->add_group_field( $textslider_repeatable, array( 
		'name'	=> esc_html__('Button 2', 'milton' ), 
		'desc'	=> esc_html__('button 2 info', 'milton' ), 
		'id'	=> 'textslider_button2', 
		'type'	=> 'text_small'
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array( 
		'name'	=> esc_html__('Button 2 Icon', 'milton' ),
		'id'	=> 'textslider_button2_icon',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('No icon', 'milton' ), 
			'fa fa-play' => esc_html__('Play', 'milton' ), 
			'fa fa-download' => esc_html__('Download', 'milton' ), 
			'fa fa-mobile' => esc_html__('Mobile', 'milton' ), 
			'fa fa-heart' => esc_html__('Heart', 'milton' ), 
			'fa fa-diamond' => esc_html__('Diamond', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
			'data-conditional-id' => json_encode( array( $textslider_repeatable, 'textslider_button2' ) ),
		)
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array( 
		'name'	=> esc_html__('Button 2 Icon Style', 'milton' ),
		'id'	=> 'textslider_button2_icon_style',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('Default', 'milton' ), 
			'has-big-btn' => esc_html__('Big Rounded', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
			'data-conditional-id' => json_encode( array( $textslider_repeatable, 'textslider_button2_icon' ) ),
		)
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array( 
		'name' => esc_html__('Hide Button 2 Text', 'milton' ),
		'desc' => esc_html__('It will hide the button text.', 'milton' ),
		'id' => 'textslider_button2_text_hide',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_button2_icon_style' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array( 
		'name'	=> esc_html__('Button 2 URL', 'milton' ), 
		'desc'	=> esc_html__('button href', 'milton' ), 
		'id'	=> 'textslider_button2_url', 
		'type'	=> 'text_url',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_button2' ) ),
 			//'data-conditional-value' => 'on',
 		)
	) );
	
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name'	=> esc_html__('Button 2 Style', 'milton' ),
		'id'	=> 'textslider_button2_style',
		'type'	=> 'select',
		'options' => array( 
			'default' => esc_html__('Default', 'milton' ), 
			'primary' => esc_html__('Primary', 'milton' ), 
			'accent' => esc_html__('Accent', 'milton' ), 
			'white' => esc_html__('White', 'milton' ), 
		),
		'default' => 'white',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_button2' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array( 
		'name'	=> esc_html__('Button 2 Type', 'milton' ),
		'id'	=> 'textslider_button2_type',
		'type'	=> 'radio_inline',
		'options' => array( 
			'btn-normal' => esc_html__('background', 'milton' ), 
			'btn-alt' => esc_html__('Bordered', 'milton' ), 
			'btn-plain' => esc_html__('Plain', 'milton' ), 
		),
		'default' => 'btn-alt',
		'attributes' => array(
			'data-conditional-id' => json_encode( array( $textslider_repeatable, 'textslider_button2' ) ),
		)
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array( 
		'name'	=> esc_html__('Button 2 Radius', 'milton' ), 
		'desc'	=> esc_html__('You can use px, em, %, etc. or enter just number and it will use pixels.', 'milton' ), 
		'id'	=> 'textslider_button2_radius', 
		'type'	=> 'text_small',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_button2' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name'	=> esc_html__('Button 2 Target', 'milton' ),
		'id'	=> 'textslider_button2_target',
		'type'	=> 'select',
		'options' => array( 
			'_self' => esc_html__('Same Window', 'milton' ), 
			'_blank' => esc_html__('New Window', 'milton' ), 
		),
		'default' => '_self',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_button2' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );	
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name' => esc_html__('Button 2 has Lightbox Video?', 'milton' ),
		'desc' => esc_html__('Checking this for FadeInDown animation.', 'milton' ),
		'id' => 'textslider_button2_lightbox',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_button2' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );

	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name' => esc_html__('Text Animation', 'milton' ),
		'desc' => esc_html__('Checking this for FadeInDown animation.', 'milton' ),
		'id' => 'textslider_animation',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('No Animation', 'milton' ), 
			'fade-in' => esc_html__('fadeIn', 'milton' ), 
			'fade-in-down' => esc_html__('fadeInDown', 'milton' ),
			'fade-in-up' => esc_html__('fadeInUp', 'milton' ),
			'zoom-in' => esc_html__('zoomIn', 'milton' ),
		),
		'default' => '',
	) );

	$textslider_slider_options->add_group_field( $textslider_repeatable, array( 
		'name'	=> esc_html__('Bottom Arrow Icon', 'milton' ),
		'id'	=> 'textslider_arrowicon',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('No icon', 'milton' ), 
			'pe-7s-angle-down' => esc_html__('Angle Down', 'milton' ), 
			'pe-7s-angle-down-circle' => esc_html__('Angle Down Circled', 'milton' ), 
			'ion-ios-arrow-thin-down' => esc_html__('Arrow Down', 'milton' ), 
			'pe-7s-bottom-arrow' => esc_html__('Arrow Down Circled', 'milton' ), 
			'pe-7s-mouse' => esc_html__('Mouse', 'milton' ), 
		),
		'default' => '',
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name'	=> esc_html__('Bottom Arrow link', 'milton' ), 
		'id'	=> 'textslider_arrowlink', 
		'type'	=> 'text_url',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $textslider_repeatable, 'textslider_arrowicon' ) ),
 			//'data-conditional-value' => 'on',
 		),
	) );
	
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name'	=> esc_html__('Bottom Arrow Color', 'milton' ), 
		'desc'	=> esc_html__('Choose the color for the bottom arrow', 'milton' ), 
		'id'	=> 'textslider_arrowicon_color', 
		'type'	=> 'colorpicker',
		'attributes' => array(
			//'required' => true, // Will be required only if visible.
			'data-conditional-id' => json_encode( array( $textslider_repeatable, 'textslider_arrowicon' ) ),
		)		
	) );
	
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name'	=> esc_html__('Text Alignment', 'milton' ),
		'id'	=> 'textslider_text_alignment',
		'type'	=> 'radio_inline',
		'options' => array( 
			'flex-start' => esc_html__( 'Left', 'milton' ), 
			'center' => esc_html__( 'Center', 'milton' ), 
			'flex-end' => esc_html__( 'Right', 'milton' ), 
		),
		'default'  => 'flex-start'
	) );
	
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name'	=> esc_html__('Vertical Alignment', 'milton' ),
		'id'	=> 'textslider_vertical_alignment',
		'type'	=> 'radio_inline',
		'options' => array( 
			'flex-start' => esc_html__( 'Top', 'milton' ), 
			'center' => esc_html__( 'Center', 'milton' ), 
			'flex-end' => esc_html__( 'Bottom', 'milton' ), 
		),
		'default'  => 'center'
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		'name'	=> esc_html__('Padding Values', 'milton' ), 
		'desc'	=> esc_html__('Padding Top. You can use px, em, %, etc. or enter just number and it will use pixels.', 'milton' ), 
		'id'	=> 'textslider_padding_top', 
		'type'	=> 'text_small',
		'default' => '0',
		'row_classes' => 'agni-slide-col agni-slide-padding-top',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-padding-container">'
	) );

	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		//'name'	=> esc_html__('Padding Right', 'milton' ), 
		'desc'	=> esc_html__('Padding Right', 'milton' ), 
		'id'	=> 'textslider_padding_right', 
		'type'	=> 'text_small',
		'default' => '0',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-padding-right'
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		//'name'	=> esc_html__('Padding Bottom', 'milton' ), 
		'desc'	=> esc_html__('Padding Bottom', 'milton' ), 
		'id'	=> 'textslider_padding_bottom', 
		'type'	=> 'text_small',
		'default' => '0',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-padding-bottom',
	) );
	$textslider_slider_options->add_group_field( $textslider_repeatable, array(
		//'name'	=> esc_html__('Padding Left', 'milton' ), 
		'desc'	=> esc_html__('Padding Left', 'milton' ), 
		'id'	=> 'textslider_padding_left', 
		'type'	=> 'text_small',
		'default' => '0',
		'row_classes' => 'agni-slide-col agni-slide-padding-left',
		'after_row' => '</div>'
	) );

	$textslider_slider_options->add_field( array(
		'name'	=> esc_html__('Background Choice', 'milton' ),
		'id'	=> $prefix.'textslider_bg_choice',
		'type'	=> 'radio_inline',
		'options' => array( 
			'bg_color' => esc_html__('BG Color', 'milton' ), 
			'bg_image' => esc_html__('BG Image', 'milton' ), 
			'bg_video' => esc_html__('BG Video', 'milton' ), 
		),
		'default'  => 'bg_image',
		'before_row' => '<h3>Background Options</h3>'
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Background Color', 'milton' ), 
		'id'	=> $prefix.'textslider_bg_color', 
		'type'	=> 'colorpicker',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'textslider_bg_choice' ,
 			'data-conditional-value' => 'bg_color',
 		)
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Background Image', 'milton' ), 
		'id'	=> $prefix.'textslider_bg_image', 
		'type'	=> 'file',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'textslider_bg_choice' ,
 			'data-conditional-value' => 'bg_image',
 		)
	) );
	$textslider_slider_options->add_field( array(
		'name'	=> esc_html__('Background Position', 'milton' ),
		'id'	=> $prefix.'textslider_bg_image_position',
		'type'	=> 'select',
		'options' => array( 
			'left top' => esc_html__('left top', 'milton' ), 
			'left center' => esc_html__('left center', 'milton' ), 
			'left bottom' => esc_html__('left bottom', 'milton' ), 
			'right top' => esc_html__('right top', 'milton' ), 
			'right center' => esc_html__('right center', 'milton' ), 
			'right bottom' => esc_html__('right bottom', 'milton' ), 
			'center top' => esc_html__('center top', 'milton' ), 
			'center center' => esc_html__('center center', 'milton' ), 
			'center bottom' => esc_html__('center bottom', 'milton' ), 
		),
		'default' => 'center center',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix . 'textslider_bg_image' ,
 		),
	) );
	$textslider_slider_options->add_field( array(
		'name'	=> esc_html__('Background Repeat', 'milton' ),
		'id'	=> $prefix.'textslider_bg_image_repeat',
		'type'	=> 'select',
		'options' => array( 
			'repeat' => esc_html__('repeat', 'milton' ), 
			'no-repeat' => esc_html__('no-repeat', 'milton' ), 
		),
		'default' => 'repeat',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix . 'textslider_bg_image' ,
 		),
	) );
	$textslider_slider_options->add_field( array(
		'name'	=> esc_html__('Background Size', 'milton' ),
		'id'	=> $prefix.'textslider_bg_image_size',
		'type'	=> 'select',
		'options' => array( 
			'cover' => esc_html__('cover', 'milton' ), 
			'auto' => esc_html__('auto', 'milton' ), 
		),
		'default' => 'cover',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix . 'textslider_bg_image' ,
 		),
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Background Video Source', 'milton' ),
		'id'	=> $prefix.'textslider_bg_video_src', 
		'type'	=> 'radio_inline',
		'options' => array( 
			'' => esc_html__('No Source', 'milton' ), 
			'1' => esc_html__('YouTube', 'milton' ), 
			'2' => esc_html__('Selfhosted/Vimeo', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'textslider_bg_choice' ,
 			'data-conditional-value' => 'bg_video',
 		)
	) );
	$textslider_slider_options->add_field( array(  
		'name'	=> esc_html__('Video URL', 'milton' ), 
		'desc'	=> esc_html__('video url only from youtube!', 'milton' ), 
		'id'	=> $prefix.'textslider_bg_video_src_yt', 
		'type'	=> 'text_url',
		'attributes' => array(
			//'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'textslider_bg_video_src' ,
			'data-conditional-value' => '1',
		)
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Fallback image for mobile & tablets', 'milton' ), 
		'id'	=> $prefix.'textslider_bg_video_src_yt_fallback', 
		'type'	=> 'file',
		'attributes' => array(
			'data-conditional-id' => $prefix . 'textslider_bg_video_src_yt' ,
		)
	) );
	$textslider_slider_options->add_field( array(  
		'name'	=> esc_html__('Video URL', 'milton' ), 
		'desc'	=> esc_html__('Choose the media from your local server', 'milton' ), 
		'id'	=> $prefix.'textslider_bg_video_src_sh',
		'type'	=> 'file',
		'attributes' => array(
			'data-conditional-id' => $prefix . 'textslider_bg_video_src' ,
			'data-conditional-value' => '2',
		)
	) );
	
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Poster URL', 'milton' ), 
		'desc'	=> esc_html__('This poster will be displayed before video get started', 'milton' ),
		'id'	=> $prefix.'textslider_bg_video_src_sh_poster', 
		'type'	=> 'file',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'textslider_bg_video_src_sh' ,
		)
	) );

	$textslider_slider_options->add_field( array(
		'name' => esc_html__('Autoplay', 'milton' ),
		'desc' => esc_html__('Enable to make video autoplay.', 'milton' ),
		'id' => $prefix.'textslider_bg_video_autoplay',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'textslider_bg_video_src' ,
 			'data-conditional-value' => json_encode(array('1', '2')),
 		)
	) );
	$textslider_slider_options->add_field( array(
		'name' => esc_html__('Loop', 'milton' ),
		'desc' => esc_html__('Enable to make video loop.', 'milton' ),
		'id' => $prefix.'textslider_bg_video_loop',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'textslider_bg_video_src' ,
 			'data-conditional-value' => json_encode(array('1', '2')),
 		)
	) );
	$textslider_slider_options->add_field( array(
		'name' => esc_html__('Muted', 'milton' ),
		'desc' => esc_html__('Enable to make video quiet.', 'milton' ),
		'id' => $prefix.'textslider_bg_video_muted',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'textslider_bg_video_src' ,
 			'data-conditional-value' => json_encode(array('1', '2')),
 		)
	) );

	$textslider_slider_options->add_field( array(
		'name'	=> esc_html__('Volumne Level', 'milton' ), 
		'desc'	=> esc_html__('Enter your volume level. it will not applicable if video is muted.', 'milton' ), 
		'id'	=> $prefix.'textslider_bg_video_volume', 
		'type'	=> 'text_small',
		'default' => '50',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '0',
			'max'  => '100',
			'step'  => '1',
			'data-conditional-id'    => $prefix . 'textslider_bg_video_src' ,
			'data-conditional-value' => '1',
		),
	) );

	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Video Quality', 'milton' ),
		'desc'	=> esc_html__('choose your video quality by default.', 'milton' ),
		'id'	=> $prefix.'textslider_bg_video_quality', 
		'type'	=> 'radio_inline',
		'options' => array( 
			'default' => esc_html__('Default', 'milton' ), 
			'hd720' => esc_html__('HD 720p', 'milton' ), 
			'hd1080' => esc_html__('FullHD 1080p', 'milton' ), 
		),
		'default' => 'default',
		'attributes' => array(
 			'data-conditional-id'    => $prefix . 'textslider_bg_video_src' ,
			'data-conditional-value' => '1',
 		)
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Video Start at/Stop at', 'milton' ), 
		'desc'	=> esc_html__('Video Start at value', 'milton' ), 
		'id'	=> $prefix.'textslider_bg_video_start_at', 
		'type'	=> 'text_small',
		'default' => '0',
		'attributes' => array(
 			'data-conditional-id'    => $prefix . 'textslider_bg_video_src' ,
			'data-conditional-value' => '1',
 		),
		'row_classes' => 'agni-slide-col agni-slide-height-desktop',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-height-container">'
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Video Stop At', 'milton' ), 
		'desc'	=> esc_html__('Video Stop at value', 'milton' ), 
		'id'	=> $prefix.'textslider_bg_video_stop_at', 
		'type'	=> 'text_small',
		'default' => '0',
		'attributes' => array(
 			'data-conditional-id'    => $prefix . 'textslider_bg_video_src' ,
			'data-conditional-value' => '1',
 		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-height-mobile',
		'after_row' => '</div>'
	) );

	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('BG Overlay Choice', 'milton' ),
		'desc'	=> esc_html__('Gradient Map will not work on video bg.', 'milton' ),
		'id'	=> $prefix.'textslider_bg_overlay_choice', 
		'type'	=> 'radio_inline',
		'options' => array( 
			'1' => esc_html__('Simple', 'milton' ), 
			'2' => esc_html__('Simple Gradient', 'milton' ), 
			'3' => esc_html__('Gradient Map(Duotone)', 'milton' ), 
			'4' => esc_html__('No Overlay', 'milton' ), 
		),
		'default' => '4',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'textslider_bg_choice' ,
 			'data-conditional-value' => json_encode( array( 'bg_video','bg_image' ) ),
 		)
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('BG Overlay Color', 'milton' ), 
		'desc'	=> esc_html__('This layer will be the overlay of the slider.', 'milton' ), 
		'id'	=> $prefix.'textslider_bg_overlay_color', 
		'type'	=> 'rgba_colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'textslider_bg_overlay_choice' ,
 			'data-conditional-value' => '1',
 		)
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('BG Gradient Overlay CSS', 'milton' ), 
		'desc'	=> wp_kses( __( 'Get/Type your Gradient CSS. Ref. <a target="_blank" href="http://uigradients.com/">http://uigradients.com/</a> <a target="_blank" href="http://hex2rgba.devoth.com/">HEX to RGBA converter for transparency</a>', 'milton' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ),
		'id'	=> $prefix.'textslider_bg_sg_overlay_css', 
		'type'	=> 'textarea_code',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'textslider_bg_overlay_choice' ,
 			'data-conditional-value' => '2',
 		)
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('BG Gradient Map(Duotone) Overlay Color 1', 'milton' ), 
		'desc'	=> wp_kses( __( 'Choose the color for Shadows(Dark pixels). <a target="_blank" href="http://demo.agnidesigns.com/milton/documentation/kb/gradient-map-duotone/">See Presets</a>', 'milton' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ),
		'id'	=> $prefix.'textslider_bg_gm_overlay_color1', 
		'type'	=> 'colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'textslider_bg_overlay_choice' ,
 			'data-conditional-value' => '3',
 		)
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('BG Gradient Map(Duotone) Overlay Color 2', 'milton' ), 
		'desc'	=> esc_html__('Choose the mid-tone color. You can leave this empty for no mid-tone.', 'milton' ), 
		'id'	=> $prefix.'textslider_bg_gm_overlay_color2', 
		'type'	=> 'colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'textslider_bg_overlay_choice' ,
 			'data-conditional-value' => '3',
 		)
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('BG Gradient Map(Duotone) Overlay Color 3', 'milton' ), 
		'desc'	=> esc_html__('Choose the color for Highlights(White pixels).', 'milton' ), 
		'id'	=> $prefix.'textslider_bg_gm_overlay_color3', 
		'type'	=> 'colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'textslider_bg_overlay_choice',
 			'data-conditional-value' => '3',
 		)
	) );

	$textslider_slider_options->add_field( array( 
		'name' => esc_html__('Particle Ground', 'milton' ),
		'desc' => esc_html__('It will enable the particles for the background.', 'milton' ),
		'id' => $prefix . 'textslider_bg_particle_ground',
		'type' => 'checkbox',
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Particle Ground Color', 'milton' ), 
		'desc'	=> esc_html__('Choose the color and transparency for the particle ground.', 'milton' ), 
		'id'	=> $prefix.'textslider_bg_particle_ground_color', 
		'type'	=> 'rgba_colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'textslider_bg_particle_ground',
 		)
	) );

	$textslider_slider_options->add_field( array(
		'name'	=> esc_html__('Slider Choice', 'milton' ),
		'id'	=> $prefix.'textslider_choice',
		'type'	=> 'radio_inline',
		'options' => array( 
			'1' => esc_html__('Full Height(100%)', 'milton' ), 
			'2' => esc_html__('Custom Height', 'milton' ), 
		),
		'default' => '1',
		'before_row' => '<h3>Basic Options</h3>'
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Slider Height', 'milton' ), 
		'desc'	=> esc_html__('Enter your slider height, don\'t include "px" string', 'milton' ), 
		'id'	=> $prefix.'textslider_height', 
		'type'	=> 'text_small',
		'default' => '600',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'textslider_choice',
			'data-conditional-value' => '2',
		),
		'row_classes' => 'agni-slide-col agni-slide-height-desktop',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-height-container">'
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Slider Height(Tablet devices)', 'milton' ), 
		'desc'	=> esc_html__('Height on Tablets', 'milton' ), 
		'id'	=> $prefix.'textslider_height_tab', 
		'type'	=> 'text_small',
		'default' => '480',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'textslider_choice',
			'data-conditional-value' => '2',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-height-tab',
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Slider Height(Mobile devices)', 'milton' ), 
		'desc'	=> esc_html__('Height on Mobiles', 'milton' ), 
		'id'	=> $prefix.'textslider_height_mobile', 
		'type'	=> 'text_small',
		'default' => '360',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'textslider_choice',
			'data-conditional-value' => '2',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-height-mobile',
		'after_row' => '</div>'
	) );
	$textslider_slider_options->add_field( array(
		'name' => esc_html__('Parallax', 'milton' ),
		'desc' => esc_html__('Check this to enable parallax, its purely based on skrollr.', 'milton' ),
		'id' => $prefix.'textslider_parallax',
		'type' => 'checkbox',
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Parallax Value', 'milton' ), 
		'desc'	=> esc_html__('Enter the css property for the slider\'s top at the top of the screen. for eg.transform:translateY(0px); if don\'t want parallax just leave this empty', 'milton' ), 
		'id'	=> $prefix.'textslider_parallax_start', 
		'type'	=> 'textarea_small',
		'default'  => 'transform:translateY(0px);',
		'attributes' => array(
	        'rows'        => 2,
	        'placeholder' => 'Parallax Starting Value',
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'textslider_parallax',
		),
		'row_classes' => 'agni-slide-col agni-slide-parallax-start',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-parallax-container">'
	) );
	
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Parallax End Value', 'milton' ), 
		'desc'	=> esc_html__('Enter the css property for the slider\'s bottom when at the top of the screen. for eg.transform:translateY(600px); if don\'t want parallax just leave this empty', 'milton' ), 
		'id'	=> $prefix.'textslider_parallax_end', 
		'type'	=> 'textarea_small',
		'default'  => 'transform:translateY(600px);',
		'attributes' => array(
			'rows'        => 2,
			'placeholder' => 'Parallax End Value',
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'textslider_parallax',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-parallax-end',
		'after_row' => '</div>'
	) );
	$textslider_slider_options->add_field( array(
		'name'	=> esc_html__('Autoplay', 'milton' ),
		'id'	=> $prefix.'textslider_autoplay',
		'type'	=> 'checkbox',
	) );
	$textslider_slider_options->add_field( array(
		'name'	=> esc_html__('Loop', 'milton' ),
		'id'	=> $prefix.'textslider_loop',
		'type'	=> 'checkbox',
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Transition Duration', 'milton' ), 
		'desc'	=> esc_html__('Enter your transition duration in ms.', 'milton' ), 
		'id'	=> $prefix.'textslider_transition_duration', 
		'type'	=> 'text_small',
		'default' => '6000',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '3000',
			'max'  => '20000',
			'step'  => '100'
		),
		'row_classes' => 'agni-slide-col agni-slide-animate-in',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-animate-container">'
	) );
	$textslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Transition Speed', 'milton' ), 
		'desc'	=> esc_html__('Enter your transition speed in ms.', 'milton' ), 
		'id'	=> $prefix.'textslider_transition_speed', 
		'type'	=> 'text_small',
		'default' => '400',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '100',
			'max'  => '1200',
			'step'  => '10'
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-animate-out',
		'after_row' => '</div>'
	) );
	$textslider_slider_options->add_field( array(
		'name'	=> esc_html__('Animation In', 'milton' ),
		'id'	=> $prefix.'textslider_animate_in',
		'type'	=> 'select',
		'options' => array( 
			'fadeIn' => esc_html__('fadeIn', 'milton' ), 
			'fadeInDown' => esc_html__('fadeInDown', 'milton' ),
			'fadeInRight' => esc_html__('fadeInRight', 'milton' ),
			'fadeInLeft' => esc_html__('fadeInLeft', 'milton' ),
			'fadeInUp' => esc_html__('fadeInUp', 'milton' ),
			'flipInX' => esc_html__('flipInX', 'milton' ),
			'slideInUp' => esc_html__('slideInUp', 'milton' ),
			'slideInDown' => esc_html__('slideInDown', 'milton' ),
			'slideInLeft' => esc_html__('slideInLeft', 'milton' ),
			'slideInRight' => esc_html__('slideInRight', 'milton' ),
			'zoomIn' => esc_html__('zoomIn', 'milton' ),
		),
		'default' => 'slideInRight',
		'row_classes' => 'agni-slide-col agni-slide-animate-in',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-animate-container">'
	) );
	$textslider_slider_options->add_field( array(
		'name'	=> esc_html__('Animation Out', 'milton' ),
		'id'	=> $prefix.'textslider_animate_out',
		'type'	=> 'select',
		'options' => array( 
			'fadeOut' => esc_html__('fadeOut', 'milton' ), 
			'fadeOutDown' => esc_html__('fadeOutDown', 'milton' ),
			'fadeOutRight' => esc_html__('fadeOutRight', 'milton' ),
			'fadeOutLeft' => esc_html__('fadeOutLeft', 'milton' ),
			'fadeOutUp' => esc_html__('fadeOutUp', 'milton' ),
			'flipOutX' => esc_html__('flipOutX', 'milton' ),
			'slideOutUp' => esc_html__('slideOutUp', 'milton' ),
			'slideOutDown' => esc_html__('slideOutDown', 'milton' ),
			'slideOutLeft' => esc_html__('slideOutLeft', 'milton' ),
			'slideOutRight' => esc_html__('slideOutRight', 'milton' ),
			'zoomOut' => esc_html__('zoomOut', 'milton' ),
		),
		'default' => 'slideOutLeft',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-animate-out',
		'after_row' => '</div>'
	) );
	$textslider_slider_options->add_field( array(
		'name'	=> esc_html__('Navigation Arrows', 'milton' ),
		'id'	=> $prefix.'textslider_navigation',
		'type'	=> 'checkbox',
	) );
	$textslider_slider_options->add_field( array(
		'name'	=> esc_html__('Pagination Dots', 'milton' ),
		'id'	=> $prefix.'textslider_pagination',
		'type'	=> 'checkbox',
	) );
	$textslider_slider_options->add_field( array(
		'name'	=> esc_html__('Mouse Drag', 'milton' ),
		'id'	=> $prefix.'textslider_mousedrag',
		'type'	=> 'checkbox',
	) );

	// Image Slider
	$imageslider_slider_options = new_cmb2_box( array(
		'id'            => $prefix . 'imageslider_options',
		'title'         => esc_html__( 'Background Slider Options', 'milton' ),
		'object_types'  => array( 'agni_slides' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );
	
	
	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$imageslider_repeatable = $imageslider_slider_options->add_field( array(
		'id'          => $prefix . 'imageslider_repeatable',
		'type'        => 'group',
		'options'     => array(
			'group_title'   => esc_html__( 'Slide {#}', 'milton' ), // {#} gets replaced by row number
			'add_button'    => esc_html__( 'Add another Slide', 'milton' ),
			'remove_button' => esc_html__( 'Remove Slide', 'milton' ),
			'sortable'      => true, // beta
		),
	) );

	$imageslider_slider_options->add_group_field( $imageslider_repeatable, array(
		'name'	=> esc_html__('Background Choice', 'milton' ),
		'id'	=> 'imageslider_bg_choice',
		'type'	=> 'radio_inline',
		'options' => array( 
			'bg_color' => esc_html__('BG Color', 'milton' ), 
			'bg_image' => esc_html__('BG Image', 'milton' ), 
		),
		'default'  => 'bg_image',
		'before_row' => '<h3>Background Options</h3>'
	) );
	$imageslider_slider_options->add_group_field( $imageslider_repeatable, array( 
		'name'	=> esc_html__('Background Color', 'milton' ), 
		'id'	=> 'imageslider_bg_color', 
		'type'	=> 'colorpicker',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $imageslider_repeatable, 'imageslider_bg_choice' ) ),
 			'data-conditional-value' => 'bg_color',
 		)
	) );
	$imageslider_slider_options->add_group_field( $imageslider_repeatable, array( 
		'name'	=> esc_html__('Background Image', 'milton' ), 
		'id'	=> 'imageslider_bg_image', 
		'type'	=> 'file',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $imageslider_repeatable, 'imageslider_bg_choice' ) ),
 			'data-conditional-value' => 'bg_image',
 		)
	) );
	$imageslider_slider_options->add_group_field( $imageslider_repeatable, array(
		'name'	=> esc_html__('Background Position', 'milton' ),
		'id'	=> 'imageslider_bg_image_position',
		'type'	=> 'select',
		'options' => array( 
			'left top' => esc_html__('left top', 'milton' ), 
			'left center' => esc_html__('left center', 'milton' ), 
			'left bottom' => esc_html__('left bottom', 'milton' ), 
			'right top' => esc_html__('right top', 'milton' ), 
			'right center' => esc_html__('right center', 'milton' ), 
			'right bottom' => esc_html__('right bottom', 'milton' ), 
			'center top' => esc_html__('center top', 'milton' ), 
			'center center' => esc_html__('center center', 'milton' ), 
			'center bottom' => esc_html__('center bottom', 'milton' ), 
		),
		'default' => 'center center',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $imageslider_repeatable, 'imageslider_bg_image' ) ),
 		),
	) );
	$imageslider_slider_options->add_group_field( $imageslider_repeatable, array(
		'name'	=> esc_html__('Background Repeat', 'milton' ),
		'id'	=> 'imageslider_bg_image_repeat',
		'type'	=> 'select',
		'options' => array( 
			'repeat' => esc_html__('repeat', 'milton' ), 
			'no-repeat' => esc_html__('no-repeat', 'milton' ), 
		),
		'default' => 'repeat',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $imageslider_repeatable, 'imageslider_bg_image' ) ),
 		),
	) );
	$imageslider_slider_options->add_group_field( $imageslider_repeatable, array(
		'name'	=> esc_html__('Background Size', 'milton' ),
		'id'	=> 'imageslider_bg_image_size',
		'type'	=> 'select',
		'options' => array( 
			'cover' => esc_html__('cover', 'milton' ), 
			'auto' => esc_html__('auto', 'milton' ), 
		),
		'default' => 'cover',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => json_encode( array( $imageslider_repeatable, 'imageslider_bg_image' ) ),
 		),
	) );

	$imageslider_slider_options->add_group_field( $imageslider_repeatable, array( 
		'name'	=> esc_html__('BG Overlay Choice', 'milton' ),
		'id'	=> 'imageslider_bg_overlay_choice', 
		'type'	=> 'radio_inline',
		'options' => array( 
			'1' => esc_html__('Simple', 'milton' ), 
			'2' => esc_html__('Simple Gradient', 'milton' ), 
			'3' => esc_html__('Gradient Map(Duotone)', 'milton' ), 
			'4' => esc_html__('No Overlay', 'milton' ), 
		),
		'default' => '4',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $imageslider_repeatable, 'imageslider_bg_choice' ) ),
 			'data-conditional-value' => json_encode( array( 'bg_video','bg_image' ) ),
 		)
	) );
	$imageslider_slider_options->add_group_field( $imageslider_repeatable, array( 
		'name'	=> esc_html__('BG Overlay Color', 'milton' ), 
		'desc'	=> esc_html__('This layer will be the overlay of the slider.', 'milton' ), 
		'id'	=> 'imageslider_bg_overlay_color', 
		'type'	=> 'rgba_colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $imageslider_repeatable, 'imageslider_bg_overlay_choice' ) ),
 			'data-conditional-value' => '1',
 		)
	) );
	$imageslider_slider_options->add_group_field( $imageslider_repeatable, array( 
		'name'	=> esc_html__('BG Gradient Overlay CSS', 'milton' ), 
		'desc'	=> wp_kses( __( 'Get/Type your Gradient CSS. Ref. <a target="_blank" href="http://uigradients.com/">http://uigradients.com/</a> <a target="_blank" href="http://hex2rgba.devoth.com/">HEX to RGBA converter for transparency</a>', 'milton' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ),
		'id'	=> 'imageslider_bg_sg_overlay_css', 
		'type'	=> 'textarea_code',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $imageslider_repeatable, 'imageslider_bg_overlay_choice' ) ),
 			'data-conditional-value' => '2',
 		)
	) );
	$imageslider_slider_options->add_group_field( $imageslider_repeatable, array( 
		'name'	=> esc_html__('BG Gradient Map(Duotone) Overlay Color 1', 'milton' ), 
		'desc'	=> wp_kses( __( 'Choose the color for Shadows(Dark pixels). <a target="_blank" href="http://demo.agnidesigns.com/milton/documentation/kb/gradient-map-duotone/">See Presets</a>', 'milton' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ),
		'id'	=> 'imageslider_bg_gm_overlay_color1', 
		'type'	=> 'colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $imageslider_repeatable, 'imageslider_bg_overlay_choice' ) ),
 			'data-conditional-value' => '3',
 		)
	) );
	$imageslider_slider_options->add_group_field( $imageslider_repeatable, array( 
		'name'	=> esc_html__('BG Gradient Map(Duotone) Overlay Color 2', 'milton' ), 
		'desc'	=> esc_html__('Choose the mid-tone color. You can leave this empty for no mid-tone.', 'milton' ), 
		'id'	=> 'imageslider_bg_gm_overlay_color2', 
		'type'	=> 'colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $imageslider_repeatable, 'imageslider_bg_overlay_choice' ) ),
 			'data-conditional-value' => '3',
 		)
	) );
	$imageslider_slider_options->add_group_field( $imageslider_repeatable, array( 
		'name'	=> esc_html__('BG Gradient Map(Duotone) Overlay Color 3', 'milton' ), 
		'desc'	=> esc_html__('Choose the color for Highlights(White pixels).', 'milton' ), 
		'id'	=> 'imageslider_bg_gm_overlay_color3', 
		'type'	=> 'colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $imageslider_repeatable, 'imageslider_bg_overlay_choice' ) ),
 			'data-conditional-value' => '3',
 		)
	) );

	$imageslider_slider_options->add_group_field( $imageslider_repeatable, array( 
		'name' => esc_html__('Particle Ground', 'milton' ),
		'desc' => esc_html__('It will enable the particles for the background.', 'milton' ),
		'id' => 'imageslider_bg_particle_ground',
		'type' => 'checkbox',
	) );
	$imageslider_slider_options->add_group_field( $imageslider_repeatable, array( 
		'name'	=> esc_html__('Particle Ground Color', 'milton' ), 
		'desc'	=> esc_html__('Choose the color and transparency for the particle ground.', 'milton' ), 
		'id'	=> 'imageslider_bg_particle_ground_color', 
		'type'	=> 'rgba_colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => json_encode( array( $imageslider_repeatable, 'imageslider_bg_particle_ground' ) ),
 		)
	) );

	$imageslider_slider_options->add_field( array( 
        'name'  => esc_html__('Image', 'milton' ), 
        'id'    => $prefix.'imageslider_image', 
        'type'  => 'file',
        'before_row' => '<h3>Content Options</h3>'
    ) );
    $imageslider_slider_options->add_field( array( 
        'name'  => esc_html__('Max Image width', 'milton' ), 
        'desc'  => esc_html__('Enter your image width, don\'t include "px" string', 'milton' ), 
        'id'    => $prefix.'imageslider_image_size', 
        'type'  => 'text_small',
        'default' => '240',
        'attributes' => array(
            'type'  => 'number',
            'min'  => '100',
            'max'  => '1000',
            'step'  => '5',
            //'required' => true,
            'data-conditional-id'    => $prefix .'imageslider_image',
            //'data-conditional-id'    => 'agni_slides_repeatable[{#}][title]',
        ),
        'row_classes' => 'agni-slide-col agni-slide-height-desktop',
        'before_row' => '<div class="cmb-row agni-slide-row agni-slide-height-container">'
    ) );
    $imageslider_slider_options->add_field( array( 
        'name'  => esc_html__('Max Image width', 'milton' ), 
        'desc'  => esc_html__('Enter your image width for tablets', 'milton' ), 
        'id'    => $prefix.'imageslider_image_size_tab', 
        'type'  => 'text_small',
        'default' => '160',
        'attributes' => array(
            'type'  => 'number',
            'min'  => '40',
            'max'  => '700',
            'step'  => '5',
            //'required' => true,
            'data-conditional-id'    => $prefix .'imageslider_image',
            //'data-conditional-id'    => 'agni_slides_repeatable[{#}][title]',
        ),
        'show_names' => false,
        'row_classes' => 'agni-slide-col agni-slide-height-tab',
    ) );
    $imageslider_slider_options->add_field( array( 
        'name'  => esc_html__('Max Image width', 'milton' ), 
        'desc'  => esc_html__('Enter your image width for mobiles', 'milton' ), 
        'id'    => $prefix.'imageslider_image_size_mobile', 
        'type'  => 'text_small',
        'default' => '100',
        'attributes' => array(
            'type'  => 'number',
            'min'  => '20',
            'max'  => '300',
            'step'  => '5',
            //'required' => true,
            'data-conditional-id'    => $prefix .'imageslider_image',
            //'data-conditional-id'    => 'agni_slides_repeatable[{#}][title]',
        ),
        'show_names' => false,
        'row_classes' => 'agni-slide-col agni-slide-height-mobile',
        'after_row' => '</div>'
    ) );
	$imageslider_slider_options->add_field( array(
		'name' => esc_html__('Title', 'milton' ),
		'desc' => esc_html__('To use a text effect. Add the texts with delimiter "|" inside <span> tag. For ex. Hello, <span>This is|Sample|Text</span>', 'milton' ),
		'id' => $prefix . 'imageslider_title',
		'type' => 'text',
		'sanitization_cb' => false,
	) );
	$imageslider_slider_options->add_field( array(
		'name' => esc_html__('Title Rotator', 'milton' ),
		'desc' => esc_html__('Check this for Title rotator. it enables the text effects to the title.', 'milton' ),
		'id' => $prefix . 'imageslider_title_rotator',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix .'imageslider_title',
		),
	) );
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Choose Rotator Effect', 'milton' ),
		'id'	=> $prefix . 'imageslider_title_rotator_choice',
		'type'	=> 'select',
		'options' => array( 
			'type letters' => esc_html__('Type', 'milton' ), 
			'zoom' => esc_html__('Zoom', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix .'imageslider_title_rotator',
		),
		'default'  => 'scale letters'
	) );
	$imageslider_slider_options->add_field( array(
		'name' => esc_html__('Title Font', 'milton' ),
		'desc' => esc_html__('It will apply the font to the Title which you choose at "Milton/Theme Options/General Settings/Typography".', 'milton' ),
		'id' => $prefix . 'imageslider_title_font',
		'type' => 'select',
		'options' => array( 
			'primary-typo' => esc_html__('Primary Font', 'milton' ), 
			'default-typo' => esc_html__('Default Font', 'milton' ), 
			'additional-typo' => esc_html__('Additional Font', 'milton' ), 
			'special-typo' => esc_html__('Special Font', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'imageslider_title',
		),
		'default' => 'primary-typo',
	) );
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Title Font Size', 'milton' ), 
		'desc'	=> esc_html__('Enter your title font size, don\'t include "px" string', 'milton' ), 
		'id'	=> $prefix . 'imageslider_title_size', 
		'type'	=> 'text_small',
		'default' => '',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '30',
			'max'  => '200',
			'step'  => '1',
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'imageslider_title',
 			//'data-conditional-id'    => 'agni_slides_imageslider_repeatable[{#}][imageslider_title]',
		),
	) );
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Title Color', 'milton' ), 
		'desc'	=> esc_html__('Choose the color for title', 'milton' ), 
		'id'	=> $prefix . 'imageslider_title_color', 
		'type'	=> 'colorpicker',
		'default' => '#f0f0f0',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'imageslider_title',
 			//'data-conditional-id'    => 'agni_slides_imageslider_repeatable[{#}][imageslider_title]',
 		)
	) );
	$imageslider_slider_options->add_field( array(
		'name' => esc_html__('Description', 'milton' ),
		'id' => $prefix . 'imageslider_desc',
		'type' => 'textarea_small',
		'sanitization_cb' => false,
		'attributes'  => array(
	        'placeholder' => 'A small amount of text',
	        'rows'        => 2,
	    ),
	) );
	$imageslider_slider_options->add_field( array(
		'name' => esc_html__('Description Font', 'milton' ),
		'desc' => esc_html__('It will apply the font to the Description which you choose at "Milton/Theme Options/General Settings/Typography".', 'milton' ),
		'id' => $prefix . 'imageslider_desc_font',
		'type' => 'select',
		'options' => array( 
			'primary-typo' => esc_html__('Primary Font', 'milton' ), 
			'default-typo' => esc_html__('Default Font', 'milton' ), 
			'additional-typo' => esc_html__('Additional Font', 'milton' ), 
			'special-typo' => esc_html__('Special Font', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'imageslider_desc',
		),
		'default' => 'default-typo',
	) );
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Description Font Size', 'milton' ), 
		'desc'	=> esc_html__('Enter your title font size, don\'t include "px" string', 'milton' ), 
		'id'	=> $prefix . 'imageslider_desc_size', 
		'type'	=> 'text_small',
		'default' => '',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '15',
			'max'  => '60',
			'step'  => '1',
			//'required' => true,
 			'data-conditional-id'    => $prefix . 'imageslider_desc',
 			//'data-conditional-id'    => 'agni_slides_imageslider_repeatable[{#}][imageslider_title]',
		),
	) );
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Description Color ', 'milton' ), 
		'desc'	=> esc_html__('choose the description color', 'milton' ), 
		'id'	=> $prefix . 'imageslider_desc_color', 
		'type'	=> 'colorpicker',
		'default' => '#f0f0f0',
		'attributes' => array(
 			'data-conditional-id'    => $prefix . 'imageslider_desc',
 		)
	) );

	$imageslider_slider_options->add_field( array(
		'name' => esc_html__('Divide Line', 'milton' ),
		'desc' => esc_html__('Checking this for FadeInUp animation.', 'milton' ),
		'id' => $prefix . 'imageslider_line',
		'type' => 'checkbox',
	) );
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Divide Line Color ', 'milton' ), 
		'desc'	=> esc_html__('choose the description color', 'milton' ), 
		'id'	=> $prefix . 'imageslider_line_color', 
		'type'	=> 'colorpicker',
		'default' => '#f0f0f0',
		'attributes' => array(
 			'data-conditional-id'    => $prefix . 'imageslider_line',
 		)
	) );
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Button 1', 'milton' ), 
		'desc'	=> esc_html__('button 1 info', 'milton' ), 
		'id'	=> $prefix . 'imageslider_button1', 
		'type'	=> 'text_small'
	) );
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Button 1 Icon', 'milton' ),
		'id'	=> $prefix . 'imageslider_button1_icon',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('No icon', 'milton' ), 
			'fa fa-play' => esc_html__('Play', 'milton' ), 
			'fa fa-download' => esc_html__('Download', 'milton' ), 
			'fa fa-mobile' => esc_html__('Mobile', 'milton' ), 
			'fa fa-heart' => esc_html__('Heart', 'milton' ), 
			'fa fa-diamond' => esc_html__('Diamond', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
			'data-conditional-id' => $prefix . 'imageslider_button1',
		)
	) );
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Button 1 Icon Style', 'milton' ),
		'id'	=> $prefix . 'imageslider_button1_icon_style',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('Default', 'milton' ), 
			'has-big-btn' => esc_html__('Big Rounded', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
			'data-conditional-id' => $prefix .'imageslider_button1_icon',
		)
	) );
	$imageslider_slider_options->add_field( array( 
		'name' => esc_html__('Hide Button 1 Text', 'milton' ),
		'desc' => esc_html__('It will hide the button text.', 'milton' ),
		'id' => $prefix . 'imageslider_button1_text_hide',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix .'imageslider_button1_icon_style',
 			//'data-conditional-value' => 'on',
 		),
	) );
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Button 1 URL', 'milton' ), 
		'desc'	=> esc_html__('button href', 'milton' ), 
		'id'	=> $prefix . 'imageslider_button1_url', 
		'type'	=> 'text_url',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix . 'imageslider_button1',
 			//'data-conditional-value' => 'on',
 		)
	) );
	
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Button 1 Style', 'milton' ),
		'id'	=> $prefix . 'imageslider_button1_style',
		'type'	=> 'select',
		'options' => array( 
			'default' => esc_html__('Default', 'milton' ), 
			'primary' => esc_html__('Primary', 'milton' ), 
			'accent' => esc_html__('Accent', 'milton' ), 
			'white' => esc_html__('White', 'milton' ), 
		),
		'default' => 'white',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix . 'imageslider_button1',
 			//'data-conditional-value' => 'on',
 		),
	) );
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Button 1 Type', 'milton' ),
		'id'	=> $prefix . 'imageslider_button1_type',
		'type'	=> 'radio_inline',
		'options' => array( 
			'btn-normal' => esc_html__('background', 'milton' ), 
			'btn-alt' => esc_html__('Bordered', 'milton' ), 
			'btn-plain' => esc_html__('Plain', 'milton' ), 
		),
		'default' => 'btn-alt',
		'attributes' => array(
			'data-conditional-id' => $prefix . 'imageslider_button1',
		)
	) );
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Button 1 Radius', 'milton' ), 
		'desc'	=> esc_html__('You can use px, em, %, etc. or enter just number and it will use pixels.', 'milton' ), 
		'id'	=> $prefix . 'imageslider_button1_radius', 
		'type'	=> 'text_small',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix . 'imageslider_button1',
 			//'data-conditional-value' => 'on',
 		),
	) );
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Button 1 Target', 'milton' ),
		'id'	=> $prefix . 'imageslider_button1_target',
		'type'	=> 'select',
		'options' => array( 
			'_self' => esc_html__('Same Window', 'milton' ), 
			'_blank' => esc_html__('New Window', 'milton' ), 
		),
		'default' => '_self',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix . 'imageslider_button1',
 			//'data-conditional-value' => 'on',
 		),
	) );
	$imageslider_slider_options->add_field( array(
		'name' => esc_html__('Button 1 has Lightbox Video?', 'milton' ),
		'desc' => esc_html__('Checking this for FadeInDown animation.', 'milton' ),
		'id' => $prefix . 'imageslider_button1_lightbox',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix . 'imageslider_button1',
 			//'data-conditional-value' => 'on',
 		),
	) );	
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Button 2', 'milton' ), 
		'desc'	=> esc_html__('button 2 info', 'milton' ), 
		'id'	=> $prefix . 'imageslider_button2', 
		'type'	=> 'text_small'
	) );
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Button 2 Icon', 'milton' ),
		'id'	=> $prefix . 'imageslider_button2_icon',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('No icon', 'milton' ), 
			'fa fa-play' => esc_html__('Play', 'milton' ), 
			'fa fa-download' => esc_html__('Download', 'milton' ), 
			'fa fa-mobile' => esc_html__('Mobile', 'milton' ), 
			'fa fa-heart' => esc_html__('Heart', 'milton' ), 
			'fa fa-diamond' => esc_html__('Diamond', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
			'data-conditional-id' => $prefix . 'imageslider_button2',
		)
	) );
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Button 2 Icon Style', 'milton' ),
		'id'	=> $prefix . 'imageslider_button2_icon_style',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('Default', 'milton' ), 
			'has-big-btn' => esc_html__('Big Rounded', 'milton' ), 
		),
		'default' => '',
		'attributes' => array(
			'data-conditional-id' => $prefix .'imageslider_button2_icon',
		)
	) );
	$imageslider_slider_options->add_field( array( 
		'name' => esc_html__('Hide Button 2 Text', 'milton' ),
		'desc' => esc_html__('It will hide the button text.', 'milton' ),
		'id' => $prefix . 'imageslider_button2_text_hide',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix .'imageslider_button2_icon_style',
 			//'data-conditional-value' => 'on',
 		),
	) );
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Button 2 URL', 'milton' ), 
		'desc'	=> esc_html__('button href', 'milton' ), 
		'id'	=> $prefix . 'imageslider_button2_url', 
		'type'	=> 'text_url',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix . 'imageslider_button2',
 			//'data-conditional-value' => 'on',
 		)
	) );
	
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Button 2 Style', 'milton' ),
		'id'	=> $prefix . 'imageslider_button2_style',
		'type'	=> 'select',
		'options' => array( 
			'default' => esc_html__('Default', 'milton' ), 
			'primary' => esc_html__('Primary', 'milton' ), 
			'accent' => esc_html__('Accent', 'milton' ), 
			'white' => esc_html__('White', 'milton' ), 
		),
		'default' => 'white',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix . 'imageslider_button2',
 			//'data-conditional-value' => 'on',
 		),
	) );
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Button 2 Type', 'milton' ),
		'id'	=> $prefix . 'imageslider_button2_type',
		'type'	=> 'radio_inline',
		'options' => array( 
			'btn-normal' => esc_html__('background', 'milton' ), 
			'btn-alt' => esc_html__('Bordered', 'milton' ), 
			'btn-plain' => esc_html__('Plain', 'milton' ), 
		),
		'default' => 'btn-alt',
		'attributes' => array(
			'data-conditional-id' => $prefix . 'imageslider_button2',
		)
	) );
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Button 2 Radius', 'milton' ), 
		'desc'	=> esc_html__('You can use px, em, %, etc. or enter just number and it will use pixels.', 'milton' ), 
		'id'	=> $prefix . 'imageslider_button2_radius', 
		'type'	=> 'text_small',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix . 'imageslider_button2',
 			//'data-conditional-value' => 'on',
 		),
	) );
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Button 2 Target', 'milton' ),
		'id'	=> $prefix . 'imageslider_button2_target',
		'type'	=> 'select',
		'options' => array( 
			'_self' => esc_html__('Same Window', 'milton' ), 
			'_blank' => esc_html__('New Window', 'milton' ), 
		),
		'default' => '_self',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix . 'imageslider_button2',
 			//'data-conditional-value' => 'on',
 		),
	) );	
	$imageslider_slider_options->add_field( array(
		'name' => esc_html__('Button 2 has Lightbox Video?', 'milton' ),
		'desc' => esc_html__('Checking this for FadeInDown animation.', 'milton' ),
		'id' => $prefix . 'imageslider_button2_lightbox',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix . 'imageslider_button2',
 			//'data-conditional-value' => 'on',
 		),
	) );

	$imageslider_slider_options->add_field( array(
		'name' => esc_html__('Text Animation', 'milton' ),
		'desc' => esc_html__('Checking this for FadeInDown animation.', 'milton' ),
		'id' => $prefix . 'imageslider_animation',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('No Animation', 'milton' ), 
			'fade-in' => esc_html__('fadeIn', 'milton' ), 
			'fade-in-down' => esc_html__('fadeInDown', 'milton' ),
			'fade-in-up' => esc_html__('fadeInUp', 'milton' ),
			'zoom-in' => esc_html__('zoomIn', 'milton' ),
		),
		'default' => '',
	) );

	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Bottom Arrow Icon', 'milton' ),
		'id'	=> $prefix . 'imageslider_arrowicon',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('No icon', 'milton' ), 
			'pe-7s-angle-down' => esc_html__('Angle Down', 'milton' ), 
			'pe-7s-angle-down-circle' => esc_html__('Angle Down Circled', 'milton' ), 
			'ion-ios-arrow-thin-down' => esc_html__('Arrow Down', 'milton' ), 
			'pe-7s-bottom-arrow' => esc_html__('Arrow Down Circled', 'milton' ), 
			'pe-7s-mouse' => esc_html__('Mouse', 'milton' ), 
		),
		'default' => '',
	) );
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Bottom Arrow link', 'milton' ), 
		'id'	=> $prefix . 'imageslider_arrowlink', 
		'type'	=> 'text_url',
		'attributes' => array(
 			//'required' => true, // Will be required only if visible.
 			'data-conditional-id'    => $prefix . 'imageslider_arrowicon',
 			//'data-conditional-value' => 'on',
 		),
	) );
	
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Bottom Arrow Color', 'milton' ), 
		'desc'	=> esc_html__('Choose the color for the bottom arrow', 'milton' ), 
		'id'	=> $prefix . 'imageslider_arrowicon_color', 
		'type'	=> 'colorpicker',
		'attributes' => array(
			//'required' => true, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'imageslider_arrowicon',
		)		
	) );
	
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Text Alignment', 'milton' ),
		'id'	=> $prefix . 'imageslider_text_alignment',
		'type'	=> 'radio_inline',
		'options' => array( 
			'flex-start' => esc_html__( 'Left', 'milton' ), 
			'center' => esc_html__( 'Center', 'milton' ), 
			'flex-end' => esc_html__( 'Right', 'milton' ), 
		),
		'default'  => 'flex-start'
	) );
	
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Vertical Alignment', 'milton' ),
		'id'	=> $prefix . 'imageslider_vertical_alignment',
		'type'	=> 'radio_inline',
		'options' => array( 
			'flex-start' => esc_html__( 'Top', 'milton' ), 
			'center' => esc_html__( 'Center', 'milton' ), 
			'flex-end' => esc_html__( 'Bottom', 'milton' ), 
		),
		'default'  => 'center'
	) );

	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Padding Values', 'milton' ), 
		'desc'	=> esc_html__('Padding Top. You can use px, em, %, etc. or enter just number and it will use pixels.', 'milton' ), 
		'id'	=> $prefix . 'imageslider_padding_top', 
		'type'	=> 'text_small',
		'default' => '0',
		'row_classes' => 'agni-slide-col agni-slide-padding-top',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-padding-container">'
	) );

	$imageslider_slider_options->add_field( array(
		//'name'	=> esc_html__('Padding Right', 'milton' ), 
		'desc'	=> esc_html__('Padding Right', 'milton' ), 
		'id'	=> $prefix . 'imageslider_padding_right', 
		'type'	=> 'text_small',
		'default' => '0',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-padding-right'
	) );
	$imageslider_slider_options->add_field( array(
		//'name'	=> esc_html__('Padding Bottom', 'milton' ), 
		'desc'	=> esc_html__('Padding Bottom', 'milton' ), 
		'id'	=> $prefix . 'imageslider_padding_bottom', 
		'type'	=> 'text_small',
		'default' => '0',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-padding-bottom',
	) );
	$imageslider_slider_options->add_field( array(
		//'name'	=> esc_html__('Padding Left', 'milton' ), 
		'desc'	=> esc_html__('Padding Left', 'milton' ), 
		'id'	=> $prefix . 'imageslider_padding_left', 
		'type'	=> 'text_small',
		'default' => '0',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-padding-left',
		'after_row' => '</div>'
	) );

	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Slider Choice', 'milton' ),
		'id'	=> $prefix.'imageslider_choice',
		'type'	=> 'radio_inline',
		'options' => array( 
			'1' => esc_html__('Full Height(100%)', 'milton' ), 
			'2' => esc_html__('Custom Height', 'milton' ), 
		),
		'default' => '1',
		'before_row' => '<h3>Basic Options</h3>'
	) );
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Slider Height', 'milton' ), 
		'desc'	=> esc_html__('Enter your slider height, don\'t include "px" string', 'milton' ), 
		'id'	=> $prefix.'imageslider_height', 
		'type'	=> 'text_small',
		'default' => '600',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'imageslider_choice',
			'data-conditional-value' => '2',
		),
		'row_classes' => 'agni-slide-col agni-slide-height-desktop',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-height-container">'
	) );
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Slider Height(Tablet devices)', 'milton' ), 
		'desc'	=> esc_html__('Height on Tablets', 'milton' ), 
		'id'	=> $prefix.'imageslider_height_tab', 
		'type'	=> 'text_small',
		'default' => '480',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'imageslider_choice',
			'data-conditional-value' => '2',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-height-tab',
	) );
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Slider Height(Mobile devices)', 'milton' ), 
		'desc'	=> esc_html__('Height on Mobiles', 'milton' ), 
		'id'	=> $prefix.'imageslider_height_mobile', 
		'type'	=> 'text_small',
		'default' => '360',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'imageslider_choice',
			'data-conditional-value' => '2',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-height-mobile',
		'after_row' => '</div>'
	) );
	$imageslider_slider_options->add_field( array(
		'name' => esc_html__('Parallax', 'milton' ),
		'desc' => esc_html__('Check this to enable parallax, its purely based on skrollr.', 'milton' ),
		'id' => $prefix.'imageslider_parallax',
		'type' => 'checkbox',
	) );
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Parallax Value', 'milton' ), 
		'desc'	=> esc_html__('Enter the css property for the slider\'s top at the top of the screen. for eg.transform:translateY(0px); if don\'t want parallax just leave this empty', 'milton' ), 
		'id'	=> $prefix.'imageslider_parallax_start', 
		'type'	=> 'textarea_small',
		'default'  => 'transform:translateY(0px);',
		'attributes' => array(
	        'rows'        => 2,
	        'placeholder' => 'Parallax Starting Value',
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'imageslider_parallax',
		),
		'row_classes' => 'agni-slide-col agni-slide-parallax-start',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-parallax-container">'
	) );
	
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Parallax End Value', 'milton' ), 
		'desc'	=> esc_html__('Enter the css property for the slider\'s bottom when at the top of the screen. for eg.transform:translateY(600px); if don\'t want parallax just leave this empty', 'milton' ), 
		'id'	=> $prefix.'imageslider_parallax_end', 
		'type'	=> 'textarea_small',
		'default'  => 'transform:translateY(600px);',
		'attributes' => array(
			'rows'        => 2,
			'placeholder' => 'Parallax End Value',
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'imageslider_parallax',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-parallax-end',
		'after_row' => '</div>'
	) );
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Autoplay', 'milton' ),
		'id'	=> $prefix.'imageslider_autoplay',
		'type'	=> 'checkbox',
	) );
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Loop', 'milton' ),
		'id'	=> $prefix.'imageslider_loop',
		'type'	=> 'checkbox',
	) );
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Transition Duration', 'milton' ), 
		'desc'	=> esc_html__('Enter your transition duration in ms.', 'milton' ), 
		'id'	=> $prefix.'imageslider_transition_duration', 
		'type'	=> 'text_small',
		'default' => '6000',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '3000',
			'max'  => '20000',
			'step'  => '100'
		),
		'row_classes' => 'agni-slide-col agni-slide-animate-in',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-animate-container">'
	) );
	$imageslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Transition Speed', 'milton' ), 
		'desc'	=> esc_html__('Enter your transition speed in ms.', 'milton' ), 
		'id'	=> $prefix.'imageslider_transition_speed', 
		'type'	=> 'text_small',
		'default' => '400',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '100',
			'max'  => '1200',
			'step'  => '10'
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-animate-out',
		'after_row' => '</div>'
	) );
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Animation In', 'milton' ),
		'id'	=> $prefix.'imageslider_animate_in',
		'type'	=> 'select',
		'options' => array( 
			'fadeIn' => esc_html__('fadeIn', 'milton' ), 
			'fadeInDown' => esc_html__('fadeInDown', 'milton' ),
			'fadeInRight' => esc_html__('fadeInRight', 'milton' ),
			'fadeInLeft' => esc_html__('fadeInLeft', 'milton' ),
			'fadeInUp' => esc_html__('fadeInUp', 'milton' ),
			'flipInX' => esc_html__('flipInX', 'milton' ),
			'slideInUp' => esc_html__('slideInUp', 'milton' ),
			'slideInDown' => esc_html__('slideInDown', 'milton' ),
			'slideInLeft' => esc_html__('slideInLeft', 'milton' ),
			'slideInRight' => esc_html__('slideInRight', 'milton' ),
			'zoomIn' => esc_html__('zoomIn', 'milton' ),
		),
		'default' => 'slideInRight',
		'row_classes' => 'agni-slide-col agni-slide-animate-in',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-animate-container">'
	) );
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Animation Out', 'milton' ),
		'id'	=> $prefix.'imageslider_animate_out',
		'type'	=> 'select',
		'options' => array( 
			'fadeOut' => esc_html__('fadeOut', 'milton' ), 
			'fadeOutDown' => esc_html__('fadeOutDown', 'milton' ),
			'fadeOutRight' => esc_html__('fadeOutRight', 'milton' ),
			'fadeOutLeft' => esc_html__('fadeOutLeft', 'milton' ),
			'fadeOutUp' => esc_html__('fadeOutUp', 'milton' ),
			'flipOutX' => esc_html__('flipOutX', 'milton' ),
			'slideOutUp' => esc_html__('slideOutUp', 'milton' ),
			'slideOutDown' => esc_html__('slideOutDown', 'milton' ),
			'slideOutLeft' => esc_html__('slideOutLeft', 'milton' ),
			'slideOutRight' => esc_html__('slideOutRight', 'milton' ),
			'zoomOut' => esc_html__('zoomOut', 'milton' ),
		),
		'default' => 'slideOutLeft',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-animate-out',
		'after_row' => '</div>'
	) );
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Navigation Arrows', 'milton' ),
		'id'	=> $prefix.'imageslider_navigation',
		'type'	=> 'checkbox',
	) );
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Pagination Dots', 'milton' ),
		'id'	=> $prefix.'imageslider_pagination',
		'type'	=> 'checkbox',
	) );
	$imageslider_slider_options->add_field( array(
		'name'	=> esc_html__('Mouse Drag', 'milton' ),
		'id'	=> $prefix.'imageslider_mousedrag',
		'type'	=> 'checkbox',
	) );

	// Posttype Slider
	$posttypeslider_slider_options = new_cmb2_box( array(
		'id'            => $prefix . 'posttypeslider_options',
		'title'         => esc_html__( 'Posttype Slider Options', 'milton' ),
		'object_types'  => array( 'agni_slides' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Posttype Choice', 'milton' ),
		'desc'	=> esc_html__('Choose your desired posttype to create a slider', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_posttype_choice',
		'type'	=> 'radio_inline',
		'options' => array( 
			'post' => esc_html__('Post', 'milton' ), 
			'portfolio' => esc_html__('Portfolio', 'milton' ), 
			//'product' => esc_html__('Products', 'milton' ), 
		),
		'default'  => 'post',
	) );

	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Number of Items to display', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_items_per_page', 
		'type'	=> 'text_small',
		'default' => '3',
		'before_row' => '<h3>Posttype Options</h3>'
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'           => esc_html__('Post Categories', 'milton' ),
		'desc'           => esc_html__('Choose your desired categories to display in the slider. Nothing means all categories.', 'milton' ), 
		'id'             => $prefix.'posttypeslider_blog_categories',
		'taxonomy'       => 'category', //Enter Taxonomy Slug
		'type'           => 'taxonomy_multicheck_inline',
		'text'           => array(
			'no_terms_text' => 'Sorry, No Category could be found.' // Change default text. Default: "No terms"
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'posttypeslider_posttype_choice' ,
 			'data-conditional-value' => 'post',
 		)
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'           => esc_html__('Portfolio Categories', 'milton' ),
		'desc'           => esc_html__('Choose your desired categories to display in the slider. Nothing means all categories.', 'milton' ), 
		'id'             => $prefix.'posttypeslider_portfolio_categories',
		'taxonomy'       => 'types', //Enter Taxonomy Slug
		'type'           => 'taxonomy_multicheck_inline',
		'text'           => array(
			'no_terms_text' => 'Sorry, No Category could be found.' // Change default text. Default: "No terms"
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'posttypeslider_posttype_choice' ,
 			'data-conditional-value' => 'portfolio',
 		)
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Items to Include', 'milton' ), 
		'desc'  => esc_html__('Enter your item ids to include. for ex. 101, 103 Just keep it empty to include all items.', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_post_in', 
		'type'	=> 'text_small',
		'default' => '',
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Items to Exclude', 'milton' ), 
		'desc'  => esc_html__('Enter your item ids to exclude. for ex. 101, 103', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_post_not_in', 
		'type'	=> 'text_small',
		'default' => '',
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Order', 'milton' ),
		'desc'	=> esc_html__('Featured Image background position', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_items_order',
		'type'	=> 'select',
		'options' => array( 
			'DESC' => esc_html__( 'Descending ', 'milton'),
			'ASC' => esc_html__( 'Ascending', 'milton'),
		),
		'default' => 'DESC',
	) );

	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Orderby', 'milton' ),
		'desc'	=> esc_html__('Featured Image background position', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_items_orderby',
		'type'	=> 'select',
		'options' => array( 
			'none' => esc_html__( 'None', 'milton'),
			'id' => esc_html__( 'Post ID', 'milton'),
			'author' => esc_html__( 'Post author', 'milton'),
			'title' => esc_html__( 'Post title', 'milton'),
			'name' => esc_html__( 'Post slug', 'milton'),
			'date' => esc_html__( 'Date', 'milton'),
			'modified' => esc_html__( 'Last modified date', 'milton'),
			'rand' => esc_html__( 'Random', 'milton'),
			'comment_count' => esc_html__( 'Comments number', 'milton'),
			'menu_order' => esc_html__( 'Menu order', 'milton'),
		),
		'default' => 'none',
	) );

	$posttypeslider_slider_options->add_field( array( 
		'name' => esc_html__('Ignore Sticky', 'milton' ),
		'desc' => esc_html__('It will enable the particles for the background.', 'milton' ),
		'id' => $prefix.'posttypeslider_ignore_sticky',
		'type' => 'checkbox',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'posttypeslider_posttype_choice' ,
 			'data-conditional-value' => 'post',
 		)
	) );

	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Featured Image Position', 'milton' ),
		'desc'	=> esc_html__('Featured Image background position', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_bg_image_position',
		'type'	=> 'select',
		'options' => array( 
			'left top' => esc_html__('left top', 'milton' ), 
			'left center' => esc_html__('left center', 'milton' ), 
			'left bottom' => esc_html__('left bottom', 'milton' ), 
			'right top' => esc_html__('right top', 'milton' ), 
			'right center' => esc_html__('right center', 'milton' ), 
			'right bottom' => esc_html__('right bottom', 'milton' ), 
			'center top' => esc_html__('center top', 'milton' ), 
			'center center' => esc_html__('center center', 'milton' ), 
			'center bottom' => esc_html__('center bottom', 'milton' ), 
		),
		'default' => 'center center',
		'before_row' => '<h3>Content Options</h3>'
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Featured Image Repeat', 'milton' ),
		'id'	=> $prefix.'posttypeslider_bg_image_repeat',
		'type'	=> 'select',
		'options' => array( 
			'repeat' => esc_html__('repeat', 'milton' ), 
			'no-repeat' => esc_html__('no-repeat', 'milton' ), 
		),
		'default' => 'repeat',
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Featured Image Size', 'milton' ),
		'id'	=> $prefix.'posttypeslider_bg_image_size',
		'type'	=> 'select',
		'options' => array( 
			'cover' => esc_html__('cover', 'milton' ), 
			'auto' => esc_html__('auto', 'milton' ), 
		),
		'default' => 'cover',
	) );

	$posttypeslider_slider_options->add_field( array( 
		'name'	=> esc_html__('BG Overlay Choice', 'milton' ),
		'desc'	=> esc_html__('Gradient Map will not work on video bg.', 'milton' ),
		'id'	=> $prefix.'posttypeslider_bg_overlay_choice', 
		'type'	=> 'radio_inline',
		'options' => array( 
			'1' => esc_html__('Simple', 'milton' ), 
			'2' => esc_html__('Simple Gradient', 'milton' ), 
			'3' => esc_html__('Gradient Map(Duotone)', 'milton' ), 
			'4' => esc_html__('No Overlay', 'milton' ), 
		),
		'default' => '4',
	) );
	$posttypeslider_slider_options->add_field( array( 
		'name'	=> esc_html__('BG Overlay Color', 'milton' ), 
		'desc'	=> esc_html__('This layer will be the overlay of the slider.', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_bg_overlay_color', 
		'type'	=> 'rgba_colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'posttypeslider_bg_overlay_choice' ,
 			'data-conditional-value' => '1',
 		)
	) );
	$posttypeslider_slider_options->add_field( array( 
		'name'	=> esc_html__('BG Gradient Overlay CSS', 'milton' ), 
		'desc'	=> wp_kses( __( 'Get/Type your Gradient CSS. Ref. <a target="_blank" href="http://uigradients.com/">http://uigradients.com/</a> <a target="_blank" href="http://hex2rgba.devoth.com/">HEX to RGBA converter for transparency</a>', 'milton' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ),
		'id'	=> $prefix.'posttypeslider_bg_sg_overlay_css', 
		'type'	=> 'textarea_code',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'posttypeslider_bg_overlay_choice' ,
 			'data-conditional-value' => '2',
 		)
	) );
	$posttypeslider_slider_options->add_field( array( 
		'name'	=> esc_html__('BG Gradient Map(Duotone) Overlay Color 1', 'milton' ), 
		'desc'	=> wp_kses( __( 'Choose the color for Shadows(Dark pixels). <a target="_blank" href="http://demo.agnidesigns.com/milton/documentation/kb/gradient-map-duotone/">See Presets</a>', 'milton' ), array( 'a' => array( 'href' => array(), 'target' => array() ) ) ),
		'id'	=> $prefix.'posttypeslider_bg_gm_overlay_color1', 
		'type'	=> 'colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'posttypeslider_bg_overlay_choice' ,
 			'data-conditional-value' => '3',
 		)
	) );
	$posttypeslider_slider_options->add_field( array( 
		'name'	=> esc_html__('BG Gradient Map(Duotone) Overlay Color 2', 'milton' ), 
		'desc'	=> esc_html__('Choose the mid-tone color. You can leave this empty for no mid-tone.', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_bg_gm_overlay_color2', 
		'type'	=> 'colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'posttypeslider_bg_overlay_choice' ,
 			'data-conditional-value' => '3',
 		)
	) );
	$posttypeslider_slider_options->add_field( array( 
		'name'	=> esc_html__('BG Gradient Map(Duotone) Overlay Color 3', 'milton' ), 
		'desc'	=> esc_html__('Choose the color for Highlights(White pixels).', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_bg_gm_overlay_color3', 
		'type'	=> 'colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'posttypeslider_bg_overlay_choice',
 			'data-conditional-value' => '3',
 		)
	) );

	$posttypeslider_slider_options->add_field( array( 
		'name' => esc_html__('Particle Ground', 'milton' ),
		'desc' => esc_html__('It will enable the particles for the background.', 'milton' ),
		'id' => $prefix.'posttypeslider_bg_particle_ground',
		'type' => 'checkbox',
	) );
	$posttypeslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Particle Ground Color', 'milton' ), 
		'desc'	=> esc_html__('Choose the color and transparency for the particle ground.', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_bg_particle_ground_color', 
		'type'	=> 'rgba_colorpicker',
		'default' => '',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'posttypeslider_bg_particle_ground',
 		)
	) );

	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Show Post Title', 'milton' ),
		'id'	=> $prefix.'posttypeslider_title_choice',
		'type'	=> 'select',
		'options' => array( 
			'yes' => esc_html__('Yes', 'milton' ), 
			'no' => esc_html__('No', 'milton' ), 
		),
		'default' => 'yes',
	) );

	$posttypeslider_slider_options->add_field( array(
		'name' => esc_html__('Title Font', 'milton' ),
		'desc' => esc_html__('It will apply the font to the Title which you choose at "Milton/Theme Options/General Settings/Typography".', 'milton' ),
		'id' => $prefix . 'posttypeslider_title_font',
		'type' => 'select',
		'options' => array( 
			'primary-typo' => esc_html__('Primary Font', 'milton' ), 
			'default-typo' => esc_html__('Default Font', 'milton' ), 
			'additional-typo' => esc_html__('Additional Font', 'milton' ), 
			'special-typo' => esc_html__('Special Font', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'posttypeslider_title_choice' ,
 			'data-conditional-value' => 'yes',
		),
		'default' => 'primary-typo',
	) );

	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Title Font Size', 'milton' ), 
		'desc'	=> esc_html__('Enter your title font size, don\'t include "px" string', 'milton' ), 
		'id'	=> $prefix . 'posttypeslider_title_size', 
		'type'	=> 'text_small',
		'default' => '',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '30',
			'max'  => '200',
			'step'  => '1',
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'posttypeslider_title_choice' ,
 			'data-conditional-value' => 'yes',
		),
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Title Color', 'milton' ), 
		'desc'	=> esc_html__('Choose the color for title', 'milton' ), 
		'id'	=> $prefix . 'posttypeslider_title_color', 
		'type'	=> 'colorpicker',
		'default' => '#f0f0f0',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'posttypeslider_title_choice' ,
 			'data-conditional-value' => 'yes',
 		)
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Show Categories', 'milton' ),
		'id'	=> $prefix.'posttypeslider_categories_choice',
		'type'	=> 'select',
		'options' => array( 
			'yes' => esc_html__('Yes', 'milton' ), 
			'no' => esc_html__('No', 'milton' ), 
		),
		'default' => 'yes',
	) );
	$posttypeslider_slider_options->add_field( array(
		'name' => esc_html__('Categories Font', 'milton' ),
		'desc' => esc_html__('It will apply the font to the Categories which you choose at "Milton/Theme Options/General Settings/Typography".', 'milton' ),
		'id' => $prefix . 'posttypeslider_categories_font',
		'type' => 'select',
		'options' => array( 
			'primary-typo' => esc_html__('Primary Font', 'milton' ), 
			'default-typo' => esc_html__('Default Font', 'milton' ), 
			'additional-typo' => esc_html__('Additional Font', 'milton' ), 
			'special-typo' => esc_html__('Special Font', 'milton' ), 
		),
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'posttypeslider_title_choice' ,
 			'data-conditional-value' => 'yes',
		),
		'default' => 'default-typo',
	) );

	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Categories Font Size', 'milton' ), 
		'desc'	=> esc_html__('Enter your Categories font size, don\'t include "px" string', 'milton' ), 
		'id'	=> $prefix . 'posttypeslider_categories_size', 
		'type'	=> 'text_small',
		'default' => '',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '8',
			'max'  => '40',
			'step'  => '1',
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'posttypeslider_title_choice' ,
 			'data-conditional-value' => 'yes',
		),
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Categories Color', 'milton' ), 
		'desc'	=> esc_html__('Choose the color for Categories', 'milton' ), 
		'id'	=> $prefix . 'posttypeslider_categories_color', 
		'type'	=> 'colorpicker',
		'default' => '#f0f0f0',
		'attributes' => array(
 			//'required' => true,
 			'data-conditional-id'    => $prefix . 'posttypeslider_title_choice' ,
 			'data-conditional-value' => 'yes',
 		)
	) );

	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Read More Text', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_button1', 
		'type'	=> 'text_small',
		'default' => 'Read More',
		'attributes' => array(
			'data-conditional-id'    => $prefix .'posttypeslider_button1',
 			'data-conditional-value' => 'yes',
		)
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Read More Style', 'milton' ),
		'id'	=> $prefix . 'posttypeslider_button1_style',
		'type'	=> 'select',
		'options' => array( 
			'default' => esc_html__('Default', 'milton' ), 
			'primary' => esc_html__('Primary', 'milton' ), 
			'accent' => esc_html__('Accent', 'milton' ), 
			'white' => esc_html__('White', 'milton' ), 
		),
		'default' => 'white',
		'attributes' => array(
			'data-conditional-id'    => $prefix .'posttypeslider_button1',
		)
	) );
	$posttypeslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Read More Type', 'milton' ),
		'id'	=> $prefix . 'posttypeslider_button1_type',
		'type'	=> 'radio_inline',
		'options' => array( 
			'btn-normal' => esc_html__('background', 'milton' ), 
			'btn-alt' => esc_html__('Bordered', 'milton' ), 
			'btn-plain' => esc_html__('Plain', 'milton' ), 
		),
		'default' => 'btn-alt',
		'attributes' => array(
			'data-conditional-id'    => $prefix .'posttypeslider_button1',
		)
	) );
	$posttypeslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Read More Radius', 'milton' ), 
		'desc'	=> esc_html__('You can use px, em, %, etc. or enter just number and it will use pixels.', 'milton' ), 
		'id'	=> $prefix . 'posttypeslider_button1_radius', 
		'type'	=> 'text_small',
		'attributes' => array(
			'data-conditional-id'    => $prefix .'posttypeslider_button1',
		)
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Read More Target', 'milton' ),
		'id'	=> $prefix . 'posttypeslider_button1_target',
		'type'	=> 'select',
		'options' => array( 
			'_self' => esc_html__('Same Window', 'milton' ), 
			'_blank' => esc_html__('New Window', 'milton' ), 
		),
		'default' => '_self',
		'attributes' => array(
			'data-conditional-id'    => $prefix .'posttypeslider_button1',
		)
	) );	
	$posttypeslider_slider_options->add_field( array(
		'name' => esc_html__('Animation', 'milton' ),
		'desc' => esc_html__('Checking this for FadeInDown animation.', 'milton' ),
		'id' => $prefix . 'posttypeslider_animation',
		'type'	=> 'select',
		'options' => array( 
			'' => esc_html__('No Animation', 'milton' ), 
			'fade-in' => esc_html__('fadeIn', 'milton' ), 
			'fade-in-down' => esc_html__('fadeInDown', 'milton' ),
			'fade-in-up' => esc_html__('fadeInUp', 'milton' ),
			'zoom-in' => esc_html__('zoomIn', 'milton' ),
		),
		'default' => '',
	) );
	
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Text Alignment', 'milton' ),
		'id'	=> $prefix . 'posttypeslider_text_alignment',
		'type'	=> 'radio_inline',
		'options' => array( 
			'flex-start' => esc_html__( 'Left', 'milton' ), 
			'center' => esc_html__( 'Center', 'milton' ), 
			'flex-end' => esc_html__( 'Right', 'milton' ), 
		),
		'default'  => 'flex-start'
	) );
	
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Vertical Alignment', 'milton' ),
		'id'	=> $prefix . 'posttypeslider_vertical_alignment',
		'type'	=> 'radio_inline',
		'options' => array( 
			'flex-start' => esc_html__( 'Top', 'milton' ), 
			'center' => esc_html__( 'Center', 'milton' ), 
			'flex-end' => esc_html__( 'Bottom', 'milton' ), 
		),
		'default'  => 'center'
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Padding Values', 'milton' ), 
		'desc'	=> esc_html__('Padding Top. You can use px, em, %, etc. or enter just number and it will use pixels.', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_padding_top', 
		'type'	=> 'text_small',
		'default' => '0',
		'row_classes' => 'agni-slide-col agni-slide-padding-top',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-padding-container">'
	) );

	$posttypeslider_slider_options->add_field( array(
		//'name'	=> esc_html__('Padding Right', 'milton' ), 
		'desc'	=> esc_html__('Padding Right', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_padding_right', 
		'type'	=> 'text_small',
		'default' => '0',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-padding-right'
		
	) );
	$posttypeslider_slider_options->add_field( array(
		//'name'	=> esc_html__('Padding Bottom', 'milton' ), 
		'desc'	=> esc_html__('Padding Bottom', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_padding_bottom', 
		'type'	=> 'text_small',
		'default' => '0',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-padding-bottom',
	) );
	$posttypeslider_slider_options->add_field( array(
		//'name'	=> esc_html__('Padding Left', 'milton' ), 
		'desc'	=> esc_html__('Padding Left', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_padding_left', 
		'type'	=> 'text_small',
		'default' => '0',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-padding-left',
		'after_row' => '</div>'
	) );

	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Slider Choice', 'milton' ),
		'id'	=> $prefix.'posttypeslider_choice',
		'type'	=> 'radio_inline',
		'options' => array( 
			'1' => esc_html__('Full Height(100%)', 'milton' ), 
			'2' => esc_html__('Custom Height', 'milton' ), 
		),
		'default' => '1',
		'before_row' => '<h3>Basic Options</h3>'
	) );
	$posttypeslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Slider Height', 'milton' ), 
		'desc'	=> esc_html__('Enter your slider height, don\'t include "px" string', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_height', 
		'type'	=> 'text_small',
		'default' => '600',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'posttypeslider_choice',
			'data-conditional-value' => '2',
		),
		'row_classes' => 'agni-slide-col agni-slide-height-desktop',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-height-container">'
	) );
	$posttypeslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Slider Height(Tablet devices)', 'milton' ), 
		'desc'	=> esc_html__('Height on Tablets', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_height_tab', 
		'type'	=> 'text_small',
		'default' => '480',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'posttypeslider_choice',
			'data-conditional-value' => '2',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-height-tab',
	) );
	$posttypeslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Slider Height(Mobile devices)', 'milton' ), 
		'desc'	=> esc_html__('Height on Mobiles', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_height_mobile', 
		'type'	=> 'text_small',
		'default' => '360',
		'attributes' => array(
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'posttypeslider_choice',
			'data-conditional-value' => '2',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-height-mobile',
		'after_row' => '</div>'
	) );
	$posttypeslider_slider_options->add_field( array(
		'name' => esc_html__('Parallax', 'milton' ),
		'desc' => esc_html__('Check this to enable parallax, its purely based on skrollr.', 'milton' ),
		'id' => $prefix.'posttypeslider_parallax',
		'type' => 'checkbox',
	) );
	$posttypeslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Parallax Value', 'milton' ), 
		'desc'	=> esc_html__('Enter the css property for the slider\'s top at the top of the screen. for eg.transform:translateY(0px); if don\'t want parallax just leave this empty', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_parallax_start', 
		'type'	=> 'textarea_small',
		'default'  => 'transform:translateY(0px);',
		'attributes' => array(
	        'rows'        => 2,
	        'placeholder' => 'Parallax Starting Value',
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'posttypeslider_parallax',
		),
		'row_classes' => 'agni-slide-col agni-slide-parallax-start',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-parallax-container">'
	) );
	
	$posttypeslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Parallax End Value', 'milton' ), 
		'desc'	=> esc_html__('Enter the css property for the slider\'s bottom when at the top of the screen. for eg.transform:translateY(600px); if don\'t want parallax just leave this empty', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_parallax_end', 
		'type'	=> 'textarea_small',
		'default'  => 'transform:translateY(600px);',
		'attributes' => array(
			'rows'        => 2,
			'placeholder' => 'Parallax End Value',
			'required' => false, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'posttypeslider_parallax',
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-parallax-end',
		'after_row' => '</div>'
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Autoplay', 'milton' ),
		'id'	=> $prefix.'posttypeslider_autoplay',
		'type'	=> 'checkbox',
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Loop', 'milton' ),
		'id'	=> $prefix.'posttypeslider_loop',
		'type'	=> 'checkbox',
	) );
	$posttypeslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Transition Duration', 'milton' ), 
		'desc'	=> esc_html__('Enter your transition duration in ms.', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_transition_duration', 
		'type'	=> 'text_small',
		'default' => '6000',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '3000',
			'max'  => '20000',
			'step'  => '100'
		),
		'row_classes' => 'agni-slide-col agni-slide-animate-in',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-animate-container">'
	) );
	$posttypeslider_slider_options->add_field( array( 
		'name'	=> esc_html__('Transition Speed', 'milton' ), 
		'desc'	=> esc_html__('Enter your transition speed in ms.', 'milton' ), 
		'id'	=> $prefix.'posttypeslider_transition_speed', 
		'type'	=> 'text_small',
		'default' => '400',
		'attributes' => array(
			'type'  => 'number',
			'min'  => '100',
			'max'  => '1200',
			'step'  => '10'
		),
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-animate-out',
		'after_row' => '</div>'
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Animation In', 'milton' ),
		'id'	=> $prefix.'posttypeslider_animate_in',
		'type'	=> 'select',
		'options' => array( 
			'fadeIn' => esc_html__('fadeIn', 'milton' ), 
			'fadeInDown' => esc_html__('fadeInDown', 'milton' ),
			'fadeInRight' => esc_html__('fadeInRight', 'milton' ),
			'fadeInLeft' => esc_html__('fadeInLeft', 'milton' ),
			'fadeInUp' => esc_html__('fadeInUp', 'milton' ),
			'flipInX' => esc_html__('flipInX', 'milton' ),
			'slideInUp' => esc_html__('slideInUp', 'milton' ),
			'slideInDown' => esc_html__('slideInDown', 'milton' ),
			'slideInLeft' => esc_html__('slideInLeft', 'milton' ),
			'slideInRight' => esc_html__('slideInRight', 'milton' ),
			'zoomIn' => esc_html__('zoomIn', 'milton' ),
		),
		'default' => 'slideInRight',
		'row_classes' => 'agni-slide-col agni-slide-animate-in',
		'before_row' => '<div class="cmb-row agni-slide-row agni-slide-animate-container">'
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Animation Out', 'milton' ),
		'id'	=> $prefix.'posttypeslider_animate_out',
		'type'	=> 'select',
		'options' => array( 
			'fadeOut' => esc_html__('fadeOut', 'milton' ), 
			'fadeOutDown' => esc_html__('fadeOutDown', 'milton' ),
			'fadeOutRight' => esc_html__('fadeOutRight', 'milton' ),
			'fadeOutLeft' => esc_html__('fadeOutLeft', 'milton' ),
			'fadeOutUp' => esc_html__('fadeOutUp', 'milton' ),
			'flipOutX' => esc_html__('flipOutX', 'milton' ),
			'slideOutUp' => esc_html__('slideOutUp', 'milton' ),
			'slideOutDown' => esc_html__('slideOutDown', 'milton' ),
			'slideOutLeft' => esc_html__('slideOutLeft', 'milton' ),
			'slideOutRight' => esc_html__('slideOutRight', 'milton' ),
			'zoomOut' => esc_html__('zoomOut', 'milton' ),
		),
		'default' => 'slideOutLeft',
		'show_names' => false,
		'row_classes' => 'agni-slide-col agni-slide-animate-out',
		'after_row' => '</div>'
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Navigation Arrows', 'milton' ),
		'id'	=> $prefix.'posttypeslider_navigation',
		'type'	=> 'checkbox',
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Pagination Dots', 'milton' ),
		'id'	=> $prefix.'posttypeslider_pagination',
		'type'	=> 'checkbox',
	) );
	$posttypeslider_slider_options->add_field( array(
		'name'	=> esc_html__('Mouse Drag', 'milton' ),
		'id'	=> $prefix.'posttypeslider_mousedrag',
		'type'	=> 'checkbox',
	) );
	
}


add_action( 'cmb2_init', 'agni_team_member_meta' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function agni_team_member_meta() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'member_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$team_member_option = new_cmb2_box( array(
		'id'            => $prefix . 'team_member',
		'title'         => esc_html__( 'Team Members', 'milton' ),
		'object_types'  => array( 'team' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );	
		
	$team_member_option->add_field( array( 
		'name'	=> esc_html__('Image/photo', 'milton' ), 
		'id'	=> $prefix.'image_url', 
		'type'	=> 'file',
	) );

	$team_member_option->add_field( array( 
		'name'	=> esc_html__('Hash Navigation Thumbnail', 'milton' ), 
		'id'	=> $prefix.'hash_image_url', 
		'type'	=> 'file',
	) );
	
	$team_member_option->add_field( array( 
		'name'	=> esc_html__('Name', 'milton' ),  
		'id'	=> $prefix.'name', 
		'type'	=> 'text_small',
	) );
	
	$team_member_option->add_field( array( 
		'name'	=> esc_html__('Link for Name', 'milton' ),  
		'id'	=> $prefix.'name_link', 
		'type'	=> 'text_url',
	) );
	
	$team_member_option->add_field( array( 
		'name'	=> esc_html__('Designation', 'milton' ),  
		'id'	=> $prefix.'designation', 
		'type'	=> 'text_small',
	) );
	$team_member_option->add_field( array( 
		'name'	=> esc_html__('Divide Line', 'milton' ),
		'id'	=> $prefix.'line',
		'type'	=> 'checkbox',
	) );
	$team_member_option->add_field( array(
		'name'=> esc_html__('Description', 'milton'),
		'desc'  => esc_html__('Additional information about the member', 'milton'),
		'id'    => $prefix.'description',
		'type'  => 'textarea_small'
	) );
	$team_member_option->add_field( array(
		'name'=> esc_html__('Facebook', 'milton'),
		'desc'  => esc_html__('Facebook link', 'milton'),
		'id'    => $prefix.'facebook_link',
		'type'  => 'text_url'
	) );
	
	$team_member_option->add_field( array(
		'name'=> esc_html__('Twitter', 'milton'),
		'id'    => $prefix.'twitter_link',
		'type'  => 'text_url'
	) );
	
	$team_member_option->add_field( array(
		'name'=> esc_html__('Google Plus', 'milton'),
		'id'    => $prefix.'google_plus_link',
		'type'  => 'text_url'
	) );
	$team_member_option->add_field( array(
		'name'=> esc_html__('VK', 'milton'),
		'id'    => $prefix.'vk_link',
		'type'  => 'text_url'
	) );
	$team_member_option->add_field( array(
		'name'=> esc_html__('Behance', 'milton'),
		'id'    => $prefix.'behance_link',
		'type'  => 'text_url'
	) );
	$team_member_option->add_field( array(
		'name'=> esc_html__('Pinterest', 'milton'),
		'id'    => $prefix.'pinterest_link',
		'type'  => 'text_url'
	) );
	$team_member_option->add_field( array(
		'name'=> esc_html__('Dribbble', 'milton'),
		'id'    => $prefix.'dribbble_link',
		'type'  => 'text_url'
	) );
	$team_member_option->add_field( array(
		'name'=> esc_html__('Skype', 'milton'),
		'id'    => $prefix.'skype_link',
		'type'  => 'text_small'
	) );
	$team_member_option->add_field( array(
		'name'=> esc_html__('Linkedin', 'milton'),
		'id'    => $prefix.'linkedin_link',
		'type'  => 'text_url'
	) );
	$team_member_option->add_field( array(
		'name'=> esc_html__('Email', 'milton'),
		'id'    => $prefix.'envelope_link',
		'type'  => 'text_email',
	) );
	$team_member_option->add_field( array(
		'name'=> esc_html__('Phone/Mobile Number', 'milton'),
		'id'    => $prefix.'number',
		'type'  => 'text_small'
	) );
	
}

add_action( 'cmb2_init', 'agni_clients_meta' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function agni_clients_meta() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'clients_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$clients_option = new_cmb2_box( array(
		'id'            => $prefix . 'clients',
		'title'         => esc_html__( 'Clients', 'milton' ),
		'object_types'  => array( 'clients' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );	
		
	$clients_option->add_field( array( 
		'name'	=> esc_html__('Image/photo', 'milton' ), 
		'id'	=> $prefix.'image', 
		'type'	=> 'file',
	) );
	
	$clients_option->add_field( array( 
		'name'	=> esc_html__('Link for Image', 'milton' ),  
		'id'	=> $prefix.'image_link', 
		'type'	=> 'text_url',
	) );
}
	
add_action( 'cmb2_init', 'agni_testimonials_meta' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function agni_testimonials_meta() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'testimonial_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$testimonials_option = new_cmb2_box( array(
		'id'            => $prefix . 'testimonials',
		'title'         => esc_html__( 'Testimonials', 'milton' ),
		'object_types'  => array( 'testimonials' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );	
		
	$testimonials_option->add_field( array( 
		'name'	=> esc_html__('Avatar of author', 'milton' ), 
		'id'	=> $prefix.'image', 
		'type'	=> 'file',
	) );
	
	$testimonials_option->add_field( array(
		'name'=> esc_html__('Testimonial Text', 'milton'),
		'desc'  => esc_html__('quote said by the author..', 'milton'),
		'id'    => $prefix.'quote',
		'type'  => 'textarea_small'
	) );
	
	$testimonials_option->add_field( array(
		'name'=> esc_html__('Author Name', 'milton'),
		'id'    => $prefix.'author',
		'type'  => 'text_small'
	) );
	$testimonials_option->add_field( array(
		'name'=> esc_html__('Author Designation', 'milton'),
		'id'    => $prefix.'author_designation',
		'type'  => 'text_small'
	) );
}
