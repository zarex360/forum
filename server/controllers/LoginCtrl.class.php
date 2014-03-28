<?php

class LoginCtrl extends BaseCtrl
{
	protected function login()
	{
		$model = new Auth();

		$data = $this->getJsonInput();

		$result = $model->loginUser($data);

		$this->response->add('loginResponse', $result);
	}

	protected function checkUser()
	{
		$model = new Auth();

		$result = $model->checkUser();

		$this->response->add('authUserResponse', $result);
	}
}