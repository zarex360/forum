<?php

class Request
{
	private $tokens = array();

	function __construct()
	{
		$this->setTokens();
	}

	private function setTokens()
	{
		$url = str_replace(BASE_PATH, '', $_SERVER['REQUEST_URI']);
		if($url !== '')
		{
			$this->tokens = explode('/', rtrim($url, '/'));
		}
	}

	public function get($item)
	{
		if(isset($this->$item))
		{
			return $this->$item;
		}
	}
}