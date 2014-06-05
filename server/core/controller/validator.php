<?php

namespace core\controller;

use core\database\DbQuery as DbQuery; 

class Validator
{
	public $method = false;
	public $result = false;

	function __construct($controllerRoutes = array(), $requestParams = array())
	{
		foreach($controllerRoutes as $key => $route)
		{	
			if(count($route) === count($requestParams) && count($requestParams) > 0)
			{
				$routeParams = $this->getRouteParams($route);

				$result = $this->compareEachParam($routeParams, $requestParams);
				
				if($result === true)
				{
					$this->method = $key;
					$this->result = $result;
				}
			}
			else if($route === array() && $requestParams === array())
			{
				$this->method = $key;
				$this->result = true;
			}
		}
	}

	private function getRouteParams($route)
	{
		foreach($route as $key => $routeParam)
		{	
			if($key === 'query')
			{
				$query[$key] = $routeParam;
				$routeParams[] = $query;
				break;
			}
			$routeParams[] = $routeParam;
		}
		return $routeParams;
	}

	private function compareEachParam(array $routeParams, array $requestParams)
	{
		for($i = 0; $i < count($routeParams); $i++)
		{
			if(is_array($routeParams[$i]))
			{
				if($this->compareArray($routeParams[$i], $requestParams[$i]) === false)
				{
					return false;
				}	
			}
			else
			{
				if($this->compareString($routeParams[$i], $requestParams[$i]) === false)
				{
					return false;
				}
			}
		}
		return true;
	}

	private function compareArray(array $routeParamOptions, $requestParam)
	{
		foreach($routeParamOptions as $option => $value)
		{
			if($option === 'query')
			{
				$queryResult = $this->getQueryResult($value);

				if($this->checkIfQueryResultMatch($queryResult, $requestParam))
				{
					return true;
				}				
			}
			else
			{
			 	if($this->compareString($value, $requestParam))
			 	{
			 		return true;
			 	}
			}
		}		
		return false;
	}

	private function compareString($stringOne, $stringTwo) 
	{
		if($stringOne === 'string' && is_string($stringTwo))
		{
			return true;
		}
		else if($stringOne === 'int' && is_int($stringTwo)) 
		{
			return true;
		}
		else if($stringOne === $stringTwo)
		{
			return true;
		}
		return false;
	}

	private function checkIfQueryResultMatch($queryResult, $requestParam)
	{
		if(is_array($queryResult))
		{
			foreach($queryResult as $result)
			{
				$result = array_values($result);
				if($result[0] == $requestParam)
				{
					return true;
				}
			}
		}
		return false;
	}

	private function getQueryResult($query)
	{
		$dbQuery = new DbQuery();

		$q = "SELECT " . $query[1]  . " FROM " . $query[0];

		$result = $dbQuery->dbQuery($q);
		
		return $result;
	}
}