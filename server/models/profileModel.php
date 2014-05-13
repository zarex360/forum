<?php

class ProfileModel extends core\base\BaseModel
{
	public function editProfile($data)
	{
		$oldPassword = array_pop($data);
		if($userId = $this->getIdWithPassword($oldPassword))
		{
			foreach($data as $key => $value)
			{
				$this->updateDb($key, $value, $userId);
				$_SESSION['user'][$key] = $value;
			}
			return true;
		}
		return false;
	}

	private function updateDb($key, $value, $userId)
	{
		$q = "UPDATE user SET " . $key . " = :value WHERE id = :id";
		$r = array(
			'value' => $value,
			'id' => $userId
		);
		$this->dbQuery($q, $r);
	}

	private function getIdWithPassword($pw)
	{
		$user = $this->session->get('user');
		$user['password'] = $pw;
		$q = "SELECT id FROM user WHERE username = :username AND password = :password";
		$r = array(
			'username' => $user['username'],
			'password' => $user['password']
		);
		$result = $this->dbQuery($q, $r, 'fetch');
		if(isset($result['id']))
		{
			return $result['id'];
		}
		return false;
	}
}