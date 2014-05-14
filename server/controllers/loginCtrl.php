<?php

class LoginCtrl extends core\base\BaseCtrl
{
	protected function login()
	{
		$model = new core\auth\Login();

		$result = $model->loginUser($this->requestData);

		$this->response->add('loginResponse', $result);
	}

	protected function haveUser()
	{
		$model = new core\database\DbQuery();

		$result = $model->haveUser();

		$this->response->add('authUserResponse', $result);
	}
}