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

	private $params = array();

	/**
	 * Tt includes the map from the route file
	 * Tt sets the right controller and method
	 * And set the params
	 * @var Object Request
	 */
	function __construct(Request $request)
	{
		$this->map = include 'config/route.inc.php';
		$route = $this->getRoute($request->get('tokens'));
		$this->setCtrlAndMethod($route);
	}

	private function getRoute($tokens)
	{
		$route = 'defaultRoute';
		$temporaryRoute = '';
		foreach($tokens as $token)
		{
			$temporaryRoute .= $token . '/';
			if($this->compareRouteToMap($temporaryRoute))
			{
				$route = $temporaryRoute;
				$this->setParams(array());
			}
			else
			{
				$this->setParams($token);
			}
		}
		return $this->map[rtrim($route, '/')];
	}

	private function compareRouteToMap($temporaryRoute)
	{
		$temporaryRoute = rtrim($temporaryRoute, '/');
		if(isset($this->map[$temporaryRoute]))
		{
			return true;
		}
		return false;
	}

	private function setParams($token = array())
	{
		if($token === array())
		{
			$this->params = array();
		}
		else
		{
			$this->params[] = $token;
		}
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