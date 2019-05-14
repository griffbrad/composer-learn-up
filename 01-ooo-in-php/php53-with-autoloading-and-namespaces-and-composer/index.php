<?php

require_once 'vendor/autoload.php';

use Framework\Controller\Front as FrontController;
use Framework\View;

define(
	'APPLICATION_ENV',
	getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'
);

$url = '/hello';

$controller = new FrontController();

$controller->get(
	'/hello',
	function () {
		(new View(__DIR__ . '/application/views'))
			->assign('firstName', 'Example')
			->render('hello.phtml');
	}
);

$controller->dispatch($url);

