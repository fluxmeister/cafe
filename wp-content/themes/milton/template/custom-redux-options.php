<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "milton_options";
    
    /*
     * Adding redux admin css
     */
    function agni_redux_admin_scripts(){
        wp_dequeue_style( 'redux-admin-css' );
        wp_enqueue_style( 'agni-redux-css', AGNI_THEME_FILES_URL . '/assets/css/redux-admin.css' );
        if( is_rtl() ){
            wp_dequeue_style( 'redux-rtl-css' );
            wp_enqueue_style( 'agni-redux-rtl-css', AGNI_THEME_FILES_URL . '/assets/css/redux-admin-rtl.css' );
        }
    }
    add_action( "redux/page/{$opt_name}/enqueue", 'agni_redux_admin_scripts' );

    function agni_redux_custom_fonts( $font_array ) {
        // Custom Font list
        $custom_font_list = $font_list = array();
        $upload_dir = wp_upload_dir();
        $custom_dirname = 'agni-fonts';
        $file_dirname = $upload_dir['basedir'].'/'.$custom_dirname;
        
        if( is_dir($file_dirname) ){
            if ($handle = opendir($file_dirname)) {
                $blacklist = array('.', '..', '.DS_Store');
                while (false !== ($file = readdir($handle))) {
                    if (!in_array($file, $blacklist)) {
                        $font_list[$file] = $file;
                    }
                }
                closedir($handle);
            }
        }

        // Typekit font list
        $agni_typekit_options = get_option( 'agni_typekit_options' );
        if( !empty($agni_typekit_options['agni_typekit_id']) ){

            $kit = $agni_typekit_options['agni_typekit_id'];

            global $wp_filesystem;
            if (empty($wp_filesystem)) {
                require_once (ABSPATH . '/wp-admin/includes/file.php');
                WP_Filesystem();
            }
            $json = $wp_filesystem->get_contents( 'http://typekit.com/api/v1/json/kits/' . $kit . '/published' );
            
            $kits = json_decode( $json );
            $fonts = array();
            foreach ($kits->kit->families AS $fontFamily){
                $font_list[$fontFamily->name] = $fontFamily->name;
            }
        }
        // Store in array
        if( !empty($font_list) ){
            $font_array = array(
                'Custom & Typekit Fonts' => $font_list,
            );
        }
        return $font_array;
    }
    add_filter( "redux/{$opt_name}/field/typography/custom_fonts", 'agni_redux_custom_fonts' );
    /* 
     * Remove redux menu under the tools 
     */
    function remove_redux_menu() {
        remove_submenu_page('tools.php','redux-about');
    }
    add_action( 'admin_menu', 'remove_redux_menu', 12 );

    /*
     * Adding extension added additionally for demo import
     */

    if(!function_exists('redux_register_custom_extension_loader')) :
        function redux_register_custom_extension_loader($ReduxFramework) {
            //$path = ABSPATH . 'wp-content/plugins/agni-milton-plugin/inc/extensions/';
            $path = WP_PLUGIN_DIR . '/agni-milton-plugin/inc/extensions/';
            $folders = scandir( $path, 1 );        
            foreach($folders as $folder) {
                if ($folder === '.' or $folder === '..' or !is_dir($path . $folder) ) {
                    continue;   
                } 
                $extension_class = 'ReduxFramework_Extension_' . $folder;
                if( !class_exists( $extension_class ) ) {
                    // In case you wanted override your override, hah.
                    $class_file = $path . $folder . '/extension_' . $folder . '.php';
                    $class_file = apply_filters( 'redux/extension/'.$ReduxFramework->args['opt_name'].'/'.$folder, $class_file );
                    if( $class_file ) {
                        require_once( $class_file );
                        $extension = new $extension_class( $ReduxFramework );
                    }
                }
            }
        }
        // Modify {$redux_opt_name} to match your opt_name
        add_action("redux/extensions/{$opt_name}/before", 'redux_register_custom_extension_loader', 0);
    endif;

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( get_template_directory() . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( get_template_directory() . '/info-html.html' );
    }

    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    
    $args = array(
        'opt_name' => 'milton_options',
        'display_name' => $theme->get('Name'),
        'display_version' => $theme->get('Version'),
        'page_slug' => 'milton-theme-options',
        'page_title' => esc_html__('Theme Options', 'milton'),
        'update_notice' => TRUE,
        'admin_bar' => TRUE,
        'menu_type' => 'submenu',
        'menu_title' => esc_html__('Theme Options', 'milton'),
        'menu_icon' => AGNI_FRAMEWORK_URL  . '/img/milton_options.png',
        'allow_sub_menu' => TRUE,
        'page_parent' => 'milton',
        'page_parent_post_type' => 'your_post_type',
        'page_priority' => '59',
        'customizer' => FALSE,
        'default_mark' => '*',
        'footer_credit'     => '',
        'output' => TRUE,
        'output_tag' => TRUE,
        'settings_api' => TRUE,
        'page_permissions' => 'edit_theme_options',
        'save_defaults' => TRUE,
        'show_import_export' => TRUE,
        'transient_time' => '3600',
        'network_sites' => TRUE,
        'dev_mode' => FALSE,
        'hints' => array(
            'icon' => 'el el-bulb',
            'icon_position' => 'right',
            'icon_color' => '#333333',
            'icon_size' => 'normal',
            'tip_style' => array(
                'color' => 'light',
            ),
            'tip_position' => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect' => array(
                'show' => array(
                    'duration' => '500',
                    'event' => 'mouseover',
                ),
                'hide' => array(
                    'duration' => '500',
                    'event' => 'mouseleave unfocus',
                ),
            ),
        ),
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'id'    => 'redux-docs',
        'href'  => esc_url( 'http://docs.reduxframework.com/' ),
        'title' => esc_html__( 'Documentation', 'milton' ),
    );

    $args['admin_bar_links'][] = array(
        //'id'    => 'redux-support',
        'href'  => 'http://github.com/ReduxFramework/redux-framework/issues',
        'title' => esc_html__( 'Support', 'milton' ),
    );

    $args['admin_bar_links'][] = array(
        'id'    => 'redux-extensions',
        'href'  => 'reduxframework.com/extensions',
        'title' => esc_html__( 'Extensions', 'milton' ),
    );

    // Panel Intro text -> before the form
   
    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'milton' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'milton' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'milton' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'milton' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( 'This is the sidebar content, HTML is allowed.', 'milton' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    
    // -> START Basic Fields
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Home Settings', 'milton' ),
        'id'    => 'home-settings',
        'icon'  => 'el el-home'
    ) );
    
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General', 'milton' ),
        'id'         => 'home-general-options',
        'subsection' => true,
        'desc'       => esc_html__( 'The following options will allow you to set body background, logo, etc.', 'milton' ),
        'fields' => array(
            
            array(
                'id' => 'body-background',
                'type' => 'background',
                'output' => array('body, .content'),
                'title' => esc_html__('Body Background', 'milton'),
                'subtitle' => esc_html__('Body background with image, color, etc.', 'milton'),
                //'default' => array( 'background-color' => '#fbfbfb', ),
            ),
            array(
                'id' => 'dark-mode',
                'type' => 'switch',
                'title' => esc_html__('Dark Mode', 'milton'),
                'subtitle' => esc_html__('Enable this to display adapt the theme for darker skin.', 'milton'),
                'default' => '0'
            ),
            array(
                'id' => 'color-1',
                'type' => 'color',
                'transparent' => false,
                'output' => array(  ), 
                'title' => esc_html__('Accent color', 'milton'),
                'default' => '',
                'validate' => 'color',
                'hint'     => array(
                    'title'   => 'Highlighting Lines',
                    'content' => esc_html__('It applies the color to element borders/lines, heading underlines.', 'milton'),
                )
            ),
            
            array(
                'id' => 'color-2',
                'type' => 'color',
                'transparent' => false,
                'output' => array(  ),
                'title' => esc_html__('Primary color', 'milton'),
                'default' => '',
                'validate' => 'color',
                'hint'     => array(
                    'title'   => 'Main color',
                    'content' => esc_html__('It applies the color to H tags & buttons', 'milton'),
                )
            ),
            array(
                'id' => 'color-3',
                'type' => 'color',
                'transparent' => false,
                'output' => array(  ),
                'title' => esc_html__('Default color', 'milton'),
                'default' => '',
                'validate' => 'color',
                'hint'     => array(
                    'title'   => 'Body color',
                    'content' => esc_html__('It applies the color to body content & button this is a basic color for all text.', 'milton'),
                )
            ),
        ),
    ));

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Typography', 'milton' ),
        'id'         => 'home-typography-options',
        'subsection' => true,
        'desc'       => esc_html__( 'The following options will allow you to set body background, logo, etc.', 'milton' ),
        'fields' => array(
            array(
                'id' => 'font-1',
                'type' => 'typography',
                'title' => esc_html__('H Tags Font(Primary)', 'milton'),
                'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                //'fonts' => $font_list,
                //'font-weight' => false,
                //'font-style' => false,
                //'subsets' => false,
                'font-backup' => true, // Select a backup non-google font in addition to a google font
                'font-size'=> false,
                'line-height'=> false,
                'letter-spacing'=> true, // Defaults to false
                'color'=> false,
                'text-align' => false,
                'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                'output' => array('h1, h2, h3, h4, h5, h6,.h1,.h2,.h3,.h4,.h5,.h6, .primary-typo, .vc_tta-title-text'), // An array of CSS selectors to apply this font style to dynamically
                'units' => 'em', // Defaults to px
                'subtitle' => esc_html__('This options applies to Heading tags', 'milton'),
                'desc' => esc_html__('Font weight & style may not be applicable/shown for Custom & typekit Fonts(if any). For those cases, you\'ve to add custom css manually.' , 'milton'),
                'preview' => false,
                'default' => array(
                    'font-family' => '',
                    'font-backup' => '',
                    'google' => true,),
            ),
            array(
                'id' => 'font-h1-fontsize',
                'type' => 'text',
                'title' => esc_html__('H1 Font Size', 'milton'),
                'desc' => esc_html__( 'Font size in px. Do not enter "px"', 'milton' ),
                'default' => '42',
                'class' => 'text',
                'validate' => 'numeric',
            ),
            array(
                'id' => 'font-h2-fontsize',
                'type' => 'text',
                'title' => esc_html__('H2 Font Size', 'milton'),
                'default' => '36',
                'class' => 'text',
                'validate' => 'numeric',
            ),
            array(
                'id' => 'font-h3-fontsize',
                'type' => 'text',
                'title' => esc_html__('H3 Font Size', 'milton'),
                'default' => '30',
                'class' => 'text',
                'validate' => 'numeric',
            ),
            array(
                'id' => 'font-h4-fontsize',
                'type' => 'text',
                'title' => esc_html__('H4 Font Size', 'milton'),
                'default' => '24',
                'class' => 'text',
                'validate' => 'numeric',
            ),
            array(
                'id' => 'font-h5-fontsize',
                'type' => 'text',
                'title' => esc_html__('H5 Font Size', 'milton'),
                'default' => '18',
                'class' => 'text',
                'validate' => 'numeric',
            ),
            array(
                'id' => 'font-h6-fontsize',
                'type' => 'text',
                'title' => esc_html__('H6 Font Size', 'milton'),
                'default' => '13',
                'class' => 'text',
                'validate' => 'numeric',
            ),
            array(
                'id' => 'font-1-lineheight',
                'type' => 'text',
                'title' => esc_html__('H Tag Line Height', 'milton'),
                'default' => '',
            ),
            array(
                'id' => 'font-1-text-transform',
                'type'     => 'select',
                'title'    => esc_html__( 'Text Transform', 'milton' ),
                'options'  => array(
                    'none' => 'None',
                    'uppercase' => 'Uppercase',
                    'lowercase' => 'Lowercase',
                    'capitalize' => 'Capitalize',
                ),
                'default'  => 'none'
            ),
            array(
                'id' => 'font-2',
                'type' => 'typography',
                'title' => esc_html__('Additional Heading Font(Additional)', 'milton'),
                'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                //'fonts' => $font_list,
                'font-backup' => true, // Select a backup non-google font in addition to a google font
                'font-size'=>false,
                'line-height'=>false,
                'letter-spacing'=>true, // Defaults to false
                'color'=>false,
                'text-align' => false,
                'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                'output' => array('.section-sub-heading-text, .additional-typo'), // An array of CSS selectors to apply this font style to dynamically
                'units' => 'em', // Defaults to px
                'subtitle' => esc_html__('This will apply to all additional heading content which is inside section heading shortcode element.', 'milton'),
                'desc' => esc_html__('Font weight & style may not be applicable for Custom Fonts(if any).', 'milton'),
                'preview' => false,
                'default' => array(
                    'font-family' => '',
                    'font-backup' => '',
                    'google' => true,),
            ),
            array(
                'id' => 'font-2-lineheight',
                'type' => 'text',
                'title' => esc_html__('Additional Heading Line Height', 'milton'),
                'default' => '',
            ),
            array(
                'id' => 'font-2-text-transform',
                'type'     => 'select',
                'title'    => esc_html__( 'Text Transform', 'milton' ),
                'options'  => array(
                    'none' => 'None',
                    'uppercase' => 'Uppercase',
                    'lowercase' => 'Lowercase',
                    'capitalize' => 'Capitalize',
                ),
                'default'  => 'none'
            ),
            array(
                'id' => 'font-3',
                'type' => 'typography',
                'title' => esc_html__('Body Font(Default)', 'milton'),
                'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                //'fonts' => $font_list,
                'font-backup' => true, // Select a backup non-google font in addition to a google font
                'font-size'=> false,
                'line-height'=> false,
                'letter-spacing'=> true, // Defaults to false
                'color'=> false,
                'text-align' => false,
                'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                'output' => array('body, .default-typo'), // An array of CSS selectors to apply this font style to dynamically
                'units' => 'em', // Defaults to px
                'subtitle' => esc_html__('This is a base/default font for all body content.', 'milton'),
                'desc' => esc_html__('Font weight & style may not be applicable for Custom Fonts(if any).', 'milton'),
                'preview' => false,
                'default' => array(
                    'font-family' => '',
                    'font-backup' => '',
                    'font-size' => '',
                    'google' => true,),
            ),
            array(
                'id' => 'font-3-fontsize',
                'type' => 'text',
                'title' => esc_html__('Body Font Size', 'milton'),
                'default' => '15',
                'class' => 'text',
                'validate' => 'numeric',
            ),
            array(
                'id' => 'font-3-lineheight',
                'type' => 'text',
                'title' => esc_html__('Body Line Height', 'milton'),
                'default' => '',
            ),
            array(
                'id' => 'font-3-text-transform',
                'type'     => 'select',
                'title'    => esc_html__( 'Text Transform', 'milton' ),
                'options'  => array(
                    'none' => 'None',
                    'uppercase' => 'Uppercase',
                    'lowercase' => 'Lowercase',
                    'capitalize' => 'Capitalize',
                ),
                'default'  => 'none'
            ),

            array(
                'id' => 'font-4',
                'type' => 'typography',
                'title' => esc_html__('Special Font', 'milton'),
                'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                //'fonts' => $font_list,
                'font-backup' => true, // Select a backup non-google font in addition to a google font
                'font-size'=> false,
                'line-height'=> false,
                'letter-spacing'=> true, // Defaults to false
                'color'=> false,
                'text-align' => false,
                'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                'output' => array('.special-typo'), // An array of CSS selectors to apply this font style to dynamically
                'units' => 'em', // Defaults to px
                'subtitle' => esc_html__('This is a base/default font for all body content.', 'milton'),
                'desc' => esc_html__('Font weight & style may not be applicable for Custom Fonts(if any).', 'milton'),
                'preview' => false,
                'default' => array(
                    'font-family' => '',
                    'font-backup' => '',
                    'font-size' => '',
                    'google' => true,),
            ),
            array(
                'id' => 'font-4-lineheight',
                'type' => 'text',
                'title' => esc_html__('Special Font Line Height', 'milton'),
                'default' => '',
            ),
            array(
                'id' => 'font-4-text-transform',
                'type'     => 'select',
                'title'    => esc_html__( 'Text Transform', 'milton' ),
                'options'  => array(
                    'none' => 'None',
                    'uppercase' => 'Uppercase',
                    'lowercase' => 'Lowercase',
                    'capitalize' => 'Capitalize',
                ),
                'default'  => 'none'
            ),

            array(
                'id' => 'google-font-additional',
                'type' => 'text',
                'title' => esc_html__('Additional Google Fonts', 'milton'),
                'subtitle' => esc_html__('You can add all necessary fonts here by adding standard embed code.', 'milton'),
                'desc' => wp_kses(__('Go to <a href="https://fonts.google.com/">Google Fonts</a> choose your desired font families and add the here. Then add CSS at Custom Coding tab.', 'milton'), array( 'a' => array( 'href' => array() ), 'strong' => array() ) ),
                'default' => '',
                'placeholder' => 'Catamaran|Playfair+Display'
            ),

        )

    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Layout', 'milton' ),
        'id'         => 'home-layout-options',
        'subsection' => true,
        'desc'       => esc_html__( 'Here, you can setup site layout options.', 'milton' ),
        'fields' => array(

            array(
                'id' => 'layout-padding',
                'type' => 'switch',
                'title' => esc_html__('Content Padding/Border', 'milton'),
                'subtitle' => esc_html__('Enable this to display border/padding around the content/layout of the site.', 'milton'),
                'default' => '0'
            ),
            array(
                'id'       => 'layout-padding-size',
                'type'     => 'border',
                'required' => array('layout-padding', '=', '1'),
                'title'    => esc_html__( 'Amount of pixels', 'milton' ),
                'subtitle' => esc_html__( 'It will display the border above & below to the menu items.', 'milton' ),
                'all'      => true,
                'style' => false,
                // An array of CSS selectors to apply this font style to
                'desc'     => esc_html__( 'This is the description field, again good for additional info.', 'milton' ),
                'default'  => array(
                    'border-color'  => '#fff',
                    'border-top'    => '30px', 
                    'border-width' => '30px',
                )
            ),

            array(
                'id' => 'layout-container',
                'type' => 'switch',
                'title' => esc_html__('Container Settings', 'milton'),
                'subtitle' => esc_html__('By Enabling this you can controls the container width on each break point.', 'milton'),
                'default' => '0'
            ),
            array(
                'id' => 'layout-container-768',
                'type' => 'slider',
                'required' => array('layout-container', '=', '1'),
                'title' => esc_html__('Container Width >768', 'milton'),
                'desc' => esc_html__('this container width apply when viewport width is more than 768px.', 'milton'),
                "default" => "750",
                "min" => "360",
                "step" => "5",
                "max" => "750",
            ),
            array(
                'id' => 'layout-container-992',
                'type' => 'slider',
                'required' => array('layout-container', '=', '1'),
                'title' => esc_html__('Container Width >992', 'milton'),
                "default" => "970",
                "min" => "480",
                "step" => "5",
                "max" => "970",
            ),
            array(
                'id' => 'layout-container-1200',
                'type' => 'slider',
                'required' => array('layout-container', '=', '1'),
                'title' => esc_html__('Container Width >1200', 'milton'),
                "default" => "1170",
                "min" => "600",
                "step" => "5",
                "max" => "1170",
            ),
            array(
                'id' => 'layout-container-1500',
                'type' => 'slider',
                'required' => array('layout-container', '=', '1'),
                'title' => esc_html__('Container Width >1500', 'milton'),
                "default" => "1170",
                "min" => "720",
                "step" => "5",
                "max" => "1470",
            ),
            array(
                'id'             => 'layout-container-padding',
                'type'           => 'spacing',
                'required' => array('layout-container', '=', '1'),
                // An array of CSS selectors to apply this font style to
                'mode'           => 'padding',
                // absolute, padding, margin, defaults to padding
                'all'            => false,
                // Have one field that applies to all
                'top'           => false,     // Disable the top
                'bottom'        => false,     // Disable the bottom
                'units'          => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',    // Allow users to select any type of unit
                'title'          => esc_html__( 'Container inner Padding', 'milton' ),
                'subtitle'       => esc_html__( 'Here, you can set padding to the container.', 'milton' ),
                'default'        => array(
                    'padding-left'    => '15px',
                    'padding-right' => '15px',
                ),
                'output'         => array( '.container' )
            ),

            array(
                'id' => 'layout-boxed',
                'type' => 'switch',
                'title' => esc_html__('Boxed Layout', 'milton'),
                'subtitle' => esc_html__('Enable this to display all the content inside the box', 'milton'),
                'default' => '0'
            ),
            array(
                'id' => 'layout-boxed-768',
                'type' => 'slider',
                'required' => array('layout-boxed', '=', '1'),
                'title' => esc_html__('Box Width >768', 'milton'),
                'desc' => esc_html__('this container width apply when viewport width is more than 768px.', 'milton'),
                "default" => "750",
                "min" => "500",
                "step" => "5",
                "max" => "750",
            ),
            array(
                'id' => 'layout-boxed-992',
                'type' => 'slider',
                'required' => array('layout-boxed', '=', '1'),
                'title' => esc_html__('Box Width >992', 'milton'),
                "default" => "970",
                "min" => "650",
                "step" => "5",
                "max" => "970",
            ),
            array(
                'id' => 'layout-boxed-1200',
                'type' => 'slider',
                'required' => array('layout-boxed', '=', '1'),
                'title' => esc_html__('Box Width >1200', 'milton'),
                "default" => "1170",
                "min" => "800",
                "step" => "5",
                "max" => "1170",
            ),
            array(
                'id' => 'layout-boxed-1500',
                'type' => 'slider',
                'required' => array('layout-boxed', '=', '1'),
                'title' => esc_html__('Box Width >1500', 'milton'),
                "default" => "1170",
                "min" => "1000",
                "step" => "5",
                "max" => "1470",
            ),
            array(
                'id' => 'boxed-background-color',
                'type' => 'color',
                'required' => array('layout-boxed', '=', '1'),
                'transparent' => false,
                'mode' => 'background',
                'output' => array( '.boxed' ), 
                'title' => esc_html__('Boxed background color', 'milton'),
                'default' => '',
                'validate' => 'color',
            ),

        )

    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Additional', 'milton' ),
        'id'         => 'home-additional-options',
        'subsection' => true,
        'desc'       => esc_html__( 'Some additional options to control preloader, back to top.', 'milton' ),
        'fields' => array(
            array(
                'id' => 'loader',
                'type' => 'switch',
                'title' => esc_html__('PreLoader', 'milton'),
                'subtitle' => esc_html__('Just enable this to show the preloader', 'milton'),
                'default' => '1'
            ),
            array(
                'id' => 'loader-style',
                'type' => 'image_select',
                'required' => array('loader', '=', '1'),
                'title' => esc_html__('PreLoader Style', 'milton'),
                'options' => array(                            
                    '1' => array('alt' => 'Loader With Percentage', 'img' => AGNI_FRAMEWORK_URL . '/template/img/preloader-1.png'),
                    '2' => array('alt' => 'Static Loader 1', 'img' => AGNI_FRAMEWORK_URL . '/template/img/preloader-2.png'),
                    '3' => array('alt' => 'Static Loader 2', 'img' => AGNI_FRAMEWORK_URL . '/template/img/preloader-3.png'),
                ), //Must provide key => value(array:title|img) pairs for radio options
                'default' => '1'
            ),
            array(
                'id' => 'loader-bg-color',
                'type' => 'color',
                'required' => array('loader', '=', '1'),
                'transparent' => false,
                'output' => array( '.preloader .preloader-container' ), 
                'mode' => 'background',
                'title' => esc_html__('Loader BG color ', 'milton'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'loader-color',
                'type' => 'color',
                'required' => array('loader', '=', '1'),
                'transparent' => false,
                'output' => array( '#jpreBar, #jpreButton, .preloader-style-2 .cssload-loader, .preloader-style-3 .cssload-front' ), 
                'mode' => 'background',
                'title' => esc_html__('Loader color ', 'milton'),
                'subtitle' => esc_html__('Pick the preloader color.', 'milton'),
                'default' => '#1259c3',
                'validate' => 'color',
            ),
            array(
                'id' => 'loader-back-color',
                'type' => 'color',
                'required' => array('loader-style', '=', '3'),
                'transparent' => false,
                'output' => array( '.preloader-style-3 .cssload-back' ), 
                'mode' => 'background',
                'title' => esc_html__('Loader color ', 'milton'),
                'subtitle' => esc_html__('Pick the preloader back color.', 'milton'),
                'default' => '#333333',
                'validate' => 'color',
            ),
            array(
                'id'       => 'loader-close',
                'type'     => 'checkbox',
                'required' => array('loader-style', '=', '1'),
                'title'    => esc_html__( 'Loader Close Button', 'milton' ),
                'subtitle' => esc_html__( 'Once everything is loaded, It will wait for your command.', 'milton' ),
                'default'  => '0'// 1 = on | 0 = off
            ),
            array(
                'id' => 'loader-close-button-text',
                'type' => 'text',
                'required' => array('loader-close', '=', '1'),
                'title' => esc_html__('Loader Close Button', 'milton'),
                'default' => 'Proceed!',
                'class' => 'text'
            ),
            
            array(
                'id' => 'backtotop',
                'type' => 'switch',
                'title' => esc_html__('Back to top', 'milton'),
                'subtitle' => esc_html__('Just enable this to show the preloader', 'milton'),
                'default' => '1'
            ),
            array(
                'id' => 'backtotop-icon',
                'type' => 'text',
                'required' => array('backtotop', '=', '1'),
                'title' => esc_html__('Back to top icon', 'milton'),
                'subtitle' => esc_html__('type the icon class for eg. ion-ios-arrow-up For more. refer ionicons, fontawesome', 'milton'),
                'default' => 'ion-ios-arrow-up',
                'class' => 'text'
            ),
            array(
                'id' => 'animation-mobile',
                'type' => 'switch',
                'title' => esc_html__('Animation for mobile devices', 'milton'),
                'subtitle' => esc_html__('Just enable this to show the animation effects of each sections at mobile', 'milton'),
                'default' => '0'
            ),
            array(
                'id' => 'parallax-mobile',
                'type' => 'switch',
                'title' => esc_html__('Parallax for mobile devices', 'milton'),
                'subtitle' => esc_html__('Just enable this to show the parallax effects at mobile', 'milton'),
                'default' => '0'
            ),
            array(
                'id' => 'vc_elements',
                'type' => 'switch',
                'title' => esc_html__('Visual Composer Default Shortcodes/Elements', 'milton'),
                'subtitle' => esc_html__('Just enable this to show the built-in Visual Composer elements', 'milton'),
                'default' => '0'
            ),
            array(
                'id' => 'gmap-api',
                'type' => 'text',
                'title' => esc_html__('Google Map API key', 'milton'),
                'subtitle' => esc_html__('you can get the API key from https://developers.google.com/maps/documentation/javascript/get-api-key', 'milton'),
                'default' => '',
            ),
        )

    ) );


    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Header Settings', 'milton' ),
        'id'    => 'header-settings',
        'icon'  => 'el el-star'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Basic & Logo', 'milton' ),
        'id'         => 'header-basic-logo-options',
        'subsection' => true,
        'desc'       => esc_html__( 'Upload your logo/Customize your site title here.', 'milton' ),
        'fields' => array(
            array(
                'id' => 'header-site-title',
                'type' => 'switch',
                'title' => esc_html__('Site Title', 'milton'),
                'subtitle' => esc_html__('if you want to display the site title as a logo, just enable this.', 'milton'),
                'default' => 0, // 1 = on | 0 = off
                'on' => 'Enable',
                'off' => 'Disable',
            ),
            array(
                'id' => 'logo-1',
                'type' => 'media',
                'required' => array('header-site-title', '=', '0'),
                'title' => esc_html__('Logo 1', 'milton'),
                'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'url' => true,
                'subtitle' => esc_html__('This is main logo and will be displayed when you are at the top.', 'milton'),
                'default'  => array(
                    'url' => AGNI_FRAMEWORK_URL  . '/img/milton_logo.png',
                ),
            ),
            array(
                'id' => 'logo-2',
                'type' => 'media',
                'required' => array('header-site-title', '=', '0'),
                'title' => esc_html__('Logo 2(Optional)', 'milton'),
                'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                'subtitle' => esc_html__('This is additional logo and will override the Logo 1 except at the top. ', 'milton'),
                'hint'     => array(
                    'title'   => 'Additional Logo',
                    'content' => 'This logo will be useful when you want to use lite logo at top and dark at rest of the place or vice-versa.',
                )
            ),
            array(
                'id' => 'custom-logo-height',
                'type' => 'switch',
                'required' => array('header-site-title', '=', '0'),
                'title' => esc_html__('Custom logo height', 'milton'),
                'subtitle' => esc_html__('it will help you to increase the logo size.', 'milton'),
                'default' => 0, // 1 = on | 0 = off
                'on' => 'Yes',
                'off' => 'No',
            ),
            array(
                'id'            => 'custom-logo-height-value',
                'type'          => 'slider',
                'required' => array('custom-logo-height', '=', '1'),
                'title'         => esc_html__( 'Choose the logo height', 'milton' ),
                'default'       => 24,
                'min'           => 10,
                'step'          => 1,
                'max'           => 360,
            ),
            /*array(
                'id'             => 'header-logo-padding',
                'required' => array('header-site-title', '=', '0'),
                'type'           => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'           => 'padding',
                // absolute, padding, margin, defaults to padding
                'all'            => false,
                // Have one field that applies to all
                'right'         => false,     // Disable the right
                'left'          => false,     // Disable the left
                'units'          => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',    // Allow users to select any type of unit
                'title'          => esc_html__( 'Logo Top/Bottom Padding(inner)', 'milton' ),
                'subtitle'       => esc_html__( 'Here, you can set padding to the logo image. it will add space inside the logo.', 'milton' ),
                'desc'           => esc_html__( 'Note: it won\'t affect the height of the header', 'milton' ),
                'default'        => array(
                    'padding-top'    => '0px',
                    'padding-bottom' => '0px',
                ),
                'output'         => array( '.header-icon img' )
            ),*/
            
            array(
                'id'             => 'header-logo-padding-2',
                'type'           => 'spacing',
                //'required' => array('header-menu-style', 'equals', 'center-header-menu'),
                // An array of CSS selectors to apply this font style to
                'mode'           => 'padding',
                // absolute, padding, margin, defaults to padding
                'all'            => false,
                // Have one field that applies to all
                'right'         => false,     // Disable the right
                'left'          => false,     // Disable the left
                'units'          => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',    // Allow users to select any type of unit
                'title'          => esc_html__( 'Logo Top/Bottom Padding(Outer)', 'milton' ),
                'subtitle'       => esc_html__( 'Here, you can set padding to the logo image. it will add space outside the logo.', 'milton' ),
                'output'         => array( '.header-navigation-menu .header-icon' )
            ),
            array(
                'id' => 'logo-1-font',
                'type' => 'typography',
                'required' => array('header-site-title', '=', '1'),
                'title' => esc_html__('Site Title 1 Font options', 'milton'),
                'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                //'fonts' => $font_list,
                'font-backup' => true, // Select a backup non-google font in addition to a google font
                'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-size'=>false,
                'line-height'=>false,
                'letter-spacing'=>true, // Defaults to false
                'text-align' => false,
                'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                'output' => array('.header-icon .logo-text.logo-main'), // An array of CSS selectors to apply this font style to dynamically
                'units' => 'em',  // Defaults to px
                'subtitle' => esc_html__('if you use the text logo, it will be helpful', 'milton'),
                'desc' => esc_html__('Font weight & style may not be applicable for Custom Fonts(if any).', 'milton'),
                'preview' => false,
                'default' => array(
                    'font-style' => '700',
                    'font-family' => 'Catamaran',
                    'letter-spacing' => '-0.06em',
                    'color' => '#333333',
                    'google' => true,
                ),
            ),
            array(
                'id' => 'logo-2-font',
                'type' => 'typography',
                'required' => array('header-site-title', '=', '1'),
                'title' => esc_html__('Site Title 2 Font options(optional)', 'milton'),
                'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                //'fonts' => $font_list,
                'font-backup' => true, // Select a backup non-google font in addition to a google font
                'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-size'=>false,
                'line-height'=>false,
                'letter-spacing'=>true, // Defaults to false
                'text-align' => false,
                'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                'output' => array('.header-sticky .header-icon .logo-text.logo-additional'), // An array of CSS selectors to apply this font style to dynamically
                'units' => 'em',  // Defaults to px
                'subtitle' => esc_html__('This is an optional and helpful when you\'re using sticky header.' , 'milton'),
                'desc' => esc_html__('Font weight & style may not be applicable for Custom Fonts(if any).', 'milton'),
                'preview' => false,
                'default' => array(
                    'font-style' => '700',
                    'font-family' => 'Catamaran',
                    'letter-spacing' => '-0.06em',
                    'color' => '#333333',
                    'google' => true,
                ),
            ),
            array(
                'id' => 'logo-description',
                'type' => 'switch',
                'required' => array('header-site-title', '=', '1'),
                'title' => esc_html__('Logo Descripiton', 'milton'),
                'subtitle' => esc_html__( 'if you use the description for the logo, it will be helpful', 'milton' ),
                'default' => '', // 1 = on | 0 = off
            ),
            array(
                'id' => 'header-menu-style',
                'type' => 'image_select',
                'title' => esc_html__('Header Style', 'milton'),
                'subtitle' => esc_html__('Choose the header display style.', 'milton'),
                'options' => array(                            
                    'default-header-menu' => array('alt' => 'Default Menu', 'img' => AGNI_FRAMEWORK_URL . '/template/img/header-style-1.png'),
                    'minimal-header-menu' => array('alt' => 'Minimal Menu', 'img' => AGNI_FRAMEWORK_URL . '/template/img/header-style-2.png'),
                    'center-header-menu' => array('alt' => 'Center Header Menu', 'img' => AGNI_FRAMEWORK_URL . '/template/img/header-style-3.png'),
                    'strip-header-menu' => array('alt' => 'Strip Header Menu', 'img' => AGNI_FRAMEWORK_URL . '/template/img/header-style-4.png'),
                    'side-header-menu' => array('alt' => 'Sidebar Header Menu', 'img' => AGNI_FRAMEWORK_URL . '/template/img/header-style-5.png'),
                    'border-header-menu' => array('alt' => 'Border Header Menu', 'img' => AGNI_FRAMEWORK_URL . '/template/img/header-style-6.png'),
                ), //Must provide key => value(array:title|img) pairs for radio options
                'default' => 'default-header-menu'
            ),
            array(
                'id' => 'header-menu-style-default-choice',
                'required' => array('header-menu-style', 'equals', array('default-header-menu', 'minimal-header-menu')),
                'type'     => 'radio',
                'title'    => esc_html__( 'Menu Items Alignment', 'milton' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'right' => 'Right',
                    'center' => 'Center',
                    'left' => 'Left',
                ),
                'default'  => 'right'
            ),
            array(
                'id' => 'header-menu-style-choice-order',
                'required' => array('header-menu-style', 'equals', array('default-header-menu', 'minimal-header-menu')),
                'type'     => 'select',
                'title'    => esc_html__( 'Menu Items Order', 'milton' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'lmi' => 'Logo + Menu + Icons',
                    'mli' => 'Menu + Logo + Icons',
                    'lim' => 'Logo + Icons + Menu',
                ),
                'default'  => 'lmi'
            ),
            array(
                'id'       => 'header-menu-name',
                'type'     => 'text',
                'required' => array( 'header-menu-style', 'equals', array('minimal-header-menu', 'strip-header-menu') ),
                'title'    => esc_html__( 'Menu Name', 'milton' ),
                'subtitle' => esc_html__( 'Name/Text to display above to the hamburger icon.', 'milton' ),
                'default'  => 'Menu',
            ),
            array(
                'id'       => 'header-menu-name-active',
                'type'     => 'text',
                'required' => array( 'header-menu-style', 'equals', array('strip-header-menu') ),
                'title'    => esc_html__( 'Menu Name on Active', 'milton' ),
                'subtitle' => esc_html__( 'Name/Text to display after clicking hamburger icon/Menu Name.', 'milton' ),
                'default'  => 'Close',
            ),
            array(
                'id'       => 'header-minimal-menu-color',
                'type'     => 'color',
                'transparent' => false,
                'required' => array('header-menu-style', 'equals', array('minimal-header-menu', 'strip-header-menu')),
                'title'    => esc_html__( 'Hamburger Icon/Text color 1', 'milton' ),
                'default'  => '',
                'output'   => array( '.burg, .burg:before, .burg:after' ),
                'mode'     => 'background',
                'validate' => 'color',
            ),

            array(
                'id'       => 'header-minimal-menu-color-2',
                'type'     => 'color',
                'transparent' => false,
                'required' => array('header-menu-style', 'equals', array('minimal-header-menu', 'strip-header-menu')),
                'title'    => esc_html__( 'Hamburger Icon/Text color 2(Optional)', 'milton' ),
                'default'  => '',
                'output'   => array( '.header-sticky.top-sticky .toggle-nav-menu-additional .burg, .header-sticky.top-sticky .toggle-nav-menu-additional .burg:before, .header-sticky.top-sticky .toggle-nav-menu-additional .burg:after' ),
                'mode'     => 'background',
                'validate' => 'color',
            ),

            

            array(
                'id' => 'header-menu-burg',
                'type' => 'checkbox',
                'required' => array( 'header-menu-style', 'equals', array('minimal-header-menu', 'strip-header-menu') ),
                'title' => esc_html__('Hamburger Icon', 'milton'),
                'subtitle' => esc_html__( 'This will enable the hamburger icon for desktop.', 'milton' ),
                'default' => 1, // 1 = on | 0 = off
            ),

            array(
                'id'       => 'header-logo-bg-color-1',
                'type'     => 'color_rgba',
                'required' => array('header-menu-style', 'equals', 'center-header-menu'),
                'title'    => esc_html__( 'Header Logo Background color', 'milton' ),
                'subtitle' => esc_html__( 'Main Logo background color. You can even set the Transparency to the background color at the top.', 'milton' ),
                'default'  => array(
                    'color' => '#f6f7f8',
                    'alpha' => '1'
                ),
                //'output'   => array( '.center-header-menu .header-icon, .reverse_skin.header-sticky.top-sticky.center-header-menu .header-icon.header-logo-additional-bg-color' ),
                'output'   => array( '.center-header-menu .header-icon-container, .reverse_skin.header-sticky.top-sticky.center-header-menu .header-icon-container' ),
                'mode'     => 'background',
                'validate' => 'colorrgba',
            ),
            array(
                'id'       => 'header-logo-bg-color-2',
                'type'     => 'color_rgba',
                'required' => array('header-menu-style', 'equals', 'center-header-menu'),
                'title'    => esc_html__( 'Header Logo Background color 2(Optional)', 'milton' ),
                'subtitle' => esc_html__( 'background color except at the top.', 'milton' ),
                //'output'   => array( '.header-sticky.top-sticky.center-header-menu .header-icon.header-logo-additional-bg-color, .reverse_skin.center-header-menu .header-icon' ),
                'output'   => array( '.header-sticky.top-sticky.center-header-menu .header-icon-container.header-logo-additional-bg-color, .reverse_skin.center-header-menu .header-icon-container' ),
                'mode'     => 'background',
                'validate' => 'colorrgba',
            ),
            array(
                'id'       => 'header-strip-bg-color-1',
                'type'     => 'color_rgba',
                'required' => array('header-menu-style', 'equals', 'strip-header-menu'),
                'title'    => esc_html__( 'Header Strip Background color', 'milton' ),
                'subtitle' => esc_html__( 'Header Strip background color. You can even set the Transparency to the background color at the top.', 'milton' ),
                'default'  => array(
                    'color' => '#f6f7f8',
                    'alpha' => '1'
                ),
                'output'   => array( '.strip-header-bar' ),
                'mode'     => 'background',
                'validate' => 'colorrgba',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General', 'milton' ),
        'id'         => 'header-general-options',
        'subsection' => true,
        'desc'       => esc_html__( 'Here, you can customize header style, size, icons etc.', 'milton' ),
        'fields' => array(
            
            array(
                'id' => 'header-sticky',
                'type' => 'switch',
                'required' => array('layout-boxed', '!=', '1'),
                'title' => esc_html__('Sticky Header', 'milton'),
                'subtitle' => esc_html__('Disable sticky header by turning off', 'milton'),
                "default" => 1,
            ),
            array(
                'id' => 'header-sticky-fancy',
                'type' => 'checkbox',
                'required' => array( 'header-sticky', '=', '1' ),
                'title' => esc_html__('Sticky only when scroll Up', 'milton'),
                'default' => 0, // 1 = on | 0 = off
            ),

            array(
                'id' => 'header-bg-transparent',
                'type' => 'checkbox',
                'title' => esc_html__('Transparent Header', 'milton'),
                'subtitle' => esc_html__( 'This option make whole header background transparent completely. And this will not affect the sticky header(if enabled).', 'milton' ),
                'desc' => esc_html__( 'This option can be overwritten by each page\'s Page option.', 'milton' ),
                'default' => 0, // 1 = on | 0 = off
            ),
            array(
                'id' => 'shrink-header-menu',
                'type' => 'checkbox',
                'required' => array( 'header-menu-style', '!=', 'side-header-menu' ),
                'title' => esc_html__('Shrink Header', 'milton'),
                'subtitle' => esc_html__( 'This option is used to reduce the height of the menu to 60px.', 'milton' ),
                'default' => 0, // 1 = on | 0 = off
            ),
            array(
                'id' => 'fullwidth-header-menu',
                'type' => 'checkbox',
                'required' => array( 'header-menu-style', '!=', 'side-header-menu' ),
                'title' => esc_html__('Fullwidth Header', 'milton'),
                'default' => 0, // 1 = on | 0 = off
            ),
            array(
                'id' => 'header-menu-button',
                'type' => 'checkbox',
                'title' => esc_html__('Header Menu Button', 'milton'),
                'subtitle' => esc_html__( 'It will apply the button style to the last menu item.', 'milton' ),
                'default' => 0, // 1 = on | 0 = off
            ),
            array(
                'id'             => 'header-menu-button-padding',
                'required' => array('header-menu-button', '=', '1'),
                'type'           => 'spacing',
                // An array of CSS selectors to apply this font style to
                'mode'           => 'padding',
                // absolute, padding, margin, defaults to padding
                //'all'            => true,
                // Have one field that applies to all
                //'right'         => false,     // Disable the right
                //'left'          => false,     // Disable the left
                'units'          => 'px',      // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'false',    // Allow users to select any type of unit
                'title'          => esc_html__( 'Menu Button Padding', 'milton' ),
                'default'        => array(
                    'padding-top'    => '8px',
                    'padding-bottom' => '8px',
                    'padding-right' => '21px',
                    'padding-left' => '21px'
                ),
                'output'         => array( '.has-menu-button ul.nav-menu-content >li:last-child >a, .has-menu-button div.nav-menu-content >ul >li:last-child >a' )
            ),

            array(
                'id' => 'header-menu-button-fontsize',
                'type' => 'text',
                'required' => array('header-menu-button', '=', '1'),
                'title' => esc_html__('Button Font Size', 'milton'),
                'default' => '11',
                'class' => 'text',
                'validate' => 'numeric',
            ),

            array(
                'id' => 'header-menu-button-bg-color',
                'type' => 'color',
                'required' => array('header-menu-button', '=', '1'),
                'transparent' => false,
                'output' => array( '.has-menu-button ul.nav-menu-content >li:last-child >a, .has-menu-button div.nav-menu-content >ul >li:last-child >a' ), 
                'mode' => 'background',
                'title' => esc_html__('Button BG color ', 'milton'),
                'default' => '#242424',
                'validate' => 'color',
            ),
            array(
                'id' => 'header-menu-button-color',
                'type' => 'color',
                'required' => array('header-menu-button', '=', '1'),
                'transparent' => false,
                'output' => array( '.has-menu-button ul.nav-menu-content >li:last-child >a, .has-menu-button div.nav-menu-content >ul >li:last-child >a' ), 
                'mode' => 'color',
                'title' => esc_html__('Button color', 'milton'),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id' => 'header-menu-has-no-arrows',
                'type' => 'checkbox',
                'title' => esc_html__('Remove Header Menu Arrows', 'milton'),
                'default' => 0, // 1 = on | 0 = off
            ),

            array(
                'id' => 'header-search-box',
                'type' => 'switch',
                'title' => esc_html__('Search Box', 'milton'),
                'default' => 0, // 1 = on | 0 = off
                'on' => 'Enable',
                'off' => 'Disable',
            ),

            array(
                'id'       => 'header-search-box-overlay',
                'type'     => 'color_rgba',
                'required' => array('header-search-box', '=', '1'),
                'title'    => esc_html__( 'Search Box BG color', 'milton' ),
                'default'  => array(
                    'color' => '#333333',
                    'alpha' => '0.9'
                ),
                'output'   => array( '.header-search' ),
                'mode'     => 'background',
                'validate' => 'colorrgba',
            ),
            array(
                'id' => 'header-search-box-color',
                'type' => 'color',
                'required' => array('header-search-box', '=', '1'),
                'transparent' => false,
                'output' => array( '.header-search input[type="text"]' ), 
                'mode' => 'color',
                'title'    => esc_html__( 'Search Box color', 'milton' ),
                'default' => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id'       => 'header-search-box-text',
                'type'     => 'text',
                'required' => array('header-search-box', '=', '1'),
                'title'    => esc_html__( 'Search Box Placeholder Text', 'milton' ),
                'subtitle' => esc_html__( 'This text will be displayed inside the search input.', 'milton' ),
                'default'  => 'Type & Hit Enter',
            ),
            array(
                'id' => 'header-lang-box',
                'type' => 'switch',
                'title' => esc_html__('Language Boxes', 'milton'),
                'default' => 0, // 1 = on | 0 = off
                'on' => 'Enable',
                'off' => 'Disable',
            ),
            array(
                'id'       => 'header-lang-name',
                'type'     => 'text',
                'required' => array('header-lang-box', '=', '1'),
                'title'    => esc_html__( 'Language Menu Name', 'milton' ),
                'subtitle' => esc_html__( 'Name to display inside the language menu in the header. You also can display the icon by placing the html tag.', 'milton' ),
                'desc' => esc_html__( ' for icon ref. http://fortawesome.github.io/Font-Awesome/icons/', 'milton' ),
                'default'  => '<i class="icon-basic-world"></i>',
            ),
            array(
                'id'       => 'header-lang-list',
                'type'     => 'editor',
                'required' => array('header-lang-box', '=', '1'),
                'title'    => esc_html__('Language List', 'milton'),
                'subtitle' => esc_html__('To give your own langauage link, just go to text mode and replace \'#\' with your link.', 'milton'),
                'default'  => '<ul><li><a href="#">EN</a></li><li><a href="#">TA</a></li><li><a href="#">ES</a></li></ul>',
                'args'   => array(
                    'wpautop'   => false,
                    'media_buttons'=> false,
                )
            ),
            array(
                'id' => 'header-wpml-box',
                'type' => 'switch',
                //'required' => array('header-lang-box', '=', '1'),
                'title' => esc_html__('WPML Language Switch', 'milton'),
                'subtitle' => esc_html__( 'It will work only when you have WPML plugin activated', 'milton' ),
                'default' => 0, // 1 = on | 0 = off
                'on' => 'ON',
                'off' => 'OFF',
            ),
            array(
                'id' => 'header-cart-box',
                'type' => 'switch',
                'title' => esc_html__('Shopping Cart Box', 'milton'),
                'subtitle' => esc_html__('It will work only when Woocommerce is activated.', 'milton'),
                'default' => 0, // 1 = on | 0 = off
                'on' => 'Enable',
                'off' => 'Disable',
            ),
            array(
                'id' => 'header-cart-amount',
                'type' => 'checkbox',
                'required' => array( 'header-cart-box', '=', '1' ),
                'title' => esc_html__('Cart Amount', 'milton'),
                'default' => 1, // 1 = on | 0 = off
            ),

            array(
                'id' => 'header-wishlist-box',
                'type' => 'switch',
                'title' => esc_html__('Wishlist Box', 'milton'),
                'subtitle' => esc_html__('It will work only when Woocommerce & yith wishlist plugin is activated.', 'milton'),
                'default' => 0, // 1 = on | 0 = off
                'on' => 'Enable',
                'off' => 'Disable',
            ),
            array(
                'id'       => 'header-icon-link-color-1',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Header Icons Color 1', 'milton' ),
                'subtitle' => esc_html__( 'This is main color for regular & hover icons links.', 'milton' ),
                'active'    => false, // Disable Active Color
                'default'  => array(
                    'regular' => '#555555',
                    'hover'   => '#1259c3',
                ),
            ),
            array(
                'id'       => 'header-icon-link-color-2',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Header Icons Color 2(Optional)', 'milton' ),
                'subtitle' => esc_html__( 'It will override the Header Icons Color 1 except at the top.', 'milton' ),
                'active'    => false, // Disable Active Color
                'default'  => array(
                    'regular' => '',
                    'hover'   => '',
                ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Top Bar', 'milton' ),
        'id'         => 'header-top-bar-options',
        'subsection' => true,
        'desc'       => esc_html__( 'Here, you can customize header topbar and topbar\'s menu.', 'milton' ),
        'fields' => array(
            array(
                'id' => 'header-top-bar',
                'type' => 'switch',
                'required' => array( 'header-menu-style', '!=', 'side-header-menu' ),
                'title' => esc_html__('Top Bar', 'milton'),
                'subtitle' => esc_html__('This is top bar which is shown above to the header menu.', 'milton'),
                'desc' => esc_html__('Note: This bar will be hidden on mobile devices.', 'milton'),
                'default' => 0, // 1 = on | 0 = off
                'on' => 'On',
                'off' => 'Off',
            ),
            array(
                'id'       => 'header-top-email',
                'type'     => 'text',
                'required' => array('header-top-bar', '=', '1'),
                'title'    => esc_html__( 'Email Address', 'milton' ),
                'default'  => 'yourmail@mail.com',
            ),array(
                'id'       => 'header-top-number',
                'type'     => 'text',
                'required' => array('header-top-bar', '=', '1'),
                'title'    => esc_html__( 'Contact number', 'milton' ),
                'default'  => '(000) 000-0000',
            ),
            array(
                'id'       => 'header-top-color',
                'type'     => 'color',
                'required' => array('header-top-bar', '=', '1'),
                'title'    => esc_html__( 'Top bar Color', 'milton' ),
                'default'  => '#555555',
                'output'   => array( '.header-top-bar' ),
            ),
            array(
                'id' => 'top-bar-nav',
                'type' => 'checkbox',
                'required' => array('header-top-bar', '=', '1'),
                'title' => esc_html__('Top Bar Menu', 'milton'),
                'default' => 0, // 1 = on | 0 = off
            ),
            array(
                'id'       => 'header-top-menu-color',
                'type'     => 'link_color',
                'required' => array('top-bar-nav', '=', '1'),
                'title'    => esc_html__( 'Top Bar Menu Links Color', 'milton' ),
                'subtitle' => esc_html__( 'Just choose you color for regular & hover links. its applicable only on menu items.', 'milton' ),
                'active'    => false, // Disable Active Color
                'default'  => array(
                    'regular' => '#999',
                    'hover'   => '#1259c3',
                ),
                'output'   => array( '.top-nav-menu a' ),
            ),
            
            array(
                'id'       => 'header-top-bg-color',
                'type'     => 'color_rgba',
                'required' => array('header-top-bar', '=', '1'),
                'title'    => esc_html__( 'Header Top Bar Background color', 'milton' ),
                'subtitle' => esc_html__( 'You can even set the Transparency to the background color.', 'milton' ),
                'default'  => array(
                    'color' => '#f6f7f8',
                    'alpha' => '1'
                ),
                'output'   => array( '.header-top-bar' ),
                'mode'     => 'background',
                'validate' => 'colorrgba',
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header Menu', 'milton' ),
        'id'         => 'header-menu-options',
        'subsection' => true,
        'desc'       => esc_html__( 'Here, you can change menu items color, font, etc.', 'milton' ),
        'fields' => array(
            array(
                'id'       => 'header-menu-bg-color-1',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Header Menu Background color', 'milton' ),
                'subtitle' => esc_html__( 'Main Menu background color. You can even set the Transparency to the background color at the top.', 'milton' ),
                'default'  => array(
                    'color' => '#f6f7f8',
                    'alpha' => '1'
                ),
                'output'   => array( '.header-navigation-menu, .nav-menu-content .sub-menu, .reverse_skin.header-sticky.top-sticky.header-navigation-menu.header-additional-bg-color:not(.side-header-menu), .tab-nav-menu, .border-header-menu + .border-header-menu-footer, .border-header-menu-right, .border-header-menu-left' ),
                'mode'     => 'background',
                'validate' => 'colorrgba',
            ),
            array(
                'id'       => 'header-menu-bg-color-2',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Header Menu Background color 2(Optional)', 'milton' ),
                'subtitle' => esc_html__( 'background color except at the top.', 'milton' ),
                'output'   => array( '.header-sticky.top-sticky.header-navigation-menu.header-additional-bg-color:not(.side-header-menu), .reverse_skin.header-navigation-menu' ),
                'mode'     => 'background',
                'validate' => 'colorrgba',
            ),
            array(
                'id'       => 'header-menu-overlay',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Overlay Menu BG color', 'milton' ),
                'subtitle' => esc_html__( 'background color will be applied to mobile menu & Minimal overlay menu(Hamburger).', 'milton' ),
                'default'  => array(
                    'color' => '#ffffff',
                    'alpha' => '0.9'
                ),
                'output'   => array( '.tab-nav-menu' ),
                'mode'     => 'background',
                'validate' => 'colorrgba',
            ),
            array(
                'id' => 'header-font',
                'type' => 'typography',
                'title' => esc_html__('Header Menu font options', 'milton'),
                'google' => true, // Disable google fonts. Won't work if you haven't defined your google api key
                //'fonts' => $font_list,
                'font-backup' => true, // Select a backup non-google font in addition to a google font
                'font-style'=>false, // Includes font-style and weight. Can use font-style or font-weight to declare
                'font-size'=>false,
                'line-height'=>false,
                'letter-spacing'=>true, // Defaults to false
                'text-align' => false,
                'color'=>false,
                'all_styles' => true, // Enable all Google Font style/weight variations to be added to the page
                'output' => array('.nav-menu a, .tab-nav-menu a'), // An array of CSS selectors to apply this font style to dynamically
                'units' => 'em',  // Defaults to px
                'subtitle' => esc_html__('if you use the text logo, it will be helpful', 'milton'),
                'desc' => esc_html__('Font weight & style may not be applicable for Custom Fonts(if any).', 'milton'),
                'preview' => false,
                'default' => array(
                    'font-weight' => '',
                    'font-family' => '',
                    'google' => true,
                ),
            ),
            array(
                'id' => 'header-fontsize',
                'type' => 'text',
                'title' => esc_html__('Header Menu Font Size', 'milton'),
                'desc' => esc_html__( 'Font size in px. Do not enter "px"', 'milton' ),
                'default' => '12',
                'class' => 'text',
                'validate' => 'numeric',
            ),
            array(
                'id' => 'header-text-transform',
                'type'     => 'select',
                'title'    => esc_html__( 'Header Menu Text Transform', 'milton' ),
                'options'  => array(
                    'none' => 'None',
                    'uppercase' => 'Uppercase',
                    'lowercase' => 'Lowercase',
                    'capitalize' => 'Capitalize',
                ),
                'default'  => 'uppercase'
            ),
            array(
                'id' => 'header-fontsize-2',
                'type' => 'text',
                'title' => esc_html__('Header Sub Menu Font Size (Optional)', 'milton'),
                'desc' => esc_html__( 'It will apply the font size to the sub-level menus. Font size in px. Do not enter "px"', 'milton' ),
                'default' => '',
                'class' => 'text',
                'validate' => 'numeric',
            ),
            array(
                'id' => 'header-text-transform-2',
                'type'     => 'select',
                'title'    => esc_html__( 'Header Sub Menu Text Transform (Optional)', 'milton' ),
                'options'  => array(
                    'none' => 'None',
                    'uppercase' => 'Uppercase',
                    'lowercase' => 'Lowercase',
                    'capitalize' => 'Capitalize',
                ),
                'default'  => ''
            ),
            array(
                'id'       => 'header-menu-link-color-1',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Header Menu Links Color', 'milton' ),
                'subtitle' => esc_html__( 'Main menu color for regular & hover links. it will be applied at the top.', 'milton' ),
                'active'    => false, // Disable Active Color
                'default'  => array(
                    'regular' => '#333333',
                    'hover'   => '#1259c3',
                ),
                'output'   => array( '.nav-menu a', '.nav-menu-content li a', '.tab-nav-menu a', '.reverse_skin.header-sticky.top-sticky:not(.side-header-menu) .nav-menu.nav-menu-additional-color .nav-menu-content > li > a' ),
            ),
            array(
                'id'       => 'header-menu-link-color-2',
                'type'     => 'link_color',
                'title'    => esc_html__( 'Header Menu Links Color 2(Optional)', 'milton' ),
                'subtitle' => esc_html__( 'Menu link color except at the top.', 'milton' ),
                'active'    => false, // Disable Active Color
                'default'  => array(
                    'regular' => '',
                    'hover'   => '',
                ),
                'output'   => array( '.header-sticky.top-sticky:not(.side-header-menu) .nav-menu.nav-menu-additional-color .nav-menu-content > li > a', '.reverse_skin .nav-menu-content > li > a' ),
            ),
            array(
                'id'       => 'header-menu-border-1',
                'type'     => 'border',
                'title'    => esc_html__( 'Header Menu Border', 'milton' ),
                'subtitle' => esc_html__( 'Main border above & below to the menu items at the top.', 'milton' ),
                'all'      => true,
                'top'      => false,
                'left'      => false,
                'right'      => false,
                'color'     => false,
                // An array of CSS selectors to apply this font style to
                'default'  => array(
                    'border-style'  => 'solid',
                    'border-bottom' => '0px'
                )
            ), 
            array(
                'id'       => 'header-menu-border-color-1',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Header Menu Border Color', 'milton' ),
                'subtitle' => esc_html__( 'Main border color above & below to the menu items at the top.', 'milton' ),
                'output'   => array( '.header-navigation-menu .header-menu-content, .reverse_skin.header-sticky.top-sticky.header-navigation-menu.header-menu-border-additional:not(.side-header-menu) .header-menu-content, .reverse_skin.header-sticky.top-sticky.side-header-menu.header-menu-border-additional:not(.side-header-menu) .tab-nav-menu, .header-navigation-menu .header-menu-flex > div:first-child .header-icon, .reverse_skin.header-sticky.top-sticky.header-navigation-menu.header-menu-border-additional:not(.side-header-menu)  .header-menu-flex > div:first-child .header-icon, .header-navigation-menu:not(.center-header-menu) .header-menu-flex > div:last-child .header-menu-icons, .reverse_skin.header-sticky.top-sticky.header-navigation-menu.header-menu-border-additional:not(.side-header-menu):not(.center-header-menu) .header-menu-flex > div:last-child .header-menu-icons, .header-navigation-menu.center-header-menu .header-menu-content, .reverse_skin.header-sticky.top-sticky.header-navigation-menu.center-header-menu.header-menu-border-additional:not(.side-header-menu) .header-menu-content' ),
                'mode'  => 'border-color',
                'validate' => 'colorrgba',
            ), 
            array(
                'id'       => 'header-menu-border-2',
                'type'     => 'border',
                'title'    => esc_html__( 'Header Menu Border 2(Optional)', 'milton' ),
                'subtitle' => esc_html__( 'Optional border above & below to the menu items except at the top.', 'milton' ),
                'all'      => true,
                'top'      => false,
                'left'      => false,
                'right'      => false,
                'color'     => false,
                'default'  => array(
                    'border-style'  => '',
                    'border-bottom' => ''
                )
            ),  
            array(
                'id'       => 'header-menu-border-color-2',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Header Menu Border Color 2(Optional)', 'milton' ),
                'subtitle' => esc_html__( 'Main border color above & below to the menu items except at the top.', 'milton' ),
                'output'   => array( '.header-sticky.top-sticky.header-navigation-menu.header-menu-border-additional:not(.side-header-menu) .header-menu-content, .header-sticky.top-sticky.side-header-menu.header-menu-border-additional:not(.side-header-menu) .tab-nav-menu, .reverse_skin.header-navigation-menu .header-menu-content, .header-sticky.top-sticky.header-navigation-menu.header-menu-border-additional:not(.side-header-menu) .header-menu-flex > div:first-child .header-icon, .reverse_skin.header-navigation-menu .header-menu-flex > div:first-child .header-icon, .header-sticky.top-sticky.header-navigation-menu.header-menu-border-additional:not(.side-header-menu):not(.center-header-menu) .header-menu-flex > div:last-child .header-menu-icons, .reverse_skin.header-navigation-menu .header-menu-flex:not(.center-header-menu) > div:last-child .header-menu-icons, .header-sticky.top-sticky.header-navigation-menu.center-header-menu.header-menu-border-additional:not(.side-header-menu) .header-menu-content, .reverse_skin.header-navigation-menu.center-header-menu .header-menu-content' ),
                'mode'  => 'border-color',
                'validate' => 'colorrgba',
            ),    
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social Media', 'milton' ),
        'id'         => 'header-social-media-icons',
        'subsection' => true,
        'desc'       => esc_html__( 'Here, you can enable/disable, sort the social media icons for header.', 'milton' ),
        'fields' => array(
            array(
                'id' => 'social-media-header',
                'type' => 'switch',
                'title' => esc_html__('Social Media Icons', 'milton'),
                'subtitle' => esc_html__('enable this to show the list of social media icons', 'milton'),
                "default" => 0,
                'on' => 'Enable',
                'off' => 'Disable',
            ),
            array(
                'id' => 'social-media-header-style',
                'required' => array('social-media-header', '=', '1'),
                'type' => 'select',
                'title' => esc_html__('Social Icons Style', 'milton'),
                'subtitle' => esc_html__('You can display the social icons in two way. One is default(sequence of icons) another one is dropdown style.', 'milton'),
                'options' => array(
                    'default' => 'Default', 
                    'minimal' => 'Dropdown(minimal)',
                ), //Must provide key => value pairs for select options
                'default' => 'default'
            ),
            array(
                'id' => 'social-media-header-location',
                'required' => array('social-media-header', '=', '1'),
                'type'     => 'radio',
                'title'    => esc_html__( 'Location', 'milton' ),
                'subtitle' => esc_html__( 'Here, You can set the place where you want to display the social media icons', 'milton' ),
                'desc'     => esc_html__( 'Note : Top Menu option only work when you enabled Top Bar.', 'milton' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Default(Header menu)',
                    '2' => 'at Top Bar',
                ),
                'default'  => '1'
            ),
            array(
                'id' => 'header-link-target',
                'required' => array('social-media-header', '=', '1'),
                'type' => 'select',
                'title' => esc_html__('Link target', 'milton'),
                'subtitle' => esc_html__('Choose the target of the link on click.', 'milton'),
                'options' => array(
                    '_self' => 'Same window', 
                    '_blank' => 'New window',
                ), //Must provide key => value pairs for select options
                'default' => '_self'
            ),
            array(
                'id'       => 'social-media-icons-header',
                'type'     => 'sortable',
                'required' => array('social-media-header', '=', '1'),
                'mode'     => 'checkbox', // checkbox or text
                'title'    => esc_html__( 'Choose your icons', 'milton' ),
                'subtitle' => esc_html__( 'Enable the Social icon which you want to display in header', 'milton' ),
                'options'  => array(
                    'facebook' => 'Facebook',
                    'twitter' => 'Twitter',
                    'google-plus' => 'Google Plus',
                    'bitbucket' => 'BitBucket',
                    'behance' => 'Behance',
                    'dribbble' => 'Dribbble',
                    'flickr' => 'Flickr',
                    'github' => 'GitHub',
                    'instagram' => 'instagram',
                    'linkedin' => 'Linkedin',
                    'pinterest' => 'Pinterest',
                    'reddit' => 'Reddit',
                    'soundcloud' => 'SoundCloud',
                    'skype' => 'Skype',
                    'stack-overflow' => 'StackOverflow',
                    'tumblr' => 'Tumblr',
                    'vimeo' => 'Vimeo',
                    'vk' => 'VK',
                    'weibo' => 'Weibo',
                    'whatsapp' => 'WhatsApp',
                    'youtube' => 'YouTube',
                ),
                'default'  => array(
                    'facebook' => true,
                    'twitter' => true,
                    'google-plus' => false,
                    'bitbucket' => false,
                    'behance' => false,
                    'dribbble' => true,
                    'flickr' => false,
                    'github' => false,
                    'instagram' => false,
                    'linkedin' => false,
                    'pinterest' => false,
                    'reddit' => false,
                    'soundcloud' => false,
                    'skype' => false,
                    'stack-overflow' => false,
                    'tumblr' => false,
                    'vimeo' => false,
                    'vk' => false,
                    'weibo' => false,
                    'whatsapp' => false,
                    'youtube' => false,
                )
            ),       
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Footer Settings', 'milton' ),
        'id'    => 'footer-settings',
        'icon'  => 'el el-tint'
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General & Colophon', 'milton' ),
        'id'         => 'footer-general-options',
        'subsection' => true,
        'desc'       => esc_html__( 'This option allows you to change footer colophon text, color, etc.', 'milton' ),
        'fields' => array(

            array(
                'id' => 'footer-text-choice',
                'type' => 'switch',
                'title' => esc_html__('Footer Info.', 'milton'),
                'default' => 1, // 1 = on | 0 = off
            ),

            array(
                'id' => 'footer-style',
                'type' => 'select',
                'required' => array('footer-text-choice', '=', '1'),
                'title' => esc_html__('Footer Style', 'milton'),
                'subtitle' => esc_html__('Choose the any of the one footer style.', 'milton'),
                'options' => array(
                    'style-1' => 'Style 1', 
                    'style-2' => 'Style 2',
                ), //Must provide key => value pairs for select options
                'default' => 'style-1'
            ),
            array(
                'id' => 'footer-sticky',
                'type' => 'checkbox',
                'title' => esc_html__('Footer Sticky', 'milton'),
                'subtitle' => esc_html__('It will stick the footer to the bottom of page.', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),
            array(
                'id' => 'footer-fullwidth',
                'type' => 'checkbox',
                'required' => array('footer-text-choice', '=', '1'),
                'title' => esc_html__('Fullwidth', 'milton'),
                'subtitle' => esc_html__('It will make the footer width 100%.', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'footer-colophon-bg-color',
                'type'     => 'color_rgba',
                'required' => array('footer-text-choice', '=', '1'),
                'title'    => esc_html__( 'Footer Colophon Background color', 'milton' ),
                'subtitle' => esc_html__( 'You can even set the Transparency to the background color.', 'milton' ),
                'default'  => array(
                    'color' => '#f6f7f8',
                    'alpha' => '1'
                ),
                'output'   => array( '.site-footer' ),
                'mode'     => 'background',
                'validate' => 'colorrgba',
            ),
            array(
                'id' => 'footer-logo',
                'type' => 'media',
                'required' => array('footer-text-choice', '=', '1'),
                'title' => esc_html__('Footer Logo', 'milton'),
                'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                //'desc' => esc_html__('Basic media uploader with disabled URL input field.', 'milton'),
                'url' => true,
                'subtitle' => esc_html__('Here, you can upload logo to display in the footer.', 'milton'),
            ),
            array(
                'id'             => 'footer-logo-padding',
                'type'           => 'spacing',
                'required' => array('footer-text-choice', '=', '1'),
                // An array of CSS selectors to apply this font style to
                'mode'           => 'padding',
                // absolute, padding, margin, defaults to padding
                'all'            => false,
                // Have one field that applies to all
                'right'         => false,     // Disable the right
                'left'          => false,     // Disable the left
                'units'          => array( 'em', 'px', '%' ),      // You can specify a unit value. Possible: px, em, %
                'units_extended' => 'true',    // Allow users to select any type of unit
                'title'          => esc_html__( 'Logo Top/Bottom inner Padding', 'milton' ),
                'subtitle'       => esc_html__( 'Here, you can set padding to the logo image. it will add space inside the logo.', 'milton' ),
                'desc'           => esc_html__( 'Note: it won\'t affect the height of the footer', 'milton' ),
                'default'        => array(
                    'padding-top'    => '0px',
                    'padding-bottom' => '0px',
                ),
                'output'         => array( '.footer-logo img' )
            ),
            array(
                'id' => 'footer-text',
                'type' => 'editor',
                'required' => array('footer-text-choice', '=', '1'),
                'title' => esc_html__('Footer Text', 'milton'),
                'subtitle' => esc_html__('you can type your footer text/content here..', 'milton'),
                'default' => 'Copyright &copy; 2017 All Rights Reserved. ',
                'args'   => array(
                    'media_buttons'    => false,
                    'textarea_rows'    => 3,
                    'teeny'     => false
                )
            ),
            array(
                'id' => 'footer-nav',
                'type' => 'checkbox',
                'required' => array('footer-text-choice', '=', '1'),
                'title' => esc_html__('Footer Menu', 'milton'),
                'default' => 0, // 1 = on | 0 = off
            ),
            array(
                'id'       => 'footer-menu-link-color',
                'type'     => 'link_color',
                'required' => array('footer-nav', '=', '1'),
                'title'    => esc_html__( 'Footer Menu Links Color', 'milton' ),
                'subtitle' => esc_html__( 'Just choose you color for regular & hover links. its applicable only on menu items.', 'milton' ),
                'active'    => false, // Disable Active Color
                'default'  => array(
                    'regular' => '#555555',
                    'hover'   => '#1259c3',
                ),
                'output'   => array( '.footer-nav-menu a' ),
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Widget bar', 'milton' ),
        'id'         => 'footer-widget-options',
        'subsection' => true,
        'desc'       => esc_html__( 'Here, you can control the widget bar inside the footer.', 'milton' ),
        'fields' => array(
            array(
                'id' => 'footer-bar',
                'type' => 'switch',
                'title' => esc_html__('Footer Bar', 'milton'),
                'subtitle' => esc_html__('Disable footer widget by turning off', 'milton'),
                "default" => 0,
            ),
            array(
                'id' => 'footer-bar-choice',
                'type' => 'radio',
                'required' => array('footer-bar', '=', '1'),
                'title' => esc_html__('Footer Bar Choice', 'milton'),
                'options' => array(
                    '0' => 'Widget Bar', 
                    '1' => 'Content Block',
                ), //Must provide key => value pairs for select options
                "default" => '0',
            ),
            array(
                'id' => 'footer-contentblock-choice',
                'type' => 'select',
                'required' => array('footer-bar-choice', '=', '1'),
                'title' => esc_html__('Footer Bar Choice', 'milton'),
                'options' => agni_posttype_options( array( 'post_type' => 'agni_block'), false ), //Must provide key => value pairs for select options
                "default" => '',
            ),
            array(
                'id' => 'footer-bar-fullwidth',
                'type' => 'checkbox',
                'required' => array('footer-bar-choice', '=', '0'),
                'title' => esc_html__('Fullwidth', 'milton'),
                'subtitle' => esc_html__('It will make the footer width 100%.', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),
            array(
                'id' => 'footer-col',
                'type' => 'select',
                'required' => array('footer-bar-choice', '=', '0'),
                'title' => esc_html__('Footer Widget Columns', 'milton'),
                'options' => array(
                    '2' => '2 Columns', 
                    '3' => '3 Columns', 
                    '4' => '4 Columns',
                    '5' => '5 Columns',
                    '6' => '6 Columns',
                ), //Must provide key => value pairs for select options
                'default' => '3'
            ),
            array(
                'id' => 'footer-background',
                'type' => 'background',
                'required' => array('footer-bar', '=', '1'),
                'output' => array('.footer-bar'),
                'title' => esc_html__('Footer Bar background', 'milton'),
                'subtitle' => esc_html__('Pick the background color/image for header ', 'milton'),
                'default' => array( 'background-color' => '#f6f7f8', ),
            ), 
            
            array(
                'id' => 'footerbar-color-1',
                'type' => 'color',
                'required' => array('footer-bar-choice', '=', '0'),
                'transparent' => false,
                'output' => array( '.footer-bar .widget-title' ), 
                'title' => esc_html__('Title color ', 'milton'),
                'subtitle' => esc_html__('Pick the title font color..', 'milton'),
                'default' => '#333333',
                'validate' => 'color',
            ),
            array(
                'id' => 'footerbar-color-2',
                'type' => 'color',
                'required' => array('footer-bar-choice', '=', '0'),
                'transparent' => false,
                'output' => array( '.footer-bar .widget, .footer-bar .widget i' ), 
                'title' => esc_html__('Text color ', 'milton'),
                'subtitle' => esc_html__('Pick the text font color..', 'milton'),
                'default' => '#555555',
                'validate' => 'color',
            ),
            array(
                'id'       => 'footerbar-color-3',
                'type'     => 'link_color',
                'required' => array('footer-bar-choice', '=', '0'),
                'title'    => esc_html__( 'Links Color', 'milton' ),
                'subtitle' => esc_html__( 'Just choose you color for regular & hover links.', 'milton' ),
                'active'    => false, // Disable Active Color
                'default'  => array(
                    'regular' => '#333333',
                    'hover'   => '#333333',
                ),
                'output'   => array( '.footer-bar .widget a' ),
            ),
        )
    ));

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social Media', 'milton' ),
        'id'         => 'footer-social-media-icons',
        'subsection' => true,
        'desc'       => esc_html__( 'Here, you can enable/disable, sort the social media icons in footer.', 'milton' ),
        'fields' => array(
            array(
                'id' => 'social-media-footer',
                'type' => 'switch',
                'title' => esc_html__('Social Media Icons', 'milton'),
                'subtitle' => esc_html__('enable this to show the list of social media icons to display in the footer', 'milton'),
                "default" => 1,
                'on' => 'Enable',
                'off' => 'Disable',
            ),
            array(
                'id' => 'social-media-style',
                'type' => 'select',
                'required' => array('social-media-footer', '=', '1'),
                'title' => esc_html__('Social Media Icons Style', 'milton'),
                'options' => array(
                    'no-circled' => 'Default', 
                    'circled' => 'Circled',
                ), //Must provide key => value pairs for select options
                'default' => 'no-circled'
            ),
            array(
                'id'       => 'footer-social-link-color',
                'type'     => 'link_color',
                'required' => array('social-media-footer', '=', '1'),
                'title'    => esc_html__( 'Footer Social Links Color', 'milton' ),
                'active'    => false, // Disable Active Color
                'default'  => array(
                    'regular' => '#333333',
                    'hover'   => '#1259c3',
                ),
            ),
            array(
                'id' => 'footer-link-target',
                'required' => array('social-media-footer', '=', '1'),
                'type' => 'select',
                'title' => esc_html__('Link target', 'milton'),
                'subtitle' => esc_html__('Choose the target of the icon when clicked.', 'milton'),
                'options' => array(
                    '_self' => 'Same window', 
                    '_blank' => 'New window',
                ), //Must provide key => value pairs for select options
                'default' => '_self'
            ),
            array(
                'id'       => 'social-media-icons-footer',
                'type'     => 'sortable',
                'required' => array('social-media-footer', '=', '1'),
                'mode'     => 'checkbox', // checkbox or text
                'title'    => esc_html__( 'Choose your icons', 'milton' ),
                'subtitle' => esc_html__( 'Enable the Social icon which you want to display in footer', 'milton' ),
                'options'  => array(
                    'facebook' => 'Facebook',
                    'twitter' => 'Twitter',
                    'google-plus' => 'Google Plus',
                    'bitbucket' => 'BitBucket',
                    'behance' => 'Behance',
                    'dribbble' => 'Dribbble',
                    'flickr' => 'Flickr',
                    'github' => 'GitHub',
                    'instagram' => 'instagram',
                    'linkedin' => 'Linkedin',
                    'pinterest' => 'Pinterest',
                    'reddit' => 'Reddit',
                    'soundcloud' => 'SoundCloud',
                    'skype' => 'Skype',
                    'stack-overflow' => 'StackOverflow',
                    'tumblr' => 'Tumblr',
                    'vimeo' => 'Vimeo',
                    'vk' => 'VK',
                    'weibo' => 'Weibo',
                    'whatsapp' => 'WhatsApp',
                    'youtube' => 'YouTube',
                ),
                'default'  => array(
                    'facebook' => true,
                    'twitter' => true,
                    'google-plus' => false,
                    'bitbucket' => false,
                    'behance' => false,
                    'dribbble' => true,
                    'flickr' => false,
                    'github' => false,
                    'instagram' => false,
                    'linkedin' => false,
                    'pinterest' => false,
                    'reddit' => false,
                    'soundcloud' => false,
                    'skype' => false,
                    'stack-overflow' => false,
                    'tumblr' => false,
                    'vimeo' => false,
                    'vk' => false,
                    'weibo' => false,
                    'whatsapp' => false,
                    'youtube' => false,
                )
            ),       
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Page Settings', 'milton' ),
        'id'    => 'page-settings',
        'icon'  => 'el el-tint',
        'desc' => esc_html__('you can override the below settings at each page.', 'milton'),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Page', 'milton' ),
        'id'         => 'page-options',
        'subsection' => true,
        'desc'       => esc_html__( 'This allows you setup the blog layout, sidebar, etc.', 'milton' ),
        'fields' => array(
            
            array(
                'id' => 'page-layout',
                'type' => 'image_select',
                'title' => esc_html__('Page Layout', 'milton'),
                'subtitle' => esc_html__('Choose your desired page layout.', 'milton'),
                'options' => array(
                    'container' => 'Container', 
                    'container-fluid' => 'Fullwidth',
                ), //Must provide key => value pairs for select options
                'options' => array(                            
                    'container' => array('alt' => 'Container', 'title' => 'Container', 'img' => AGNI_FRAMEWORK_URL . '/template/img/layout-1.png'),
                    'container-fluid' => array('alt' => 'Fullwidth', 'title' => 'Fullwidth', 'img' => AGNI_FRAMEWORK_URL . '/template/img/layout-2.png'),
                ), //Must provide key => value(array:title|img) pairs for radio options
                'default' => 'container-fluid'
            ),
            array(
                'id' => 'page-sidebar',
                'type'     => 'radio',
                'title' => esc_html__('Page Sidebar', 'milton'),
                'options' => array(
                    'no-sidebar' => 'No Sidebar', 
                    'has-sidebar' => 'Right Sidebar',
                    'has-sidebar left' => 'Left Sidebar',
                ), //Must provide key => value pairs for select options
                'default' => 'no-sidebar'
            ),
            array(
                'id' => 'page-remove-title',
                'type' => 'checkbox',
                'title' => esc_html__('Remove Title', 'milton'),
                'subtitle' => esc_html__('It will remove the default title on each page.', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'page-title-align',
                'type' => 'radio',
                'required' => array('page-remove-title', '=', '0'),
                'title' => esc_html__('Page Title Alignment', 'milton'),
                'options' => array(
                    'left' => esc_html__('Left', 'milton'),
                    'center' => esc_html__('Center', 'milton'), 
                    'right' => esc_html__('Right', 'milton'), 
                ), 
                'default' => 'left'
            ),
            
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog Single', 'milton' ),
        'id'         => 'page-blog-single-options',
        'subsection' => true,
        'desc'       => esc_html__( 'This allows you setup the blog layout, sidebar, etc.', 'milton' ),
        'fields' => array(
            array(
                'id' => 'blog-single-layout',
                'type' => 'image_select',
                'title' => esc_html__('Blog Single Layout', 'milton'),
                'subtitle' => esc_html__('Choose your desired blog single layout.', 'milton'),
                'options' => array(
                    'container' => 'Container', 
                    'container-fluid' => 'Fullwidth',
                ), //Must provide key => value pairs for select options
                'options' => array(                            
                    'container' => array('alt' => 'Container', 'title' => 'Container', 'img' => AGNI_FRAMEWORK_URL . '/template/img/layout-1.png'),
                    'container-fluid' => array('alt' => 'Fullwidth', 'title' => 'Fullwidth', 'img' => AGNI_FRAMEWORK_URL . '/template/img/layout-2.png'),
                ), //Must provide key => value(array:title|img) pairs for radio options
                'default' => 'container'
            ),
            array(
                'id' => 'blog-single-sidebar',
                'type'     => 'radio',
                'title' => esc_html__('Blog Single Sidebar', 'milton'),
                'options' => array(
                    'no-sidebar' => 'No Sidebar', 
                    'has-sidebar' => 'Right Sidebar',
                    'has-sidebar left' => 'Left Sidebar',
                ), //Must provide key => value pairs for select options
                'default' => 'no-sidebar'
            ),
            array(
                'id' => 'blog-single-remove-title',
                'type' => 'checkbox',
                'title' => esc_html__('Remove Title', 'milton'),
                'subtitle' => esc_html__('It will remove the default title on each blog single.', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),
            array(
                'id' => 'blog-single-title-align',
                'type' => 'radio',
                'required' => array('blog-single-remove-title', '=', '0'),
                'title' => esc_html__('Title Alignment', 'milton'),
                'options' => array(
                    'left' => esc_html__('Left', 'milton'),
                    'center' => esc_html__('Center', 'milton'), 
                    'right' => esc_html__('Right', 'milton'), 
                ), 
                'default' => 'center'
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Portfolio Single', 'milton' ),
        'id'         => 'page-portfolio-single-options',
        'subsection' => true,
        'desc'       => esc_html__( 'This allows you setup the portfolio layout, sidebar, etc.', 'milton' ),
        'fields' => array(
            array(
                'id' => 'portfolio-single-layout',
                'type' => 'image_select',
                'title' => esc_html__('Portfolio Single Layout', 'milton'),
                'subtitle' => esc_html__('Choose your desired portfolio single layout.', 'milton'),
                'options' => array(
                    'container' => 'Container', 
                    'container-fluid' => 'Fullwidth',
                ), //Must provide key => value pairs for select options
                'options' => array(                            
                    'container' => array('alt' => 'Container', 'title' => 'Container', 'img' => AGNI_FRAMEWORK_URL . '/template/img/layout-1.png'),
                    'container-fluid' => array('alt' => 'Fullwidth', 'title' => 'Fullwidth', 'img' => AGNI_FRAMEWORK_URL . '/template/img/layout-2.png'),
                ), //Must provide key => value(array:title|img) pairs for radio options
                'default' => 'container'
            ),
            array(
                'id' => 'portfolio-single-remove-title',
                'type' => 'checkbox',
                'title' => esc_html__('Remove Title', 'milton'),
                'subtitle' => esc_html__('It will remove the default title on each portfolio single.', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),
            array(
                'id' => 'portfolio-single-title-align',
                'type' => 'radio',
                'required' => array('portfolio-single-remove-title', '=', '0'),
                'title' => esc_html__('Title Alignment', 'milton'),
                'options' => array(
                    'left' => esc_html__('Left', 'milton'),
                    'center' => esc_html__('Center', 'milton'), 
                    'right' => esc_html__('Right', 'milton'), 
                ), 
                'default' => 'left'
            ),
        )
    ) );
    if( class_exists( 'WooCommerce' ) ){
        Redux::setSection( $opt_name, array(
            'title'      => esc_html__( 'Shop Single', 'milton' ),
            'id'         => 'page-shop-single-options',
            'subsection' => true,
            'desc'       => esc_html__( 'This allows you setup the shop layout, sidebar, etc.', 'milton' ),
            'fields' => array(
                array(
                    'id' => 'shop-single-layout',
                    'type' => 'image_select',
                    'title' => esc_html__('Shop Single Layout', 'milton'),
                    'subtitle' => esc_html__('Choose your desired shop single layout.', 'milton'),
                    'options' => array(
                        'container' => 'Container', 
                        'container-fluid' => 'Fullwidth',
                    ), //Must provide key => value pairs for select options
                    'options' => array(                            
                        'container' => array('alt' => 'Container', 'title' => 'Container', 'img' => AGNI_FRAMEWORK_URL . '/template/img/layout-1.png'),
                        'container-fluid' => array('alt' => 'Fullwidth', 'title' => 'Fullwidth', 'img' => AGNI_FRAMEWORK_URL . '/template/img/layout-2.png'),
                    ), //Must provide key => value(array:title|img) pairs for radio options
                    'default' => 'container'
                ),
                array(
                    'id' => 'shop-single-sidebar',
                    'type'     => 'radio',
                    'title' => esc_html__('Shop Single Sidebar', 'milton'),
                    'options' => array(
                        'no-sidebar' => 'No Sidebar', 
                        'has-sidebar' => 'Right Sidebar',
                        'has-sidebar left' => 'Left Sidebar',
                    ), //Must provide key => value pairs for select options
                    'default' => 'no-sidebar'
                ),
            )
        ) );
    }

    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Blog Settings', 'milton' ),
        'id'    => 'blog-settings',
        'icon'  => 'el el-bookmark'
    ) );
    
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General', 'milton' ),
        'id'         => 'blog-general-options',
        'subsection' => true,
        'desc'       => esc_html__( 'This allows you setup the blog layout, sidebar, etc.', 'milton' ),
        'fields' => array(
            
            array(
                'id' => 'blog-layout',
                'type' => 'select',
                'title' => esc_html__('Blog Layout', 'milton'),
                'options' => array(
                    'standard' => 'Standard', 
                    'grid' => 'Grid',
                    'modern' => 'Modern Grid',
                    'list' => 'List',
                    'minimal-list' => 'Minimal List',
                ), //Must provide key => value pairs for select options
                'default' => 'standard'
            ),
            array(
                'id' => 'blog-column-layout',
                'type' => 'image_select',
                'required' => array(
                    array( 'blog-layout', '!=', 'standard'),
                    array( 'blog-layout', '!=', 'list'),
                    array( 'blog-layout', '!=', 'minimal-list'),
                ),
                'title' => esc_html__('Blog Column Count', 'milton'),
                'desc' => esc_html__('Choose a column count for your blog', 'milton'),
                'options' => array(                            
                    '1' => array('alt' => '1 Column', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-1c.png'),
                    '2' => array('alt' => '2 Column', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-2c.png'),
                    '3' => array('alt' => '3 Column', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-3c.png'),
                    '4' => array('alt' => '4 Column', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-4c.png'),
                    '5' => array('alt' => '5 Column', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-5c.png'),
                ), //Must provide key => value(array:title|img) pairs for radio options
                'default' => '3'
            ),
            array(
                'id' => 'blog-excerpt-length',
                'type' => 'text',
                'required' => array(
                    array( 'blog-layout', '!=', 'modern'),
                    array( 'blog-layout', '!=', 'minimal-list'),
                ),
                'title' => esc_html__('Post Excerpt Length', 'milton'),
                'subtitle' => esc_html__('It will display the excerpt content with your desired length.', 'milton'),
                'default' => '150'// 1 = on | 0 = off
            ),
            array(
                'id' => 'blog-content-choice',
                'type' => 'checkbox',
                'required' => array( 'blog-layout', '=', 'standard'),
                'title' => esc_html__('Use Post Content', 'milton'),
                'subtitle' => esc_html__('It will display the whole post content.', 'milton'),
                'desc'  => esc_html__('Note: It will ignore the above excerpt value', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),
            array(
                'id' => 'blog-content-style',
                'type' => 'select',
                'required' => array( 'blog-layout', '!=', 'minimal-list'),
                'title' => esc_html__('Content Style', 'milton'),
                'desc' => esc_html__('Choose content style for the layout.', 'milton'),
                'options' => array(
                    '' => 'Default',            
                    'background' => 'Background',
                    'border' => 'Border',
                ), //Must provide key => value(array:title|img) pairs for radio options
                'default' => ''// 1 = on | 0 = off
            ),
            array(
                'id' => 'blog-content-bg-color',
                'type' => 'color',
                'required' => array('blog-content-style', '=', 'background'),
                'title' => esc_html__('Content Background color', 'milton'),
                'default' => '',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog-content-border-color',
                'type' => 'color',
                'required' => array('blog-content-style', '=', 'border'),
                'title' => esc_html__('Content Border color', 'milton'),
                'default' => '',
                'validate' => 'color',
            ),
            array(
                'id' => 'blog-content-align',
                'type' => 'radio',
                'required' => array( 
                    array( 'blog-layout', '!=', 'modern' ), 
                    array( 'blog-layout', '!=', 'minimal-list' )
                ),
                'title' => esc_html__('Content Alignment', 'milton'),
                'desc' => esc_html__('Select the content to be aligned.', 'milton'),
                'options' => array(
                    'left' => 'Left',            
                    'center' => 'Center',
                    'right' => 'Right',
                ), //Must provide key => value(array:title|img) pairs for radio options
                'default' => 'left'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'blog-grid-layout',
                'type'     => 'radio',
                'required' => array(
                    array( 'blog-layout', '!=', 'standard'),
                    array( 'blog-layout', '!=', 'list'),
                    array( 'blog-layout', '!=', 'minimal-list'),
                ),
                'title'    => esc_html__( 'Blog Grid Style', 'milton' ),
                'subtitle' => esc_html__( 'Choose any of one grid style. fitRows is default.', 'milton' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'fitRows' => 'FitRows(Default Grid)',
                    'masonry' => 'Masonry',
                ),
                'default'  => 'fitRows'
            ),

            array(
                'id' => 'blog-sidebar',
                'type'     => 'radio',
                'title' => esc_html__('Blog Sidebar', 'milton'),
                'options' => array(
                    'no-sidebar' => 'No Sidebar', 
                    'has-sidebar' => 'Right Sidebar',
                    'has-sidebar left' => 'Left Sidebar',
                ), //Must provide key => value pairs for select options
                'default' => 'has-sidebar'
            ),
            array(
                'id' => 'blog-fullwidth-layout',
                'type' => 'checkbox',
                'title' => esc_html__('Fullwidth', 'milton'),
                'subtitle' => esc_html__('It uses the 100% of the screen width to display the content.', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),
            array(
                'id' => 'blog-carousel',
                'type' => 'switch',
                'title' => esc_html__('Blog Carousel', 'milton'),
                'subtitle' => esc_html__('It will display the blog items inside the carousel.', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),
            array(
                'id' => 'blog-carousel-autoplay',
                'type' => 'checkbox',
                'required' => array('blog-carousel', '=', '1'),
                'title' => esc_html__('Autoplay', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),

            array(
                'id' => 'blog-carousel-autoplay-timeout',
                'type' => 'slider',
                'required' => array('blog-carousel-autoplay', '=', '1'),
                'title' => esc_html__('Autoplay Timeout', 'milton'),
                "default" => "4000",
                "min" => "400",
                "step" => "100",
                "max" => "10000",
            ),
            array(
                'id' => 'blog-carousel-autoplay-speed',
                'type' => 'slider',
                'required' => array('blog-carousel-autoplay', '=', '1'),
                'title' => esc_html__('Autoplay Speed', 'milton'),
                "default" => "600",
                "min" => "50",
                "step" => "10",
                "max" => "2000",
            ),
            array(
                'id' => 'blog-carousel-autoplay-hover',
                'type' => 'checkbox',
                'required' => array('blog-carousel-autoplay', '=', '1'),
                'title' => esc_html__('Stop on Hover', 'milton'),
                'desc' => esc_html__('It will stop the carousel when you hover the carousel elements.', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'blog-carousel-loop',
                'type' => 'checkbox',
                'required' => array('blog-carousel', '=', '1'),
                'title' => esc_html__('Loop', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'blog-carousel-pagination',
                'type' => 'checkbox',
                'required' => array('blog-carousel', '=', '1'),
                'title' => esc_html__('Pagination Dots', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'blog-carousel-navigation',
                'type' => 'checkbox',
                'required' => array('blog-carousel', '=', '1'),
                'title' => esc_html__('Navigation Arrows', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),

            array(
                'id' => 'blog-gutter',
                'type' => 'checkbox',
                'required' => array(
                    array( 'blog-layout', '!=', 'standard'),
                    array( 'blog-layout', '!=', 'list'),
                    array( 'blog-layout', '!=', 'minimal-list'),
                ),
                'title' => esc_html__('Gutter', 'milton'),
                'subtitle' => esc_html__('It will bring some space in between the items horizontally.', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'blog-gutter-value',
                'type' => 'text',
                'required' => array('blog-gutter', '=', '1'),
                'title' => esc_html__('Gutter Value', 'milton'),
                'subtitle' => esc_html__('Enter the space you want to add between each item.', 'milton'),
                'default' => '30'// 1 = on | 0 = off
            ),

            array(
                'id' => 'blog-thumbnail-hardcrop',
                'type' => 'checkbox',
                'title' => esc_html__('Blog Thumbnails Hard Crop', 'milton'),
                'subtitle' => esc_html__('It will crop all the images by ignoring original dimension of an image.', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),
            array(
                'id' => 'blog-thumbnail-dimension-custom',
                'type' => 'text',
                'required' => array('blog-thumbnail-hardcrop', '=', '1'),
                'title' => esc_html__('Thumbnails Crop Size', 'milton'),
                'subtitle' => esc_html__('You can mention your own dimension for ex. 640x640', 'milton'),
                'desc' => esc_html__('Set the maximum width & height of a thumbnail. Note: it may not be an actual image size but the ratio will be the same.', 'milton'),
                'default' => '640x640',
            ),

            array(
                'id' => 'blog-thumbnail-gs-filter',
                'type' => 'checkbox',
                'title' => esc_html__('Thumbnail Grayscale', 'milton'),
                'subtitle' => esc_html__('It will change the thumbnail to grayscale(black&white). Note: It will not work on IE browsers', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'blog-navigation',
                'type'     => 'radio',
                'title'    => esc_html__( 'Blog Navigation Style', 'milton' ),
                'subtitle' => esc_html__( 'Choose any of one navigation style to display on the blog page.', 'milton' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Classic',
                    '2' => 'Number',
                    '3' => 'Infinite',
                    '4' => 'Infinite & Load More button',
                ),
                'default'  => '1'
            ),
            array(
                'id' => 'blog-navigation',
                'type' => 'switch',
                'required' => array('blog-carousel', '=', '0'),
                'title' => esc_html__('Blog Navigation', 'milton'),
                'desc' => esc_html__('It will enable the navigation link on blog page..', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'blog-navigation-choice',
                'type'     => 'radio',
                'required' => array('blog-navigation', '=', '1'),
                'title'    => esc_html__( 'Blog Navigation Style', 'milton' ),
                'subtitle' => esc_html__( 'Choose any of one navigation style to display on the blog page.', 'milton' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Classic',
                    '2' => 'Number',
                    '3' => 'Infinite',
                    '4' => 'Infinite & Load More button',
                ),
                'default'  => '1'
            ),

            array(
                'id' => 'blog-navigation-ifs-load-text',
                'type' => 'text',
                'required' => array(
                    array( 'blog-navigation-choice', '!=', '1'),
                    array( 'blog-navigation-choice', '!=', '2'),
                ),
                'title' => esc_html__('Text to show on loading.', 'milton'),
                'default' => 'Loading',
            ),
            array(
                'id' => 'blog-navigation-ifs-finish-text',
                'type' => 'text',
                'required' => array(
                    array( 'blog-navigation-choice', '!=', '1'),
                    array( 'blog-navigation-choice', '!=', '2'),
                ),
                'title' => esc_html__('Text to show at the end of page.', 'milton'),
                'default' => 'No More Posts',
            ),

            array(
                'id' => 'blog-navigation-ifs-btn-text',
                'type' => 'text',
                'required' => array('blog-navigation-choice', '=', '4'),
                'title' => esc_html__('Button Text', 'milton'),
                'default' => 'Load More',
            ),
            
            array(
                'id' => 'blog-animation',
                'type' => 'switch',
                'title' => esc_html__('Blog Animation', 'milton'),
                'subtitle' => esc_html__('It will enable the animation for your blog.', 'milton'),
                'desc' => esc_html__('This animation will show the items one by one only when it reaches the viewport.', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),
            array(
                'id' => 'blog-animation-style',
                'type' => 'select',
                'required' => array('blog-animation', '=', '1'),
                'title' => esc_html__('Animation Style', 'milton'),
                'options' => array(
                    'fadeIn' => esc_html__('fadeIn', 'milton'),
                    'fadeInDown' => esc_html__('fadeInDown', 'milton'),
                    'fadeInUp' => esc_html__('fadeInUp', 'milton'),
                    'fadeInRight' => esc_html__('fadeInRight', 'milton'),
                    'fadeInLeft' => esc_html__('fadeInLeft', 'milton'),
                    'flipInX' => esc_html__('flipInX', 'milton'),
                    'flipInY' => esc_html__('flipInY', 'milton'),
                    'zoomIn' => esc_html__('zoomIn', 'milton'),
                ), //Must provide key => value pairs for select options
                'default' => 'fadeInUp'
            ),
            array(
                'id' => 'blog-animation-duration',
                'type' => 'text',
                'required' => array('blog-animation', '=', '1'),
                'title' => esc_html__('Animation Duration ', 'milton'),
                'desc' => esc_html__('Enter the value in seconds. for ex. 0.6', 'milton'),
                'validate' => 'numeric',
                "default" => "0.8",
            ),

            array(
                'id' => 'blog-animation-delay',
                'type' => 'text',
                'required' => array('blog-animation', '=', '1'),
                'title' => esc_html__('Animation Delay ', 'milton'),
                'desc' => esc_html__('Enter the value in seconds. for ex. 0.6', 'milton'),
                'validate' => 'numeric',
                "default" => "0.4",
            ),
            array(
                'id' => 'blog-animation-offset',
                'type' => 'slider',
                'required' => array('blog-animation', '=', '1'),
                'title' => esc_html__('Animation Offset ', 'milton'),
                'desc' => esc_html__('animation will be triggered only when blog reaches particular percentage on viewport', 'milton'),
                "default" => "90",
                "min" => "20",
                "step" => "5",
                "max" => "100",
            ),

        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Posttype Settings', 'milton' ),
        'id'         => 'blog-posttype-options',
        'subsection' => true,
        'desc'       => esc_html__( 'This allows you setup the blog layout, sidebar, etc.', 'milton' ),
        'fields' => array(
            array(
                'id' => 'blog-per-page',
                'type' => 'text',
                'title' => esc_html__('Number of Blog items per page', 'milton'),
                'subtitle' => esc_html__('type the number of post to show in a blog page', 'milton'),
                'validate' => 'numeric',
                'default' => '6',
                'class' => 'text'
            ),
            array(
                'id'       => 'blog-categories',
                'type'     => 'select',
                'multi'    => true,
                'data'     => 'categories',
                'title'    => esc_html__( 'Choose the categories to display', 'milton' ),
                'desc' => esc_html__( 'You can select multiple categories. leave it empty to display all categories', 'milton' ),
                'default' => ''
            ),
            
            array(
                'id' => 'blog-post-include',
                'type' => 'text',
                'title' => esc_html__('Blog Items include', 'milton'),
                'subtitle' => esc_html__('you can exclude the items by typing post ids for ex. 70, 45', 'milton'),
                'default' => '',
                'class' => 'text'
            ),

            array(
                'id' => 'blog-post-exclude',
                'type' => 'text',
                'title' => esc_html__('Blog Items exclude', 'milton'),
                'subtitle' => esc_html__('you can exclude the items by typing post ids for ex. 60', 'milton'),
                'desc' => esc_html__('If this is used in the same query as blog item, it will be ignored', 'milton'),
                'default' => '',
                'class' => 'text'
            ),

            array(
                'id' => 'blog-post-order',
                'type' => 'select',
                'title' => esc_html__('Blog items Order', 'milton'),
                'desc' => esc_html__('Blog posts sorting order.', 'milton'),
                'options' => array(
                    'DESC' => esc_html__('Descending', 'milton'),
                    'ASC' => esc_html__('Ascending', 'milton'), 
                ), //Must provide key => value pairs for select options
                'default' => 'DESC'
            ),
            array(
                'id' => 'blog-post-orderby',
                'type' => 'select',
                'title' => esc_html__('Blog Items Orderby', 'milton'),
                'desc' => esc_html__('Blog posts sorting orderby.', 'milton'),
                'options' => array(
                    'none' => esc_html__('None', 'milton'),
                    'id' => esc_html__('Post ID', 'milton'),
                    'author' => esc_html__('Post Author', 'milton'),
                    'title' => esc_html__('Post Title', 'milton'),
                    'name' => esc_html__('Post Slug', 'milton'),
                    'date' => esc_html__('Date', 'milton'),
                    'modified' => esc_html__('Last Modified Date', 'milton'),
                    'rand' => esc_html__('Random', 'milton'),
                    'comment_count' => esc_html__('comment-count', 'milton'),
                    'menu_order' => esc_html__('menu_order', 'milton'),
                ), //Must provide key => value pairs for select options
                'default' => 'date'
            ),
            array(
                'id'       => 'blog-posttype-slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Custom Blog Slug Name', 'milton' ),
                'subtitle' => wp_kses( __( 'It will change the existing url prefix "blog". Once you changed the custom slug, its mandatory to perform <a href="#">flush_rewrite_rules</a>.', 'milton' ), array( 'a' => array( 'href' => array() ) ) ),
                'default'  => '',
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Singles', 'milton' ),
        'id'         => 'blog-single-options',
        'subsection' => true,
        'desc'       => esc_html__( 'Here, you can enable/disable some of the necessary share icons.', 'milton' ),
        'fields' => array(
            
            array(
                'id' => 'blog-single-thumbnail',
                'type' => 'switch',
                'title' => esc_html__('Blog Single Thumbnail', 'milton'),
                'subtitle' => esc_html__('It enables the post thumbnail(if any) on the post.', 'milton'),
                "default" => 1,
            ),

            array(
                'id' => 'author-biography',
                'type' => 'switch',
                'title' => esc_html__('Author Biography', 'milton'),
                'subtitle' => esc_html__('It enables the author biography on each post.', 'milton'),
                "default" => 0,
            ),
            array(
                'id' => 'author-biography-title',
                'type' => 'text',
                'required' => array('author-biography', '=', '1'),
                'title' => esc_html__('Author Biography Title', 'milton'),
                'subtitle' => esc_html__('you can use the Word Next or Newer', 'milton'),
                'default' => 'About Author',
            ),
            
            array(
                'id' => 'blog-single-prev',
                'type' => 'text',
                'title' => esc_html__('Blog single Previous Text ', 'milton'),
                'subtitle' => esc_html__('you can use the Word Previous or Older', 'milton'),
                'default' => 'Prev',
                'class' => 'text'
            ),
            
            array(
                'id' => 'blog-single-next',
                'type' => 'text',
                'title' => esc_html__('Blog single Next Text ', 'milton'),
                'subtitle' => esc_html__('you can use the Word Next or Newer', 'milton'),
                'default' => 'Next',
                'class' => 'text'
            ),
            
            array(
                'id' => 'blog-sharing-panel',
                'type' => 'switch',
                'title' => esc_html__('Blog Sharing icons', 'milton'),
                'subtitle' => esc_html__('This option enable the sharing panel at the bottom of every post.', 'milton'),
                'default' => 1, // 1 = on | 0 = off
                'on' => 'Enable',
                'off' => 'Disable',
            ),
            array(
                'id' => 'blog-sharing-label',
                'type' => 'text',
                'required' => array('blog-sharing-panel', '=', '1'),
                'title' => esc_html__('Sharing Label', 'milton'),
                'default' => 'SHARE :',
            ),
            array(
                'id'       => 'blog-sharing-icons',
                'type'     => 'checkbox',
                'required' => array('blog-sharing-panel', '=', '1'),
                'title'    => esc_html__( 'Share Icons', 'milton' ),
                //Must provide key => value pairs for multi checkbox options
                'options'  => array(
                    '1' => 'Facebook',
                    '2' => 'Twitter',
                    '3' => 'Google Plus',
                    '4' => 'Linkedin'
                ),
                //See how std has changed? you also don't need to specify opts that are 0.
                'default'  => array(
                    '1' => '1',
                    '2' => '1',
                    '3' => '1',
                    '4' => '1'
                )
            ),
        )

    ) );

    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-eye-open',
        'title' => esc_html__('Portfolio Settings', 'milton'),
        'id' => 'portfolio-settings',
    ) );
    
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General', 'milton' ),
        'id'         => 'portfolio-general-options',
        'subsection' => true,
        'desc'       => esc_html__( 'This option allows you to setup the portfolio grid, layout style. Note: Most of these portfolio settings apply only when you choose portfolio at template attributes', 'milton' ),
        'fields' => array(
            array(
                'id' => 'portfolio-layout',
                'type' => 'image_select',
                'title' => esc_html__('Portfolio Layout(Columns)', 'milton'),
                'subtitle' => esc_html__('Layout for your portfolio page ', 'milton'),
                'desc' => esc_html__('Choose an image to your portfolio page', 'milton'),
                'options' => array(                            
                    '1' => array('alt' => '1 Column', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-1c.png'),
                    '2' => array('alt' => '2 Column', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-2c.png'),
                    '3' => array('alt' => '3 Column', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-3c.png'),
                    '4' => array('alt' => '4 Column', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-4c.png'),
                    '5' => array('alt' => '5 Column', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-5c.png'),
                    //'2r' => array('alt' => '2 Row', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-5c.png'),
                ), //Must provide key => value(array:title|img) pairs for radio options
                'default' => '3'
            ),
            array(
                'id' => 'portfolio-fullwidth',
                'type' => 'checkbox',
                'title' => esc_html__('Fullwidth', 'milton'),
                'subtitle' => esc_html__('If you need fullwidth portfolio section. just enable it.', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),

            array(
                'id' => 'portfolio-carousel',
                'type' => 'switch',
                'title' => esc_html__('Portfolio Carousel', 'milton'),
                'subtitle' => esc_html__('It will display the portfolio items inside the carousel.', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),
            array(
                'id' => 'portfolio-carousel-autoplay',
                'type' => 'checkbox',
                'required' => array('portfolio-carousel', '=', '1'),
                'title' => esc_html__('Autoplay', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),

            array(
                'id' => 'portfolio-carousel-autoplay-timeout',
                'type' => 'slider',
                'required' => array('portfolio-carousel-autoplay', '=', '1'),
                'title' => esc_html__('Autoplay Timeout', 'milton'),
                "default" => "4000",
                "min" => "400",
                "step" => "100",
                "max" => "10000",
            ),
            array(
                'id' => 'portfolio-carousel-autoplay-speed',
                'type' => 'slider',
                'required' => array('portfolio-carousel-autoplay', '=', '1'),
                'title' => esc_html__('Autoplay Speed', 'milton'),
                "default" => "600",
                "min" => "50",
                "step" => "10",
                "max" => "2000",
            ),
            array(
                'id' => 'portfolio-carousel-autoplay-hover',
                'type' => 'checkbox',
                'required' => array('portfolio-carousel-autoplay', '=', '1'),
                'title' => esc_html__('Stop on Hover', 'milton'),
                'desc' => esc_html__('It will stop the carousel when you hover the carousel elements.', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'portfolio-carousel-loop',
                'type' => 'checkbox',
                'required' => array('portfolio-carousel', '=', '1'),
                'title' => esc_html__('Loop', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'portfolio-carousel-pagination',
                'type' => 'checkbox',
                'required' => array('portfolio-carousel', '=', '1'),
                'title' => esc_html__('Pagination Dots', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'portfolio-carousel-navigation',
                'type' => 'checkbox',
                'required' => array('portfolio-carousel', '=', '1'),
                'title' => esc_html__('Navigation Arrows', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),

            array(
                'id'       => 'portfolio-grid',
                'type'     => 'radio',
                'required' => array('portfolio-carousel', '=', '0'),
                'title'    => esc_html__( 'Portfolio Masonry Style', 'milton' ),
                'subtitle' => esc_html__( 'You can choose your isotope layout style.', 'milton' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'fitRows' => 'Grid',
                    'masonry' => 'Masonry',
                ),
                'default'  => 'fitRows'
            ),

            array(
                'id' => 'portfolio-gutter',
                'type' => 'checkbox',
                'title' => esc_html__('Gutter', 'milton'),
                'subtitle' => esc_html__('It will bring some space in between the items horizontally.', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'portfolio-gutter-value',
                'type' => 'text',
                'required' => array('portfolio-gutter', '=', '1'),
                'title' => esc_html__('Gutter Value', 'milton'),
                'subtitle' => esc_html__('Enter the space you want to add between each item.', 'milton'),
                'validate' => 'numeric',
                'default' => '30'// 1 = on | 0 = off
            ),

            array(
                'id' => 'portfolio-thumbnail-hardcrop',
                'type' => 'checkbox',
                'title' => esc_html__('Portfolio Thumbnails Hard Crop', 'milton'),
                'subtitle' => esc_html__('It will crop all the images by ignoring original dimension of an image.', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),
            array(
                'id' => 'portfolio-thumbnail-dimension-custom',
                'type' => 'text',
                'required' => array('portfolio-thumbnail-hardcrop', '=', '1'),
                'title' => esc_html__('Thumbnails Crop Size', 'milton'),
                'subtitle' => esc_html__('You can mention your own dimension for ex. 640x640', 'milton'),
                'desc' => esc_html__('Set the maximum width & height of a thumbnail. Note: it may not be an actual image size but the ratio will be the same.', 'milton'),
                'default' => '640x640',
            ),

            array(
                'id' => 'portfolio-thumbnail-gs-filter',
                'type' => 'checkbox',
                'title' => esc_html__('Thumbnail Grayscale', 'milton'),
                'subtitle' => esc_html__('It will change the thumbnail to grayscale(black&white). Note: It will not work on IE browsers', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),

            array(
                'id' => 'portfolio-hover-style',
                'type' => 'image_select',
                'title' => esc_html__('Portfolio Hover style', 'milton'),
                'options' => array(                            
                    '1' => array('alt' => 'Style 1', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-hover-1.png'),
                    '2' => array('alt' => 'Style 2', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-hover-2.png'),
                    '3' => array('alt' => 'Style 4', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-hover-5.png'),
                    '4' => array('alt' => 'Style 6', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-hover-7.png'),
                    '5' => array('alt' => 'Style 8', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-hover-10.png'),
                    '6' => array('alt' => 'Style 9', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-hover-15.png'),
                    '7' => array('alt' => 'Style 10', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-hover-16.png'),
                ), //Must provide key => value(array:title|img) pairs for radio options
                'default' => '1'
            ),
            array(
                'id'       => 'portfolio-hover-bg-color',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Hover Background color', 'milton' ),
                'validate' => 'colorrgba',
            ),
            array(
                'id' => 'portfolio-hover-color',
                'type' => 'color',
                'transparent' => false,
                'title' => esc_html__('Hover Content color', 'milton'),
                'default' => '',
                'validate' => 'color',
            ),
            array(
                'id' => 'portfolio-hover-show-title',
                'type' => 'checkbox',
                'title' => esc_html__('Hover Portfolio Title', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),
            array(
                'id' => 'portfolio-hover-show-title',
                'type' => 'checkbox',
                'title' => esc_html__('Hover Portfolio Title', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'portfolio-hover-show-category',
                'type' => 'checkbox',
                'title' => esc_html__('Hover Portfolio Category', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'portfolio-hover-show-link',
                'type' => 'checkbox',
                'title' => esc_html__('Hover Portfolio Link', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'portfolio-hover-show-attachment-link',
                'type' => 'checkbox',
                'title' => esc_html__('Hover Portfolio Attachment Link', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'portfolio-bottom-title',
                'type' => 'checkbox',
                'title' => esc_html__('Portfolio Bottom Title', 'milton'),
                'subtitle' => esc_html__('It will display the title at the bottom of their respective item.', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),
            array(
                'id' => 'portfolio-bottom-category',
                'type' => 'checkbox',
                'title' => esc_html__('Portfolio Bottom Category', 'milton'),
                'subtitle' => esc_html__('It will display the categories at the bottom of their respective item.', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),
            
            array(
                'id' => 'portfolio-post-link-target',
                'type' => 'select',
                'title' => esc_html__('Portfolio Link target', 'milton'),
                'subtitle' => esc_html__('Choose the target of the portfolio items link.', 'milton'),
                'options' => array(
                    '_self' => 'Same window', 
                    '_blank' => 'New window',
                ), //Must provide key => value pairs for select options
                'default' => '_self'
            ),
            
            array(
                'id' => 'portfolio-filter',
                'type' => 'checkbox',
                'required' => array('portfolio-carousel', '=', '0'),
                'title' => esc_html__('Filter', 'milton'),
                'subtitle' => esc_html__('If you don\'t want to show the filter disabe it!. ', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'portfolio-filter-order',
                'type' => 'select',
                'required' => array('portfolio-filter', '=', '1'),
                'title' => esc_html__('Portfolio Filter Order', 'milton'),
                'options' => array(
                    'DESC' => esc_html__('Descending', 'milton'),
                    'ASC' => esc_html__('Ascending', 'milton'), 
                ), //Must provide key => value pairs for select options
                'default' => 'ASC'
            ),
            array(
                'id' => 'portfolio-filter-orderby',
                'type' => 'select',
                'required' => array('portfolio-filter', '=', '1'),
                'title' => esc_html__('Portfolio Filter Orderby', 'milton'),
                'options' => array(
                    'none' => esc_html__('None', 'milton'),
                    'name' => esc_html__( 'Name', 'milton'),
                    'slug' => esc_html__( 'Slug', 'milton'),
                    'term_group' => esc_html__( 'Term Group', 'milton'),
                    'term_id' => esc_html__( 'Term ID', 'milton'),
                    'id' => esc_html__( 'ID', 'milton'),
                    'description' => esc_html__( 'Description', 'milton'),
                ), 
                'default' => 'name'
            ),
            array(
                'id' => 'portfolio-filter-align',
                'type' => 'radio',
                'required' => array('portfolio-filter', '=', '1'),
                'title' => esc_html__('Portfolio Filter Align', 'milton'),
                'options' => array(
                    'left' => esc_html__('Left', 'milton'),
                    'center' => esc_html__('Center', 'milton'), 
                    'right' => esc_html__('Right', 'milton'), 
                ), 
                'default' => 'left'
            ),
            array(
                'id' => 'portfolio-filter-all-text',
                'type' => 'text',
                'required' => array('portfolio-filter', '=', '1'),
                'title' => esc_html__('Text alternative for "All"', 'milton'),
                'subtitle' => esc_html__('type the alternative text for the portfolio filter\'s All text', 'milton'),
                'default' => 'All',
            ),
            array(
                'id' => 'portfolio-navigation',
                'type' => 'switch',
                'required' => array('portfolio-carousel', '=', '0'),
                'title' => esc_html__('Portfolio Navigation', 'milton'),
                'desc' => esc_html__('It will enable the navigation link on portfolio page..', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),
            array(
                'id'       => 'portfolio-navigation-choice',
                'type'     => 'radio',
                'required' => array('portfolio-navigation', '=', '1'),
                'title'    => esc_html__( 'Portfolio Navigation Style', 'milton' ),
                'subtitle' => esc_html__( 'Choose any of one navigation style to display on the portfolio page.', 'milton' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    '1' => 'Number',
                    '2' => 'Infinite',
                    '3' => 'Infinite & Load More button',
                ),
                'default'  => '1'
            ),
             array(
                'id' => 'portfolio-navigation-ifs-load-text',
                'type' => 'text',
                'required' => array(
                    array( 'portfolio-navigation-choice', '!=', '1'),
                ),
                'title' => esc_html__('Text to show on loading.', 'milton'),
                'default' => 'Loading',
            ),
            array(
                'id' => 'portfolio-navigation-ifs-finish-text',
                'type' => 'text',
                'required' => array(
                    array( 'portfolio-navigation-choice', '!=', '1'),
                ),
                'title' => esc_html__('Text to show at the end of page.', 'milton'),
                'default' => 'No More Items',
            ),

            array(
                'id' => 'portfolio-navigation-ifs-btn-text',
                'type' => 'text',
                'required' => array('portfolio-navigation-choice', '=', '3'),
                'title' => esc_html__('Button Text', 'milton'),
                'default' => 'Load More',
            ),
            array(
                'id' => 'portfolio-animation',
                'type' => 'switch',
                'title' => esc_html__('Portfolio Animation', 'milton'),
                'subtitle' => esc_html__('If you don\'t want the animation on each portfolio item disable it.', 'milton'),
                'desc' => esc_html__('This animation will show the items one by one only when it reaches the viewport.', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),
            array(
                'id' => 'portfolio-animation-style',
                'type' => 'select',
                'required' => array('portfolio-animation', '=', '1'),
                'title' => esc_html__('Animation Style', 'milton'),
                'options' => array(
                    'fadeIn' => esc_html__('fadeIn', 'milton'),
                    'fadeInDown' => esc_html__('fadeInDown', 'milton'),
                    'fadeInUp' => esc_html__('fadeInUp', 'milton'),
                    'fadeInRight' => esc_html__('fadeInRight', 'milton'),
                    'fadeInLeft' => esc_html__('fadeInLeft', 'milton'),
                    'flipInX' => esc_html__('flipInX', 'milton'),
                    'flipInY' => esc_html__('flipInY', 'milton'),
                    'zoomIn' => esc_html__('zoomIn', 'milton'),
                ), //Must provide key => value pairs for select options
                'default' => 'fadeInUp'
            ),
            array(
                'id' => 'portfolio-animation-duration',
                'type' => 'text',
                'required' => array('portfolio-animation', '=', '1'),
                'title' => esc_html__('Animation Duration ', 'milton'),
                'desc' => esc_html__('Enter the value in seconds. for ex. 0.6', 'milton'),
                'validate' => 'numeric',
                "default" => "0.8",
            ),

            array(
                'id' => 'portfolio-animation-delay',
                'type' => 'text',
                'required' => array('portfolio-animation', '=', '1'),
                'title' => esc_html__('Animation Delay ', 'milton'),
                'desc' => esc_html__('Enter the value in seconds. for ex. 0.6', 'milton'),
                'validate' => 'numeric',
                "default" => "0.4",
            ),
            array(
                'id' => 'portfolio-animation-offset',
                'type' => 'slider',
                'required' => array('portfolio-animation', '=', '1'),
                'title' => esc_html__('Animation Offset ', 'milton'),
                'desc' => esc_html__('animation will be triggered only when portfolio reaches particular percentage on viewport', 'milton'),
                "default" => "90",
                "min" => "20",
                "step" => "5",
                "max" => "100",
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Posttype Settings', 'milton' ),
        'id'         => 'porfolio-posttype-options',
        'subsection' => true,
        'desc'       => esc_html__( 'Here, you can setup the post count, order, etc. Note: Most of these portfolio settings apply only when you choose portfolio at template attributes', 'milton' ),
        'fields' => array(
            array(
                'id' => 'portfolio-per-page',
                'type' => 'text',
                'title' => esc_html__('Number of Portfolio items per page', 'milton'),
                'subtitle' => esc_html__('type the number of post to show in a portfolio page', 'milton'),
                'validate' => 'numeric',
                'default' => '6',
                'class' => 'text'
            ),
            array(
                'id'       => 'portfolio-categories',
                'type'     => 'select',
                'multi'    => true,
                'data' => 'terms',
                'args' => array('taxonomies'=>'types', 'args'=>array()),
                'title'    => esc_html__( 'Choose the categories to display', 'milton' ),
                'desc' => esc_html__( 'You can select multiple categories. leave it empty to display all categories', 'milton' ),
                'default' => ''
            ),
            
            array(
                'id' => 'portfolio-post-include',
                'type' => 'text',
                'title' => esc_html__('Portfolio Items include', 'milton'),
                'subtitle' => esc_html__('you can exclude the items by typing post ids for ex. 70, 45', 'milton'),
                'default' => '',
                'class' => 'text'
            ),

            array(
                'id' => 'portfolio-post-exclude',
                'type' => 'text',
                'title' => esc_html__('Portfolio Items exclude', 'milton'),
                'subtitle' => esc_html__('you can exclude the items by typing post ids for ex. 60', 'milton'),
                'desc' => esc_html__('If this is used in the same query as portfolio item, it will be ignored', 'milton'),
                'default' => '',
                'class' => 'text'
            ),

            array(
                'id' => 'portfolio-post-order',
                'type' => 'select',
                'title' => esc_html__('Portfolio items Order', 'milton'),
                'desc' => esc_html__('Portfolio posts sorting order.', 'milton'),
                'options' => array(
                    'DESC' => esc_html__('Descending', 'milton'),
                    'ASC' => esc_html__('Ascending', 'milton'), 
                ), //Must provide key => value pairs for select options
                'default' => 'DESC'
            ),
            array(
                'id' => 'portfolio-post-orderby',
                'type' => 'select',
                'title' => esc_html__('Portfolio Items Orderby', 'milton'),
                'desc' => esc_html__('Portfolio posts sorting orderby.', 'milton'),
                'options' => array(
                    'none' => esc_html__('None', 'milton'),
                    'id' => esc_html__('Post ID', 'milton'),
                    'author' => esc_html__('Post Author', 'milton'),
                    'title' => esc_html__('Post Title', 'milton'),
                    'name' => esc_html__('Post Slug', 'milton'),
                    'date' => esc_html__('Date', 'milton'),
                    'modified' => esc_html__('Last Modified Date', 'milton'),
                    'rand' => esc_html__('Random', 'milton'),
                    'comment_count' => esc_html__('comment-count', 'milton'),
                    'menu_order' => esc_html__('menu_order', 'milton'),
                ), //Must provide key => value pairs for select options
                'default' => 'date'
            ),
            array(
                'id'       => 'portfolio-posttype-slug',
                'type'     => 'text',
                'title'    => esc_html__( 'Custom Portfolio Slug Name', 'milton' ),
                'subtitle' => wp_kses( __( 'It will change the existing url prefix "portfolio". Once you changed the custom slug, its mandatory to perform <a href="#">flush_rewrite_rules</a>.', 'milton' ), array( 'a' => array( 'href' => array() ) ) ),
                'default'  => '',
            ),
        )
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Singles', 'milton' ),
        'id'         => 'porfolio-sharing-options',
        'subsection' => true,
        'desc'       => esc_html__( 'Here, you can enable/disable some of the necessary share icons.', 'milton' ),
        'fields' => array(
            array(
                'id' => 'portfolio-single-navigation',
                'type' => 'switch',
                'title' => esc_html__('Portfolio Navigation', 'milton'),
                'desc' => esc_html__('It will enable the navigation link on portfolio page..', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),

            array(
                'id' => 'portfolio-single-prev',
                'type' => 'text',
                'required' => array('portfolio-single-navigation', '=', '1'),
                'title' => esc_html__('Portfolio single Previous Text ', 'milton'),
                'subtitle' => esc_html__('you can use the Word Previous or Older', 'milton'),
                'default' => 'Prev',
                'class' => 'text'
            ),
            
            array(
                'id' => 'portfolio-single-next',
                'type' => 'text',
                'required' => array('portfolio-single-navigation', '=', '1'),
                'title' => esc_html__('Portfolio single Next Text ', 'milton'),
                'subtitle' => esc_html__('you can use the Word Next or Newer', 'milton'),
                'default' => 'Next',
                'class' => 'text'
            ),
            /*array(
                'id' => 'portfolio-single-back',
                'type' => 'text',
                'title' => esc_html__('Portfolio Single Back Link', 'milton'),
                'subtitle' => esc_html__('it will help you to go back/home when your are in portfolio\'s single page', 'milton'),
                'validate' => 'url',
            ),*/
            array(
                'id' => 'portfolio-sharing-panel',
                'type' => 'switch',
                'title' => esc_html__('Portfolio Sharing icons', 'milton'),
                'subtitle' => esc_html__('This option enable the sharing panel at the bottom of every portfolio item.', 'milton'),
                'default' => 1, // 1 = on | 0 = off
                'on' => 'Enable',
                'off' => 'Disable',
            ),
            array(
                'id'       => 'portfolio-sharing-icons',
                'type'     => 'checkbox',
                'required' => array('portfolio-sharing-panel', '=', '1'),
                'title'    => esc_html__( 'Share Icons', 'milton' ),
                //Must provide key => value pairs for multi checkbox options
                'options'  => array(
                    '1' => 'Facebook',
                    '2' => 'Twitter',
                    '3' => 'Google Plus',
                    '4' => 'Linkedin'
                ),
                //See how std has changed? you also don't need to specify opts that are 0.
                'default'  => array(
                    '1' => '1',
                    '2' => '1',
                    '3' => '1',
                    '4' => '1'
                )
            ),
        )
            
    ) );

    if( class_exists( 'WooCommerce' ) ){
        Redux::setSection( $opt_name, array(
            'title' => esc_html__( 'Shop Settings', 'milton' ),
            'id'    => 'shop-settings',
            'icon'  => 'el el-shopping-cart'
        ) );
        
        Redux::setSection( $opt_name, array(
            'title'      => esc_html__( 'General', 'milton' ),
            'id'         => 'shop-general-options',
            'subsection' => true,
            'desc'       => esc_html__( 'Here, you can enable/disable basic shop options.', 'milton' ),
            'fields' => array(
                
                array(
                    'id' => 'shop-column-layout',
                    'type' => 'image_select',
                    'title' => esc_html__('Shop Layout(Columns)', 'milton'),
                    'subtitle' => esc_html__('Layout for your Shop page ', 'milton'),
                    'desc' => esc_html__('Choose an image to your shop page', 'milton'),
                    'options' => array(
                        '1' => array('alt' => '1 Column', 'img' => AGNI_FRAMEWORK_URL . '/template/img//portfolio-1c.png'),
                        '2' => array('alt' => '2 Columns', 'img' => AGNI_FRAMEWORK_URL . '/template/img//portfolio-2c.png'),
                        '3' => array('alt' => '3 Columns', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-3c.png'),
                        '4' => array('alt' => '4 Columns', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-4c.png'),
                        '5' => array('alt' => '5 Columns', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-5c.png'),
                        '6' => array('alt' => '6 Columns', 'img' => AGNI_FRAMEWORK_URL . '/template/img/portfolio-6c.png'),
                    ), //Must provide key => value(array:title|img) pairs for radio options
                    'default' => '3'
                ),

                array(
                    'id'       => 'shop-grid-layout',
                    'type'     => 'radio',
                    'title'    => esc_html__( 'Shop Grid Style', 'milton' ),
                    'subtitle' => esc_html__( 'Choose any of one grid style. fitRows is default and ', 'milton' ),
                    //Must provide key => value pairs for radio options
                    'options'  => array(
                        'fitRows' => 'FitRows(Default Grid)',
                        'masonry' => 'Masonry',
                    ),
                    'default'  => 'fitRows'
                ),
                array(
                    'id' => 'shop-sidebar',
                    'type'     => 'radio',
                    'title' => esc_html__('Shop Sidebar', 'milton'),
                    'options' => array(
                        'no-sidebar' => 'No Sidebar', 
                        'has-sidebar' => 'Right Sidebar',
                        'has-sidebar left' => 'Left Sidebar',
                    ), //Must provide key => value pairs for select options
                    'default' => 'has-sidebar'
                ),
                array(
                    'id' => 'shop-layout',
                    'type' => 'image_select',
                    'title' => esc_html__('shop Layout', 'milton'),
                    'subtitle' => esc_html__('Choose your desired shop layout.', 'milton'),
                    'options' => array(
                        'container' => 'Container', 
                        'container-fluid' => 'Fullwidth',
                    ), //Must provide key => value pairs for select options
                    'options' => array(                            
                        'container' => array('alt' => 'Container', 'title' => 'Container', 'img' => AGNI_FRAMEWORK_URL . '/template/img/layout-1.png'),
                        'container-fluid' => array('alt' => 'Fullwidth', 'title' => 'Fullwidth', 'img' => AGNI_FRAMEWORK_URL . '/template/img/layout-2.png'),
                    ), //Must provide key => value(array:title|img) pairs for radio options
                    'default' => 'container'
                ),
                array(
                    'id' => 'shop-gutter',
                    'type' => 'checkbox',
                    'title' => esc_html__('Gutter', 'milton'),
                    'subtitle' => esc_html__('It will bring some space in between the items horizontally.', 'milton'),
                    'default' => '1'// 1 = on | 0 = off
                ),
                array(
                    'id' => 'shop-gutter-value',
                    'type' => 'text',
                    'required' => array('shop-gutter', '=', '1'),
                    'title' => esc_html__('Gutter Value', 'milton'),
                    'subtitle' => esc_html__('Enter the space you want to add between each item.', 'milton'),
                    'default' => '30'// 1 = on | 0 = off
                ),
                array(
                    'id' => 'shop-thumbnail-hardcrop',
                    'type' => 'checkbox',
                    'title' => esc_html__('Shop Thumbnails Hard Crop', 'milton'),
                    'subtitle' => esc_html__('It will crop all the images by ignoring original dimension of an image.', 'milton'),
                    'default' => '0'// 1 = on | 0 = off
                ),
                array(
                    'id' => 'shop-thumbnail-dimension-custom',
                    'type' => 'text',
                    'required' => array('shop-thumbnail-hardcrop', '=', '1'),
                    'title' => esc_html__('Thumbnails Crop Size', 'milton'),
                    'subtitle' => esc_html__('You can mention your own dimension for ex. 640x640', 'milton'),
                    'desc' => esc_html__('Set the maximum width & height of a thumbnail. Note: it may not be an actual image size but the ratio will be the same.', 'milton'),
                    'default' => '640x640',
                ),
                array(
                    'id' => 'shop-navigation',
                    'type' => 'switch',
                    //'required' => array('shop-carousel', '=', '0'),
                    'title' => esc_html__('Shop Navigation', 'milton'),
                    'desc' => esc_html__('It will enable the navigation link on shop page.', 'milton'),
                    'default' => '1'// 1 = on | 0 = off
                ),
                array(
                    'id'       => 'shop-navigation-choice',
                    'type'     => 'radio',
                    'required' => array('shop-navigation', '=', '1'),
                    'title'    => esc_html__( 'Shop Navigation Style', 'milton' ),
                    'subtitle' => esc_html__( 'Choose any of one navigation style to display on the shop page.', 'milton' ),
                    //Must provide key => value pairs for radio options
                    'options'  => array(
                        '1' => 'Number',
                        '2' => 'Infinite',
                        '3' => 'Infinite & Load More button',
                    ),
                    'default'  => '1'
                ),
                array(
                    'id' => 'shop-navigation-ifs-load-text',
                    'type' => 'text',
                    'required' => array(
                        array( 'shop-navigation', '!=', '1'),
                    ),
                    'title' => esc_html__('Text to show on loading.', 'milton'),
                    'default' => 'Loading',
                ),
                array(
                    'id' => 'shop-navigation-ifs-finish-text',
                    'type' => 'text',
                    'required' => array(
                        array( 'shop-navigation', '!=', '1'),
                    ),
                    'title' => esc_html__('Text to show at the end of page.', 'milton'),
                    'default' => 'No More Products',
                ),

                array(
                    'id' => 'shop-navigation-ifs-btn-text',
                    'type' => 'text',
                    'required' => array('shop-navigation', '=', '3'),
                    'title' => esc_html__('Button Text', 'milton'),
                    'default' => 'Load More',
                ),
                 array(
                    'id' => 'shop-animation',
                    'type' => 'switch',
                    'title' => esc_html__('Shop Animation', 'milton'),
                    'subtitle' => esc_html__('If you don\'t want the animation on each shop item disable it.', 'milton'),
                    'desc' => esc_html__('This animation will show the items one by one only when it reaches the viewport.', 'milton'),
                    'default' => '1'// 1 = on | 0 = off
                ),
                array(
                    'id' => 'shop-animation-style',
                    'type' => 'select',
                    'required' => array('shop-animation', '=', '1'),
                    'title' => esc_html__('Animation Style', 'milton'),
                    'options' => array(
                        'fadeIn' => esc_html__('fadeIn', 'milton'),
                        'fadeInDown' => esc_html__('fadeInDown', 'milton'),
                        'fadeInUp' => esc_html__('fadeInUp', 'milton'),
                        'fadeInRight' => esc_html__('fadeInRight', 'milton'),
                        'fadeInLeft' => esc_html__('fadeInLeft', 'milton'),
                        'flipInX' => esc_html__('flipInX', 'milton'),
                        'flipInY' => esc_html__('flipInY', 'milton'),
                        'zoomIn' => esc_html__('zoomIn', 'milton'),
                    ), //Must provide key => value pairs for select options
                    'default' => 'fadeInUp'
                ),
                array(
                    'id' => 'shop-animation-duration',
                    'type' => 'text',
                    'required' => array('shop-animation', '=', '1'),
                    'title' => esc_html__('Animation Duration ', 'milton'),
                    'desc' => esc_html__('Enter the value in seconds. for ex. 0.6', 'milton'),
                    'validate' => 'numeric',
                    "default" => "0.8",
                ),

                array(
                    'id' => 'shop-animation-delay',
                    'type' => 'text',
                    'required' => array('shop-animation', '=', '1'),
                    'title' => esc_html__('Animation Delay ', 'milton'),
                    'desc' => esc_html__('Enter the value in seconds. for ex. 0.6', 'milton'),
                    'validate' => 'numeric',
                    "default" => "0.4",
                ),
                array(
                    'id' => 'shop-animation-offset',
                    'type' => 'slider',
                    'required' => array('shop-animation', '=', '1'),
                    'title' => esc_html__('Animation Offset ', 'milton'),
                    'desc' => esc_html__('animation will be triggered only when shop reaches particular percentage on viewport', 'milton'),
                    "default" => "90",
                    "min" => "20",
                    "step" => "5",
                    "max" => "100",
                ),
            )
        ) );
        Redux::setSection( $opt_name, array(
            'title'      => esc_html__( 'Singles', 'milton' ),
            'id'         => 'shop-single-options',
            'subsection' => true,
            'desc'       => esc_html__( 'Here, you can enable/disable some of the necessary share icons.', 'milton' ),
            'fields' => array(
                array(
                    'id' => 'shop-single-thumbnail-style',
                    'type' => 'select',
                    'title' => esc_html__('Single Thumbnails style', 'milton'),
                    'options' => array(
                        'single-product-hover-style-1' => esc_html__('Style 1(Lightbox)', 'milton'),
                        'single-product-hover-style-2' => esc_html__('Style 2(Zoom)', 'milton'),
                    ), //Must provide key => value pairs for select options
                    'default' => 'single-product-hover-style-1'
                ),

                array(
                    'id' => 'shop-sharing-panel',
                    'type' => 'switch',
                    'title' => esc_html__('Shop Single Page Sharing icons', 'milton'),
                    'subtitle' => esc_html__('This option enable the sharing panel at the bottom of every product.', 'milton'),
                    'default' => 1, // 1 = on | 0 = off
                    'on' => 'Enable',
                    'off' => 'Disable',
                ),
                array(
                    'id'       => 'shop-sharing-icons',
                    'type'     => 'checkbox',
                    'required' => array('shop-sharing-panel', '=', '1'),
                    'title'    => esc_html__( 'Share Icons', 'milton' ),
                    //Must provide key => value pairs for multi checkbox options
                    'options'  => array(
                        '1' => 'Facebook',
                        '2' => 'Twitter',
                        '3' => 'Google Plus',
                        '4' => 'Linkedin'
                    ),
                    //See how std has changed? you also don't need to specify opts that are 0.
                    'default'  => array(
                        '1' => '1',
                        '2' => '1',
                        '3' => '1',
                        '4' => '1'
                    )
                ),
            )

        ) );
    }
    
    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-road',
        'id'         => '404-error-options',
        'title' => esc_html__('404 Error Page', 'milton'),
        'desc' => esc_html__('you change your 404 page content here.', 'milton'),
        'fields' => array(
            
            array(
                'id' => '404-choice',
                'type' => 'radio',
                'title' => esc_html__('404 Choice', 'milton'),
                'options' => array(
                    '0' => 'Default', 
                    '1' => 'Content Block',
                ), //Must provide key => value pairs for select options
                "default" => '0',
            ),
            array(
                'id' => '404-contentblock-choice',
                'type' => 'select',
                'required' => array('404-choice', '=', '1'),
                'title' => esc_html__('Choose 404 Block', 'milton'),
                'options' => agni_posttype_options( array( 'post_type' => 'agni_block'), false ), //Must provide key => value pairs for select options
                "default" => '',
            ),
            array(
                'id' => '404-title',
                'type' => 'text',
                'required' => array('404-choice', '=', '0'),
                'title' => esc_html__('404 Title', 'milton'),
                'subtitle' => esc_html__('404 Title', 'milton'),
                'default' => '404'
            ),
            array(
                'id' => '404-description-text',
                'type' => 'editor',
                'required' => array('404-choice', '=', '0'),
                'title' => esc_html__('404 Description Text', 'milton'),
                'subtitle' => esc_html__('you can type your 404 description here..', 'milton'),
                'default' => 'It looks like nothing was found at this location. Maybe try one of the links below or a search?',
                'args'   => array(
                    'media_buttons'    => false,
                    'textarea_rows'    => 3
                )
            ),
            array(
                'id' => '404-searchbox',
                'type' => 'checkbox',
                'required' => array('404-choice', '=', '0'),
                'title' => esc_html__('Search Box', 'milton'),
                'default' => '1'// 1 = on | 0 = off
            ),  
            
        )
    ) );
    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-cogs',
        'id'         => 'maintenance-options',
        'title' => esc_html__('Maintenance Mode', 'milton'),
        'desc' => esc_html__('you change your maintenance page content/settings here.', 'milton'),
        'fields' => array(
            array(
                'id' => 'maintenance-mode',
                'type' => 'switch',
                'title' => esc_html__('Maintenance Mode', 'milton'),
                'default' => '0'// 1 = on | 0 = off
            ),  
            array(
                'id' => 'maintenance-mode-choice',
                'type' => 'select',
                'required' => array('maintenance-mode', '=', '1'),
                'title' => esc_html__('Maintenance Mode Choice', 'milton'),
                'options' => array(
                    '1' => esc_html__('Preset', 'milton'),
                    '2' => esc_html__('Custom', 'milton'),
                ), //Must provide key => value pairs for select options
                'default' => '1'
            ),
            array(
                'id' => 'maintenance-mode-custom-bg',
                'type' => 'background',
                'required' => array('maintenance-mode-choice', '=', '2'),
                'title' => esc_html__('Background for Maintenance Mode', 'milton'),
                //'default' => array( 'background-color' => '#fbfbfb', ),
            ),

            array(
                'id' => 'maintenance-mode-custom',
                'type' => 'editor',
                'required' => array('maintenance-mode-choice', '=', '2'),
                'title' => esc_html__('HTML codes for Maintenance Mode', 'milton'),
                'subtitle' => esc_html__('you can type your HTML codes for Maintenance mode page.', 'milton'),
                'default' => '<div id="header"><h4 class="agni-maintenance-mode-header-icon"><a title="YOURSITE TITLE" href="YOURSITE LINK">YOUR SITE NAME</a></h4></div><div id="content" class="agni-maintenance-mode-content"><div class="maintenance-icon" data-icon="P"></div><h2>We\'ll be right back!</h2><p>Sorry for the inconvenience. We\'re busy on making something cool for you.<br/>Please try after sometime</p></div>',
                'args'   => array(
                    'media_buttons'    => true,
                    'textarea_rows'    => 8
                )
            ),
        )
    ) );

    Redux::setSection( $opt_name, array(
        'icon' => 'el-icon-group',
        'id'         => 'social-links-options',
        'title' => esc_html__('Social Network links', 'milton'),
        'desc' => esc_html__('Fill your links for social network.', 'milton'),
        'fields' => array(
        
            array(
                'id' => 'facebook-link',
                'type' => 'text',
                'title' => esc_html__('Facebook Link', 'milton'),
                'subtitle' => esc_html__('Link your profile page', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://facebook.com/profile/' )
            ),
            array(
                'id' => 'twitter-link',
                'type' => 'text',
                'title' => esc_html__('Twitter Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://twitter.com/' )
            ),
            array(
                'id' => 'google-plus-link',
                'type' => 'text',
                'title' => esc_html__('Google + Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://google.com/' )
            ),
            array(
                'id' => 'bitbucket-link',
                'type' => 'text',
                'title' => esc_html__('BitBucket Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://bitbucket.org/' )
            ),
            array(
                'id' => 'behance-link',
                'type' => 'text',
                'title' => esc_html__('Behance Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://behance.net/' )
            ),
            array(
                'id' => 'dribbble-link',
                'type' => 'text',
                'title' => esc_html__('Dribbble Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://dribbble.com/' )
            ),
            array(
                'id' => 'flickr-link',
                'type' => 'text',
                'title' => esc_html__('Flickr Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://flickr.com/' )
            ),
            array(
                'id' => 'github-link',
                'type' => 'text',
                'title' => esc_html__('GitHub Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://github.com/' )
            ),
            array(
                'id' => 'instagram-link',
                'type' => 'text',
                'title' => esc_html__('Instagram Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://instagram.com/' )
            ),
            array(
                'id' => 'linkedin-link',
                'type' => 'text',
                'title' => esc_html__('Linkedin Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://linkedin.com/' )
            ),
            array(
                'id' => 'pinterest-link',
                'type' => 'text',
                'title' => esc_html__('Pinterest Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://pinterest.com/' )
            ),
            array(
                'id' => 'reddit-link',
                'type' => 'text',
                'title' => esc_html__('Reddit Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://reddit.com/' )
            ),
            array(
                'id' => 'soundcloud-link',
                'type' => 'text',
                'title' => esc_html__('SoundCloud Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://soundcloud.com/' )
            ),
            array(
                'id' => 'skype-link',
                'type' => 'text',
                'title' => esc_html__('Skype Link', 'milton'),                        
                'default' => 'skype:yourname?call'
            ),
            array(
                'id' => 'stack-overflow-link',
                'type' => 'text',
                'title' => esc_html__('Stack Overflow Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://stackoverflow.com/' )
            ),
            array(
                'id' => 'tumblr-link',
                'type' => 'text',
                'title' => esc_html__('Tumblr Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://tumblr.com/' )
            ),
            array(
                'id' => 'vimeo-link',
                'type' => 'text',
                'title' => esc_html__('Vimeo Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://vimeo.com/' )
            ),
            array(
                'id' => 'vk-link',
                'type' => 'text',
                'title' => esc_html__('VK Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://vk.com/' )
            ),
            array(
                'id' => 'weibo-link',
                'type' => 'text',
                'title' => esc_html__('Weibo Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://weibo.com/' )
            ),
            array(
                'id' => 'whatsapp-link',
                'type' => 'text',
                'title' => esc_html__('WhatsApp Link', 'milton'),
                'default' => 'whatsapp://send?text=http://www.whatsapp.com'
            ),
            array(
                'id' => 'youtube-link',
                'type' => 'text',
                'title' => esc_html__('Youtube Link', 'milton'),
                'validate' => 'url',
                'default' => esc_url( 'http://youtube.com/' )
            ),
            
        )
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Custom Coding', 'milton' ),
        'id'         => 'custom-coding-options',
        'icon'  => 'el el-leaf',
        'desc'       => esc_html__( 'This section used for advance customization, you can add your own codes here.', 'milton' ),
        'fields'     => array(
            array(
                'id'       => 'css-code',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'CSS Code', 'milton' ),
                'subtitle' => esc_html__( 'Paste your CSS code here.', 'milton' ),
                'mode'     => 'css',
                'theme'    => 'monokai',
                'desc'     => 'You can write your own CSS here.',
                'default'  => "#header{\n   margin: 0 auto;\n}\n/* your styles here & you can delete above reference */"
            ),
            array(
                'id'       => 'js-code',
                'type'     => 'ace_editor',
                'title'    => esc_html__( 'JS Code', 'milton' ),
                'subtitle' => esc_html__( 'Paste your JS code here.', 'milton' ),
                'mode'     => 'javascript',
                'theme'    => 'chrome',
                'desc'     => 'You can write your own jQuery here.',
                'default'  => "jQuery(document).ready(function(){\n\t/* your jquery here */\n});"
            ),

        )
    ) );
    
    /*
     * <--- END SECTIONS
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    function compiler_action( $options, $css, $changed_values ) {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r( $changed_values ); // Values that have changed since the last save
        echo "</pre>";
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use AGNI_FRAMEWORK_URL  if you want to use any of the built in icons
     * */
    function dynamic_section( $sections ) {
        //$sections = array();
        $sections[] = array(
            'title'  => esc_html__( 'Section via hook', 'milton' ),
            'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'milton' ),
            'icon'   => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array()
        );

        return $sections;
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    function change_arguments( $args ) {
        //$args['dev_mode'] = true;

        return $args;
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    function change_defaults( $defaults ) {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }

