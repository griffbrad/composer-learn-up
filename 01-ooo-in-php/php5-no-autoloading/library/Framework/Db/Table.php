<?php

require_once 'Framework/Db.php';

class Framework_Db_Table
{
	protected $_db;

	public function __construct(Framework_Db $db = null)
	{
		$this->_db = $db ? $db : Framework_Db::getInstance();
	}

	public function find($id)
	{
		$rowObject = new stdClass();
		$rowObject->first_name = 'Example';
		return $rowObject;
	}
}
