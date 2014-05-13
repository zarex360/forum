<?php

class PostCtrl extends core\base\BaseCtrl
{
	protected function getAllPosts()
	{
		$model = new PostModel();

		$result = $model->getAllPosts($this->requestData);

		$this->response->add('getAllPostsResponse', $result);
	}
}