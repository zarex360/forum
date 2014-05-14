<?php

class CommentModel extends core\base\BaseModel
{
	public function postComment($data)
	{
		$q = "INSERT INTO posts SET text = :text, auther = :auther";
		$r = array(
			'text' => $data['post'],
			'auther' => 'samuel' //$data['author']
		);
		$result = $this->dbQuery($q, $r);
		
		$q = "SELECT id FROM posts ORDER BY date DESC LIMIT 1";
		$postId = $this->dbQuery($q, 'fetch');
		$q = "INSERT INTO posts_x_topic SET pid = :pid, tid = :tid";
		$r = array(
			'pid' => $postId['id'],
			'tid' => $data['topicId']
		);
		$this->dbQuery($q, $r);
	}

}

?>