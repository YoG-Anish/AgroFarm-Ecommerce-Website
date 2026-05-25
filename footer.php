<section class="brands-section">
    <div class="container brands-wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner1.png" alt="Brand Logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner1.png" alt="Brand Logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner3.png" alt="Brand Logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner1.png" alt="Brand Logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner2.png" alt="Brand Logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner3.png" alt="Brand Logo">
    </div>
</section>
<footer class="site-footer">
    <div class="container">

        <!-- Main Widgets Area -->
        <div class="footer-widgets">

            <!-- Column 1: Info -->
            <div class="brand-widget">
                <a href="#" class="footer-logo">
                    <!-- SVG Broccoli Icon -->
                    <svg viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22v-5" fill="#6da73d" />
                        <path d="M9 17v-2a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2" fill="#6da73d" />
                        <path d="M12 13V9" fill="#6da73d" />
                        <path d="M12 9a4 4 0 0 0-4-4 4 4 0 0 0-4 4v1" fill="#6da73d" />
                        <path d="M12 9a4 4 0 0 1 4-4 4 4 0 0 1 4 4v1" fill="#6da73d" />
                        <path d="M8 9a4 4 0 0 0-4-4" fill="#6da73d" />
                        <path d="M16 9a4 4 0 0 1 4-4" fill="#6da73d" />
                    </svg>
                    <span>Broccoli</span>
                </a>
                <p><?php echo get_theme_mod('agrofarm_footer_description'); ?></p>
                <ul class="contact-list">
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        <span><?php echo get_theme_mod('agrofarm_footer_address'); ?></span>
                    </li>
                    <li>
                        <i class="fa-solid fa-phone-volume"></i>
                        <span><?php echo get_theme_mod('agrofarm_footer_phone'); ?></span>
                    </li>
                    <li>
                        <i class="fa-regular fa-envelope"></i>
                        <span><?php echo get_theme_mod('agrofarm_footer_email'); ?></span>
                    </li>
                </ul>
                <div class="social-links">
                    <?php
                    // Fetch values from Customizer
                    $facebook = get_theme_mod('agrofarm_facebook_link');
                    $twitter  = get_theme_mod('agrofarm_twitter_link');
                    $linkedin = get_theme_mod('agrofarm_linkedin_link');
                    $youtube  = get_theme_mod('agrofarm_youtube_link');
                    ?>

                    <?php if ($facebook) : ?>
                        <a href="<?php echo esc_url($facebook); ?>" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                    <?php endif; ?>

                    <?php if ($twitter) : ?>
                        <a href="<?php echo esc_url($twitter); ?>" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                    <?php endif; ?>

                    <?php if ($linkedin) : ?>
                        <a href="<?php echo esc_url($linkedin); ?>" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                    <?php endif; ?>

                    <?php if ($youtube) : ?>
                        <a href="<?php echo esc_url($youtube); ?>" target="_blank"><i class="fa-brands fa-youtube"></i></a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Column 2: Company Links -->
            <div class="link-widget">
                <h4 class="widget-title"><?php echo get_theme_mod('agrofarm_footer_menu_1'); ?></h4>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu-1',
                    )
                )
                ?>
            </div>

            <!-- Column 3: Services Links -->
            <div class="link-widget">
                <h4 class="widget-title"><?php echo get_theme_mod('agrofarm_footer_menu_2'); ?></h4>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu-2',
                    )
                )
                ?>
            </div>

            <!-- Column 4: Customer Care Links -->
            <div class="link-widget">
                <h4 class="widget-title"><?php echo get_theme_mod('agrofarm_footer_menu_3'); ?></h4>
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu-3',
                    )
                )
                ?>
            </div>

            <!-- Column 5: Newsletter -->
            <div class="newsletter-widget">
                <?php echo do_shortcode('[contact-form-7 id="0f749e7" title="Email form"]'); ?>
                <h4 class="payment-heading">We Accept</h4>
                <div class="payment-icons">
                    <!-- Replace with your actual image path -->
                    <!-- link to checkout page -->
                    <a href="<?php echo get_permalink(get_page_by_path('checkout')); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/payment-icon.jpg" alt="Payment Methods">
                    </a>
                </div>
            </div>

        </div> <!-- End Main Widgets -->

    </div> <!-- End Container -->

    <!-- Bottom Bar Area -->
    <div class="footer-bottom-wrapper">

        <!-- Scroll to Top Diamond Button -->
        <a href="#" class="scroll-top-btn">
            <i class="fa-solid fa-chevron-up"></i>
        </a>

        <div class="container">
            <div class="footer-bottom">
                <p>All Rights Reserved @ <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>
                <?php 
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu-4',
                        'menu_class' => 'bottom-links',
                    )
                )
                ?>
            </div>
        </div>
    </div>

</footer>
<?php wp_footer(); ?>
</body>

</html>