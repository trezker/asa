<?php
require_once('../api/user_api.php');
require_once('../store/store_core.php');

class user_tests extends UnitTestCase {
	private $store_core = null;
	function setUp() {
		include('config.php');
		$sid = array(
			"sessionid" => "a",
			"ip_address" => "b",
			"user_agent" => "c"
		);
		$this->store_core = new store_core();
		$this->store_core->initialize($config, $sid);
		$this->store_core->begin_transaction();
	}

	function tearDown() {
		$this->store_core->rollback_transaction();
	}

	function test_create_user() {
		$input = array(
			"username" => "a",
			"password" => "b",
		);
		$user_api = new user_api($input, $this->store_core);
		$result = $user_api->create_user();
		$this->assertTrue($result['success']);
	}

	function test_create_user_unique_name() {
		$input = array(
			"username" => "a",
			"password" => "b",
		);
		$user_api = new user_api($input, $this->store_core);
		$user_api->create_user();
		$result = $user_api->create_user();
		$this->assertFalse($result['success']);
	}

	function test_login() {
		$this->test_create_user();
		$input = array(
			"username" => "a",
			"password" => "b",
		);
		$user_api = new user_api($input, $this->store_core);
		$result = $user_api->login();
		$this->assertTrue($result['success'] === true);
	}
}
