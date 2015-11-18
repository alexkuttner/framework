<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('BASEURL', $_SERVER['HTTP_HOST']);

require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');