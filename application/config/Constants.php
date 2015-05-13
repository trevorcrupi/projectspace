<?php

define ('DEVELOPMENT_ENVIRONMENT', true);
define('ENVIRONMENT', 'development');

define ('BASEPATH', 'http://localhost/framework');
define ('APPPATH', 'http://localhost/framework/application/');

/** GET THE CURRENT URL **/
define('URL', 'http://' . $_SERVER['HTTP_HOST'] . str_replace('public', '', dirname($_SERVER['SCRIPT_NAME'])));
define('PATH_PUBLIC', 'http://localhost/framework/public/');

define('DB_TYPE', 'mysql');
define('DB_NAME', 'framework');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_CHARSET', 'utf8');

/** EMAIL CONFIGURATIONS **/
define('EMAIL_VERIFICATION_URL', 'login/verify');
define('EMAIL_VERIFICATION_FROM_EMAIL', 'no-reply@communicode.com');
define('EMAIL_VERIFICATION_FROM_NAME', 'Communicode');
define('EMAIL_VERIFICATION_SUBJECT', 'Welcome to Communicode! Verify your account');
define('EMAIL_VERIFICATION_CONTENT', 'Please click on this link to activate your account: ');
