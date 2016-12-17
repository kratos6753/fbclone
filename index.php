<?php

require_once 'autoload.php';

$controller = $_GET['controller'];
$method = $_GET['method'];

$controller_name = ucwords($controller).'Controller';

if(file_exists(__DIR__.'/api/controllers/'.$controller_name.'.php')) {
	$controller_obj = new $controller_name();
	if(method_exists($controller_obj, $method)) {
		$controller_obj->$method();
	} else {
		$response = array('message' => 'controller method does not exist', 'status' => 21);
	}

} else {
	$response = array('message' => 'controller does not exist', 'status' => 20);
}

if(isset($response)) echo json_encode($response);