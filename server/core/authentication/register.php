<?php

namespace core\auth;

use core\database\DbQuery as DbQuery;

class Register extends DbQuery
{
	public function checkRegisterData($data)
	{
		$q = "SELECT username FROM user WHERE email = :email OR username = :username";
		$r = array(
			'email' => $data['email'],
			'username' => $data['username']
		);
		$result = $this->dbQuery($q, $r);

		if(isset($result['username']))
		{
			return false;
		}
		return true;
	}

	public function registerUser($data)
	{
		$q = "INSERT INTO user SET username = :username, email = :email, password = :password";
		$r = array(
			'username' => strtolower($data['username']),
			'email' => $data['email'],
			'password' => $data['password']
		);
		$this->dbQuery($q, $r);
	}
}