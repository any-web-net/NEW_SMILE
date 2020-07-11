<?php wp_head();?>
<?php get_header(); ?>
<main class="container col">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        the_content(); // displays whatever you wrote in the wordpress editor
    endwhile; endif; //ends the loop
    ?>
</main>
<?php get_footer();?>
<?php wp_footer(); ?>

