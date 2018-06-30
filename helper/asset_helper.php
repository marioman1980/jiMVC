<?php

	class Asset_Helper {

		public function __construct() {

		}

		public function load_assets() {

			$css = '';
			$dir = '';
			$file = '';
			if ($dir = opendir('assets/css')) {
			    while (false !== ($file = readdir($dir))) {
			        if (is_file('assets/css/' . $file)) {
			            $css .= '<link rel="stylesheet" href="assets/css/' . $file .'" type="text/css" />' . "\n";
			        }
			    }
			    closedir($dir);
			    return $css;
			}
		}

	}

