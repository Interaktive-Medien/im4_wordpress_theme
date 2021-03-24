<?php

//Navigation registrieren
add_action('after_setup_theme', 'navigation_registrieren');
function navigation_registrieren(){
  register_nav_menu('hauptnavigation', 'Hauptnavigation oben');
};

//Logo im Customizer registrieren
add_action( 'after_setup_theme', 'theme_prefix_setup' );
function theme_prefix_setup() {
  add_theme_support( 'custom-logo' );
}

//Beitragsbilder aktivieren
add_theme_support( 'post-thumbnails' );

?>
