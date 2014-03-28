<?php

class TopicModel extends BaseModel
{
	public function getTopicsXCategory($categoryName)
	{
		$statement = $this->db->prepare(
			"SELECT topics.* FROM topics
			INNER JOIN topics_x_category ON topics.id = topics_x_category.tid
			WHERE topics_x_category.cid = :cid"
		);
		$statement->execute(array('cid' => 1));
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		var_dump($result);
	}
}