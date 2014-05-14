<?php

class CommentCtrl extends core\base\BaseCtrl
{
	protected function postComment()
	{
		$model = new CommentModel();

		$result = $model->postComment($this->requestData);

		$this->response->add('postCommentResponse', true);
	} 
}