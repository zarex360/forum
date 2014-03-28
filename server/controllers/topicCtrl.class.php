<?php

class TopicCtrl extends BaseCtrl
{
	protected function getTopicsXCategory()
	{
		$model = new TopicModel();

		$data = $this->getJsonInput();

		$result = $model->getTopicsXCategory($data);

		$this->response->add('getTopicListResponse', $result);
	} 
}