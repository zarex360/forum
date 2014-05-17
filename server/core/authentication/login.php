<?php 

namespace core\authentication;

use core\database\DbQuery as DbQuery;

class Login extends DbQuery
{
	/**
	 * Login user
	 * @param  Array $user
	 * @return Mixed
	 */
	public function loginUser($user)
	{
		$q = "SELECT * FROM user WHERE username = :username AND password = :password";
		$r = array(
			'username' => strtolower($user['username']),
			'password' => $user['password']
		);
		$result = $this->dbQuery($q, $r, 'fetch');

		if(isset($result['username']) && isset($result['password']))
		{
			$this->session->set('user', $result);
			return $result['username'];
		}
		$this->session->destroy();
		return false;
	}
}