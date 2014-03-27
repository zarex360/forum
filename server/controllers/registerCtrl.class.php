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
			$this->resonse->add('registerResponse', true);
			return;
		}
		$this->resonse->add('registerResponse', false);
	}
}