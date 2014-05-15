<?php

class LogoutCtrl extends core\Controller
{
	public function logout()
	{
		$model = new core\database\DbQuery();

		$result = $model->logout();

		$this->response->add('logoutResponse', $result);
	}
}