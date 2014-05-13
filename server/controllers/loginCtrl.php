<?php

class LoginCtrl extends core\base\BaseCtrl
{
	protected function login()
	{
		$model = new core\auth\Auth();

		$result = $model->loginUser($this->requestData);

		$this->response->add('loginResponse', $result);
	}

	protected function checkUser()
	{
		$model = new core\auth\Auth();

		$result = $model->checkUser();

		$this->response->add('authUserResponse', $result);
	}
}