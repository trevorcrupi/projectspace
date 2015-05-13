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

class Log {

  /**
   * @var String
  **/
  protected $_log_path;

  /**
    * @var int
  **/
  protected $_file_permissions = 0644;

  /**
    * @var int
  **/
  protected $_threshold = 1;

  /**
    * @var array
  **/
  protected $_threshold_array = array();

  /**
    * @var string
  **/
  protected $_date_fmt = 'Y-m-d H:i:s';

  /**
    * @var string
  **/
  protected $_file_ext;

  /**
    * @var bool
  **/
  protected $_enabled = TRUE;

  /**
    * Predefined logging levels
    * @var array
  **/
  protected $_levels = array('ERROR' => 1, 'DEBUG' => 2, 'INFO' => 3, 'ALL' => 4);
  
}
