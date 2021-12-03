<?php
/*
 * @package     WBC_Importer - Extension for Importing demo content
 * @author      Webcreations907
 * @version     1.0
 */


if ( !function_exists( 'wbc_filter_title' ) ) {

	/**
	 * Filter for changing demo title in options panel so it's not folder name.
	 *
	 * @param [string] $title name of demo data folder
	 *
	 * @return [string] return title for demo name.
	 */

	function wbc_filter_title( $title ) {
		return trim( ucfirst( str_replace( "-", " ", $title ) ) );
	}

	// Uncomment the below
	add_filter( 'wbc_importer_directory_title', 'wbc_filter_title', 10 );
}

if ( !function_exists( 'wbc_importer_description_text' ) ) {

	/**
	 * Filter for changing importer description info in options panel
	 * when not setting in Redux config file.
	 *
	 * @param [string] $title description above demos
	 *
	 * @return [string] return.
	 */

	function wbc_importer_description_text( $description ) {
		$message = '<h3 style="font-size:18px"><strong>'. esc_html__( 'STEPS', 'milton' ) .'</strong><ul style="margin-top:0;"><li><span>'. esc_html__( '1. Click "All demo content" to import all contents.', 'milton' ) .'</span></li><li><li><span>'. esc_html__( '2. Then pick anyone from the rest of the boxes(Demo 1 settings - Demo 13 settings) to import the corresponding demo settings.', 'milton' ) .'</span></li></ul></h3>';
		$message .= '<p><strong style="color:red;">'. esc_html__( 'This process may take serveral minutes to complete. Please be patient :) If the process bar stops working, refresh the page and click "Import Demo" again.', 'milton' ) .'</strong></p>';

		return $message;
	}

	// Uncomment the below
	add_filter( 'wbc_importer_description', 'wbc_importer_description_text', 10 );
}


if ( !function_exists( 'wbc_change_demo_directory_path' ) ) {

	/**
	 * Change the path to the directory that contains demo data folders.
	 *
	 * @param [string] $demo_directory_path
	 *
	 * @return [string]
	 */

	function wbc_change_demo_directory_path( $demo_directory_path ) {

		$demo_directory_path = get_template_directory() .'/template/demo-data/';

		return $demo_directory_path;

	}

	// Uncomment the below
	add_filter('wbc_importer_dir_path', 'wbc_change_demo_directory_path' );
}

/************************************************************************
* Extended Example:
* Way to set menu, import revolution slider, and set home page.
*************************************************************************/

if ( !function_exists( 'wbc_extended_example' ) ) {
	function wbc_extended_example( $demo_active_import , $demo_directory_path ) {

		reset( $demo_active_import );
		$current_key = key( $demo_active_import );

		/************************************************************************
		* Import slider(s) for the current demo being imported
		*************************************************************************/

		if ( class_exists( 'RevSlider' ) ) {

			//If it's demo3 or demo5
			$wbc_sliders_array = array(
				'demo-6-settings' => 'demo-6.zip', //Set slider zip name
				'demo-7-settings' => 'demo-7.zip',
				'demo-12-settings' => 'demo-12.zip',
				'demo-13-settings' => 'demo-13.zip',
			);

			if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_sliders_array ) ) {
				$wbc_slider_import = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];

				if ( file_exists( $demo_directory_path.$wbc_slider_import ) ) {
					$slider = new RevSlider();
					$slider->importSliderFromPost( true, true, $demo_directory_path.$wbc_slider_import );
				}
			}
		}

		/************************************************************************
		* Setting Menus
		*************************************************************************/

		// mention all your demo names
		// Primary Menu
		$wbc_menu_array = array( 'all-demo-content' ,'demo-1-settings', 'demo-2-settings', 'demo-3-settings', 'demo-4-settings', 'demo-5-settings', 'demo-6-settings', 'demo-7-settings', 'demo-8-settings', 'demo-9-settings', 'demo-10-settings', 'demo-11-settings', 'demo-12-settings', 'demo-13-settings' );
		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array ) ) {
			$primary_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );

			if ( isset( $primary_menu->term_id ) ) {
				set_theme_mod( 'nav_menu_locations', array(
						'primary' => $primary_menu->term_id,
					)
				);
			}
		}

		/************************************************************************
		* Set HomePage
		*************************************************************************/

		// array of demos/homepages to check/select from
		$wbc_home_pages = array(
			'demo-1-settings' => 'Demo 1',
			'demo-2-settings' => 'Demo 2',
			'demo-3-settings' => 'Demo 3',
			'demo-4-settings' => 'Demo 4',
			'demo-5-settings' => 'Demo 5',
			'demo-6-settings' => 'Demo 6',
			'demo-7-settings' => 'Demo 7',
			'demo-8-settings' => 'Demo 8',
			'demo-9-settings' => 'Demo 9',
			'demo-10-settings' => 'Demo 10',
			'demo-11-settings' => 'Demo 11',
			'demo-12-settings' => 'Demo 12',
			'demo-13-settings' => 'Demo 13',
		);

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) {
			$page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
			if ( isset( $page->ID ) ) {
				update_option( 'page_on_front', $page->ID );
				update_option( 'show_on_front', 'page' );
			}
		}

	}


	// Uncomment the below
	add_action( 'wbc_importer_after_content_import', 'wbc_extended_example', 10, 2 );
}

?>
