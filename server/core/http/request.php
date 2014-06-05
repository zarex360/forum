<?php

namespace core\http;

class Request
{
	private $tokens = array();
	private $data;

	/**
	 * Initalize functions that gets requested data.
	 */
	function __construct()
	{
		$this->setTokens();
		$this->setData();
	}

	/**
	 * Set Tokens
	 */
	private function setTokens()
	{
		$url = str_replace(BASE_PATH, '', $_SERVER['REQUEST_URI']);
		if($url !== '')
		{
			$this->tokens = explode('/', rtrim($url, '/'));
		}
	}

	/**
	 * Set data
	 */
	private function setData()
	{
		$json = file_get_contents('php://input');
    	$data = json_decode($json, true);
    	if($data !== null)
    	{
    		$this->data = $data;
    	}
    	else
    	{
    		$this->data = false;
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