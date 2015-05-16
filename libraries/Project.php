<?php

class Project {

  public $Session;
  public $Request;
  public $QueryBuilder;

  public function __construct() {
      $this->Session = load_class("Session");
      $this->Request = load_class("Request");
      $this->QueryBuilder = load_class("QueryBuilder");
  }

  public function getUserProject($table, $user_id) {
    $this->QueryBuilder->query("SELECT * FROM {$table} WHERE user_id = :user_id");
    $this->QueryBuilder->bind(':user_id', $user_id);
    return $this->QueryBuilder->singleArr();
  }
}
