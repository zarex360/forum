<?php

class LoginCtrl extends BaseCtrl
{
	protected function login()
	{
		$model = new Auth();

		//$data = $this->getJsonInput();
		$data = array('username' => 'johan', 'password' => 'asdasd');
		$result = $model->loginUser($data);
	}
}