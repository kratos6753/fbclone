<?php

spl_autoload_register(function($class_name) {
	require_once 'api/controllers/'.ucwords($class_name).'.php';
});