<?php

class CommentModel extends core\database\DbQuery
{
	public function postComment($data)
	{
		//Insert the latest comment to the posts
		$q = "INSERT INTO posts SET text = :text, auther = :auther";
		$r = array(
			'text' => $data['post'],
			'auther' => 'samuel' //$data['author']
		);
		$result = $this->dbQuery($q, $r);

		//Get the lastes comment id and insert it to posts_x_topic
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