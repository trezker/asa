<?php
require_once('../api/user_api.php');
require_once('../store/store_core.php');

class user_tests extends UnitTestCase {
	function test_create_user() {
		require_once('config.php');
		$store_core = new store_core($config);

		$sid = null;
		$input = array(
			"username" => "a",
			"password" => "b",
		);
		$user_api = new user_api($sid, $input, $store_core);
		$result = $user_api->create_user();
		$this->assertTrue($result['success']);
	}

	function test_get_user() {
		//Succeeds, no output or throws
	}
}
