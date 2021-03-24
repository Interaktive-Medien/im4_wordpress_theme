<?php
    // Schritt 7: Navigation
    add_action('after_setup_theme', 'navigation_registrieren');

    function navigation_registrieren(){
        register_nav_menu('hauptnavigation', 'Hauptnavigation oben');
    };

?>