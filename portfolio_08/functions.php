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

//Custom Post Type Portfolioitems
function portfolioitem() {

	$labels = array(
		'name'                  => _x( 'Portfolioitems', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Portfolioitem', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Portfolioitem', 'text_domain' ),
		'name_admin_bar'        => __( 'Portfolioitem', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Alle Portfolioitems', 'text_domain' ),
		'add_new_item'          => __( 'Neues Portfolioitem', 'text_domain' ),
		'add_new'               => __( 'Neues Portfolioitem hinzufügen', 'text_domain' ),
		'new_item'              => __( 'Neues Portfolioitem', 'text_domain' ),
		'edit_item'             => __( 'Portfolioitem bearbeiten', 'text_domain' ),
		'update_item'           => __( 'Portfolioitem updaten', 'text_domain' ),
		'view_item'             => __( 'Portfolioitem ansehen', 'text_domain' ),
		'view_items'            => __( 'Portfolioitems ansehen', 'text_domain' ),
		'search_items'          => __( 'Portfolioitem suchen', 'text_domain' ),
		'not_found'             => __( 'Portfolioitem nicht gefunden', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Portfolioitem', 'text_domain' ),
		'description'           => __( 'Portfolioitems', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-pressthis',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'portfolioitem', $args );

}
add_action( 'init', 'portfolioitem', 0 );

//Taxonomie projektart erfassen
function projektart() {

	$labels = array(
		'name'                       => _x( 'Projektarten', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Projektart', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Projektart', 'text_domain' ),
		'all_items'                  => __( 'Alle Projektarten', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'Neue Projektart', 'text_domain' ),
		'add_new_item'               => __( 'Neue Projektart hinzufügen', 'text_domain' ),
		'edit_item'                  => __( 'Projektart bearbeiten', 'text_domain' ),
		'update_item'                => __( 'Projektart updaten', 'text_domain' ),
		'view_item'                  => __( 'Projektart ansehen', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
        'show_in_rest'               => true,
	);
	register_taxonomy( 'projektart', array( 'portfolioitem' ), $args );

}
add_action( 'init', 'projektart', 0 );
?>
