<?php

	include 'config.php';
	require_once('autoloader.php');
	// $autoloader = new Autoloader($autoload);
	$autoloader = new Autoloader();
	$error_handler = new Error_Core();

	
 
	// echo($test);

/* -----------------------------------------------------
 * Check path and serve page via appropriate controller
 *
 * Feel like there's a better way of doing this due to
 * repetition in if statement
 * -----------------------------------------------------*/
	if(isset($_SERVER['PATH_INFO'])) {
		
		$path_explode = explode('/', $_SERVER['PATH_INFO']);
		$model = ucfirst($path_explode[1]).'_Model';
		$controller = ucfirst($path_explode[1]).'_Controller';
		if((!class_exists($controller)) || (!class_exists($model))) {

			$error_handler->fatal_handler();
		}
		else{

			$model = new $model();
			$model->create_conn();
			echo $model->create_conn();
			$controller = new $controller($model);
			count($path_explode) < 3 ? $method = 'index' : $method = $path_explode[2];
			$controller->$method();			
		}

	}
	else {
		$model = ucfirst($root).'_Model';
		$controller = ucfirst($root).'_Controller';

		if((!class_exists($controller)) || (!class_exists($model))) {

			$error_handler->fatal_handler();

			// $error_handler->add_error('oh dear');
			// $error_handler->add_error('oh dear now');
		}
		else{

		$model = new $model();
		$model->create_conn();
		echo $model->create_conn();		

		$controller = new $controller($model);
		$controller->index();

		}
	}
	
	// Just for testing
	echo count($error_handler->get_errors());

	// Display any errors
	if($debug && count($error_handler->get_errors()) >= 1) {
		include 'view/errors/errors.php';
	}