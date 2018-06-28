<?php

/* ----------------------------------------------------
 * Here we can get all our classes to load 
 * without having to include them all over the place
 * ---------------------------------------------------*/

	class Autoloader {

		public function __construct() {
			
			spl_autoload_register(array($this, 'loader'));
		
		}

		private function loader($class) {

			include 'config.php';

			$core = ['core', 'controller', 'model', 'view'];

			$class = strtolower($class);
			$class_explode = explode('_', $class);
			$dir = end($class_explode);

			// Only classes defined in core, or in directories 
			// specified in config autoloader option will be included

			if(in_array($dir, $core) || in_array($dir, $autoload)) {

				$filename = strtolower($class) . '.php';

				$file = $dir.'/'.$filename;

				if (!file_exists($file)) return false;
				include $file;				
			}
		}
	}	

