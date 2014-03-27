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
}