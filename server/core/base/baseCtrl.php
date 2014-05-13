<?php

namespace core\base;

use core\App as App;

class baseCtrl
{
	/**
	 * requestData contains data sent from client(front-end)
	 * @var array 
	 */
	protected $requestData;


	/**
	 * @var object Response
	 */
	protected $response;


	/**
	 * It uses the request class to sort out the right route 
	 * with the mapping so the system initalize the right 
	 * controller and method with params
	 * @var object Router
	 */
	protected $router;


	/**
	 * Session handler
	 * contains some sweetener functions for handling session
	 * @var object
	 */
	protected $session;


	/**
	 * If you want your response to go through a template
	 * so you can return html to the client
	 * @var object
	 */
	protected $view;
	

	/**
	 * @param object Router
	 * @param object Response
	 * @param object View
	 * It starts the right method or return an error response
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
	 * @param string $method
	 * @param array $params
	 * It initalize the function that are set in the route request
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
	 * @return array
	 * It gets the input data from the url request
	 */
	protected function getJsonInput()
	{
		return $this->requestData;
	}
}