<?php

class adminCtrl extends core\controller\Controller
{
	private $controllerRoute = array(
		'getConfigs' => array('param1' => array('category', 'topic')),

		'add' => array(
			'param1' => 'add',
			'param2' => array(
				'category',
				'topic'
			)
		),
		'remove' => array(
			'param1' => 'remove', 
			'param2' => array(
				'category',
				'topic'
			)
		)
	);

	protected function configurations()
	{
		$result = false;
		$params = $this->router->get('params');
		$validator = new core\controller\Validator($this->controllerRoute, $params);

		if($validator->result)
		{
			$method = $validator->method;
			$model = new AdminModel();
			$result = $model->$method($params);
		}

		$this->response->add('adminResponse', $result);
	}
}