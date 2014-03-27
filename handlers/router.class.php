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
	 * 
	 * @var Object Request
	 */
	function __construct(Request $request)
	{
		$this->map = include 'config/route.inc.php';
		$this->setCtrlAndMethod($this->compareRoute($request->get('route')));
		$this->params = $request->get('params');
	}

	private function compareRoute($route)
	{
		if(isset($this->map[$route]))
		{
			return $this->map[$route];
		}
		return $this->map['defaultRoute'];
	}

	private function setCtrlAndMethod($route)
	{
		$arr = explode('@', $route);
		$this->controller = $arr[0];
		$this->method = $arr[1];
	}

	public function get($item)
	{
		if(isset($this->$item))
		{
			return $this->$item;
		}
	}
}