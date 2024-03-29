<?php

class Controller {
        
        public function __construct() {
                
        }
        
        public function render($viewPath, $data = array()) {
                $view = new View($viewPath, $data);
                $view->render();
        }
        
        public function renderPartial($viewPath, $data = array()) {
                $view = new View($viewPath, $data);
                $view->renderPartial();
        }
        
}