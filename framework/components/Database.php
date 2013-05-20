<?php

class Database extends PDO {
        
        public function __construct($dsn, $username, $passwd, $options = null) {
                parent::__construct($dsn, $username, $passwd, $options = null);
        }
        
}