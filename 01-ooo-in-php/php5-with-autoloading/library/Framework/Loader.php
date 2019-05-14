<?php

class Framework_Loader
{
	private static $_instance;

	public function __construct()
	{
		spl_autoload_register(array($this, 'load'));
	}

	public static function getInstance()
	{
		if (!self::$_instance) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function load($className)
	{
		$classPath = str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
		require_once $classPath;
	}
}

