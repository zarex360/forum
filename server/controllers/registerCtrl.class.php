<?php

class RegisterCtrl extends BaseCtrl
{
	protected function register()
	{
		$model = new Auth();

		$data = $this->getJsonInput();

		if($model->checkRegisterData($data))
		{
			$model->registerUser($data);
			$this->response->add('registerResponse', true);
			return;
		}
		$this->response->add('registerResponse', false);
	}
}