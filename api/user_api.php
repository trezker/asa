<?php
require_once "../api/api.php";
require_once "../store/user_store.php";

class user_api extends api {
	public function create_user() {
		$user_store = new user_store($this->store_core);
		$result = $user_store->create_user($this->input);
		return $result;
	}
	
	public function login() {
		$user_store = new user_store($this->store_core);
		$result = $user_store->login($this->input);
		if($result === false) {
			return array("success" => false);
		}
		return array("success" => true);
	}
}
