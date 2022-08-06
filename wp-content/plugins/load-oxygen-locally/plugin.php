<?php
/*
Plugin Name:	Load Oxygen Locally
Plugin URI:		https://oxygen4fun.supadezign.com/
Description:	Load Oxygen's assets locally & change Oxygen UI font by the default WP font
Version:		1.0.2
Author:			THOMAS Michaël aka SUPAMIKE
Author URI:		https://www.supadezign.com/
License:		GPL-2.0+
License URI:	http://www.gnu.org/licenses/gpl-2.0.txt

This plugin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

This plugin is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with This plugin. If not, see {URI to Plugin License}.
*/

if ( ! defined( 'WPINC' ) ) {
	die;
}

//Dequeue Styles
function project_dequeue_unnecessary_styles() {
	if ( defined("SHOW_CT_BUILDER") ) {
		wp_deregister_style( 'font-awesome' );
		wp_deregister_style( 'jquery-ui-css' );

		wp_enqueue_style('font-awesome', plugin_dir_url( __FILE__ ) . 'assets/css/font-awesome.min.css', array(), '4.3.0');	
		wp_enqueue_style('jquery-ui-css', plugin_dir_url( __FILE__ ) . 'assets/css/jquery-ui.css', array());
	}
}
add_action( 'wp_print_styles', 'project_dequeue_unnecessary_styles',100 );


function project_dequeue_unnecessary_scripts() {
	if ( defined("SHOW_CT_BUILDER") ) {
		wp_deregister_script( 'font-loader' );
		wp_deregister_script( 'jquery-ui' );
		wp_deregister_script( 'angular' );
		wp_deregister_script( 'angular-animate' );
	
		wp_enqueue_script("font-loader", plugin_dir_url( __FILE__ ) . 'assets/js/webfont.js',array(), false, false);
		wp_enqueue_script('jquery-ui', plugin_dir_url( __FILE__ ) . 'assets/js/jquery-ui.js',array(), '1.11.3', false);	
		wp_enqueue_script( 'angular', plugin_dir_url( __FILE__ ) . 'assets/js/angular.js',array(), '1.4.2', false);
		wp_enqueue_script( 'angular-animate', plugin_dir_url( __FILE__ ) . 'assets/js/angular-animate.js',array(), '1.4.2', false);
	}	
}
add_action( 'wp_print_scripts', 'project_dequeue_unnecessary_scripts',100 );

function load_custom_wp_admin_style() {
		wp_enqueue_style('fixfont', plugin_dir_url( __FILE__ ) . 'assets/css/fixfontadmin.css', array(), '1.0.0');
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style',100 );

// Custom Oxygen UI styles
add_action( 'oxygen_enqueue_ui_scripts', 'load_custom_oxy_ui_style',1000 );
function load_custom_oxy_ui_style() {
       wp_enqueue_style('fixfont', plugin_dir_url( __FILE__ ) . 'assets/css/fixfont.css', array(), '1.0.0',false);
}

