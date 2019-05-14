<?php

class Framework_View
{
	protected $_data = array();

	protected $_path;

	public function __construct($path)
	{
		$this->_path = $path;
	}

	public function assign($key, $value)
	{
		$this->_data[$key] = $value;

		return $this;
	}

	public function __set($key, $value)
	{
		return $this->assign($key, $value);
	}

	public function __get($key)
	{
		return $this->_data[$key];
	}

	public function __isset($key)
	{
		return isset($this->_data[$key]);
	}

	public function render($scriptName)
	{
		require $this->_path . '/' . $scriptName;
	}

	public function escape($input)
	{
		return htmlentities($input, ENT_QUOTES, 'utf-8');
	}
}
