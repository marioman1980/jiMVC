<?php

class Error_Core {

	private $errors;

	public function __construct() {

		$this->errors = [];

		set_error_handler(array($this, 'customError'));

	}

	function customError($errno, $errstr){

		array_push($this->errors, '<b>Error:</b> ['.$errno.'] '.$errstr);
	}

	public function get_errors() {
		return $this->errors;
	}

	public function add_error($new_error) {
		array_push($this->errors, $new_error);

	}
	

}



?>