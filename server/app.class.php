<?php

class App
{
	/**
	 * @var object Response
	 */
	protected $response;

	/**
	 * It deals with the mapping
	 * so the system can initalize the right controller and method
	 * @var Object Router
	 */
	private $router;

	/**
	 *	Its the name for the right controller so i can initalize it
	 * @var String 
	 */
	private $controller;

	/**
	 * Its the object initalized with the $controller variable
	 * @var Object Controller
	 */
	private $page;

	/**
	 * It initalize the handlers for HTTP requests
	 * and then sets the right controller from the route class 
	 * The request class will handle the url and pass it to router
	 */
	function __construct()
	{
		$request = new Request;
		$this->response = new Response;
		$this->router = new Router($request);
		$this->controller = $this->router->get('controller');
	}

	/**
	 * It starts the application by initalizing the right controller 
	 * If there is no controller to initalize, the system will throw and error 
	 */
	public function start()
	{
		if(class_exists($this->controller))
		{
			$this->page = new $this->controller($this->router, $this->response);
		}
		else
		{
			$this->response->add('errorResponse', 'There is no controller called ' . $this->controller);
		}
	}

	/**
	 * It ends the application by printing out the response in right format 
	 * Format can be found in the config file
	 */
	public function end()
	{
		print($this->response->getResponse());
	}

	/**
	 * Its a get function that returns the requested item
	 * example: $item = 'page', will return if set $this->page
	 * @param string
	 */
	public function get($item)
	{
		if(isset($this->$item))
		{
			return $this->$item;
		}
	}
}