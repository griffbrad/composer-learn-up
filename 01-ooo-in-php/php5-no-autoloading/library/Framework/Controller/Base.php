<?php

require_once 'Framework/Request.php';
require_once 'Framework/View.php';

abstract class Framework_Controller_Base
{
	protected $_view;

	protected $_request;

	public function __construct($viewPath)
	{
		$this->_view    = new Framework_View($viewPath);
		$this->_request = new Framework_Request($_POST, $_GET);

		$this->init();
	}

	public function init()
	{

	}

	public function __call($method, array $args)
	{
		header('HTTP/1.0 404 Not Found', true, 404);
		exit;
	}
}

