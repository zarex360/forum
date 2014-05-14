<?php

class TopicModel extends core\database\DbQuery
{
	public function getTopicsXCategory($href)
	{
		$href = array_shift($href);
		if($cid = $this->getCategoryId($href))
		{
			$q = "SELECT topics.* FROM topics INNER JOIN topics_x_category ON topics.id = topics_x_category.tid WHERE topics_x_category.cid = :cid ORDER BY topics.created DESC";
			$r = array('cid' => $cid);
			return $this->dbQuery($q, $r);
		}
		return false;
	}

	private function getCategoryId($href)
	{
		$q = "SELECT id FROM category_menu WHERE href = :href";
		$r = array('href' => $href);
		$result = $this->dbQuery($q, $r, 'fetch');
		return $result['id'];
	}
}