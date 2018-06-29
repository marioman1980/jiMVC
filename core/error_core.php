<?php

class Error_Core {

	private $errors;

	public function __construct() {

		$this->errors = [];

		set_error_handler(array($this, 'custom_error'));
		register_shutdown_function(array($this, 'fatal_handler'));

	}

	function custom_error($errno, $errstr){

		array_push($this->errors, '<b>Error:</b> ['.$errno.'] '.$errstr);
		error_log('Error: ['.$errno.'] '.$errstr."\n", 3, '/var/www/html/jiMVC/logs/error.log');
	}

	function fatal_handler() {

		$errno   = E_CORE_ERROR;
		$errstr = "Bugger!";
		array_push($this->errors, '<b>Error:</b> ['.$errno.'] '.$errstr);
		error_log('Error: ['.$errno.'] '.$errstr."\n", 3, '/var/www/html/jiMVC/logs/error.log');

	}

	public function get_errors() {
		return $this->errors;
	}

	public function add_error($new_error) {
		array_push($this->errors, $new_error);

	}
	

}



?>