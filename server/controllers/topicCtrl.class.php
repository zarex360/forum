<?php

class TopicCtrl extends BaseCtrl
{
	protected function getTopicsXCategory()
	{
		$model = new TopicModel();

		$data = $this->getJsonInput();

		$model->getTopicsXCategory($data);
	} 
}