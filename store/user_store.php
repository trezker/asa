<?php
require_once "../store/store.php";

class user_store extends store {
	function create_user($input) {
		$query = "insert into user (name, password) values(?, encrypt(?));";
		$args = array($input["username"], $input["password"]);
		$this->store_core->execute_query($query, $args);
		return array("success" => true);
	}
}
