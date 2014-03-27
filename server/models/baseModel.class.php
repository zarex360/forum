<?php

class BaseModel
{
	protected $db;

	function __construct()
	{
		$db = new Db();
		$this->db = $db->getConnection();
	}
}