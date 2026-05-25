<?php

function agrofarm_enqueue_assets()
{

    wp_enqueue_style('agrofarm-style', get_stylesheet_uri());
    wp_enqueue_style('agrofarm-all-min', get_template_directory_uri() . '/assets/css/all.min.css', array(), '1.0');
    wp_enqueue_style('agrofarm-swiper-bundle-min', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');

    wp_enqueue_script('agrofarm-all-min', get_template_directory_uri() . '/assets/js/icon.js', array(), '1.0', true);
    wp_enqueue_script('agrofarm-swiper-bundle-min', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js', array(), '1.0', true);
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
        'footer-menu-1' => __('Footer Menu 1', 'agrofarm'),
        'footer-menu-2' => __('Footer Menu 2', 'agrofarm'),
        'footer-menu-3' => __('Footer Menu 3', 'agrofarm'),
        'footer-menu-4' => __('Footer Menu 4', 'agrofarm'),
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

    // Footer section
    $wp_customize->add_section('agrofarm_footer', array(
        'title' => __('Footer', 'agrofarm'),
        'priority' => 30,
    ));
    
    // footer description
    $wp_customize->add_setting('agrofarm_footer_description', array(
        'default' => '',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control('agrofarm_footer_description', array(
        'label' => __('Description', 'agrofarm'),
        'section' => 'agrofarm_footer',
        'settings' => 'agrofarm_footer_description',
    ));

    // footer address 
    $wp_customize->add_setting('agrofarm_footer_address', array(
        'default' => '',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control('agrofarm_footer_address', array(
        'label' => __('Address', 'agrofarm'),
        'section' => 'agrofarm_footer',
        'settings' => 'agrofarm_footer_address',
    ));

    // footer phone 
    $wp_customize->add_setting('agrofarm_footer_phone', array(
        'default' => '',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control('agrofarm_footer_phone', array(
        'label' => __('Phone', 'agrofarm'),
        'section' => 'agrofarm_footer',
        'settings' => 'agrofarm_footer_phone',
    ));

    //footer email
    $wp_customize->add_setting('agrofarm_footer_email', array(
        'default' => '',
        'type' => 'theme_mod',
    ));
    $wp_customize->add_control('agrofarm_footer_email', array(
        'label' => __('Email', 'agrofarm'),
        'section' => 'agrofarm_footer',
        'settings' => 'agrofarm_footer_email',
    ));

    // footer menu 1
    $wp_customize->add_setting('agrofarm_footer_menu_1', array(
        'default' => '',
        'type' => 'theme_mod',
    ));    
    $wp_customize->add_control('agrofarm_footer_menu_1', array(
        'label' => __('Footer Menu 1', 'agrofarm'),
        'section' => 'agrofarm_footer',
        'settings' => 'agrofarm_footer_menu_1',
    ));

    //footer menu 2 
    $wp_customize->add_setting('agrofarm_footer_menu_2', array(
        'default' => '',
        'type' => 'theme_mod',
    ));    
    $wp_customize->add_control('agrofarm_footer_menu_2', array(
        'label' => __('Footer Menu 2', 'agrofarm'),
        'section' => 'agrofarm_footer',
        'settings' => 'agrofarm_footer_menu_2',
    ));

    //footer menu 3
    $wp_customize->add_setting('agrofarm_footer_menu_3', array(
        'default' => '',
        'type' => 'theme_mod',
    ));    
    $wp_customize->add_control('agrofarm_footer_menu_3', array(
        'label' => __('Footer Menu 3', 'agrofarm'),
        'section' => 'agrofarm_footer',
        'settings' => 'agrofarm_footer_menu_3',
    ));

    // List of social platforms to create settings for
    $socials = array('facebook', 'twitter', 'linkedin', 'youtube');

    foreach($socials as $social) {
        // Add Setting
        $wp_customize->add_setting( 'agrofarm_' . $social . '_link', array(
            'default'   => '',
            'type'      => 'theme_mod',
            'sanitize_callback' => 'esc_url_raw', // Ensures it's a valid URL
        ) );

        // Add Control
        $wp_customize->add_control( 'agrofarm_' . $social . '_link', array(
            'label'    => ucfirst($social) . ' URL',
            'section'  => 'agrofarm_footer',
            'type'     => 'url',
        ) );
    }

    
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

/**
 * Update custom cart icon count and price with AJAX
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'my_custom_wc_cart_fragments' );
function my_custom_wc_cart_fragments( $fragments ) {
    
    // Refresh the cart count badge
    ob_start();
    ?>
    <span class="cart-badge custom-cart-count">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </span>
    <?php
    $fragments['span.custom-cart-count'] = ob_get_clean();
    
    // Refresh the cart total price
    ob_start();
    ?>
    <span class="cart-price custom-cart-total">
        <?php echo WC()->cart->get_cart_subtotal(); ?>
    </span>
    <?php
    $fragments['span.custom-cart-total'] = ob_get_clean();
    
    return $fragments;
}

// Remove WooCommerce sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );


// Register strings for Polylang translation
add_action('init', function() {
    if ( function_exists('pll_register_string') ) {
        // Syntax: pll_register_string('Context', 'String to translate', 'Group');
        pll_register_string('Agrofarm Header', 'Liwali, Bhaktapur', 'Header');
        pll_register_string('Agrofarm Header', 'PHONE', 'Header');
        pll_register_string('Agrofarm Hero', 'Tasty & Healthy Organic Food', 'Hero Section');
        pll_register_string('Agrofarm Hero', 'SHOP NOW', 'Hero Section');
    }
});