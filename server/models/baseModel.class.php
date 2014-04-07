<?php

class BaseModel
{
	protected $db;
	protected $session;
	private $dbClass;

	function __construct()
	{
		$this->session = new Session();
		$this->dbClass = new Db();
		$this->db = $this->dbClass->getConnection();
	}

	protected function dbQuery($q, $r = array(), $f = 'fetchAll')
	{
		$args = func_get_args();
		if(is_string(end($args)) and count($args) === 2)
		{
			$f = $r;
			$r = array();
		}
		return $this->dbClass->dbQuery($q, $r, $f);
	}
}