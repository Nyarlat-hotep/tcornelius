<?php
function my_theme_enqueue_styles() {

    $parent_style = 'kale-customizer'; // This is 'kale' for the Kale theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );
    function enqueue_load_fa() {
    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css' );
}   

function load_child_stylesheet() {
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/css/style.css');
}
add_action('wp_enqueue_scripts', 'load_child_stylesheet');


function my_scripts_method() {
    wp_enqueue_script(
        'custom-script',
        get_stylesheet_directory_uri() . '/js/custom_script.js',
        array( 'jquery' )
    );
}

add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
?>