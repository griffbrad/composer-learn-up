<?php

namespace Framework\Controller;

class Front
{
	private $routes = [];

	public function get($path, callable $handler)
	{
		$this->routes[$path] = $handler;

		return $this;
	}

	public function dispatch($url)
	{
		$routeHandler = $this->routes[$url];
		call_user_func($routeHandler);
	}
}
