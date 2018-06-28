<?php

	// NEED TO PUSH ALL ERRORS INTO ARRAY, NO MATTER WHERE THEY COME FROM ie. INDEX
	// PERHAPS PUT THIS IN A CLASS SO IT CAN BE AUTOLOADED

	function customError($errno, $errstr){
		// $errors = [];
	    echo "<b>Error:</b> [".$errno."] ".$errstr;
	    // array_push($errors, "<b>Error:</b> [".$errno."] ".$errstr);
	    // echo $errors[0];
	}
	set_error_handler("customError");

?>