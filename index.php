<?php
/**
 * Index php file.
 */

// Getting necessary paths
$yep = dirname(__FILE__) . '/framework/Yep.php';
$config = dirname(__FILE__) . '/application/config/main.php';

// Initializing an application
// NOTE: this try...catch block is only for development stage.
require_once $yep;
Yep::createApplication($config)->run();