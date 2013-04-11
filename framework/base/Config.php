<?php

class Config {
        
        private $config = array();
        
        public function __construct($config) {
                if (file_exists($config)) {
                        $this->config = require $config;
                } else {
                        throw new Exception('The config file does not exist. Its default place is /application/config/main.php');
                }
        }
        
        public static function getConfiguration($key) {
                if (isset($this->config[$key])) {
                        return $this->config[$key];
                }
        }
        
}