<?php

class Auth extends BaseModel
{
	public function checkRegisterData($data)
	{
		$statement = $this->db->prepare(
			"SELECT username FROM user WHERE email = :email OR username = :username"
		);
		$statement->execute(array(
			'email' => $data['email'],
			'username' => $data['username']
		));
		$result = $statement->fetch(PDO::FETCH_ASSOC);

		if(isset($result['username']))
		{
			return false;
		}
		return true;
	}

	public function registerUser($data)
	{
		$statement = $this->db->prepare(
			"INSERT INTO user 
			SET 
			username = :username, 
			email = :email, 
			password = :password"
		);
		$statement->execute(array(
			'username' => $data['username'],
			'email' => $data['email'],
			'password' => $data['password']
		));
	}

	public function loginUser($data)
	{
		$statement = $this->db->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
		$statement->execute(array('username' => $data['username'], 'password' => $data['password']));
		$result = $statement->fetch(PDO::FETCH_ASSOC);
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
			$statement = $this->db->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
			$statement->execute(array('username' => $user['username'], 'password' => $user['password']));
			$result = $statement->fetch(PDO::FETCH_ASSOC);
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

/*
$_SESSION['user']['username'] = 'test';
$_SESSION['user']['password'] = 'test';
$this->session->destroy();
*/