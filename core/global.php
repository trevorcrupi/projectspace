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

if( ! function_exists('is_php')) {
  //Determines the current version of php

  function is_php($version)
  {
    static $_is_php;
    $version = (string) $version;

    if( ! isset($_is_php[$version]))
    {
      $_is_php[$version] = version_compare(PHP_VERSION, $version, '>=');
    }

    return $_is_php[$version];
  }
}

if ( ! function_exists('load_class'))
{
	/**
	 * Class registry
	 *
	 * This function acts as a singleton. If the requested class does not
	 * exist it is instantiated and set to a static variable. If it has
	 * previously been instantiated the variable is returned.
	 *
	 * @param	string	the class name being requested
	 * @param	string	the directory where the class should be found
	 * @param	string	an optional argument to pass to the class constructor
	 * @return	object
	 */
	function load_class($class, $directory = 'libraries', $param = NULL)
	{
		static $_classes = array();

		// Does the class exist? If so, we're done...
		if (isset($_classes[$class]))
		{
			return $_classes[$class];
		}

		$name = FALSE;

		// Look in the native root/libraries folder
		if (file_exists(ROOT.DS.$directory.DS.$class.'.php')) {
			$name = $class;

			if (class_exists($name, FALSE) === FALSE)
			{
				require_once(ROOT.DS.$directory.DS.$class.'.php');
			}
		}

		/* Is the request a class extension? If so we load it too
		if (file_exists(BASEPATH.$directory.'/'.config_item('subclass_prefix').$class.'.php'))
		{
			$name = config_item('subclass_prefix').$class;

			if (class_exists($name, FALSE) === FALSE)
			{
				require_once(APPPATH.$directory.'/'.$name.'.php');
			}
		}*/

		// Did we find the class?
		if ($name === FALSE)
		{
			// Note: We use exit() rather then show_error() in order to avoid a
			// self-referencing loop with the Exceptions class
			set_status_header(503);
			echo 'Unable to locate the specified class: '.$class.'.php';
      if(DEVELOPMENT_ENVIRONMENT == TRUE) {
        echo '<br />The file path you tried was ' . ROOT.DS.$directory.DS.$class.'.php';
      }
			exit(5); // EXIT_UNK_CLASS
		}

		// Keep track of what we just loaded
		is_loaded($class);

		$_classes[$class] = isset($param)
			? new $name($param)
			: new $name();
		return $_classes[$class];
	}
}

if( ! function_exists('is_loaded')) {

  function &is_loaded($class = '')
  {
    static $_is_loaded = array();

    if($class !== '')
    {
      $_is_loaded[strtolower($class)] = $class;
    }

    return $_is_loaded;
  }
}

/*if ( ! function_exists('get_config'))
{
	/**
	 * Loads the main config.php file
	 *
	 * This function lets us grab the config file even if the Config class
	 * hasn't been instantiated yet
	 *
	 * @param	array
	 * @return	array
	 */
/*	function &get_config(Array $replace = array())
	{
		static $config;

		if (empty($config))
		{
			$file_path = APPPATH.'config/config.php';
			$found = FALSE;
			if (file_exists($file_path))
			{
				$found = TRUE;
				require($file_path);
			}

			// Is the config file in the environment folder?
			if (file_exists($file_path = APPPATH.'config/config.php'))
			{
				require($file_path);
			}
			elseif ( ! $found)
			{
				set_status_header(503);
				echo 'The configuration file does not exist.';
				exit(3); // EXIT_CONFIG
			}

			// Does the $config array exist in the file?
			if ( ! isset($config) OR ! is_array($config))
			{
				set_status_header(503);
				echo 'Your config file does not appear to be formatted correctly.';
				exit(3); // EXIT_CONFIG
			}
		}

		// Are any values being dynamically added or replaced?
		foreach ($replace as $key => $val)
		{
			$config[$key] = $val;
		}

		return $config;
	}
}*/

/*if ( !function_exists('config_item')) {
  /**
   * Returns config item from config array
   *
   * @param string
   * @return mixed
  */
/*  function config_item($item)
  {
    static $_config;

    if(empty($_config)) {
      //References cannot be directly assigned to static variables
      $_config[0] =& get_config();
    }

    return isset($_config[0][$item]) ? $_config[0][$item] : NULL;
  }
} */

if( !function_exists('show_error')) {
  /**
   * Error Handler function
   * Allows us to invoke exceptions based on exception class
   * TODO implement exception class (and by extension this function)
  **/

  function show_error() {

  }
}

if( ! function_exists('show_404')) {
    /**
     * 404 Page Handler function
     * Displays 404 errors
     * TODO implement this function
    **/
    function show_404() {

    }
}

if( !function_exists('log_message')) {
  /**
   *
   * Error logging interface
   * Simple mechanism to log errors
   * TODO implement this function and 'LOG' class
  **/

  function log_message() {

  }
}

if( ! function_exists('set_status_header')) {
  /**
   * Set HTTP status header
   *
   * @param int status code
   * @param string
   * @return void
  **/

  function set_status_header($code = 200, $text = '')
  {
    if(empty($code) OR ! is_numeric($code))
    {
      //show_error('text...', 500) TODO implement this soon
    }

    if (empty($text)) {
			is_int($code) OR $code = (int) $code;
			$stati = array(
				200	=> 'OK',
				201	=> 'Created',
				202	=> 'Accepted',
				203	=> 'Non-Authoritative Information',
				204	=> 'No Content',
				205	=> 'Reset Content',
				206	=> 'Partial Content',

				300	=> 'Multiple Choices',
				301	=> 'Moved Permanently',
				302	=> 'Found',
				303	=> 'See Other',
				304	=> 'Not Modified',
				305	=> 'Use Proxy',
				307	=> 'Temporary Redirect',

				400	=> 'Bad Request',
				401	=> 'Unauthorized',
				403	=> 'Forbidden',
				404	=> 'Not Found',
				405	=> 'Method Not Allowed',
				406	=> 'Not Acceptable',
				407	=> 'Proxy Authentication Required',
				408	=> 'Request Timeout',
				409	=> 'Conflict',
				410	=> 'Gone',
				411	=> 'Length Required',
				412	=> 'Precondition Failed',
				413	=> 'Request Entity Too Large',
				414	=> 'Request-URI Too Long',
				415	=> 'Unsupported Media Type',
				416	=> 'Requested Range Not Satisfiable',
				417	=> 'Expectation Failed',
				422	=> 'Unprocessable Entity',

				500	=> 'Internal Server Error',
				501	=> 'Not Implemented',
				502	=> 'Bad Gateway',
				503	=> 'Service Unavailable',
				504	=> 'Gateway Timeout',
				505	=> 'HTTP Version Not Supported'
			);

			if (isset($stati[$code]))
			{
				$text = $stati[$code];
			} else {
				//show_error('No status text available. Please check your status code number or supply your own message text.', 500);
			}
		}
  }
}
