# imiv
Hier sind die Snippets zu finden, welche im Unterricht IM4 (Wordpress-Theme-Entwicklung) gebraucht werden.

## S01.01
```html
<!doctype html>
<html lang="de-CH">

<head>
    <title>Mein Portfolio</title>
    <meta charset="UFT-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0,user-scalable=yes">
</head>

<body>
    <header>
        <h1>Portfolio</h1>
        <nav>
            <ul>
                <li>Das ist ein Navigationspunkt</li>
                <li>Das ebenfalls</li>
            </ul>
        </nav>
    </header>
    <main>
        <article>
            <p>Hier kommt der Hauptinhalt des Protfolios</p>
        </article>
    </main>
    <footer>
        <p>Hier kommt der Footer</p>
    </footer>

</body>

</html>
```
## S01.02
```html
<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url') ;?>">
```
## S02.01 - Navigation registrieren
```PHP
    add_action('after_setup_theme', 'navigation_registrieren');

    function navigation_registrieren(){
        register_nav_menu('hauptnavigation', 'Hauptnavigation oben');
    };
```
## S02.02 - Navigation einfügen
```PHP
<?php 
            
        $args = array(
        'theme_location' => 'hauptnavigation'
        );
            
        wp_nav_menu($args) ;?>
```
## S02.03 - Logo im Customizer registrieren
```PHP
add_action( 'after_setup_theme', 'theme_prefix_setup' );
function theme_prefix_setup() {
  add_theme_support( 'custom-logo' );
}
```
## S02.04 - Logo ausgeben
```HTML
<img src="
                    <?php     
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                            echo $image[0] ;?>
                    " alt="hier alt eingeben">
```
## S03.01 - Start Loop
```PHP
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
```
## S03.02 - Rest Loop
```HTML
<?php endwhile; else : ?>
    <p>Hier gibt's leider nix zu sehen.</p>
<?php endif; ?>
```
## S05.01 - Beitragsbilder registrieren
```PHP
add_theme_support( 'post-thumbnails' );
```
## S05.02 - Gesamten Autor/innen-Namen ausgeben
```PHP
<?php

  $fname = get_the_author_meta('first_name');
  $lname = get_the_author_meta('last_name');
  $full_name = '';

  if( empty($fname)){
      $full_name = $lname;
  } elseif( empty( $lname )){
      $full_name = $fname;
  } else {
      $full_name = "{$fname} {$lname}";
  }

	//in der variabel $full_name ist nun der Name abgespeichert, es muss nur noch dieser mit PHP (echo) ausgegeben werden.
 ?>
 ```
 ## S05.03 - Schlagwörter ohne Links ausgeben
 ```PHP
   <?php
  $posttags = get_the_tags();
  if ($posttags) {
    echo '<ul>';
    foreach($posttags as $tag) {
      echo '<li>' .$tag->name. '</li>';
    }
    echo '</ul>';
  }
  ?>
  ```
  ## S06.01 - Return Self-Closing Shortcode
  ```PHP
  return '<div class="sociallink" style="color:' . $atts['color'] . '">
  <p><a href="#">Folge mir auf Facebook</a></p>
  <p><a href="#">Folge mir auf Twitter</a></p>
  </div>';
  ```
  ## S06.02 - Return Enclosing Shortcode
  ```PHP
  return '<div class="textauszeichnung">' . $content . '</div>';
  ```
  ## S09.01 - Start Custom Query
  ```PHP
  <?php
                $query = new WP_Query( array( 'post_type' => 'portfolioitem') );
                if ( $query->have_posts() ) : ?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
```
## S09.02 - Mittelteil Custom Query
```PHP
<?php endwhile; wp_reset_postdata(); ?>
<?php else : ?>
```
## S09.03 - Ende Custom Query
```PHP
<?php endif; ?>
```
## S09.04 - Ganzes Custom Query
```PHP
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
```
## S11.01 - Responsive Embed Youtube
```HTML
<div style="left: 0; width: 100%; height: 0; position: relative; padding-bottom: 56.25%;">
	<iframe src="https://www.youtube.com/embed/z2X2HaTvkl8?rel=0" style="border: 0; top: 0; left: 0; width: 100%; height: 100%; position: absolute;" allowfullscreen scrolling="no" allow="encrypted-media; accelerometer; gyroscope; picture-in-picture"></iframe>
</div>
```
## S11.02 - Responsive Embed Vimeo
```HTML
<div style="left: 0; width: 100%; height: 0; position: relative; padding-bottom: 56.25%;">
	<iframe src="https://player.vimeo.com/video/123656686?byline=0&badge=0&portrait=0&title=0" style="border: 0; top: 0; left: 0; width: 100%; height: 100%; position: absolute;" allowfullscreen scrolling="no" allow="encrypted-media"></iframe>
</div>
```
## S11.03 - Responsive Video Embeds final Code
```HTML
<?php if(is_page_template('template-video.php')) { ?>
    <div style="left: 0; width: 100%; height: 0; position: relative; padding-bottom: 56.25%;">
  	   <iframe src="https://www.youtube.com/embed/<?php the_field('youtube') ?>?rel=0" style="border: 0; top: 0; left: 0; width: 100%; height: 100%; position: absolute;" allowfullscreen scrolling="no" allow="encrypted-media; accelerometer; gyroscope; picture-in-picture"></iframe>
    </div>
    <div style="left: 0; width: 100%; height: 0; position: relative; padding-bottom: 56.25%;">
    	<iframe src="https://player.vimeo.com/video/<?php the_field('vimeo') ?>?byline=0&badge=0&portrait=0&title=0" style="border: 0; top: 0; left: 0; width: 100%; height: 100%; position: absolute;" allowfullscreen scrolling="no" allow="encrypted-media"></iframe>
    </div>
<?php } ?>
```
## S11.04 - Final if/elseif Bedingung
```PHP
<?php
    $youtube = get_field('youtube');
    $vimeo = get_field('vimeo');
    if(strlen($youtube) != 0){
  ?>
    <div style="left: 0; width: 100%; height: 0; position: relative; padding-bottom: 56.25%;">
  	   <iframe src="https://www.youtube.com/embed/<?php the_field('youtube') ?>?rel=0" style="border: 0; top: 0; left: 0; width: 100%; height: 100%; position: absolute;" allowfullscreen scrolling="no" allow="encrypted-media; accelerometer; gyroscope; picture-in-picture"></iframe>
    </div>
  <?php } elseif(strlen($vimeo) != 0) { ?>
    <div style="left: 0; width: 100%; height: 0; position: relative; padding-bottom: 56.25%;">
    	<iframe src="https://player.vimeo.com/video/<?php the_field('vimeo') ?>?byline=0&badge=0&portrait=0&title=0" style="border: 0; top: 0; left: 0; width: 100%; height: 100%; position: absolute;" allowfullscreen scrolling="no" allow="encrypted-media"></iframe>
    </div>
  <?php } ?>
 ```
 
