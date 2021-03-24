<?php
/*
Template Name: Video-Beitrag
Template Post Type: post
*/
?>

<?php get_header(); ?>
    <main>
        <article>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <?php get_template_part( 'template-parts/content', 'single' ); ?>
            <?php endwhile; else : ?>
              <?php get_template_part( 'template-parts/content', 'error' ); ?>
            <?php endif; ?>
        </article>
    </main>
<?php get_footer(); ?>
