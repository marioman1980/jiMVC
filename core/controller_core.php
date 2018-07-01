<?php

	class Controller_Core {

		public function __construct($model, $assets) {

			$this->model = $model;
			$this->assets = $assets;			
		}	

		public function load_view($partial, $data = null, $assets = null) {

			echo $foo;
			include 'view/'.$partial.'_view.php';
		}
	}
