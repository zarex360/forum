<?php

class TopicCtrl extends core\base\BaseCtrl
{
	protected function getTopicsXCategory()
	{
		$model = new TopicModel();

		$result = $model->getTopicsXCategory($this->requestData);

		$this->response->add('getTopicListResponse', $result);
	} 
}