<?php

	class Controller_Core {

		public function __construct() {

		}	

		public function load_view($partial, $data = null) {

			echo $foo;
			include 'view/'.$partial.'_view.php';
		}
	}
