<?php

	class Asset_Helper {

		public function __construct() {

		}

		// CONSOLIDATE REPETITION

		public function load_assets() {

			$tags = '';
			$dir = '';
			$file = '';
			if ($dir = opendir('assets/css')) {
			    while (false !== ($file = readdir($dir))) {
			        if (is_file('assets/css/' . $file)) {
			            $tags .= '<link rel="stylesheet" href="assets/css/' . $file .'" type="text/css" />' . "\n";
			        }
			    }
			    // closedir($dir);
			}
			if ($dir = opendir('assets/js')) {
    			while (false !== ($file = readdir($dir))) {
        			if (is_file('assets/js/' . $file)) {
            			$tags .= '<script src="assets/js/' . $file . '" type="text/javascript"></script>' . "\n";
        			}
    			}
    			// closedir($dir);			    
			}
			closedir($dir);
			return $tags;
		}

	}

