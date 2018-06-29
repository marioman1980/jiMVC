</br></br>
<h3>Some errors:</h3>
<?php
	
	foreach($error_handler->get_errors() as $error) {
		echo $error;
		echo '<br/>';
	}
	echo ':(';

?>