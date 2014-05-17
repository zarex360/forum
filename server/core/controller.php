<?php

namespace core;

class Controller
{
	/**
	 * requestData contains data sent to server
	 * @var Array 
	 */
	protected $requestData;


	/**
	 * Handle the response from server
	 * @var Object
	 */
	protected $response;


	/**
	 * Handle how the application should run
	 * @var Object
	 */
	protected $router;


	/**
	 * Handle if the application should run through a template
	 * @var Object
	 */
	protected $view;


	/**
	 * Takes what it needs from the app to the core\controller
	 * @param Object $app
	 */
	function __construct(App $app)
	{
		$this->requestData = $app->get('requestData');

		$this->response = $app->get('response');

		$this->view = $app->get('view');

		$this->router = $app->get('router');

		$this->initMethod(
			$this->router->get('method'),
			$this->router->get('params')
		);
	}


	/**
	 * Initalize the controller method
	 * @param  String $method
	 * @param  Array  $params
	 */
	private function initMethod($method, $params = array())
	{
		if(method_exists($this, $method))
		{
			call_user_func_array(array($this, $method), $params);
		}
		else
		{
			$this->response->add('routeError', 'There is no method "'.$method.'".');
		}
	}


	/**
	 * Returns the requestData
	 * @return Array
	 */
	protected function getJsonInput()
	{
		return $this->requestData;
	}
}