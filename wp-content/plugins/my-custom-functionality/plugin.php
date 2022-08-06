<?php
/*
Plugin Name:	My Custom Functionality
Plugin URI:		https://example.com
Description:	My custom functions.
Version:		1.0.0
Author:			Your Name
Author URI:		https://example.com
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

add_action( 'wp_enqueue_scripts', 'custom_enqueue_files' );
/**
 * Loads <list assets here>.
 */
function custom_enqueue_files() {
	wp_enqueue_script( 'rellax-js', plugin_dir_url( __FILE__ ) . 'assets/js/rellax.min.js', '', '', true );
	wp_enqueue_script( 'back2top-js', plugin_dir_url( __FILE__ ) . 'assets/js/back2top.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'waypoints-js', plugin_dir_url( __FILE__ ) . 'assets/js/jquery.waypoints.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'countUp-js', plugin_dir_url( __FILE__ ) . 'assets/js/countUp.min.js', '','', true );
}
