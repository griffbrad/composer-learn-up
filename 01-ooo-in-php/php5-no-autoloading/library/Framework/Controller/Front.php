<?php

class Framework_Controller_Front
{
	private static $_instance;

	public static function getInstance()
	{
		if (!self::$_instance) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function dispatch($url)
	{
		list($controllerSegment, $actionSegment) = explode('/', trim($url, '/'));

		$controllerName = ucwords($controllerSegment) . 'Controller';
		$actionName     = $actionSegment . 'Action';

		require_once APPLICATION_PATH . '/controllers/' . $controllerName . '.php';
		$controller = new $controllerName(APPLICATION_PATH . '/views/index');
		$controller->$actionName();
	}
}
