<?php

class TopicModel extends BaseModel
{
	public function getTopicsXCategory($href)
	{
		if($id = $this->getCategoryId($href))
		{
			$statement = $this->db->prepare(
				"SELECT topics.* FROM topics
				INNER JOIN topics_x_category ON topics.id = topics_x_category.tid
				WHERE topics_x_category.cid = :cid"
			);
			$statement->execute(array('cid' => $id));
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
		return false;
	}

	private function getCategoryId($href)
	{
		$statement = $this->db->prepare(
			"SELECT id FROM category_menu WHERE href = :href"
		);
		$statement->execute(array('href' => $href));
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		return $result['id'];
	}
}