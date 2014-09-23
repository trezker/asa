<?php
require_once "../store/store.php";

class user_store extends store {
	function create_user($input) {
		return array("success" => true);
	}
}
