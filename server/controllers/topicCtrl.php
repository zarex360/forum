<?php

class TopicCtrl extends core\Controller
{
	protected function getTopicsXCategory()
	{
		$model = new TopicModel();

		$result = $model->getTopicsXCategory($this->requestData);

		$this->response->add('getTopicListResponse', $result);
	}

	protected function createNewTopic()
	{
		$model = new TopicModel();

		$result = $model->createNewTopic($this->requestData);

		$this->response->add('createNewTopic', 'created');
	}
}