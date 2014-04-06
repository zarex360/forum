<?php

class baseCtrl
{
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
	 * Initalize the obejcts i need to make the system work
	 * It also initalize the right method in the subcontroller
	 * @param object Router
	 */
	function __construct(Router $router, Response $response)
	{
		$this->router = $router;
		$this->response = $response;
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
			$this->response->add('httpError', 'Invalid request');
		}
	}


	/**
	 * @return array
	 * It gets the input data from the url request
	 */
	protected function getJsonInput()
	{
		$json = file_get_contents('php://input');
    	$data = json_decode($json, true);
    	return $data;
	}
}