<?php

class TopicCtrl extends BaseCtrl
{
	protected function getTopicsXCategory()
	{
		$model = new TopicModel();

		$result = $model->getTopicsXCategory($this->requestData);

		$this->response->add('getTopicListResponse', $result);
	} 
}