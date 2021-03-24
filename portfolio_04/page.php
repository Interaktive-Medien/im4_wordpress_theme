<?php get_header(); ?>
    <main>
        <article>
          <section>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <?php get_template_part( 'template-parts/content', 'page' ); ?>
            <?php endwhile; else : ?>
              <?php get_template_part( 'template-parts/content', 'error' ); ?>
            <?php endif; ?>
          </section>
        </article>
    </main>
<?php get_footer(); ?>
