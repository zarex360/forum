<?php

class MenuModel extends core\base\BaseModel
{
	public function getMainMenu()
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

		$q = "SELECT * FROM main_menu WHERE " . $str;
		return $this->dbQuery($q);
	}

	private function checkUserRole()
	{
		if($user = $this->session->get('user'))
		{
			$q = "SELECT role FROM user WHERE username = :username and password = :password";
			$r = array(
				'username' => $user['username'],
				'password' => $user['password']
			);
			$result = $this->dbQuery($q, $r, 'fetch');
			return $result['role'];
		}
		return 1;
	}

	public function getCatergoryMenu()
	{
		$q = "SELECT * FROM category_menu";
		return $this->dbQuery($q); 
	}
}