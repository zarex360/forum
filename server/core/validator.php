<?php

namespace core;

class Validator
{
	private $methodName = false;
	private $result = false;

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
					$this->methodName = $key;
					$this->result = $result;
				}
			}
			else if($route === array() && $requestParams === array())
			{
				$this->methodName = $key;
				$this->result = true;
			}
		}
	}

	private function getRouteParams($route)
	{
		foreach($route as $routeParam)
		{
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

				if($this->checkIfQueryResultMatch($queryResult, $requestParam, $value['row']))
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

	private function checkIfQueryResultMatch($queryResult, $requestParam, $optionValue)
	{
		foreach($queryResult as $result)
		{
			if($result[$optionValue] === $requestParam)
			{
				return true;
			}
		}
		return false;
	}

	private function getQueryResult($query)
	{
		$dbQuery = new database\DbQuery();

		$q = "SELECT " . $query['row']  . " FROM " . $query['table'];

		return $dbQuery->dbQuery($q);
	}

	public function get($item)
	{
		if(isset($this->$item))
		{
			return $this->$item;
		}
	}
}