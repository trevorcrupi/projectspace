<?php

class RegisterController extends Controller {

  function index() {
    $this->set('title', 'Create Your ProjectSpace Account');
  }

  function register() {
    $Request = load_class('Request');
    $Redirect = load_class('Redirect');
    $validate = load_class('Form_Validation');
    $user_name = strip_tags($Request->post('user_name'));
    $user_email = strip_tags($Request->post('user_email'));
    if($validate->confirmPass($Request->post('password'), $Request->post('confirm_pass'))) {
      $user_auth_hash = $validate->generateAuthHash();
      $user_password = $validate->generatePasswordHash($Request->post('password'));
      $this->Register->insert('users', array($user_name, $user_password, $user_email, time(), $user_auth_hash, 0), array('user_name', 'user_password_hash', 'user_email', 'user_creation_timestamp', 'user_activation_hash', 'user_provider_type'));
    }
  }
}
