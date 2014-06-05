<?php

class ProfileModel extends core\database\DbQuery
{

	public function checkPass($data){
		$q = "SELECT * FROM users WHERE username = :user AND password = :pass";
		$r = array(
				'user' => $_SESSION['user']['username'],
				'pass' => $data['oldPassword']
			);

		return $this->DbQuery($q, $r);
	}

	public function update($data){
		if(isset($data['email']) && isset($data['password'])){
			$str = "email = '" . $data['email'] . "', password = '" . $data['password'] . "'";
		}elseif(isset($data['email'])){
			$str = "email = '" . $data['email'] . "'";
		}else{
			$str = "password = '" . $data['password'] . "'";
		};

		$q = "UPDATE users SET " . $str . " WHERE username = :user" ;
		$r = array(
			'user' => $_SESSION['user']['username']
		);
		$this->DbQuery($q, $r);
		return true;
	}
}