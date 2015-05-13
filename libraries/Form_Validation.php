<?php

class Form_Validation {

  public function confirmPass($password, $confirm_password) {
    if(empty($password) || empty($confirm_password)) {
      return false;
    }
    if($password === $confirm_password) {
      return true;
    }

    return false;
  }

  public function generateAuthHash() {
    return sha1(uniqid(mt_rand(), true));
  }

  public function generatePasswordHash($password) {
    return password_hash($password, PASSWORD_DEFAULT);
  }
}
