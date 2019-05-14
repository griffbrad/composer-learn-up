<?php

namespace Framework;

class Db
{
	private $connection;

	public function __construct(Config $config)
	{
		$this->_connection = array($config->db_user, $config->db_password);
	}

	public function query($sql, array $params = array())
	{
		return array();
	}
}

