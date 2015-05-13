<?php

//Login Controller

class LoginController extends Controller {

  public function index() {
    $this->set('title', 'Login To ProjectSpace');
  }

  public function login() {
    $Request = load_class("Request");
    $Redirect = load_class("Redirect");
    $Session = load_class("Session");
    $login_success = $this->Login->loginUser($Request->post('user_name'), $Request->post('password'));
    if($login_success) {
      $Redirect->to('index/profile/'. $Session->get('user_name'));
    } else {
      $Redirect->to('login');
    }
  }

  public function logout() {
    $auth = load_class('User_Authentication');
    $Redirect = load_class('Redirect');
    $auth->logout();
    $Redirect->to('login');
  }
}
