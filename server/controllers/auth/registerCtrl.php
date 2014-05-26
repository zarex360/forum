<?php

class RegisterCtrl extends core\controller\Controller
{
	protected function register()
	{
		$auth = new core\authentication\Register();

		$result = $auth->registerUser($this->requestData);

		$this->response->add('registerResponse', $result);
	}
}