<?php

namespace core;

class App
{
	/**
	 * requestData contains data sent to server
	 * @var Array 
	 */
	private $requestData;


	/**
	 * Handle the response from server
	 * @var Object
	 */
	private $response;


	/**
	 * Handle how the application should run
	 * @var Object
	 */
	private $router;


	/**
	 * [$view description]
	 * @var [type]
	 */
	private $view;


	/**
	 * Name of the controller what I want to run.
	 * @var String
	 */
	private $controller;

	
	/**
	 * Starts the application by initalizing the controller
	 * @param Object $router
	 * @param Array $requestData
	 */
	function __construct(router $router, $requestData)
	{
		$this->response = new http\Response();

		$this->view = new View();

		$this->requestData = $requestData;
		
		$this->router = $router;
		
		$this->controller = $this->router->get('controller');
	}


	/**
	 * Start the application if there is a controller, otherwise throw an error.	
	 */
	public function start()
	{
		if(isset($this->controller)) 
		{
			$page = new $this->controller($this);
		}
		else
		{
			throw new Exception();
		}
	}


	/**
	 * Ends the application by printing out the server response.
	 */
	public function end()
	{
		print($this->response->getResponse());
	}


	/**
	 * Returns requested item.
	 * @param  string $item
	 * @return mixed
	 */
	public function get($item)
	{
		if(isset($this->$item))
		{
			return $this->$item;
		}
	}
}