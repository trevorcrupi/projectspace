<?php

class Request {

  public function post($key, $clean = false)
  {
    if(isset($_POST[$key])) {
      return ($clean) ? trim(strip_tags($_POST[$key])) : $_POST[$key];
    }
  }

  public function get($key)
  {
    if (isset($_GET[$key])) {
      return $_GET[$key];
    }
  }

  public function cookie($key)
  {
    if (isset($_COOKIE[$key])) {
      return $_COOKIE[$key];
    }
  }
}
