<?php

	include 'config.php';
	require_once('autoloader.php');
	// $autoloader = new Autoloader($autoload);
	$autoloader = new Autoloader();

	$error_handler = new Error_Core();
 
	echo($test);

	// Check path and call appropriate controller/model

	if(isset($_SERVER['PATH_INFO'])) {
		
		$path_explode = explode('/', $_SERVER['PATH_INFO']);
		$model = ucfirst($path_explode[1]).'_Model';
		$controller = ucfirst($path_explode[1]).'_Controller';
		count($path_explode) < 3 ? $method = 'index' : $method = $path_explode[2];

	}
	else {

		$model = ucfirst($root).'_Model';
		$controller = ucfirst($root).'_Controller';
		$method = 'index';

	}

	$model = new $model();
	$model->create_conn();
	echo $model->create_conn();		
	$controller = new $controller($model);
	$controller->$method();	
	
	echo count($error_handler->get_errors());

	if($debug && count($error_handler->get_errors()) >= 1) {
		include 'view/errors/errors.php';
	}