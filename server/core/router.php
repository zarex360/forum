<?php

namespace core;

use core\http\Request as Request;
use Exception as Exception;

class Router
{
	/**
	 * Site map gets it value from routes
	 * @var Array $map
	 */
	private $map;


	/**
	 * Tokens from the url sent by request.
	 */
	private $tokens;


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
	 * @var array
	 */
	private $params;


	/**
	 * Tt sets the right controller and method
	 * And set the params
	 * @var Object Request
	 */
	function __construct(Request $request)
	{
		$this->params = array();
		$this->tokens = $request->get('tokens');
	}


	public function registerRouteMap($map)
	{
		$this->map = $map;
		$route = $this->getRoute($this->tokens);
		if($route !== 'noRoute')
		{
			$this->setCtrlAndMethod($route);
			$this->checkIfInt($this->params);
		}
		else
		{
			throw new Exception('Invalid Route!');
		}
	}

	/**
	 * @param array
	 * @return string
	 * Returns the right controller and method
	 * Controller@Method
	 */
	private function getRoute($tokens)
	{
		$route = 'noRoute';
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

		if(isset($this->map[rtrim($route, '/')]))
		{
			return $this->map[rtrim($route, '/')];
		}
		return $route;
	}

	/**
	 * It returns true if there is a route in the mapping
	 * @param string
	 * @return boolean
	 */
	private function compareRouteToMap($temporaryRoute)
	{
		$temporaryRoute = rtrim($temporaryRoute, '/');
		if(isset($this->map[$temporaryRoute]))
		{
			return true;
		}
		return false;
	}

	/**
	 * @param array
	 */
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

	private function convertParamToInt($paramString)
	{
		$characters = str_split($paramString);
		foreach($characters as $character)
		{
			if(!is_numeric($character))
			{
				return $paramString;
			}
		}
		return (int)$paramString;
	}

	private function checkIfInt($params)
	{
		$newParams = array();
		foreach ($params as $param) 
		{
			$param = $this->convertParamToInt($param);
			$newParams[] = $param;
		}
		$this->params = $newParams;
	}
}