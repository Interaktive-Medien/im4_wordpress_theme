<!doctype html>
<html lang="<?php bloginfo('language') ?>">

<head>
    <title><?php bloginfo('name') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0,user-scalable=yes">
    <meta charset="<?php bloginfo('charset') ?>">
    <link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url') ;?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <h1><?php bloginfo('name') ?></h1>
        <p>Von Lea</p>
        <nav>
            <ul>
                <li>Das ist ein Navigationspunkt</li>
                <li>Das ebenfalls</li>
            </ul>
        </nav>
    </header>
    <main>
        <article>
            <p>Hier kommt der Hauptinhalt des Portfolios</p>
        </article>
    </main>
    <footer>
        <p>Hier kommt der Footer</p>
    </footer>
<?php wp_footer(); ?>
</body>

</html>
