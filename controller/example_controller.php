<?php

	class Example_Controller extends Controller_Core {

		public function __construct($model) {

			$this->model = $model;

		}

		public function index() {
			$this->load_view('example', $this->model);
		}		

		public function foo() {
			echo 'bar';
		}		
	}