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
		$method = $validator->get('method');

		if($validator->get('result'))
		{
			$result = $model->$method($params);
		}

		$this->response->add('topicResponse', $result);
	}
}