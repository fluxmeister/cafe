<?php

	$vw_handyman_services_custom_css= "";

	/*--------------------- Global First Color --------------------*/

	$vw_handyman_services_first_color = get_theme_mod('vw_handyman_services_first_color');

	if($vw_handyman_services_first_color != false){
		$vw_handyman_services_custom_css .='.main-header, .topbar_btn a:hover, .slider-btn a:hover,.media-box, .main-navigation ul.sub-menu>li>a:before, .view-all-btn a,.more-btn a,#comments input[type="submit"],#comments a.comment-reply-link,input[type="submit"],.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,nav.woocommerce-MyAccount-navigation ul li,.pro-button a, .box:hover, #preloader, #footer-2, .scrollup i, #sidebar h3, .pagination span, .pagination a, .widget_product_search button{';
			$vw_handyman_services_custom_css .='background-color: '.esc_attr($vw_handyman_services_first_color).';';
		$vw_handyman_services_custom_css .='}';

		$vw_handyman_services_custom_css .='@media screen and (max-width:1000px){
				.page-template-custom-home-page .main-header{';
			$vw_handyman_services_custom_css .='background-color: '.esc_attr($vw_handyman_services_first_color).';';
		$vw_handyman_services_custom_css .='} }';
	}

	if($vw_handyman_services_first_color != false){
		$vw_handyman_services_custom_css .='h1, h2, h3, h4, h5, h6, a, .post-main-box h2 a,.post-info span a,.middle-bar h6, .woocommerce div.product p.price, .woocommerce div.product span.price,.woocommerce ul.products li.product .price{';
			$vw_handyman_services_custom_css .='color: '.esc_attr($vw_handyman_services_first_color).';';
		$vw_handyman_services_custom_css .='}';

		$vw_handyman_services_custom_css .='@media screen and (max-width:1000px){
				.main-navigation a:hover{';
			$vw_handyman_services_custom_css .='color: '.esc_attr($vw_handyman_services_first_color).'!important;';
		$vw_handyman_services_custom_css .='} }';

		$vw_handyman_services_custom_css .='.topbar_btn a:hover, .slider-btn a:hover{';
			$vw_handyman_services_custom_css .='box-shadow: inset 0 0 0 2em '.esc_attr($vw_handyman_services_first_color).';';
		$vw_handyman_services_custom_css .='} ';
	}

	/*--------------------- Global Second Color --------------------*/

	$vw_handyman_services_second_color = get_theme_mod('vw_handyman_services_second_color');

	if($vw_handyman_services_second_color != false){
		$vw_handyman_services_custom_css .='.more-btn a:hover,input[type="submit"]:hover,#comments input[type="submit"]:hover,#comments a.comment-reply-link:hover,.pagination .current,.pagination a:hover,#footer .tagcloud a:hover,#sidebar .tagcloud a:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.widget_product_search button:hover,nav.woocommerce-MyAccount-navigation ul li:hover, .topbar_btn a,.slider-btn a, #slider .carousel-control-next, services-sec hr, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, .woocommerce span.onsale, .toggle-nav button, #services-sec hr{';
			$vw_handyman_services_custom_css .='background-color: '.esc_attr($vw_handyman_services_second_color).';';
		$vw_handyman_services_custom_css .='}';
	}

	if($vw_handyman_services_second_color != false){
		$vw_handyman_services_custom_css .='p.site-title a, .logo h1 a, i.fas.fa-bars.media-box, .heading-text, #services-sec .owl-nav i:hover, .copyright a:hover, .post-main-box:hover h2 a, #footer .textwidget a,#footer li a:hover,.post-main-box:hover h3 a,#sidebar ul li a:hover,.post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.post-navigation a:hover,.post-navigation a:focus{';
			$vw_handyman_services_custom_css .='color: '.esc_attr($vw_handyman_services_second_color).';';
		$vw_handyman_services_custom_css .='}';
	}

	if($vw_handyman_services_second_color != false){
		$vw_handyman_services_custom_css .='.logo-bg-bx{
		box-shadow: 6px 6px 0 0px '.esc_attr($vw_handyman_services_second_color).';
		}';

		$vw_handyman_services_custom_css .='.more-btn a:hover, input[type="submit"]:hover, #comments input[type="submit"]:hover, #comments a.comment-reply-link:hover, .pagination .current, .pagination a:hover, #footer .tagcloud a:hover, #sidebar .tagcloud a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .widget_product_search button:hover, nav.woocommerce-MyAccount-navigation ul li:hover{';
			$vw_handyman_services_custom_css .='box-shadow: inset 0 0 0 2em '.esc_attr($vw_handyman_services_second_color).';';
		$vw_handyman_services_custom_css .='} ';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_handyman_services_theme_lay = get_theme_mod( 'vw_handyman_services_width_option','Full Width');
    if($vw_handyman_services_theme_lay == 'Boxed'){
		$vw_handyman_services_custom_css .='body{';
			$vw_handyman_services_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_handyman_services_custom_css .='}';
	}else if($vw_handyman_services_theme_lay == 'Wide Width'){
		$vw_handyman_services_custom_css .='body{';
			$vw_handyman_services_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_handyman_services_custom_css .='}';
	}else if($vw_handyman_services_theme_lay == 'Full Width'){
		$vw_handyman_services_custom_css .='body{';
			$vw_handyman_services_custom_css .='max-width: 100%;';
		$vw_handyman_services_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_handyman_services_theme_lay = get_theme_mod( 'vw_handyman_services_slider_opacity_color','0.5');
	if($vw_handyman_services_theme_lay == '0'){
		$vw_handyman_services_custom_css .='#slider img{';
			$vw_handyman_services_custom_css .='opacity:0';
		$vw_handyman_services_custom_css .='}';
		}else if($vw_handyman_services_theme_lay == '0.1'){
		$vw_handyman_services_custom_css .='#slider img{';
			$vw_handyman_services_custom_css .='opacity:0.1';
		$vw_handyman_services_custom_css .='}';
		}else if($vw_handyman_services_theme_lay == '0.2'){
		$vw_handyman_services_custom_css .='#slider img{';
			$vw_handyman_services_custom_css .='opacity:0.2';
		$vw_handyman_services_custom_css .='}';
		}else if($vw_handyman_services_theme_lay == '0.3'){
		$vw_handyman_services_custom_css .='#slider img{';
			$vw_handyman_services_custom_css .='opacity:0.3';
		$vw_handyman_services_custom_css .='}';
		}else if($vw_handyman_services_theme_lay == '0.4'){
		$vw_handyman_services_custom_css .='#slider img{';
			$vw_handyman_services_custom_css .='opacity:0.4';
		$vw_handyman_services_custom_css .='}';
		}else if($vw_handyman_services_theme_lay == '0.5'){
		$vw_handyman_services_custom_css .='#slider img{';
			$vw_handyman_services_custom_css .='opacity:0.5';
		$vw_handyman_services_custom_css .='}';
		}else if($vw_handyman_services_theme_lay == '0.6'){
		$vw_handyman_services_custom_css .='#slider img{';
			$vw_handyman_services_custom_css .='opacity:0.6';
		$vw_handyman_services_custom_css .='}';
		}else if($vw_handyman_services_theme_lay == '0.7'){
		$vw_handyman_services_custom_css .='#slider img{';
			$vw_handyman_services_custom_css .='opacity:0.7';
		$vw_handyman_services_custom_css .='}';
		}else if($vw_handyman_services_theme_lay == '0.8'){
		$vw_handyman_services_custom_css .='#slider img{';
			$vw_handyman_services_custom_css .='opacity:0.8';
		$vw_handyman_services_custom_css .='}';
		}else if($vw_handyman_services_theme_lay == '0.9'){
		$vw_handyman_services_custom_css .='#slider img{';
			$vw_handyman_services_custom_css .='opacity:0.9';
		$vw_handyman_services_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/

	$vw_handyman_services_theme_lay = get_theme_mod( 'vw_handyman_services_slider_content_option','Left');
    if($vw_handyman_services_theme_lay == 'Left'){
		$vw_handyman_services_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_handyman_services_custom_css .='text-align:left; left:10%; right:50%;';
		$vw_handyman_services_custom_css .='}';
	}else if($vw_handyman_services_theme_lay == 'Center'){
		$vw_handyman_services_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_handyman_services_custom_css .='text-align:center; left:30%; right:30%;';
		$vw_handyman_services_custom_css .='}';
	}else if($vw_handyman_services_theme_lay == 'Right'){
		$vw_handyman_services_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1{';
			$vw_handyman_services_custom_css .='text-align:right; left:50%; right:10%;';
		$vw_handyman_services_custom_css .='}';
	}

	/*------------------ Slider Height ------------*/

	$vw_handyman_services_slider_height = get_theme_mod('vw_handyman_services_slider_height');
	if($vw_handyman_services_slider_height != false){
		$vw_handyman_services_custom_css .='#slider img{';
			$vw_handyman_services_custom_css .='height: '.esc_attr($vw_handyman_services_slider_height).';';
		$vw_handyman_services_custom_css .='}';
	}

	/*------------- Slider ------------*/

	$vw_handyman_services_slider = get_theme_mod('vw_handyman_services_slider_hide_show', false);
	if($vw_handyman_services_slider == false){
		$vw_handyman_services_custom_css .='.page-template-custom-home-page .main-header{';
			$vw_handyman_services_custom_css .='position: static; background: #001e38;';
		$vw_handyman_services_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$vw_handyman_services_resp_slider = get_theme_mod( 'vw_handyman_services_resp_slider_hide_show',false);
	if($vw_handyman_services_resp_slider == true && get_theme_mod( 'vw_handyman_services_slider_hide_show', false) == false){
    	$vw_handyman_services_custom_css .='#slider{';
			$vw_handyman_services_custom_css .='display:none;';
		$vw_handyman_services_custom_css .='} ';
	}
    if($vw_handyman_services_resp_slider == true){
    	$vw_handyman_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_handyman_services_custom_css .='#slider{';
			$vw_handyman_services_custom_css .='display:block;';
		$vw_handyman_services_custom_css .='} }';
	}else if($vw_handyman_services_resp_slider == false){
		$vw_handyman_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_handyman_services_custom_css .='#slider{';
			$vw_handyman_services_custom_css .='display:none;';
		$vw_handyman_services_custom_css .='} }';
		$vw_handyman_services_custom_css .='@media screen and (max-width:575px){';
		$vw_handyman_services_custom_css .='.page-template-custom-home-page.admin-bar .homepageheader{';
			$vw_handyman_services_custom_css .='margin-top: 45px;';
		$vw_handyman_services_custom_css .='} }';
	}

	$vw_handyman_services_resp_sidebar = get_theme_mod( 'vw_handyman_services_sidebar_hide_show',true);
    if($vw_handyman_services_resp_sidebar == true){
    	$vw_handyman_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_handyman_services_custom_css .='#sidebar{';
			$vw_handyman_services_custom_css .='display:block;';
		$vw_handyman_services_custom_css .='} }';
	}else if($vw_handyman_services_resp_sidebar == false){
		$vw_handyman_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_handyman_services_custom_css .='#sidebar{';
			$vw_handyman_services_custom_css .='display:none;';
		$vw_handyman_services_custom_css .='} }';
	}

	$vw_handyman_services_resp_scroll_top = get_theme_mod( 'vw_handyman_services_resp_scroll_top_hide_show',true);
	if($vw_handyman_services_resp_scroll_top == true && get_theme_mod( 'vw_handyman_services_hide_show_scroll',true) == false){
    	$vw_handyman_services_custom_css .='.scrollup i{';
			$vw_handyman_services_custom_css .='visibility:hidden !important;';
		$vw_handyman_services_custom_css .='} ';
	}
    if($vw_handyman_services_resp_scroll_top == true){
    	$vw_handyman_services_custom_css .='@media screen and (max-width:575px) {';
		$vw_handyman_services_custom_css .='.scrollup i{';
			$vw_handyman_services_custom_css .='visibility:visible !important;';
		$vw_handyman_services_custom_css .='} }';
	}else if($vw_handyman_services_resp_scroll_top == false){
		$vw_handyman_services_custom_css .='@media screen and (max-width:575px){';
		$vw_handyman_services_custom_css .='.scrollup i{';
			$vw_handyman_services_custom_css .='visibility:hidden !important;';
		$vw_handyman_services_custom_css .='} }';
	}
	
	/*---------------- Button Settings ------------------*/

	$vw_handyman_services_button_border_radius = get_theme_mod('vw_handyman_services_button_border_radius');
	if($vw_handyman_services_button_border_radius != false){
		$vw_handyman_services_custom_css .='.post-main-box .more-btn a{';
			$vw_handyman_services_custom_css .='border-radius: '.esc_attr($vw_handyman_services_button_border_radius).'px;';
		$vw_handyman_services_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_handyman_services_copyright_alingment = get_theme_mod('vw_handyman_services_copyright_alingment');
	if($vw_handyman_services_copyright_alingment != false){
		$vw_handyman_services_custom_css .='.copyright p{';
			$vw_handyman_services_custom_css .='text-align: '.esc_attr($vw_handyman_services_copyright_alingment).';';
		$vw_handyman_services_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$vw_handyman_services_site_title_font_size = get_theme_mod('vw_handyman_services_site_title_font_size');
	if($vw_handyman_services_site_title_font_size != false){
		$vw_handyman_services_custom_css .='.logo h1, .logo p.site-title{';
			$vw_handyman_services_custom_css .='font-size: '.esc_attr($vw_handyman_services_site_title_font_size).';';
		$vw_handyman_services_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_handyman_services_site_tagline_font_size = get_theme_mod('vw_handyman_services_site_tagline_font_size');
	if($vw_handyman_services_site_tagline_font_size != false){
		$vw_handyman_services_custom_css .='.logo p.site-description{';
			$vw_handyman_services_custom_css .='font-size: '.esc_attr($vw_handyman_services_site_tagline_font_size).';';
		$vw_handyman_services_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_handyman_services_preloader_bg_color = get_theme_mod('vw_handyman_services_preloader_bg_color');
	if($vw_handyman_services_preloader_bg_color != false){
		$vw_handyman_services_custom_css .='#preloader{';
			$vw_handyman_services_custom_css .='background-color: '.esc_attr($vw_handyman_services_preloader_bg_color).';';
		$vw_handyman_services_custom_css .='}';
	}

	$vw_handyman_services_preloader_border_color = get_theme_mod('vw_handyman_services_preloader_border_color');
	if($vw_handyman_services_preloader_border_color != false){
		$vw_handyman_services_custom_css .='.loader-line{';
			$vw_handyman_services_custom_css .='border-color: '.esc_attr($vw_handyman_services_preloader_border_color).'!important;';
		$vw_handyman_services_custom_css .='}';
	}