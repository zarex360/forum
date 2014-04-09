<?php

class RegisterCtrl extends BaseCtrl
{
	protected function register()
	{
		$model = new Auth();

		if($model->checkRegisterData($this->requestData))
		{
			$model->registerUser($this->requestData);
			$this->response->add('registerResponse', true);
			return;
		}
		$this->response->add('registerResponse', false);
	}
}