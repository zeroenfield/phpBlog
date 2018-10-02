<?php

  require_once( dirname( __FILE__ ) . '/config.php' );

  function the_title() {

  global $title;

  echo $title;

}

function the_sub_title(){

  global $the_sub_title;

  echo $the_sub_title;

}

function the_author(){

  global $the_author;

  echo $the_author;

}

function the_author_link(){

  global $the_author_link;

  echo $the_author_link;

}

function the_date(){

  global $the_date;

  echo $the_date;

}

function the_image_url(){

  global $the_image_url;

  echo ABS_URL .  'img/' . $the_image_url;

}

function home_url(){

  echo ABS_URL;

}

?>
