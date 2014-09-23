<?php
require_once '../deps/adodb/adodb.inc.php';

class store_core {
	private $database = null;
	
	function __construct($config) {
		$dbconf = $config["database"];
		$this->database = ADONewConnection('mysqli');
		$this->database->Connect($dbconf['host'], $dbconf['user'], $dbconf['password'], $dbconf['database']);
		$this->database->Execute("set names 'utf8'");
		$this->database->SetFetchMode(ADODB_FETCH_ASSOC);
	}
	
	public function get_database() {
		return $this->database;
	}
}
