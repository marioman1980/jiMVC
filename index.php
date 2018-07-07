<?php

	// NEED TO TIDY THIS FILE UP

	include 'config.php';
	require_once('autoloader.php');
	// $autoloader = new Autoloader($autoload);
	$autoloader = new Autoloader();
	$error_handler = new Error_Core();

	$assets = '';

	define('BASE', $base);
	define('SYSTEM', $system);
 
	echo($test);

	// Check path and call appropriate controller/model

	if(isset($_SERVER['PATH_INFO'])) {
		$path = $_SERVER['PATH_INFO'];
		if(substr($path, -1) == '/') {
			$path = substr_replace($path, '', -1);
		}

		$path_explode = explode('/', $path);
		$model = ucfirst($path_explode[1]).'_Model';
		$controller = ucfirst($path_explode[1]).'_Controller';
		count($path_explode) < 3 ? $method = 'index' : $method = $path_explode[2];

	}
	else {

		$model = ucfirst($root).'_Model';
		$controller = ucfirst($root).'_Controller';
		$method = 'index';

	}

	if(class_exists('Asset_Helper')) {
		$assets = new Asset_Helper();
		$assets = $assets->load_assets();
	}	
	
	// If controller doesn't exist, throw 404
	// Need to do something similar for incorrect/non-existent methods

	// Put all this error stuff in custom handler and try some ternarys
	if(!class_exists($controller)) {
		http_response_code(404);
		error_log('FATAL ERROR: Controller class \''.$controller.'\' doesn\'t exist'."\n", 3, SYSTEM.'logs/error.log');	
		include SYSTEM.'view/errors/404.php';
	}
	else {
		$model = new $model();
		$model->create_conn();
		echo $model->create_conn();		
		$controller = new $controller($model, $assets);

		if(!method_exists($controller, $method)) {
			http_response_code(404);
			error_log('FATAL ERROR: Class method \''.get_class($controller).' -> '.$method.'\' doesn\'t exist'."\n", 3, SYSTEM.'logs/error.log');	
			include SYSTEM.'view/errors/404.php';
		}
		else {
			$controller->$method();	
		}
				
	}

	
	// Just for testing
	echo count($error_handler->get_errors());

	// Display any errors
	if($debug && count($error_handler->get_errors()) >= 1) {
		
		include 'view/errors/errors.php';
	}
	