<?php
require_once "../api/base.php";

class User extends Base {
	public function login() {
		$success = false;
		$message = "";
		if($this->input["username"] === "a") {
			$success = true;
		}
		return array("success" => $success, "message" => $message);
	}
}
