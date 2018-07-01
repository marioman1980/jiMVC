<?php

	class Example_root_Controller extends Controller_Core {

		// public function __construct($model, $assets) {

		// 	$this->model = $model;
		// 	$this->assets = $assets;		

		// }

		public function index() {
			$this->load_view('example_root', $this->model, $this->assets);
		}

	}
	