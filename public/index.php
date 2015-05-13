<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('VENDOR', ROOT . DS . 'vendor');

if(! isset($_GET['url'])) {
  $url = 'index/index';
} else if($_GET['url'] == 'login') {
  $url = 'login/index';
} else if($_GET['url'] == 'register') {
  $url = 'register/index';
} else {
  $url = $_GET['url'];
}

require_once (ROOT . DS . 'core' . DS . 'bootstrap.php');
require VENDOR . DS . 'autoload.php';

if($_GET['url'] == 'crupi_trevor') {
  $url = 'index/profile/crupi_trevor';
}
