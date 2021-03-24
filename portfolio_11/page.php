<?php get_header(); ?>
    <main>
        <article>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
              <?php get_template_part( 'template-parts/content', 'page' ); ?>
              <?php if(is_page('portfolio')){?>
                <section>
                <!--Start Unterloop-->
                <?php
                $query = new WP_Query( array( 'post_type' => 'portfolioitem') );
                if ( $query->have_posts() ) : ?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php get_template_part("template-parts/portfolioitems-box"); ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                <?php else : ?>
                    <?php get_template_part("template-parts/content", "error"); ?>
                <?php endif; ?>
                <!--Ende Unterloop-->
              <?php } ?>
            <?php endwhile; else : ?>
              <?php get_template_part( 'template-parts/content', 'error' ); ?>
            <?php endif; ?>
            </section>
        </article>
    </main>
<?php get_footer(); ?>
