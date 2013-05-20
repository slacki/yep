<?php

class SiteController extends Controller {
		
		public function actionIndex() {
			// Maybe I'll get a way to display this really framework-like.
			// @UP: achievment get.
			
			
			$model = new Login();
                        echo '<pre>';
                        print_r($model->asd());
                        
		}
		
		public function actionLogin() {
			$this->render('site/login');
		}
		
}