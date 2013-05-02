<?php

class Model {
        
        public $db;
        
        public function __construct() {
                $this->db = Yep::app()->db;
        }
        
}