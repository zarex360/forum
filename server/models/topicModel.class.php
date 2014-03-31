<?php

class TopicModel extends BaseModel
{
	public function getTopicsXCategory($href)
	{
		$href = array_shift($href);
		if($cid = $this->getCategoryId($href))
		{
			$statement = $this->db->prepare(
				"SELECT topics.* FROM topics 
				INNER JOIN topics_x_category 
				ON topics.id = topics_x_category.tid
				WHERE topics_x_category.cid = :cid
				ORDER BY topics.created DESC"
			);
			$statement->execute(array('cid' => $cid));
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
		return false;
	}

	private function getCategoryId($href)
	{
		$query = "SELECT id FROM category_menu WHERE href = :href";
		$replacement = array('href' => $href);
		$result = $this->dbQuery($query, $replacement, 'fetch');
		return $result['id'];
	}
}