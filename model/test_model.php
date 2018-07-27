<?php

	class Test_Model extends Model_Core {

		public function __construct(){

			parent::__construct();
		}

		public function index() {

			if($this->create_conn()) {
				echo 'foo';
			}
			else {
				echo 'bar';
			}

		}

		public function get_test() {

			$query = $this->get_all('tests');

			return $query;
		}



	}
