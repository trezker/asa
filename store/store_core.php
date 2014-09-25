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
	
	public function begin_transaction() {
		$this->database->StartTrans();
	}

	function fail_transaction() {
		$this->database->FailTrans();
	}

	function complete_transaction() {
		$this->database->CompleteTrans();
	}

	public function rollback_transaction() {
		$this->fail_transaction();
		$this->complete_transaction();
	}

	function execute_query($query, $args = array()) {
		$result = $this->database->Execute($query, $args);
		return $result;
	}
}
