<?php
/**
 * Created by PhpStorm.
 * User: Brycen
 * Date: 2015-04-21
 * Time: 6:42 PM
 */


function lightmatter_scripts() {
    wp_deregister_script('jquery'); // Get rid of existing wordpress jquery 1.1.1
    wp_register_script( 'jquery', get_template_directory_uri() . '/vendor/jquery/jquery-2.1.3.min.js', array(), false, true);
    wp_register_script( 'materialize', get_template_directory_uri() . '/vendor/materialize/js/materialize.min.js', array('jquery'), false, true);
    wp_register_script( 'actions', get_template_directory_uri() . '/js/main.js', array('jquery'), false, true);

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'materialize' );
    wp_enqueue_script( 'actions' );
    wp_enqueue_style('style', get_stylesheet_uri());
}

add_action( 'wp_enqueue_scripts', 'lightmatter_scripts' );