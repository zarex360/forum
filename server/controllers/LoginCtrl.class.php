<?php

class LoginCtrl extends BaseCtrl
{
	protected function login()
	{
		$model = new Auth();

		$result = $model->loginUser($this->requestData);

		$this->response->add('loginResponse', $result);
	}

	protected function checkUser()
	{
		$model = new Auth();

		$result = $model->checkUser();

		$this->response->add('authUserResponse', $result);
	}
}