<?php
require_once "../store/store.php";

class user_store extends store {
	function create_user($input) {
		$query = "insert into user (name, password) values(?, encrypt(?));";
		$args = array($input["username"], $input["password"]);
		$result = $this->store_core->execute_query($query, $args);
		if($result === false)
			return array("success" => false);
		return array("success" => true);
	}

	function login($input) {
		$query = "select id from user where name = ? and password = encrypt(?, password)";
		$args = array($input["username"], $input["password"]);
		$result = $this->store_core->execute_query($query, $args);
		if($result === false || $result->RecordCount() < 1) {
			return array("success" => false);
		}
		
		$query = "update session set user_id = ? where id = ?";
		$args = array($result->fields["id"], $this->store_core->get_session());
		if($result === false || $this->store_core->Affected_Rows() < 1) {
			return array("success" => false);
		}		
		return array("success" => true);
	}
}
