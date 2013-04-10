<?php

class Router {
        
        private $_route;

        public function __construct(HttpRequest $request) {
                $this->_route = $this->_parseUrl($request->route);
                if ($this->_route != null) {
                        $this->sth;
                } else {
                        $this->_loadDefaultController();
                }
        }
        
        private function _parseRoute($route) {
                if ($route != null) {
                        rtrim($route, '/');
                        filter_var($route, FILTER_SANITIZE_URL);
                        return explode('/', $route);
                } else {
                        return null;
                }
        }
        
        
       private function _loadDefaultController() {
               
       }
}