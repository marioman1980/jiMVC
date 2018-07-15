<?php

	class Test_Controller extends Controller_Core {

		public function index() {

			if($this->model->create_conn()) {
				echo 'foo';
			}		
			var_dump($this->model->get_ids());	

			$this->load_view('test', $this->model, $this->assets);
		}		

	
	}
	