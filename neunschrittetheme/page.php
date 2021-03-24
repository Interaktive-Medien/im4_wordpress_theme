<mark>page.php</mark>   
<?php get_header(); ?> <!-- Neu einfügt im schritt 6, Zerstückelung --> 
    <main>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?> <!-- Schritt 8 -->
            <article>
                <h2>                                <!-- Schritt 8 -->
                    <?php the_title() ;?>
                </h2>
                <p>
                    <?php the_content() ;?>
                </p>
            </article>
        <?php endwhile; else : ?>
            <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
    </main>
<?php get_footer(); ?>    <!-- Neu einfügt im schritt 6, Zerstückelung --> 