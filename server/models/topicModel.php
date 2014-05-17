<?php

class TopicModel extends core\database\DbQuery
{
	public function getTopicsByName($category)
	{
		$cid = $this->getCategoryId($category);
		
		$q = "SELECT * FROM topics WHERE cid = :cid";
		$r = array('cid' => $cid);
		$result = $this->dbQuery($q, $r);

		if(count($result) > 0) 
		{
			return $result;
		}
		return false;		
	}

	private function getCategoryId($category)
	{
		$q = "SELECT id FROM categories WHERE href = '" . $category . "'";
		$result = $this->dbQuery($q, 'fetch');

		if(count($result) > 0) 
		{
			return $result['id'];
		}
		return false;
	}

	public function getTopicById($id)
	{
		$q = "SELECT * FROM topics WHERE id = " . $id;
		$result = $this->dbQuery($q);

		if(count($result) > 0) 
		{
			return $result;
		}
		return false;
	}

	public function getAll($topics)
	{
		return $this->getALlFrom($topics);
	}
}