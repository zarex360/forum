<?php

namespace core\http;

class Request
{
	private $tokens = array();
	private $requestData;

	function __construct()
	{
		$this->setTokens();
		$this->setData();
	}

	private function setTokens()
	{
		$url = str_replace(BASE_PATH, '', $_SERVER['REQUEST_URI']);
		if($url !== '')
		{
			$this->tokens = explode('/', rtrim($url, '/'));
		}
	}

	private function setData()
	{
		$json = file_get_contents('php://input');
    	$data = json_decode($json, true);
    	if($data !== null)
    	{
    		$this->requestData = $data;
    	}
    	else
    	{
    		$this->requestData = false;
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