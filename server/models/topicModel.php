<?php

class TopicModel extends core\database\DbQuery
{
	public function getTopicsByCategoryName($params)
	{
		$category = $params[0];

		$cid = $this->getCategoryId($category);
		
		$q = "SELECT * FROM topics WHERE cid = :cid";

		$r = array('cid' => $cid);
		
		return $this->dbQuery($q, $r);	
	}

	private function getCategoryId($category)
	{
		$q = "SELECT id FROM categories WHERE href = '" . $category . "'";
		
		$result = $this->dbQuery($q, 'fetch');
		
		return $result['id'];
	}

	public function getAll()
	{
		return $this->getALlFrom('topics');
	}

	public function getTopic($params)
	{
		$category = $params[0];
		
		$tid = $params[1];

		$cid = $this->getCategoryId($category);
		
		$q = "SELECT * FROM topics WHERE cid = :cid AND id = :tid";
		
		$r = array('cid' => $cid, 'tid' => $tid);
		
		return $this->dbQuery($q, $r);
	}

	public function getComments($params)
	{
		$tid = $params[0];

		$q = "SELECT * FROM comments WHERE tid = :tid";

		$r = array('tid' => $tid);
		
		return $this->dbQuery($q, $r);
	}

	public function create($data)
	{
		if(isset($data['title']) && isset($data['text']) && isset($data['user']) && isset($data['catId']))
		{
			$q = "INSERT INTO topics SET title = :title, text = :text, author = :author, cid = :cid";

			$r = array(
				'title' => $data['title'],
				'text' => $data['text'],
				'author' => $data['user'],
				'cid' => $data['catId']
			);

			$this->dbQuery($q, $r);
			return true;
		}
		return false;
	}

	public function comment($data)
	{
		if(isset($data['post']) && isset($data['user']) && isset($data['topicId']))
		{
			$q = "INSERT INTO comments SET text = :text, author = :author, tid = :tid";

			$r = array(
				'text' => $data['post'],
				'author' => $data['user'],
				'tid' => $data['topicId']
			);

			$this->dbQuery($q, $r);
			return true;
		}
		return false;
	}
}