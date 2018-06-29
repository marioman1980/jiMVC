<br/><br/>
<div id="error-container">
	<div id="error-inner-container">
		<div id="error-header">
			<h3>Some errors:</h3>
		</div>
		<div id="error-body">
			<?php
				
				foreach($error_handler->get_errors() as $error) {
					echo '<p>'.$error,'</p>';
				}
				echo ':(';

			?>
		</div>
	</div>
</div>