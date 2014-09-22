<?php
require_once "../api/base.php";

class Language extends Base {
	public function translate() {
		$translations = array();
		foreach($this->input["tokens"] as $token) {
			$translations[$token] = $token." translated";
		}
		
		return array("success" => $success, "translations" => $translations);
	}
}
