<?php

class CategoryCtrl extends core\controller\Controller
{
	private $controllerRoute = array(
		'getAll' => array(),
		'getById' => array('int'),
		'getByName' => array('string')
	);

	protected function get()
	{
		$result = false;
		$params = func_get_args();
		$validator = new core\controller\Validator($this->controllerRoute, $params);

		if($validator->result)
		{
			$model = new CategoryModel();
			$method = $validator->method;
			$result = $model->$method($params);
		}

		$this->response->add('categoryResponse', $result);
	}
}