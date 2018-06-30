<!DOCTYPE>
<html>
<head>
	<link href="<?= BASE; ?>assets/css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
</head>

<body>
	<div id="container">

		<h1>EXAMPLE ROOT</h1>
		<p>This is an example of a view being served as root - defined in 'config.php'.</p>
		<p>You can find it here: 'view/example_root_view'.</p>



		<p><?= $data->get_string(); ?></p>

		<a href="test">test</a>
		<a href="example">example</a>		
	</div>
</body>
</html>