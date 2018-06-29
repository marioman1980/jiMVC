<?php

class Example_Model extends Model_Core {

	private $string;

	public function __construct(){

		$this->string = "This string is defined in the 'Example' model 
						(although you're more likely to be getting data from a database)
						and passed to the view via the controller.";
	}

	public function get_string() {
		return $this->string;
	}
}