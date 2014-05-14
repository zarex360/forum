<?php 

namespace core\database;

use core\sessions\Session as Session; 
use PDO as PDO;

class DbHandler
{
	private $host;
	private $db;
	private $user;
	private $pass;

	protected $session;
	protected $connection;

	function __construct()
	{
		$this->host = DB_HOST;
		$this->db = DB_DB;
		$this->user = DB_USER;
		$this->pass = DB_PASS;

		$this->session = new Session();
		$this->connection = $this->getConnection();
	}

	private function getConnection()
	{
		if(isset($this->connection))
		{
		  return $this->connection;
		}

		$conString = "mysql:host=" . $this->host . ";dbname=" . $this->db;

		try
		{
			$db = new PDO($conString, $this->user, $this->pass);

			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$db->exec("SET CHARACTER SET utf8");

		}
		catch(PDOException $e) 
		{
			echo $e->getMessage();
			exit();
		}

		$this->connection = $db;
		return $this->connection;
	}
}