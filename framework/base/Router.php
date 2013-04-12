<?php

class Router {

        private $_route;
        private $_controller;
        private $_action;
        private $_params;

        public function __construct(HttpRequest $request) {
                $this->_route = $this->_parseRoute($request->route);
                $this->_getController();
                $this->_getAction();
                $this->_getParams();

                $this->_execute();
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

        private function _getController() {
                if ($this->_route == null) {
                        $defaultController = Yep::app()->defaultController;
                        if (class_exists($defaultController)) {
                                $this->_controller = new $defaultController();
                        } else {
                                throw new Exception('The default controller does not exist. 
                                        Check your configuration file.');
                        }
                } else {
                        if (class_exists($this->_route[0])) {
                                $this->_controller = new $route[0]();
                        } else {
                                throw new Exception('Specified controller does not exist');
                        }
                }
        }

        private function _getAction() {
                if ($this->_route == null) {
                        $defaultAction = 'action' . ucfirst(Yep::app()->defaultAction);
                        if (method_exists($this->_controller, $defaultAction)) {
                                $this->_action = $defaultAction;
                        } else {
                                throw new Exception('The default action does not exist.
                                        Check your configuration file.');
                        }
                } else {
                        if (method_exists($this->_controller, $this->_route[1])) {
                                $this->_action = $this->_route[1];
                        } else {
                                throw new Exception('Specified action does not exist');
                        }
                }
        }

        private function _getParams() {
                if ($this->_route == null) {
                        $this->_params = null;
                } else {
                        $routeCount = count($this->_route);
                        if ($routeCount <= 2) {
                                $this->_params = null;
                        } elseif ($routeCount > 2) {
                                foreach ($this->_route as $key => $val) {
                                        if ($key != 0 && $key != 1) {
                                                // even - params
                                                // odd - values
                                                // [0] site, [1] index, [2] param1, [3] value1, ...
                                                if (($key % 2) == 0) {
                                                        $this->_params[$val] = '';
                                                } else {
                                                        $this->_params[count($this->_params) - 1] = $val;
                                                }
                                        }
                                }
                        }
                }
                $_GET + $this->_params;
        }
        
        private function _execute() {
                // getting names
                $_controller = $this->_controller;
                $_action = $this->_action;
                
                $ctrpath = Yep::app()->basePath . '/application/controllers/' . $_controller;
                require $ctrpath;
                $controller = new $_controller();
                $controller->$_action();
                
        }

}