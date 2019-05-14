<?php

class Db
{
	var $_connection;

	var $_user;

	var $_password;

	var $_host;

	function Db( $user, $password, $host) {
		$this->_user = $user;
		$this->_password = $password;
		$this->_host = $host;
	}

	function query( $sql ) {
		return 1;
	}

	function queryOne( $sql, $params = array() ) {
		return 'Example';
	}
}

