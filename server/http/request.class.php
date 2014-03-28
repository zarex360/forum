<?php

class Request
{
	private $tokens = array();
	private $params = array();
	private $route;

	function __construct()
	{
		$this->setTokens();
		$this->setRoute();
	}

	private function setTokens()
	{
		$url = str_replace(BASE_PATH, '', $_SERVER['REQUEST_URI']);
		if($url !== '')
		{
			$this->tokens = explode('/', rtrim($url, '/'));
			return;
		}
	}

	private function setRoute()
	{
		if(count($this->tokens) >= 2)
		{
			$arr = array($this->tokens[0], $this->tokens[1]);
			$this->route = implode('/', $arr);
			$this->params = array_splice($this->tokens, 2);
		}
		else if(count($this->tokens) === 1)
		{
			$this->route = $this->tokens[0];
		}
		else
		{
			$this->route = 'defaultRoute';
		}
	}

	public function get($item)
	{
		if(isset($this->$item) && $this->$item !== '')
		{
			return $this->$item;
		}
	}
}