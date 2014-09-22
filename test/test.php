<?php
require_once('../deps/simpletest/autorun.php');

//Include all the test files
if ($handle = opendir('tests')) {
	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != "..") {
			$test_path = 'tests/'.$entry;
			require_once($test_path);
		}
	}
	closedir($handle);
}
