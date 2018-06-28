<?php

	class View_Core {

		public function __construct() {

		}

		public function link_to($controller) {
			echo ($base.$controller);
		}
	}