<?php

class RegisterCtrl extends BaseCtrl
{
	protected function register()
	{
		$model = new Auth();

		$data = $this->getJsonInput();

		$status = $model->checkRegisterData($data);
	}
}