<style>
	#error-header, #error-body {
		padding: 10px
	}

	#error-container, #error-inner-container {
		margin: 0 auto;
		font-family: 'Fjalla One', sans-serif;		
	}

	#error-header {
		background-color: #ff6666;
	}

	#error-body {
		background-color: #ffe6e6;
	}

	#error-header h3 {
		margin:  0
	}
</style>

<br/><br/>
<div id="error-container">
	<div id="error-inner-container">
		<div id="error-header">
			<h3>Some errors:</h3>
		</div>
		<div id="error-body">
			<?= 'FATAL ERROR: ['.$errno.'] "'.$errstr.'" in '.$errfile.':'.$errline.' '.date("Y-m-d H:i:s")."\n"; ?>
		</div>
	</div>
</div>