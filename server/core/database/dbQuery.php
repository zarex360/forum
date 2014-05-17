<?php

namespace core\database;

use PDO as PDO;

/**
 * CLass to handle queries that are used more then one the site.
 */
class DbQuery extends DbHandler
{

	/**
	* @param string $q
	* @param array $r
	* @param string $f
	* @return array 
	* If there is data from the database it will be returned
	*/
	public function dbQuery($q, $r = array(), $f = 'fetchAll')
	{
		$args = func_get_args();
		
		if(is_string(end($args)) and count($args) === 2)
		{
			$f = $r;
			$r = array();
		}

		$statement = $this->connection->prepare($q);
		
		if(count($r) > 0)
		{
		 	$statement->execute($r);
		}
		else
		{
		 	$statement->execute();
		}

		if(strpos($q, 'SELECT') !== false)
		{
		 	return $statement->$f(PDO::FETCH_ASSOC);
		}
	}


	/**
	 * Check if there is an user logged in
	 * @return mixed
	 * If there is an user logged in it will return the username.
	 * If false it will return flase.
	 */
	public function haveUser()
	{
		if($user = $this->session->get('user'))
		{
			$q = "SELECT * FROM users WHERE username = :username AND password = :password";
			$r = array(
				'username' => $user['username'], 
				'password' => $user['password']
			);
			$result = $this->dbQuery($q, $r, 'fetch');
			
			if(isset($result['username']))
			{
				return $user['username'];
			}
		}
		$this->session->destroy();
		return false;
	}


	/**
	 * Logout user and destry all sessions.
	 * @return boolean
	 */
	public function logout()
	{
		$this->session->destroy();
		return true;
	}

	public function getAllFrom($table)
	{
		$q = "SELECT * FROM " . $table;
		$result =  $this->dbQuery($q);
		
		if(isset($result) and $result !== array()) {
			return $result;
		}
		return $result;
	}
}