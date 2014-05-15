<?php

class RegisterCtrl extends core\Controller
{
	protected function register()
	{
		$model = new core\auth\Register();

		if($model->checkRegisterData($this->requestData))
		{
			$model->registerUser($this->requestData);
			$this->response->add('registerResponse', true);
			return;
		}
		$this->response->add('registerResponse', false);
	}
}