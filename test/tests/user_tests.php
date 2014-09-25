<?php
require_once('../api/user_api.php');
require_once('../store/store_core.php');

class user_tests extends UnitTestCase {
	private $store_core = null;
	function setUp() {
		include('config.php');
		$this->store_core = new store_core($config);
		$this->store_core->begin_transaction();
	}

	function tearDown() {
		$this->store_core->rollback_transaction();
	}

	function test_create_user() {

		$sid = null;
		$input = array(
			"username" => "a",
			"password" => "b",
		);
		$user_api = new user_api($sid, $input, $this->store_core);
		$result = $user_api->create_user();
		$this->assertTrue($result['success']);

	}

	function test_get_user() {
		//Succeeds, no output or throws
	}
}
