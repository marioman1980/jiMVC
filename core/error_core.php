<?php

	// NEED TO PUSH ALL ERRORS INTO ARRAY, NO MATTER WHERE THEY COME FROM ie. INDEX
	// PERHAPS PUT THIS IN A CLASS SO IT CAN BE AUTOLOADED

class Error_Core {

	public function __construct() {

		set_error_handler(array($this, 'customError'));

	}

	function customError($errno, $errstr){
	    echo '<b>Error:</b> ['.$errno.'] '.$errstr;
	}
	

}



?>