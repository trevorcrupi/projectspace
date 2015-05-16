<?php

class User_Data {

  public $QueryBuilder;

  public function __construct() {
      $this->QueryBuilder = load_class('QueryBuilder');
  }

  public function getUser($table, $user_id) {
    $this->QueryBuilder->query("SELECT * FROM {$table} WHERE user_id = :user_id");
    $this->QueryBuilder->bind('user_id', $user_id);
    return $this->QueryBuilder->singleArr();
  }

  public function getUserId($table, $user_name) {
    $this->QueryBuilder->query("SELECT * FROM {$table} WHERE user_name = :user_name");
    $this->QueryBuilder->bind(':user_name', $user_name);
    $result = $this->QueryBuilder->single();
    return $result->user_id;
  }

  public function getUsername($table, $user_id) {
    $this->QueryBuilder->query("SELECT * FROM {$table} WHERE user_id = :user_id");
    $this->QueryBuilder->bind(':user_id', $user_id);
    $result = $this->QueryBuilder->single();
    return $result->user_name;
  }
}
