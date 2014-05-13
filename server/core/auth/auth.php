<?php

namespace core\auth;

use core\base\BaseModel as BaseModel;

class Auth extends BaseModel
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

	public function loginUser($data)
	{
		$q = "SELECT * FROM user WHERE username = :username AND password = :password";
		$r = array(
			'username' => strtolower($data['username']),
			'password' => $data['password']
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

	public function checkUser()
	{
		if($user = $this->session->get('user'))
		{
			$q = "SELECT * FROM user WHERE username = :username AND password = :password";
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

	public function logout()
	{
		$this->session->destroy();
		return true;
	}
}