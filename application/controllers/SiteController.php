<?php

class SiteController extends Controller {
		
		public function actionIndex() {
			// Maybe I'll get a way to display this really framework-like.
			// @UP: achievment get.
			
			
			$model = new Login();
			$data = array(
				'param1' => 'val1',
				'param2' => 'val2',
			);
			$this->render('site/index', $data);
		}
		
		public function actionLogin() {
			$this->render('site/login');
		}
		
}