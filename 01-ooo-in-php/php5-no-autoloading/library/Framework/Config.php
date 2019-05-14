<?php

class Framework_Config
{
	private static $_instance;

	private $_data = array();

	public function __construct($iniFilePath = null)
	{
		if (!$iniFilePath) {
			$iniFilePath = APPLICATION_PATH . '/config.ini';
		}

		$this->_data = parse_ini_file($iniFilePath);
	}

	public static function getInstance()
	{
		if (!self::$_instance) {
			self::$_instance = new Framework_Config();
		}

		return self::$_instance;
	}

	public function __set($key, $value)
	{
		$this->_data[$key] = $value;

		return $this;
	}

	public function __get($key)
	{
		return $this->_data[$key];
	}

	public function __isset($key)
	{
		return isset($this->_data[$key]);
	}
}
