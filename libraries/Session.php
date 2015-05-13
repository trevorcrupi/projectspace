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

class Session {

  //Start the session if the ID is not set
  public function init()
  {
      // if no session exist, start the session
      if (session_id() == '') {
          session_start();
      }
  }

  /**
   * Sets a specific value to a specific key
   *
   * @param mixed $key key
   * @param mixed $value value
  **/
  public function set($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  /**
   * Gets a session value
   *
   * @param mixed $key
  **/
  public function get($key)
  {
      if (isset($_SESSION[$key])) {
          return $_SESSION[$key];
      }
  }

  /**
   * Unsets a session variable
   *
   * @param mixed $key key
  **/
  public function unsetVar($key)
  {
    unset($_SESSION[$key]);
  }

  /**
   * Adds a value as a new array element to the key
   *
   * @param mixed $key
   * @param mixed $value
  **/
  public function add($key, $value)
  {
    $_SESSION[$key][] = $value;
  }

  /**
   * Deletes the session (and logs user out)
  **/
  public function destroy()
  {
      session_destroy();
  }

  /**
   * Checks if the user is logged in
  **/

  public function isUserLoggedIn()
  {
    return ($this->get('user_logged_in') ? true : false);
  }
}
