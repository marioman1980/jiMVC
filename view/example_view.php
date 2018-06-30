<!DOCTYPE>
<html>
<head>
	<link href="<?= BASE; ?>assets/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
</head>

<body>
	<div id="container">

		<h1>EXAMPLE</h1>
		<p>This is an example of a view.</p>
		<p>You can find it here: 'view/example_view'.</p>



		<p><?= $data->get_string(); ?></p>

		<a href="test">test</a>
		<a href="example">example</a>		
	</div>
</body>
</html>