<?php

/**
 * @package Quantum
 * @author Trevor Crupi
 * @copyright Copyright (c) 2015-, Communicode, (http://communicode.com)
 * @license http://opensource.org/licenses/MIT MIT License
 * @since Version 1.0.0
*/

/**
 * @package Quantum
 * @subpackage Quantum Leap
 * @category Loading classes/functions
 * @author Trevor Crupi
**/

class Redirect {

  /**
   * Session Object For Authentication
   *
   * @param Session Object
  **/
  public $Session;

  public function __construct()
  {
      //Load Necessary Classes
      $this->Session = load_class('Session');
  }

  /**
   * Redirect to specified path
   * @param $path
  **/
  public function to($path)
  {
    header("location: " . URL . $path);
  }

  /**
   * Automatically Redirect Home
  **/
  public function home()
  {
    $this->to(BASEPATH);
  }

  public function auth()
  {
    $this->Session->init();

    if($this->Session->get('user_logged_in') != 1) {
      $this->Session->destroy();
      $this->to('login');

      exit();
    }
  }
}
