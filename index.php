<?php
/**
 * Index php file.
 */

// Getting necessary paths
$yep = dirname(__FILE__) . '/framework/Yep.php';
$config = dirname(__FILE__) . '/application/config/main.php';

// Initializing an application
// NOTE: this try...catch block is only for development stage.
define('BASE_PATH', dirname(__FILE__));
require_once $yep;
try {
        Yep::createApplication($config)->run();
} catch (Exception $e) {
        echo '<h1 style="color: red;">' . $e->getMessage() . '</h1>';
}