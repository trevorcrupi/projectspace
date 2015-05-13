<?php

class User_Registration {

  public $posts;

  function __construct($names) {
      $this->posts = User_Registration::generateRequest($names);
  }

  public static function generateRequest($names) {
    $posts = array();
    $Request = load_class('Request');
    foreach($names as $post) {
      $req = $Request->post($post);
      $posts = array_push($posts, $req);
    }
  }
}
