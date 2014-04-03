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
		return $this->dbClass->dbQuery($q, $r, $f);
	}
}