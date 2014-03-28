<?php

class ProfileModel extends BaseModel
{
	public function editProfile($data)
	{
		$oldPassword = array_pop($data);
		if($userId = $this->getIdWithPassword($oldPassword))
		{
			foreach($data as $key => $value)
			{
				$this->updateDb($key, $value, $userId);
			}
			return true;
		}
		return false;
	}

	private function updateDb($key, $value, $userId)
	{
		$statement = $this->db->prepare(
			"UPDATE user SET " . $key . " = :value WHERE id = :id"
		);
		$statement->execute(array(
			'value' => $value,
			'id' => $userId
		));
	}

	private function getIdWithPassword($pw)
	{
		$user = $this->session->get('user');
		$user['password'] = $pw;
		$statement = $this->db->prepare(
			"SELECT id FROM user WHERE username = :username AND password = :password"
		);
		$statement->execute(array(
			'username' => $user['username'],
			'password' => $user['password']
		));
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		if(isset($result['id']))
		{
			return $result['id'];
		}
		return false;
	}
}