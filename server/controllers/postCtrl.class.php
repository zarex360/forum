<?php

class PostCtrl extends BaseCtrl
{
	protected function getAllPosts()
	{
		$model = new PostModel();

		$data = $this->getJsonInput();

		$result = $model->getAllPosts($data);

		$this->response->add('getAllPostsResponse', $result);
	}
}