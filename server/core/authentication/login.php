<?php 

namespace core\auth;

use core\database\DbQuery as DbQuery;

class Login extends DbQuery
{
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