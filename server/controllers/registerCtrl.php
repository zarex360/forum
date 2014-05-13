<?php

class RegisterCtrl extends core\base\BaseCtrl
{
	protected function register()
	{
		$model = new core\auth\Auth();

		if($model->checkRegisterData($this->requestData))
		{
			$model->registerUser($this->requestData);
			$this->response->add('registerResponse', true);
			return;
		}
		$this->response->add('registerResponse', false);
	}
}