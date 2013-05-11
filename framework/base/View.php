<?php

class View {
	
	private $viewPath;
	
	public function __construct($viewPath, $data) {
		$this->viewPath = $viewPath;
		foreach ($data as $key => $value) {
			$this->$key = $value;
		}
	}
	
	public function render() {
		require BASE_PATH . '/application/views/header.php';
		require BASE_PATH . '/application/views/' . $this->viewPath . '.php';
		require BASE_PATH . '/application/views/footer.php';
	}
	
	public function renderPartial() {
		require BASE_PATH . '/application/views' . $this->viewPath . '.php';
	}
	
}