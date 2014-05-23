<?php

class MenuCtrl extends core\Controller
{
	private $controllerRoute = array(
		'getMenu' => array('main'),
	); 

	protected function get()
	{
		$result = false;
		$params = func_get_args();
		$validator = new core\Validator($this->controllerRoute, $params);

		if($validator->result)
		{
			$model = new MenuModel();
			$method = $validator->method;
			$result = $model->$method($params);
		}

		$this->response->add('menuResponse', $result);
	}
}