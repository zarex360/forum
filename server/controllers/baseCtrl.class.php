<?php

class baseCtrl
{
	/**
	 * @var Object Response
	 */
	protected $response;


	/**
	 * It uses the request class to sort out the right route 
	 * with the mapping so the system initalize the right 
	 * controller and method with params
	 * @var Object Router
	 */
	protected $router;


	/**
	 * Initalize the obejcts i need to make the system work
	 * It also initalize the right method in the subcontroller
	 * @param Object Router
	 */
	function __construct(Router $router)
	{
		$this->response = new Response;
		$this->router = $router;
		$this->initMethod(
			$this->router->get('method'),
			$this->router->get('params')
		);
	}

	private function initMethod($method, $params = array())
	{
		if(method_exists($this, $method))
		{
			call_user_func_array(array($this, $method), $params);
		}
	}

	public function render()
	{
		return $this->response->getResponse();
	}

	protected function getJsonInput()
	{
		$json = file_get_contents('php://input');
    	$data = json_decode($json, true);
    	return $data;
	}
}