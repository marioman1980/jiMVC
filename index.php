<?php

	include 'config.php';
	require_once('autoloader.php');
	// $autoloader = new Autoloader($autoload);
	$autoloader = new Autoloader();

	$errors = [];

	if(isset($_SERVER['PATH_INFO'])) {
		
		$path_explode = explode('/', $_SERVER['PATH_INFO']);
		$model = ucfirst($path_explode[1]).'_Model';
		$controller = ucfirst($path_explode[1]).'_Controller';
		if((!class_exists($controller)) || (!class_exists($model))) {

			array_push($errors, 'oh dear');
			array_push($errors, 'oh dear now');
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

			array_push($errors, 'oh dear');
			array_push($errors, 'oh dear now');
		}
		else{

		$model = new $model();
		$model->create_conn();
		echo $model->create_conn();		

		$controller = new $controller($model);
		$controller->index();

		}
	}
	

	if($debug && count($errors) >= 1) {
		include 'view/errors/errors.php';
	}