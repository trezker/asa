<?php
class Base {
	protected $userdata = null;
	protected $input = null;
	
	function __construct($userdata, $input) {
		$this->userdata = $userdata;
		$this->input = $input;
	}
}
