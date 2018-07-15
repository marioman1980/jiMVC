<?php

	class Example_Controller extends Controller_Core {

		public function index() {

			$this->load_view('example', $this->model, $this->assets);
		}		

		public function foo() {
			echo 'bar';
		}		
	}
	