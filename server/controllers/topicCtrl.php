<?php

class TopicCtrl extends core\controller\Controller
{
	private $controllerRoutes = array(
		'getAll' => array(),
		'getTopicsByCategoryName' => array(
			'query' => array('categories', 'href'),
		),
		'getTopic' => array(
			'param1' => array('query' => array('categories', 'href')),
			'param2' => array('query' => array('topics', 'id'))
		),
		'getComments' => array(
			'param1' => array('query' => array('comments', 'tid'))
		),
	);

	protected function get()
	{	
		$result = false;
		$params = func_get_args();
		$validator = new core\controller\Validator($this->controllerRoutes, $params);

		if($validator->result)
		{
			$model = new TopicModel();
			$method = $validator->method;
			$result = $model->$method($params);
		}

		$this->response->add('topicResponse', $result);
	}

	protected function create()
	{
		$result = false;
		$data = $this->requestData;
		$model = new TopicModel();
		$result = $model->create($data);
		$this->response->add('crateResponse', $result);
	}

	protected function comment()
	{
		$result = false;
		$data = $this->requestData;
		$model = new TopicModel();
		$result = $model->comment($data);
		$this->response->add('commentResponse', $result);
	}
}