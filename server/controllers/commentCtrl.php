<?php

class CommentCtrl extends core\Controller
{
	protected function postComment()
	{
		$model = new CommentModel();

		$dbQuery = new core\database\DbQuery();

		if($dbQuery->haveUser())
		{
			$result = $model->postComment($this->requestData);

			$this->response->add('postCommentResponse', true);
		}
	} 
}