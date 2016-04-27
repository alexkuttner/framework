<?php

//This will autoload any class when needed
require_once ROOT . DS . 'library/autoload.php';

/**
 * Run the autoloader that detects when any classes are required
 * It will add any classes right here but adding require_once()
 */
$obj = new Autoload();
$obj->autoLoadClasses();

//All the routes
require_once ROOT . DS . 'app/routes.php';