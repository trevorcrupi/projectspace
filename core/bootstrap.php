<?php

require_once (ROOT . DS . 'application' . DS . 'config' . DS .'config.php');
require_once (ROOT . DS . 'application' . DS . 'config' . DS .'constants.php');

//Load the global functions
require_once (ROOT . DS . 'core' . DS . 'shared.php');


$CFG = load_class('Config', 'core');

// Do we have any manually set config items in the index.php file?
if (isset($assign_to_config) && is_array($assign_to_config))
{
  foreach ($assign_to_config as $key => $value)
  {
    $CFG->set_item($key, $value);
  }
}
