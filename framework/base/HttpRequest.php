<?php

class HttpRequest {
        
        /**
         * @var string $_GET with user request.
         */
        public $route;

        public function __construct() {
                $this->route = $this->_getRouteFromRequest();
        }
        
        private function _getRouteFromRequest() {
                if (isset($_GET['r'])) {
                        return $_GET['r'];
                } else {
                        return null;
                }
        }
        
}