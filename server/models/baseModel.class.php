<?php

class BaseModel
{
	protected $db;

	/**
	 * It contains methods for the system to handle sessions
	 * @var Object Session
	 */
	public $session;

	function __construct()
	{
		$db = new Db();
		$this->session = new SessionHandler();
		$this->db = $db->getConnection();
	}
}