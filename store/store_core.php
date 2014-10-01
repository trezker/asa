<?php
require_once '../deps/adodb/adodb.inc.php';

class store_core {
	private $database = null;
	private $session = null;

	public function initialize($config, $sid) {
		if(!$this->connect_database($config)) {
			throw new Exception('Failed to initialize storage');
		}
		if(!$this->initialize_session($sid)) {
			throw new Exception('Failed to initialize_session.');
		}
	}
	
	private function connect_database($config) {
		$dbconf = $config["database"];
		$this->database = ADONewConnection('mysqli');
		$this->database->Connect($dbconf['host'], $dbconf['user'], $dbconf['password'], $dbconf['database']);
		$this->database->Execute("set names 'utf8'");
		$this->database->SetFetchMode(ADODB_FETCH_ASSOC);
		return true;
	}

	private function get_user_agent($user_agent) {
		$query = "select id from user_agent where user_agent = ?";
		$args = array($user_agent);
		$result = $this->execute_query($query, $args);
		if($result === false) {
			return false;
		}
		if($result->RecordCount() < 1) {
			$query = "insert into user_agent (user_agent) values(?)";
			$args = array($user_agent);
			$result = $this->execute_query($query, $args);
			if($result === false) {
				return false;
			}
			return $this->last_insert_id();
		}
		return $result->fields["id"];
	}
	
	private function initialize_session($sid) {
		$user_agent = substr($sid["user_agent"], 0, 255);
		
		$user_agent_id = $this->get_user_agent($user_agent);
		if($user_agent_id === false) {
			return false;
		}

		//Get session
		$query = "select id from session where session_id = ? and ip_address = ? and user_agent_id = ?";
		$args = array($sid["sessionid"], $sid["ip_address"], $user_agent_id);
		$result = $this->execute_query($query, $args);
		if($result === false) {
			echo "SELECT";
			return false;
		}
		if($result->RecordCount() < 1) {
			//If it doesn't exist, create new
			$query = "insert into session(session_id, ip_address, user_agent_id) values(?, ?, ?)";
			$args = array($sid["sessionid"], $sid["ip_address"], $user_agent_id);
			$result = $this->execute_query($query, $args);
			if($result === false) {
				return false;
			}
			$this->session = $this->last_insert_id();
		}
		else {
			$this->session = $result->fields["id"];
		}
		return true;
	}
	
	function debug($on) {
		$this->database->debug = $on;
	}

	public function get_database() {
		return $this->database;
	}
	
	public function get_session() {
		return $this->session;
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

	function last_insert_id() {
		$result = $this->database->Insert_ID();
		return $result;
	}

	function affected_rows() {
		$result = $this->database->Affected_Rows();
		return $result;
	}
}
