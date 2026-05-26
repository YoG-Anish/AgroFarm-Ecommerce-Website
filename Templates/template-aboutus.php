<?php 
/*
    Template Name: About us
*/
get_header();
?>
<h1><?php echo get_field('content')?></h1>

<h2> <?php the_content(); ?> </h2>



<?php get_footer(); 
?>