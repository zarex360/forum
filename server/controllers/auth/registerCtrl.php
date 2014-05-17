<?php

class RegisterCtrl extends core\Controller
{
	protected function register()
	{
		$auth = new core\authentication\Register();

		$result = $auth->registerUser($this->requestData);

		$this->response->add('registerResponse', $result);
	}
}