<?php

return array(
        'basePath' => dirname(__FILE__) . '/../../',
        'name' => 'My own app in new framework, bitches!',
        'defaultController' => 'SiteController', // todo: change to 'site'
        'defaultAction' => 'index',
        'database' => array(
                'dns' => 'mysql:host=localhost;dbname=yep',
                'username' => 'root',
                'password' => '',
        ),
);