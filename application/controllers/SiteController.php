<?php

class SiteController extends Controller {
        
        public function actionIndex() {
                // Maybe I'll get a way to display this really framework-like.
                // @UP: achievment get.
                
                
                $model = new Login();
                $this->render('site/index');
        }
        
        public function actionLogin() {
                $this->render('site/login');
        }
        
}