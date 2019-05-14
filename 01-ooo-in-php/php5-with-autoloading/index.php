<?php

define( 'APPLICATION_PATH', dirname(__FILE__) . '/application/');

define(
	'APPLICATION_ENV',
	getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'
);

set_include_path(
	get_include_path() . PATH_SEPARATOR .
	dirname(__FILE__) . PATH_SEPARATOR .
	getcwd() . PATH_SEPARATOR .
	APPLICATION_PATH . PATH_SEPARATOR .
	dirname(__FILE__) . '/library'
);

$url = '/index/hello';

require_once 'Framework/Loader.php';
Framework_Loader::getInstance();

$frontController = Framework_Controller_Front::getInstance();
$frontController->dispatch($url);

