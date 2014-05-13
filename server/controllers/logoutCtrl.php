<?php

class LogoutCtrl extends core\base\BaseCtrl
{
	public function logout()
	{
		$model = new core\auth\Auth();

		$result = $model->logout();

		$this->response->add('logoutResponse', $result);
	}
}