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

add_filter( 'cmb_meta_boxes', 'cmb_sidebar_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb_sidebar_metaboxes( array $meta_boxes ) {

    global $wp_registered_sidebars;
	$all_sidebars = array();

	if ( $wp_registered_sidebars && ! is_wp_error( $wp_registered_sidebars ) ) {
		foreach ( $wp_registered_sidebars as $sidebar ) {
			$all_sidebars[ $sidebar['id'] ] = $sidebar['name'];
		}
	}
	
    // Start with an underscore to hide fields from custom fields list
    $prefix = 'crum_sidebars_';
	
	if($all_sidebars &&  is_array($all_sidebars) ) {
		$select_str = __('Sidebar is not selected', 'dfd');
		$all_sidebars = array_merge( array( '' => $select_str ), $all_sidebars );
	}

    $meta_boxes[] = array(
        'id'         => 'dfd-sidebar_select_metabox',
        'title'      => __('Custom sidebar', 'dfd'),
        'pages'      => array( 'page','post','product'), // Post type
        'context'    => 'side',
        'priority'   => 'default',
        'show_names' => true, // Show field names on the left
        'fields'     => array(
            array(
                'type' => 'select',
                'id'   => $prefix . 'sidebar_1',
                'name' => 'Select left sidebar',
                'std'  => 'Left Sidebar',
				'options' => $all_sidebars,
            ),
            array(
                'type' => 'select',
                'id'   => $prefix . 'sidebar_2',
                'name' => 'Select right sidebar',
                'std'  => 'Right Sidebar',
				'options' => $all_sidebars,
            ),
         ),
    );
   
    // Add other metaboxes as needed

    return $meta_boxes;
}