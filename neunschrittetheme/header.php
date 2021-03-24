<!doctype html>
<html>

<head>
    <title><?php bloginfo('name') ;?></title> <!-- WP soll den Seitentitel zeigen -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,700&display=swap" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url') ;?>">
  <?php wp_head() ;?>  <!-- Hook oder Haken, ein Plug-In könnte Code in den head schreiben -->
</head>

<body <?php body_class() ;?>>       <!-- body Tag soll Standard WP-Klassen einfügen -->
    <header>
        <a href="<?php echo home_url('/') ;?>"> <!-- Klick auf Titel soll zur Startseite führen -->
            <h1><?php bloginfo('name') ;?></h1> <!-- WP soll den Seitentitel zeigen -->
        </a>                                    <!-- Den Link wieder schliessen -->
        <p><?php bloginfo('description') ;?></p> <!-- WP soll die Bescheibung zeigen -->
        <nav>
            <?php // Neu hinzugefügt im Schritt 7
            
            $args = array(
                'theme_location' => 'hauptnavigation'
            );
            
            wp_nav_menu($args)
        ;?>

        </nav>
    </header>