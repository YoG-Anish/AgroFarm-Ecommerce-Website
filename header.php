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
    

<header class="broccoli-header">

    <!-- TOP BAR -->
    <div class="broccoli-topbar">
        <div class="container">

            <div class="topbar-left">

                <div class="topbar-item">
                    <span class="icon">✉</span>
                    <a href="mailto:broccoli@agro.com.np">
                        broccoli@agro.com.np
                    </a>
                </div>

                <div class="topbar-item">
                    <span class="icon">📍</span>
                    <span>Dekocha, Bhaktapur, Nepal</span>
                </div>

                <div class="topbar-item">
                    <span class="icon">📞</span>

                    <div class="phone-content">
                        <small>PHONE</small>
                        <a href="tel:+9779849123456">
                            +977-9849123456
                        </a>
                    </div>
                </div>

            </div>

            <div class="topbar-right">

                <div class="language-switcher">
                    English
                    <span>⌄</span>
                </div>

                <div class="social-icons">
                    <a href="#">f</a>
                    <a href="#">𝕏</a>
                    <a href="#">◎</a>
                    <a href="#">◌</a>
                </div>

            </div>

        </div>
    </div>

    <!-- MAIN HEADER -->
    <div class="broccoli-main-header">

        <div class="container header-wrapper">

            <!-- LOGO -->
            <div class="site-logo">
                <a href="#">
                    <img src="logo.png" alt="Broccoli Logo">
                </a>
            </div>

            <!-- CENTER ICON -->
            <div class="header-center-icon">
                <div class="circle-icon">
                    f
                </div>
            </div>

            <!-- SEARCH -->
            <div class="header-search">

                <form action="/" method="get">

                    <input
                        type="search"
                        name="s"
                        placeholder="Search here..."
                    >

                    <button type="submit">
                        🔍
                    </button>

                </form>

            </div>

            <!-- HEADER ACTIONS -->
            <div class="header-actions">

                <!-- ACCOUNT -->
                <a href="#" class="account-icon">
                    👤
                </a>

                <!-- CART -->
                <a href="#" class="cart-wrapper">

                    <div class="cart-icon">
                        🛒
                        <span class="cart-count">3</span>
                    </div>

                    <div class="cart-content">
                        <span>YOUR CART</span>
                        <strong>RS 3250.00</strong>
                    </div>

                </a>

            </div>

        </div>

    </div>

    <!-- NAVBAR -->
    <nav class="broccoli-navbar">

        <div class="container">

            <ul class="menu">

                <li><a href="#">Home +</a></li>
                <li><a href="#">Home +</a></li>
                <li><a href="#">Home +</a></li>
                <li><a href="#">Home +</a></li>
                <li><a href="#">Home +</a></li>
                <li><a href="#">Home +</a></li>
                <li><a href="#">Home +</a></li>

            </ul>

        </div>

    </nav>

</header>

<!-- =========================
BROCCOLI HEADER END
========================= -->