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

class Config {

  //List of all loaded config values
  public $config = array();

  //List of all loaded config files
  public $is_loaded = array();

  /**
    * List of all paths to seacrch when loading a config file
    * @used-by Quantum_Loader
    * @var array
  **/
  public $_config_paths = array(APPPATH);

  public function __construct()
  {
    $this->config = get_config();

    if (empty($this->config['base_url']))
		{
			// The regular expression is only a basic validation for a valid "Host" header.
			// It's not exhaustive, only checks for valid characters.
			if (isset($_SERVER['HTTP_HOST']) && preg_match('/^((\[[0-9a-f:]+\])|(\d{1,3}(\.\d{1,3}){3})|[a-z0-9\-\.]+)(:\d+)?$/i', $_SERVER['HTTP_HOST']))
			{
				$base_url = (is_https() ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST']
					.substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));
			}
			else
			{
				$base_url = 'http://localhost/';
			}

			$this->set_item('base_url', $base_url);
		}

    //log_message('info', 'Config class initialized');
  }

  //Load config file
  public function load($file = '', $use_sections = FALSE, $fail_gracefully = FALSE) {
    $file = ($file === '') ? 'config' : str_replace('.php', '', $file);
    $loaded = FALSE;

    foreach($this->_config_paths as $path) {
      foreach(array($file, ENVIROMENT.DS.$file) as $location) {
        $file_path = $path . 'config/' . $location . '.php';
        if(in_array($file_path, $this->is_loaded, TRUE)) {
          return TRUE;
        }

        if(! file_exists($file_path)) {
          continue;
        }

        include($file_path);

        if(! isset($config) OR ! is_array($config)) {
          if($fail_gracefully === TRUE) {
            return FALSE;
          }
          //Show error here
        }

        if($use_sections === TRUE) {
          $this->config[$file] = isset($this->config[$file])
                ? array_merge($this->config[$file], $config)
                : $config;
        } else {
          $this->config = array_merge($this->config, $config);
        }

        $this->is_loaded[] = $file_path;
        $config = NULL;
        $loaded = TRUE;
        //log_message here
      }
    }

    if($loaded === TRUE) {
      return TRUE;
    } elseif($fail_gracefully === TRUE) {
      return FALSE;
    }

    //error here
  }

  public function item($item, $index = '')
	{
		if ($index == '')
		{
			return isset($this->config[$item]) ? $this->config[$item] : NULL;
		}

		return isset($this->config[$index], $this->config[$index][$item]) ? $this->config[$index][$item] : NULL;
	}

  public function slash_item($item)
	{
		if ( ! isset($this->config[$item]))
		{
			return NULL;
		}
		elseif (trim($this->config[$item]) === '')
		{
			return '';
		}

		return rtrim($this->config[$item], '/').'/';
	}
}
