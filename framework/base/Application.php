<?php

/**
 * Application class file
 * 
 * @author Kacper Czochara <kacperczochara@gmail.com>
 * @copyright Copyright (c) 2013 Kacper Czochara
 */

/**
 * Application class provides all application features.
 * 
 * @property int $id Application Id
 */
class Application {

        public function __construct($config) {
                Yep::setApplication($this);
        }

        public function __get($name) {
                $method = 'get' . $name;
                if (method_exists('Application', $method)) {
                        return $this->$method();
                } else {
                        return $name;
                }
        }

        public function run() {
                
        }

        public function end($status = 0) {
                exit($status);
        }

        public function getId() {
                return 1500100900;
        }

}