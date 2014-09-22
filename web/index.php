<?php

if (empty($_SERVER['PATH_INFO'])) {
	$path = explode('?', $_SERVER['REQUEST_URI'], 2);
	$_SERVER['PATH_INFO'] = reset($path);
}
$full_path = $_SERVER['PATH_INFO'];
$argv = explode("/", trim($full_path, "/"));

//TODO: $userdata needs to be a manipulatable class.
//Should be part of the API, but implemented by the interface, in this case using session..
$userdata = $_SESSION;
$input = $_POST;

if($argv[0] === "ajax") {
/* Use ajax callurl /ajax/module/function/arg1/arg2.../argN to call any function in the api.
 * The result will be json encoded.
 */
	//echo $full_path;
	//var_dump($argv);
	$module_name = $argv[1];
	$function = $argv[2];
	require_once "../api/".$module_name.".php";
	$module = new $module_name($userdata, $input);
	$result = $module->$function();
	header('Content-type: application/json');
	echo json_encode($result);
}
else {
	if($full_path === "/") {
		$full_path = "/index";
	}
	echo file_get_contents("html".$full_path.".html");
	//require_once "view".$full_path.".php";
}
