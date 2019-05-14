<?php

require_once 'models/FakeTable.php';

require_once 'Framework/Controller/Base.php';

class IndexController extends Framework_Controller_Base
{
	protected $_model;

	public function init()
	{
		$this->_model = new FakeTable();
	}

	public function helloAction()
	{
		$this->_view->firstName = $this->_model->find($this->_request->getParam('id'))->first_name;

		$this->_view->render( 'index.phtml' );
	}
}
