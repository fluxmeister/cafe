<?php
/**
 * VW Handyman Services Theme Customizer
 *
 * @package VW Handyman Services
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function vw_handyman_services_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_handyman_services_custom_controls' );

function vw_handyman_services_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_handyman_services_Customize_partial_blogname',
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_handyman_services_Customize_partial_blogdescription',
	));

	// add home page setting pannel
	$wp_customize->add_panel( 'vw_handyman_services_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'VW Settings', 'vw-handyman-services' ),
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'vw_handyman_services_left_right', array(
    	'title' => esc_html__( 'General Settings', 'vw-handyman-services' ),
		'panel' => 'vw_handyman_services_panel_id'
	) );

	$wp_customize->add_setting('vw_handyman_services_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'vw_handyman_services_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Handyman_Services_Image_Radio_Control($wp_customize, 'vw_handyman_services_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','vw-handyman-services'),
        'description' => esc_html__('Here you can change the width layout of Website.','vw-handyman-services'),
        'section' => 'vw_handyman_services_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('vw_handyman_services_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'vw_handyman_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_handyman_services_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','vw-handyman-services'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','vw-handyman-services'),
        'section' => 'vw_handyman_services_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','vw-handyman-services'),
            'Right Sidebar' => esc_html__('Right Sidebar','vw-handyman-services'),
            'One Column' => esc_html__('One Column','vw-handyman-services'),
            'Grid Layout' => esc_html__('Grid Layout','vw-handyman-services')
        ),
	) );

	$wp_customize->add_setting('vw_handyman_services_page_layout',array(
        'default' => 'One_Column',
        'sanitize_callback' => 'vw_handyman_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_handyman_services_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','vw-handyman-services'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','vw-handyman-services'),
        'section' => 'vw_handyman_services_left_right',
        'choices' => array(
            'Left_Sidebar' => esc_html__('Left Sidebar','vw-handyman-services'),
            'Right_Sidebar' => esc_html__('Right Sidebar','vw-handyman-services'),
            'One_Column' => esc_html__('One Column','vw-handyman-services')
        ),
	) );

	// Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_handyman_services_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'vw_handyman_services_customize_partial_vw_handyman_services_woocommerce_shop_page_sidebar', ) );

    // Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_handyman_services_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_handyman_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Handyman_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_handyman_services_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-handyman-services' ),
		'section' => 'vw_handyman_services_left_right'
    )));

    // Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_handyman_services_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'vw_handyman_services_customize_partial_vw_handyman_services_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_handyman_services_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_handyman_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Handyman_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_handyman_services_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-handyman-services' ),
		'section' => 'vw_handyman_services_left_right'
    )));

    // Pre-Loader
	$wp_customize->add_setting( 'vw_handyman_services_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_handyman_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Handyman_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_handyman_services_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-handyman-services' ),
        'section' => 'vw_handyman_services_left_right'
    )));

	$wp_customize->add_setting('vw_handyman_services_preloader_bg_color', array(
		'default'           => '#001e38',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_handyman_services_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'vw-handyman-services'),
		'section'  => 'vw_handyman_services_left_right',
	)));

	$wp_customize->add_setting('vw_handyman_services_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'vw_handyman_services_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'vw-handyman-services'),
		'section'  => 'vw_handyman_services_left_right',
	)));

	// Top Bar
	$wp_customize->add_section( 'vw_handyman_services_top_bar' , array(
    	'title' => esc_html__( 'Top Bar', 'vw-handyman-services' ),
		'panel' => 'vw_handyman_services_panel_id'
	) );

	$wp_customize->add_setting('vw_handyman_services_topbar_btn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_handyman_services_topbar_btn_text',array(
		'label'	=> esc_html__('Add Button Text','vw-handyman-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Book Now', 'vw-handyman-services' ),
        ),
		'section'=> 'vw_handyman_services_top_bar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_handyman_services_topbar_btn_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_handyman_services_topbar_btn_link',array(
		'label'	=> esc_html__('Add Button Link','vw-handyman-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example-info.com', 'vw-handyman-services' ),
        ),
		'section'=> 'vw_handyman_services_top_bar',
		'type'=> 'url'
	));

	//Slider
	$wp_customize->add_section( 'vw_handyman_services_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-handyman-services' ),
		'panel' => 'vw_handyman_services_panel_id'
	) );

	$wp_customize->add_setting( 'vw_handyman_services_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_handyman_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Handyman_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_handyman_services_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-handyman-services' ),
      'section' => 'vw_handyman_services_slidersettings'
    )));

     //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_handyman_services_slider_hide_show',array(
		'selector'        => '.slider-btn a',
		'render_callback' => 'vw_handyman_services_customize_partial_vw_handyman_services_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'vw_handyman_services_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_handyman_services_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_handyman_services_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-handyman-services' ),
			'description' => __('Slider image size (1500 x 650)','vw-handyman-services'),
			'section'  => 'vw_handyman_services_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_handyman_services_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_handyman_services_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-handyman-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'vw-handyman-services' ),
        ),
		'section'=> 'vw_handyman_services_slidersettings',
		'type'=> 'text'
	));

	//content layout
	$wp_customize->add_setting('vw_handyman_services_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'vw_handyman_services_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Handyman_Services_Image_Radio_Control($wp_customize, 'vw_handyman_services_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-handyman-services'),
        'section' => 'vw_handyman_services_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_handyman_services_slider_excerpt_number', array(
		'default'              => 30,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_handyman_services_sanitize_number_range'
	) );
	$wp_customize->add_control( 'vw_handyman_services_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-handyman-services' ),
		'section'     => 'vw_handyman_services_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_handyman_services_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_handyman_services_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_handyman_services_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_handyman_services_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','vw-handyman-services' ),
	'section'     => 'vw_handyman_services_slidersettings',
	'type'        => 'select',
	'settings'    => 'vw_handyman_services_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','vw-handyman-services'),
      '0.1' =>  esc_attr('0.1','vw-handyman-services'),
      '0.2' =>  esc_attr('0.2','vw-handyman-services'),
      '0.3' =>  esc_attr('0.3','vw-handyman-services'),
      '0.4' =>  esc_attr('0.4','vw-handyman-services'),
      '0.5' =>  esc_attr('0.5','vw-handyman-services'),
      '0.6' =>  esc_attr('0.6','vw-handyman-services'),
      '0.7' =>  esc_attr('0.7','vw-handyman-services'),
      '0.8' =>  esc_attr('0.8','vw-handyman-services'),
      '0.9' =>  esc_attr('0.9','vw-handyman-services')
	),
	));

	//Slider height
	$wp_customize->add_setting('vw_handyman_services_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_handyman_services_slider_height',array(
		'label'	=> __('Slider Height','vw-handyman-services'),
		'description'	=> __('Specify the slider height (px).','vw-handyman-services'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-handyman-services' ),
        ),
		'section'=> 'vw_handyman_services_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_handyman_services_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'vw_handyman_services_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','vw-handyman-services'),
		'section' => 'vw_handyman_services_slidersettings',
		'type'  => 'text',
	) );

	// Professionals
	$wp_customize->add_section('vw_handyman_services_professionals',array(
		'title'	=> __('Professionals Section','vw-handyman-services'),
		'description' => __('Add the content and select the post category to display post.','vw-handyman-services'),
		'panel' => 'vw_handyman_services_panel_id',
	));

	$wp_customize->add_setting('vw_handyman_services_professionals_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_handyman_services_professionals_heading',array(
		'label'	=> esc_html__('Professionals Section Heading','vw-handyman-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Our professionals', 'vw-handyman-services' ),
        ),
		'section'=> 'vw_handyman_services_professionals',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_handyman_services_professionals_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_handyman_services_professionals_text',array(
		'label'	=> esc_html__('Professionals Section Text','vw-handyman-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Lorem Ipsum has been the industry standard dummy text ever since the 1500s', 'vw-handyman-services' ),
        ),
		'section'=> 'vw_handyman_services_professionals',
		'type'=> 'text'
	));

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_handyman_services_professionals_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_handyman_services_sanitize_choices',
	));
	$wp_customize->add_control('vw_handyman_services_professionals_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Professionals','vw-handyman-services'),
		'section' => 'vw_handyman_services_professionals',
	));

	//Blog Post

	$wp_customize->add_panel( 'vw_handyman_services_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'vw-handyman-services' ),
		'panel' => 'vw_handyman_services_panel_id',
		'priority' => 20,
	));

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_handyman_services_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'vw-handyman-services' ),
		'panel' => 'vw_handyman_services_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_handyman_services_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_handyman_services_Customize_partial_vw_handyman_services_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_handyman_services_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_handyman_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Handyman_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_handyman_services_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-handyman-services' ),
        'section' => 'vw_handyman_services_post_settings'
    )));

    $wp_customize->add_setting( 'vw_handyman_services_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_handyman_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Handyman_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_handyman_services_toggle_author',array(
		'label' => esc_html__( 'Author','vw-handyman-services' ),
		'section' => 'vw_handyman_services_post_settings'
    )));

    $wp_customize->add_setting( 'vw_handyman_services_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_handyman_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Handyman_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_handyman_services_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-handyman-services' ),
		'section' => 'vw_handyman_services_post_settings'
    )));

    $wp_customize->add_setting( 'vw_handyman_services_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_handyman_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Handyman_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_handyman_services_toggle_time',array(
		'label' => esc_html__( 'Time','vw-handyman-services' ),
		'section' => 'vw_handyman_services_post_settings'
    )));

    $wp_customize->add_setting( 'vw_handyman_services_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_handyman_services_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Handyman_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_handyman_services_featured_image_hide_show', array(
		'label' => esc_html__( 'Featured Image','vw-handyman-services' ),
		'section' => 'vw_handyman_services_post_settings'
    )));

    $wp_customize->add_setting( 'vw_handyman_services_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_handyman_services_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Handyman_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_handyman_services_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-handyman-services' ),
		'section' => 'vw_handyman_services_post_settings'
    )));

    $wp_customize->add_setting( 'vw_handyman_services_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_handyman_services_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_handyman_services_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-handyman-services' ),
		'section'     => 'vw_handyman_services_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_handyman_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('vw_handyman_services_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_handyman_services_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','vw-handyman-services'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','vw-handyman-services'),
		'section'=> 'vw_handyman_services_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('vw_handyman_services_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_handyman_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_handyman_services_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','vw-handyman-services'),
        'section' => 'vw_handyman_services_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','vw-handyman-services'),
            'Excerpt' => esc_html__('Excerpt','vw-handyman-services'),
            'No Content' => esc_html__('No Content','vw-handyman-services')
        ),
	) );

    // Button Settings
	$wp_customize->add_section( 'vw_handyman_services_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'vw-handyman-services' ),
		'panel' => 'vw_handyman_services_blog_post_parent_panel',
	));

	$wp_customize->add_setting( 'vw_handyman_services_button_border_radius', array(
		'default'              => 5,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'vw_handyman_services_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_handyman_services_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-handyman-services' ),
		'section'     => 'vw_handyman_services_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_handyman_services_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'vw_handyman_services_Customize_partial_vw_handyman_services_button_text', 
	));

    $wp_customize->add_setting('vw_handyman_services_button_text',array(
		'default'=> esc_html__('Read More','vw-handyman-services'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_handyman_services_button_text',array(
		'label'	=> esc_html__('Add Button Text','vw-handyman-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'vw-handyman-services' ),
        ),
		'section'=> 'vw_handyman_services_button_settings',
		'type'=> 'text'
	));

	// Related Post Settings
	$wp_customize->add_section( 'vw_handyman_services_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'vw-handyman-services' ),
		'panel' => 'vw_handyman_services_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_handyman_services_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_handyman_services_Customize_partial_vw_handyman_services_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_handyman_services_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_handyman_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Handyman_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_handyman_services_related_post',array(
		'label' => esc_html__( 'Related Post','vw-handyman-services' ),
		'section' => 'vw_handyman_services_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_handyman_services_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_handyman_services_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','vw-handyman-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'vw-handyman-services' ),
        ),
		'section'=> 'vw_handyman_services_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_handyman_services_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'vw_handyman_services_sanitize_number_absint'
	));
	$wp_customize->add_control('vw_handyman_services_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','vw-handyman-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'vw-handyman-services' ),
        ),
		'section'=> 'vw_handyman_services_related_posts_settings',
		'type'=> 'number'
	));

	//Responsive Media Settings
	$wp_customize->add_section('vw_handyman_services_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','vw-handyman-services'),
		'panel' => 'vw_handyman_services_panel_id',
	));

    $wp_customize->add_setting( 'vw_handyman_services_resp_slider_hide_show',array(
      	'default' => 0,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_handyman_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Handyman_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_handyman_services_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','vw-handyman-services' ),
      	'section' => 'vw_handyman_services_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_handyman_services_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_handyman_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Handyman_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_handyman_services_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','vw-handyman-services' ),
      	'section' => 'vw_handyman_services_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_handyman_services_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_handyman_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Handyman_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_handyman_services_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-handyman-services' ),
      	'section' => 'vw_handyman_services_responsive_media'
    )));

	//Footer Text
	$wp_customize->add_section('vw_handyman_services_footer',array(
		'title'	=> esc_html__('Footer Settings','vw-handyman-services'),
		'panel' => 'vw_handyman_services_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_handyman_services_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'vw_handyman_services_Customize_partial_vw_handyman_services_footer_text', 
	));
	
	$wp_customize->add_setting('vw_handyman_services_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_handyman_services_footer_text',array(
		'label'	=> esc_html__('Copyright Text','vw-handyman-services'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2020, .....', 'vw-handyman-services' ),
        ),
		'section'=> 'vw_handyman_services_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_handyman_services_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'vw_handyman_services_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Handyman_Services_Image_Radio_Control($wp_customize, 'vw_handyman_services_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','vw-handyman-services'),
        'section' => 'vw_handyman_services_footer',
        'settings' => 'vw_handyman_services_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting( 'vw_handyman_services_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_handyman_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Handyman_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_handyman_services_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','vw-handyman-services' ),
      	'section' => 'vw_handyman_services_footer'
    )));

     //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_handyman_services_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_handyman_services_Customize_partial_vw_handyman_services_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_handyman_services_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'vw_handyman_services_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Handyman_Services_Image_Radio_Control($wp_customize, 'vw_handyman_services_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','vw-handyman-services'),
        'section' => 'vw_handyman_services_footer',
        'settings' => 'vw_handyman_services_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));
}

add_action( 'customize_register', 'vw_handyman_services_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Handyman_Services_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Handyman_Services_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new VW_Handyman_Services_Customize_Section_Pro( $manager,'vw_handyman_services_go_pro', array(
			'priority'   => 1,
			'title'    => esc_html__( 'HANDYMAN PRO', 'vw-handyman-services' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-handyman-services' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/handyman-services-wordpress-theme/'),
		) )	);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-handyman-services-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-handyman-services-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Handyman_Services_Customize::get_instance();