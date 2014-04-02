<?php

class Router
{
	/**
	 * The map get included from the route file
	 * @var Array $map
	 */
	private $map;

	/**
	 * I set the right controller so the app class can use it
	 * @var String Controller
	 */
	private $controller;
	
	/**
	 * So the controller can initalize the right method
	 * @var String method
	 */
	private $method;


	/**
	 * Tt includes the map from the route file
	 * Tt sets the right controller and method
	 * And set the params
	 * @var Object Request
	 */
	function __construct(Request $request)
	{
		$this->map = include 'config/route.inc.php';
		$this->setCtrlAndMethod($this->compareRoute($request->get('route')));
		$this->params = $request->get('params');
	}

	/**
	 * It compares the route to the map
	 * and returns a string with ctrl and method
	 * @param String
	 * @return string
	 */
	private function compareRoute($route)
	{
		if(isset($this->map[$route]))
		{
			return $this->map[$route];
		}
		return $this->map['defaultRoute'];
	}

	/**
	 * $route = controller@method
	 * @var string 
	 */
	private function setCtrlAndMethod($route)
	{
		$arr = explode('@', $route);
		$this->controller = $arr[0];
		$this->method = $arr[1];
	}

	/**
	 * Its a get function that returns the requested item
	 * example: $item = 'method', will return if set $this->method
	 * @param string
	 * @return variable
	 */
	public function get($item)
	{
		if(isset($this->$item))
		{
			return $this->$item;
		}
	}
}