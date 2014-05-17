<?php

class TopicCtrl extends core\Controller
{
	protected function get()
	{
		$params = func_get_args();
		$model = new TopicModel();
		$result = false;

		if(count($params) === 2 and is_string($params[0]) and is_int($params[1]))
		{
			$result = $model->getTopic($params[0], $params[1]);
		}
		else if(count($params) === 1 and is_string($params[0]))
		{
			$result = $model->getTopicsByName($params[0]);
		}
		else if(count($params) === 1  and is_int($params[0]))
		{
			$result = $model->getTopicById($params[0]);
		}
		else if(count($params) === 0)
		{
			$result = $model->getAll('topics');
		}

		$this->response->add('topicResponse', $result);
	}
}