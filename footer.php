<section class="brands-section">
    <div class="container brands-wrapper">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner1.png" alt="Brand Logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/partner2.png" alt="Brand Logo">
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
                <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-wrapper">
                    <!-- SVG Broccoli Icon -->
                    <?php
                    $footer_logo_id = get_theme_mod('agrofarm_header_logo');
                    if ($footer_logo_id) :
                        $footer_logo_url = wp_get_attachment_url($footer_logo_id);
                        $footer_logo_alt = get_post_meta($footer_logo_id, '_wp_attachment_image_alt', true);
                    ?>
                        <img src="<?php echo esc_url($footer_logo_url); ?>" alt="<?php echo esc_attr($footer_logo_alt); ?>">
                    <?php endif; ?>
                    <span><?php echo get_theme_mod('agrofarm_header_title'); ?></span>
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