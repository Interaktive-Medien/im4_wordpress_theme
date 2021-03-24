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
<!--Video-Beitrag-Teil-->
<?php if(is_page_template('template-video.php')) { ?>
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
<?php } ?>
