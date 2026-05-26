<?php 
/*
    Template Name: Contact us
*/
get_header();
?>
<section class="contact-form-section" style="padding: 80px 0;">
    <div class="container">
        <div class="section-title text-center" style="text-align:center; margin-bottom:50px;">
            <h2 style="font-weight: 800; font-size: 36px; color: #1a2623;">Send us a Message</h2>
        </div>
        
        <?php echo do_shortcode('[contact-form-7 id="9695b08" title="Contact Page"]'); ?>
    </div>
</section>
<section class="location-map-section">
    <div class="container">
        <!-- Section Heading -->
        <div class="section-title text-center" style="margin-bottom: 40px; text-align: center;">
            <h2 style="font-weight: 800; font-size: 32px; color: #1a2623;">Find Our Store</h2>
            <p style="color: #666;">Visit us at Liwali, Bhaktapur for fresh organic products.</p>
        </div>

        <div class="map-wrapper">
            <!-- Replace the src below with your actual Google Maps embed link -->
            <iframe 
                src="<?php echo get_theme_mod('agrofarm_map_contact'); ?>" 
                width="100%" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

<?php get_footer(); 
?>
