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
	
	$model = new $model();
	$model->create_conn();
	echo $model->create_conn();		
	$controller = new $controller($model, $assets);
	$controller->$method();	
	
	// Just for testing
	echo count($error_handler->get_errors());

	// Display any errors
	if($debug && count($error_handler->get_errors()) >= 1) {
		include 'view/errors/errors.php';
	}
	