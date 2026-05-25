<?php get_header(); ?>

<main class="container" style="padding: 60px 20px; min-height: 50vh;">
    
    <?php 
    // This loop tells WordPress to output the content of the specific page
    // (In this case, the WooCommerce Cart shortcode)
    while ( have_posts() ) : the_post();
        
        the_title( '<h1 class="page-title">', '</h1>' ); // Shows "Cart"
        
        the_content(); // This is what actually renders the WooCommerce Cart tables!
        
    endwhile; 
    ?>

</main>

<?php get_footer(); ?>