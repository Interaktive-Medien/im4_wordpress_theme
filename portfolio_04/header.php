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
      <a href="<?php bloginfo('url'); ?>"><img src="
                  <?php
                          $custom_logo_id = get_theme_mod( 'custom_logo' );
                          $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                          echo $image[0] ;?>
                  " alt="Logo Portfolio Lea"></a>
        <p>Von Lea</p>
        <?php

        $args = array(
        'theme_location' => 'hauptnavigation'
        );

        wp_nav_menu($args) ;?>
    </header>
