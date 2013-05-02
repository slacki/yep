<?php

class Databse extends PDO {
        
        public function __construct($dsn, $username, $passwd, $options) {
                parent::__construct($dsn, $username, $passwd, $options);
        }
        
        public function select();
        public function insert();
        public function update();
        public function delete();
        
}