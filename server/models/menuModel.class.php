<?php

class MenuModel extends BaseModel
{
	public function getMenu()
	{
		$role = $this->checkUserRole();
		return $this->getMenuFromDb($role);
	}

	private function getMenuFromDb($role)
	{
		if($role > 1)
		{
			$str = 'role <= ' . $role .' AND role != 0';
		}
		else
		{
			$str = 'role <= 1';
		}

		$statement = $this->db->prepare(
			"SELECT * FROM menu WHERE " . $str  
		);

		$statement->execute(array('role' => $role));
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	private function checkUserRole()
	{
		if($this->session->has('user'))
		{
			$user = $this->session->get('user');
			$statement = $this->db->prepare(
				"SELECT role FROM user WHERE username = :username and password = :password"
			);
			$statement->execute(array(
				'username' => $user['username'],
				'password' => $user['password']
			));
			$result = $statement->fetch(PDO::FETCH_ASSOC);
			return $result['role'];
		}
		return 1;
	}
}