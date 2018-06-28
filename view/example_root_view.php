
<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">

<style>

	#container {
		padding: 10px;
		font-family: 'PT Sans', sans-serif;
	}

	#container, #inner-container {
		margin: 0 auto;
	}

</style>

<div id="container">
	<div id="inner-container">

		<h1>EXAMPLE ROOT</h1>
		<p>This is an example of a view being served as root - defined in 'config.php'.</p>
		<p>You can find it here: 'view/example_root_view'.</p>



		<p><?= $data->get_string(); ?></p>

		<a href="test">test</a>
		<a href="example">example</a>		
	</div>
</div>
