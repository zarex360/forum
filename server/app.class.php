<?php

class App
{
	/**
	 * requestData contains data sent from client(front-end)
	 * @var array 
	 */
	private $requestData;


	/**
	 * @var object Response
	 */
	private $response;


	/**
	 * It deals with the mapping
	 * so the system can initalize the right controller and method
	 * @var Object Router
	 */
	private $router;


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
	private $view;


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
	 * It initalize all the classes i need for the application to run
	 */
	function __construct()
	{
		$request = new Request;
		$this->requestData = $request->get('requestData');
		$this->response = new Response;
		$this->view = new View;
		$this->router = new Router($request);
		$this->controller = $this->router->get('controller');
	}


	/**
	 * It starts the application by initalizing the right controller 
	 * If there is no controller to initalize, the system will throw and error response
	 */
	public function start()
	{
		if(class_exists($this->controller))
		{
			$this->page = new $this->controller($this);
		}
		else
		{
			$this->response->add('httpError', 'Invalid request');
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