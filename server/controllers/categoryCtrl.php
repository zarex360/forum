<?php

class CategoryCtrl extends core\Controller
{
	private $controllerRoute = array(
		'getAll' => array(),
		'getById' => array('param1' => 'int'),
		'getByName' => array('param1' => 'string')
	);

	protected function get()
	{
		$result = false;
		$params = func_get_args();
		$validator = new core\Validator($this->controllerRoute, $params);

		if($validator->result)
		{
			$model = new CategoryModel();
			$method = $validator->method;
			$result = $model->$method($params);
		}

		$this->response->add('categoryResponse', $result);
	}
}