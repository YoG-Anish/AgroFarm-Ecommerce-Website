<!-- =========================
BROCCOLI HEADER START
========================= -->
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <body <?php body_class(); ?>>
        <header class="site-header">

            <!-- 1. Top Bar -->
            <div class="top-bar">
                <div class="container">
                    <div class="top-bar-left">
                        <div class="info-item">
                            <i class="fa-regular fa-envelope"></i>
                            <span><?php $email = get_theme_mod('agrofarm_header_email');
                                    echo function_exists('pll__') ? pll__($email) : $email; ?>'</span>
                        </div>
                        <div class="info-item">
                            <i class="fa-solid fa-location-dot"></i>
                            <span><?php $address = get_theme_mod('agrofarm_header_location');
                                    echo function_exists('pll__') ? pll__($address) : $address; ?></span>
                        </div>
                        <div class="phone-block">
                            <i class="fa-solid fa-phone-volume"></i>
                            <div class="phone-text">
                                <span class="phone-number"><?php $phone = get_theme_mod('agrofarm_header_phone');
                                                            echo function_exists('pll__') ? pll__($phone) : $phone; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="top-bar-right">
                        <!-- 1. THE DYNAMIC LANGUAGE SWITCHER -->
                        <div class="language-selector">
                            <?php
                            if (function_exists('pll_the_languages')) {
                                // Get all languages in an array
                                $languages = pll_the_languages(array('raw' => 1));

                                // Find and display ONLY the current language name
                                foreach ($languages as $lang) {
                                    if ($lang['current_lang']) {
                                        echo '<span class="current-lang">' . esc_html($lang['name']) . '</span>';
                                    }
                                }
                            } else {
                                // Fallback if Polylang is not installed
                                echo '<span class="current-lang">English</span>';
                            }
                            ?>

                            <!-- The Arrow Icon -->
                            <i class="fa-solid fa-arrow-down-long"></i>

                            <!-- 2. THE DROPDOWN LIST (Shows on Hover) -->
                            <ul class="lang-dropdown">
                                <?php
                                if (function_exists('pll_the_languages')) {
                                    // This outputs the other languages as links
                                    pll_the_languages(array('show_names' => 1, 'show_flags' => 0));
                                }
                                ?>
                            </ul>
                        </div>

                        <div class="social-icons">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            <a href="#"><i class="fa-solid fa-globe"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 2. Main Header (Green Section) -->
            <div class="main-header">
                <div class="container">

                    <!-- Logo -->
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-wrapper">
                        <?php
                        $agrofarm_header_logo = get_theme_mod('agrofarm_header_logo');
                        $agrofarm_header_logo_url = $agrofarm_header_logo ? wp_get_attachment_url($agrofarm_header_logo) : '';
                        $agrofarm_header_logo_alt = get_post_meta($agrofarm_header_logo, '_wp_attachment_image_alt', true);
                        ?>
                        <img src="<?php echo esc_url($agrofarm_header_logo_url); ?>" alt="<?php echo esc_attr($agrofarm_header_logo_alt); ?>">

                        <span class="logo-text"><?php echo get_theme_mod('agrofarm_header_title'); ?></span>
                    </a>

                    <!-- Search Area -->
                    <div class="middle-wrapper">
                        <div class="circle-icon">
                            <i class="fa-solid fa-f"></i>
                        </div>
                        <form role="search" method="get" class="search-box" action="<?php echo esc_url(home_url('/')); ?>">
                            <!-- The main search input field -->
                            <input type="search" name="s" placeholder="Search here..." value="<?php echo get_search_query(); ?>" required>

                            <!-- Hidden input to tell WordPress to only search WooCommerce products -->
                            <input type="hidden" name="post_type" value="product">

                            <!-- Submit Button -->
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>
                    </div>

                    <!-- Right Actions (Cart/User) -->
                    <div class="right-actions">

                        <!-- Dynamic User Account Link -->
                        <a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="user-icon" title="My Account">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                        </a>

                        <!-- Dynamic Cart Link (Changed div to a) -->
                        <a href="<?php echo esc_url(wc_get_cart_url()); ?>" class="cart-wrapper">
                            <div class="cart-icon">
                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="9" cy="21" r="1"></circle>
                                    <circle cx="20" cy="21" r="1"></circle>
                                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                                </svg>

                                <!-- Dynamic Cart Badge (Item Count) -->
                                <span class="cart-badge custom-cart-count">
                                    <?php echo WC()->cart->get_cart_contents_count(); ?>
                                </span>
                            </div>
                            <div class="cart-details">
                                <span class="cart-label">YOUR CART</span>

                                <!-- Dynamic Cart Total Price -->
                                <span class="cart-price custom-cart-total">
                                    <?php echo WC()->cart->get_cart_subtotal(); ?>
                                </span>
                            </div>
                        </a>

                    </div>

                </div>
            </div>

            <!-- 3. Bottom Navigation -->
            <nav class="bottom-nav">
                <div class="container">

                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_class' => 'nav-list',
                        )
                    );
                    ?>
                </div>
            </nav>

        </header>
        <!-- =========================
BROCCOLI HEADER END
========================= -->