<?php

require_once 'Framework/Config.php';

class Framework_Db
{
	protected static $_instance;

	protected $_connection;

	public function __construct()
	{
		$config = Framework_Config::getInstance();

		$this->_connection = array($config->db_user, $config->db_password);
	}

	public static function getInstance()
	{
		if (!self::$_instance) {
			self::$_instance = new Framework_Db();
		}

		return self::$_instance;
	}

	public function query($sql, array $params = array())
	{
		return array();
	}
}

