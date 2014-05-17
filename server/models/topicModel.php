<?php

class TopicModel extends core\database\DbQuery
{
	public function getTopicsByName($category)
	{
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

	public function getAll($topics)
	{
		return $this->getALlFrom($topics);
	}

	public function getTopic($category, $tid)
	{
		$cid = $this->getCategoryId($category);
		
		$q = "SELECT * FROM topics WHERE cid = :cid AND id = :tid";
		
		$r = array('cid' => $cid, 'tid' => $tid);
		
		return $this->dbQuery($q, $r);
	}
}