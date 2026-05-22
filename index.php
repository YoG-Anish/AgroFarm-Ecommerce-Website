<?php get_header(); ?>

<?php
if (have_posts()) :
    while (have_posts()) :?>
        <h1> this is a index.php page </h1>
       <?php the_post();
    endwhile;
endif;
?>

<?php get_footer(); ?>
