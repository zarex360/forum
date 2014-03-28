<?php

class BaseModel
{
	protected $db;
	protected $session;

	function __construct()
	{
		$this->session = new Session();
		$db = new Db();
		$this->db = $db->getConnection();
	}
}