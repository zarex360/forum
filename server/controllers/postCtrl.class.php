<?php

class PostCtrl extends BaseCtrl
{
	protected function getAllPosts()
	{
		$model = new PostModel();

		$result = $model->getAllPosts($this->requestData);

		$this->response->add('getAllPostsResponse', $result);
	}
}