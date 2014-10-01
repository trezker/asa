<?php
class api {
	protected $input = null;
	protected $store_core = null;
	
	function __construct($input, $store_core) {
		$this->input = $input;
		$this->store_core = $store_core;
	}
}
