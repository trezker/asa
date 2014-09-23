<?php
class api {
	protected $sid = null;
	protected $input = null;
	protected $store_core = null;
	
	function __construct($sid, $input, $store_core) {
		$this->sid = $sid;
		$this->input = $input;
		$this->store_core = $store_core;
	}
}
