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

// Self-Closing Shortcode Social Media Links
function sociallink( $atts ) {
	// Attributes
	$atts = shortcode_atts(
		array(
			'color' => '',
		),
		$atts
	);
  return '<div class="sociallink" style="color:' . $atts['color'] . '">
  <p><a href="#">Folge mir auf Facebook</a></p>
  <p><a href="#">Folge mir auf Twitter</a></p>
  </div>';
}
add_shortcode( 'sociallink', 'sociallink' );

// Enclosing Shortcode Textauszeichnung
function textauszeichnung( $atts , $content = null ) {
  return '<div class="textauszeichnung">' . $content . '</div>';
}
add_shortcode( 'textauszeichnung', 'textauszeichnung' );
?>
