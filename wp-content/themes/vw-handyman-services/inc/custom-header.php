<?php
/**
 * @package VW Handyman Services
 * Setup the WordPress core custom header feature.
 *
 * @uses vw_handyman_services_header_style()
*/
function vw_handyman_services_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'vw_handyman_services_custom_header_args', array(
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 200,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'vw_handyman_services_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'vw_handyman_services_custom_header_setup' );

if ( ! function_exists( 'vw_handyman_services_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see vw_handyman_services_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'vw_handyman_services_header_style' );

function vw_handyman_services_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .home-page-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		    background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'vw-handyman-services-basic-style', $custom_css );
	endif;
}
endif;