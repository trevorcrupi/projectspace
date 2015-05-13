<?php

class ProfileController extends Controller {

  function profile($username = null) {
    $user = load_class('User_Data');
    $Redirect = load_class('Redirect');
    $Session = load_class('Session');
    $this->set('title', 'Profile');
    $Redirect->auth();
    $user_id = $user->getUserId('users', $username);
    $this->Profile->query("SELECT * FROM users WHERE user_id = :user_id");
    $this->Profile->bind('user_id', $user_id);
    $this->set('user', $this->Profile->single());
    $this->set('sess_username', $Session->get('user_name'));
  }

}
