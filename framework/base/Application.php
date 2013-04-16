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
                $this->_configure($config);
        }

        private function _configure($config) {
                $config = require $config;
                foreach ($config as $key => $val) {
                        $this->$key = $val;
                }
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
                new Router(new HttpRequest());
        }

        public function end($status = 0) {
                exit($status);
        }

        // abstract function getSomething();
        // getting components and other shit will be done here
        
}