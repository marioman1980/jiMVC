
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

		<h1>EXAMPLE</h1>
		<p>This is an example of a view.</p>
		<p>You can find it here: 'view/example_view'.</p>



		<p><?= $data->get_string(); ?></p>

		<a href="test">test</a>
		<a href="example">example</a>		
	</div>
</div>
