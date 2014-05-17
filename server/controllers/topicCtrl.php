<?php

class TopicCtrl extends core\Controller
{
	protected function get()
	{
		$params = func_get_args();
		$model = new TopicModel();
		$result = false;

		if(isset($params[0]) and is_string($params[0]))
		{
			$result = $model->getTopicsByName($params[0]);
		}
		else if(isset($params[0]) and is_int($params[0]))
		{
			$result = $model->getTopicById($params[0]);
		}

		$this->response->add('topicResponse', $result);
	}
}