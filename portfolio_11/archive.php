<?php get_header(); ?>
    <main>
        <article>
            <h1><?php single_term_title() ?></h1>
            <p><?php the_archive_description() ?></p>
            <section>
              <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/portfolioitems-box' ); ?>
              <?php endwhile; else : ?>
                <?php get_template_part( 'template-parts/content', 'error' ); ?>
              <?php endif; ?>
            </section>
        </article>
    </main>
<?php get_footer(); ?>
