<?php

function agrofarm_enqueue_assets()
{

    wp_enqueue_style('agrofarm-style', get_stylesheet_uri());
    wp_enqueue_style('agrofarm-all-min', get_template_directory_uri() . '/assets/css/all.min.css');

    wp_enqueue_script('agrofarm-script', get_template_directory_uri() . '/assets/js/script.js', array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'agrofarm_enqueue_assets');

function agrofarm_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');

}
add_action('after_setup_theme', 'agrofarm_setup');

// navigation menus 
function agrofarm_menus()
{

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'agrofarm'),
        'footer' => __('Footer Menu', 'agrofarm'),
    ));
}
add_action('init', 'agrofarm_menus');
// Customizer add section for Header
function agrofarm_register_customizer($wp_customize)
{

    $wp_customize->add_section('agrofarm_header', array(
        'title' => __('Header', 'agrofarm'),
        'priority' => 30,
    ));
    // logo
    $wp_customize->add_setting('agrofarm_header_logo', array(
        'default' => '',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'agrofarm_header_logo', array(
        'label' => __('Logo', 'agrofarm'),
        'section' => 'agrofarm_header',
        'settings' => 'agrofarm_header_logo',
    )));

    // header title text
    $wp_customize->add_setting('agrofarm_header_title', array(
        'default' => '',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control('agrofarm_header_title', array(
        'label' => __('Title', 'agrofarm'),
        'section' => 'agrofarm_header',
        'settings' => 'agrofarm_header_title',
    ));

    // header email text
    $wp_customize->add_setting('agrofarm_header_email', array(
        'default' => '',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control('agrofarm_header_email', array(
        'label' => __('Email', 'agrofarm'),
        'section' => 'agrofarm_header',
        'settings' => 'agrofarm_header_email',
    ));

    //header location text
    $wp_customize->add_setting('agrofarm_header_location', array(
        'default' => '',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control('agrofarm_header_location', array(
        'label' => __('Location', 'agrofarm'),
        'section' => 'agrofarm_header',
        'settings' => 'agrofarm_header_location',
    ));

    // header phone text
    $wp_customize->add_setting('agrofarm_header_phone', array(
        'default' => '',
        'type' => 'theme_mod',
    ));

    $wp_customize->add_control('agrofarm_header_phone', array(
        'label' => __('Phone', 'agrofarm'),
        'section' => 'agrofarm_header',
        'settings' => 'agrofarm_header_phone',
    ));

    
}
add_action('customize_register', 'agrofarm_register_customizer');


function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    
    // Optional but recommended: Add support for WooCommerce gallery features
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );