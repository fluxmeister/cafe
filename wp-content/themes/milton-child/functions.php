<?php

function agni_child_enqueue_scripts() {
    // Adding parent styles
    wp_enqueue_style( 'agni-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'agni-parent-responsive', get_template_directory_uri() . '/css/responsive.css' );

    // Adding child stylesheet
	wp_enqueue_style( 'agni-child-style', get_stylesheet_directory_uri() . '/style.css'  );
}
add_action( 'wp_enqueue_scripts', 'agni_child_enqueue_scripts');

?>