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
 ?>
<p>Ein Beitrag von <?php echo $full_name; ?></p>
<p>Veröffentlicht am <?php the_time('d. F Y') ;?></p>
<br>
<h1><?php the_title(); ?></h1>
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
<?php the_post_thumbnail(); ?>
<p><?php the_content(); ?></p>
