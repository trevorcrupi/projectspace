<?php

class User_Authentication {

  public $Session;
  public $QueryBuilder;

  public function __construct() {
    $this->Session = load_class("Session");
    $this->QueryBuilder = load_class("QueryBuilder");
  }

  public function isEmpty($user_name, $user_pass) {
    if(empty($user_name)) {
      return false;
    } else if(empty($user_pass)) {
      return false;
    }
  }

  public function verify($table, $user_name, $password) {
    $this->QueryBuilder->query("SELECT * FROM {$table} WHERE (user_name = :user_name OR user_email = :user_name)");
    $this->QueryBuilder->bind(':user_name', $user_name);
    $result = $this->QueryBuilder->single();

    if(!$result) {
        return false;
    }

    //Check Number of logins
    if(($result->user_failed_logins >= 3) AND ($result->user_last_failed_login > (time() - 30))) {
      $this->Session->set('feedback_negative', 'You have been incorrect mroe than three times. You are now locked out for 30 seconds.');
      return false;
    }

    if(!password_verify($password, $result->user_password_hash)) {
      $this->incrementFailedLogin($table, $user_name);
      return false;
    }

    $this->resetFailedLogin($table, $user_name);
    $this->saveLoginTimestamp($table, $user_name);
    $this->setSession($result->user_id, $result->user_name, $result->user_email);
    $this->incrementLoginCounter($table, $result->user_id);
    return true;
  }

  public function logout() {
      //$this->deleteCookie();
      $this->Session->destroy();
  }

  public function setSession($user_id, $user_name, $user_email)
  {
    $this->Session->init();
    $this->Session->set('user_id', $user_id);
    $this->Session->set('user_name', $user_name);
    $this->Session->set('user_email', $user_email);
    $this->Session->set('user_logged_in', true);
    /*
      TODO: Avatar Stuff Here
    */
  }

  public function incrementFailedLogin($table, $user_name) {
    $this->QueryBuilder->query("UPDATE {$table} SET user_failed_logins = user_failed_logins+1, user_last_failed_login = :user_last_failed_login WHERE user_name = :user_name OR user_email = :user_name LIMIT 1");
    $this->QueryBuilder->bind(':user_name', $user_name);
    $this->QueryBuilder->execute();
  }

  public function resetFailedLogin($table, $user_name) {
    $this->QueryBuilder->query("UPDATE {$table} SET user_failed_logins = 0, user_last_failed_login = NULL WHERE user_name = :user_name OR user_email = :user_name AND user_failed_logins != 0 LIMIT 1");
    $this->QueryBuilder->bind(':user_name', $user_name);
    $this->QueryBuilder->execute();
  }

  public function saveLoginTimestamp($table, $user_name) {
    $this->QueryBuilder->query("UPDATE {$table} SET user_last_login_timestamp = :user_last_login_timestamp WHERE user_name = :user_name OR user_email = :user_name LIMIT 1");
    $this->QueryBuilder->bind(':user_name', $user_name);
    $this->QueryBuilder->execute();
  }

  public function incrementLoginCounter($table, $user_id) {
    $this->QueryBuilder->query("UPDATE {$table} SET user_num_logins = user_num_logins+1 WHERE user_id = :user_id");
    $this->QueryBuilder->bind(':user_id', $user_id);
    $this->QueryBuilder->execute();
  }
}
