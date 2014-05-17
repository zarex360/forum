<?php

class MenuModel extends core\database\DbQuery
{
	public function getMenu($menu)
	{
		$role = $this->getRole();
		return $this->getMenuFromDb($role, $menu);
	}

	private function getMenuFromDb($role, $menu)
	{
		if($role > 1)
		{
			$str = "role <= '" . $role ."' AND role != 0 AND type = '" . $menu . "'";
		}
		else
		{
			$str = "role <= 1 AND type = '" . $menu . "'";
		}
		$q = "SELECT * FROM menus WHERE " . $str;
		return $this->dbQuery($q);
	}

	private function getRole()
	{
		if($user = $this->session->get('user'))
		{
			$q = "SELECT role FROM users WHERE username = :username and password = :password";
			$r = array(
				'username' => $user['username'],
				'password' => $user['password']
			);
			$result = $this->dbQuery($q, $r, 'fetch');
			return $result['role'];
		}
		return 1;
	}
}