<?php

require_once dirname(__DIR__).'/config/constants.php';

class DB {
	protected $errors = array();
	protected $connection;

	protected function connect($hostname = DBHOST, $username = DBUSER, $password = DBPASS, $database = DBNAME) {
		$this->connection = @mysqli_connect($hostname, $username, $password, $database);
		if(!$this->connection) {
			$this->setError(mysqli_connect_error());
			return false;
		}
		return $this->connection;
	}

	protected function setError($error) {
		$this->errors[] = $error;
	}

	public function getErrors() {
		return $this->errors;
	} 

	protected function fetch_all($query) {
		$data = [];
		while($row = myqli_fetch_array($query, MYSQLI_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
}