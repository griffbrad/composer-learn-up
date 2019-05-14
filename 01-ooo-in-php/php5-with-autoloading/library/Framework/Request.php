<?php

class Framework_Request
{
	protected $_post;

	protected $_get;

	public function __construct($post, $get)
	{
		$this->_post = $post;
		$this->_get  = $get;
	}

	public function getParam($name)
	{
		return 1;
	}
}
