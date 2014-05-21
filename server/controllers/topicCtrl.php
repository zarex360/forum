<?php

class TopicCtrl extends core\Controller
{
	private $controllerRoutes = array(
		'getAll' => array(),
		'getTopicsByCategoryName' => array(
			'param1' => 'string'
		),
		'getTopic' => array(
			'param1' => array(
				'query' => array(
					'table' => 'categories',
					'row' => 'href'
				)
			),
			'param2' => 'int'
		)
	);

	protected function get()
	{	
		$result = false;
		$params = func_get_args();
		$model = new TopicModel();
		$validator = new core\Validator($this->controllerRoutes, $params);
		$methodName = $validator->get('methodName');

		if($validator->get('result'))
		{
			$result = $model->$methodName($params);
		}

		$this->response->add('topicResponse', $result);
	}
}