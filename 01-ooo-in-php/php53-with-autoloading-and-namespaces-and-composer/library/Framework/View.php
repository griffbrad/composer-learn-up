<?php

namespace Framework;

use Zend\Escaper\Escaper;

class View
{
	private $data = array();

	private $path;

	private $escaper;

	public function __construct($path, Escaper $escaper = null)
	{
		$this->path    = $path;
		$this->escaper = ($escaper ?: new Escaper);
	}

	public function assign($key, $value)
	{
		$this->data[$key] = $value;

		return $this;
	}

	public function get($key)
	{
		return $this->data[$key];
	}

	public function has($key)
	{
		return isset($this->data[$key]);
	}

	public function render($scriptName)
	{
		require $this->path . '/' . $scriptName;
	}

	public function getEscaper()
	{
		return $this->escaper;
	}
}
