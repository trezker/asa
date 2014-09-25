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

	function get_user($input) {
		$query = "select name, password from user where name = ? and password = encrypt(?, password);";
		$args = array($input["username"], $input["password"]);
		$result = $this->store_core->execute_query($query, $args);
		return $result->fields;
	}
}
