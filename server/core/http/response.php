<?php

namespace core\http;

class Response
{
	private $content = array();
	private $format = FORMAT;
	
	public function add($key = 'No key', $value = 'No value')
	{
		$this->content[$key] = $value;
	}

	public function getResponse()
	{
		if(method_exists($this, $this->format) and !empty($this->content))
		{
			return call_user_func_array(array($this, $this->format), array());
		}
	}

	private function json()
	{
		header('Content-type: application/json; charset=utf8');
		$json = json_encode($this->content);
		return $json;
	}

	private function html()
	{
		header('Content-type: text/html; charset=utf8');
		$html = implode("\n", $this->content);
		return $html;
	}
}