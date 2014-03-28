<?php

class LogoutCtrl extends BaseCtrl
{
	public function logout()
	{
		$model = new Auth();

		$result = $model->logout();

		$this->response->add('logoutResponse', $result);
	}
}