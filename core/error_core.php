<?php

class Error_Core {

	private $errors;

	public function __construct() {

		$this->errors = [];

		set_error_handler(array($this, 'custom_error'));
		register_shutdown_function(array($this, 'fatal_handler'));

	}

	public function custom_error($errno, $errstr, $errfile, $errline){

		array_push($this->errors, '['.$errno.'] "'.$errstr.'" in '.$errfile.':'.$errline.' '.date("Y-m-d H:i:s"));
		error_log('Error: ['.$errno.'] "'.$errstr.'" in '.$errfile.':'.$errline.' '.date("Y-m-d H:i:s")."\n", 3, SYSTEM.'logs/error.log');
	}

	// Try to handle errors to prevent interruption
	public function custom_handler($string) {
		error_log('FATAL ERROR: Controller class \''.$string.'\' doesn\'t exist '.date("Y-m-d H:i:s")."\n", 3, SYSTEM.'logs/error.log');
	}

	// Hopefully any fatal errors will be caught here
	public function fatal_handler() {

		include 'config.php';

		$error = error_get_last();

        $errno   = $error["type"];
        $errfile = $error["file"];
        $errline = $error["line"];
        $errstr  = $error["message"];

        if($error) {
        	error_log('FATAL ERROR: ['.$errno.'] "'.$errstr.'" in '.$errfile.':'.$errline.' '.date("Y-m-d H:i:s")."\n", 3, '/var/www/html/jiMVC/logs/error.log');
        	$debug ? include SYSTEM.'view/errors/fatals.php' : include SYSTEM.'view/errors/oops.php';
        }
	}	

	public function get_errors() {
		return $this->errors;
	}

	public function add_error($new_error) {
		array_push($this->errors, $new_error);

	}
	
}
