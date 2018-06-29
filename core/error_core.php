<?php

class Error_Core {

	private $errors;

	public function __construct() {

		$this->errors = [];

		set_error_handler(array($this, 'custom_error'));
		register_shutdown_function(array($this, 'fatal_handler'));

	}

	function custom_error($errno, $errstr, $errfile, $errline){

		array_push($this->errors, '<b>Error:</b> ['.$errno.'] "'.$errstr.'" in '.$errfile.':'.$errline);
		error_log('Error: ['.$errno.'] "'.$errstr.'" in '.$errfile.':'.$errline."\n", 3, '/var/www/html/jiMVC/logs/error.log');
	}

	function fatal_handler() {

		include 'config.php';

		$error = error_get_last();

        $errno   = $error["type"];
        $errfile = $error["file"];
        $errline = $error["line"];
        $errstr  = $error["message"];

        error_log('FATAL ERROR: ['.$errno.'] "'.$errstr.'" in '.$errfile.':'.$errline."\n", 3, '/var/www/html/jiMVC/logs/error.log');

        echo $debug ? $errstr : 'Oops!';

	}	

	public function get_errors() {
		return $this->errors;
	}

	public function add_error($new_error) {
		array_push($this->errors, $new_error);

	}
	
}



?>