<?php

class Login extends Model {

  public function loginUser($user_name, $password) {
    $auth = load_class("User_Authentication");
    $sess = load_class("Session");
    $login = $auth->verify('users', $user_name, $password);

    if(!$login) {
      $sess->set('feedback_negative', 'Sorry, Username/Password Combo Not Found');
      return false;
    }

    return true;
  }
}
