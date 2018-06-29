<?php

	class Model_Core {

		private $host;
		private $database;
		private $username;
		private $passsword;
		private $conn;

		public function __construct() {

		}

		public function create_conn() {
			include 'config.php';

			$this->host 	= $db_settings['host'];
			$this->database = $db_settings['database'];
			$this->username = $db_settings['username'];
			$this->password = $db_settings['password'];

			$this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

			# TEST DB CONNECTION
			if ($this->conn->connect_error) {
			    return $this->conn->connect_error;
			} 
			else {
				return 'DB Connected';
			}
		}
	}