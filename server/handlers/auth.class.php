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

		if(count($result) > 0 and $result !== false)
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
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		var_dump($result);
		exit();
		if(count($result) > 1)
		{
			//$this->session->set('user', $result);
			return $result['username'];
		}
	}
}