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
    <header class="site-header">

        <!-- 1. Top Bar -->
        <div class="top-bar">
            <div class="container">
                <div class="top-bar-left">
                    <div class="info-item">
                        <i class="fa-regular fa-envelope"></i>
                        <span><?php echo get_theme_mod('agrofarm_header_email'); ?>'</span>
                    </div>
                    <div class="info-item">
                        <i class="fa-solid fa-location-dot"></i>
                        <span><?php echo get_theme_mod('agrofarm_header_location'); ?></span>
                    </div>
                    <div class="phone-block">
                        <i class="fa-solid fa-phone-volume"></i>
                        <div class="phone-text">
                            <span class="phone-label">PHONE</span>
                            <span class="phone-number"><?php echo get_theme_mod('agrofarm_header_phone'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="top-bar-right">
                    <div class="language-selector">
                        English <i class="fa-solid fa-arrow-down-long"></i>
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
                    <a href="#" class="user-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>

                    <div class="cart-wrapper">
                        <div class="cart-icon">
                            <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#222222" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="9" cy="21" r="1"></circle>
                                <circle cx="20" cy="21" r="1"></circle>
                                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                            </svg>
                            <span class="cart-badge">3</span>
                        </div>
                        <div class="cart-details">
                            <span class="cart-label">YOUR CART</span>
                            <span class="cart-price">RS 3250.00</span>
                        </div>
                    </div>
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