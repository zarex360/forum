<?php

class PostModel extends BaseModel
{
	public function getAllPosts($data)
	{
		if($categoryId = $this->getCategoryId($data['categoryName']))
		{
			if($topic = $this->getTopic($categoryId, $data['topicId']))
			{
				return $topic;
			}
		}
	}

	private function getTopic($cid, $tid)
	{
		$statement = $this->db->prepare(
			"SELECT * FROM topics
			INNER JOIN topics_x_category
			ON topics.id = topics_x_category.tid
			INNER JOIN category_menu
			ON category_menu.id = topics_x_category.cid
			WHERE category_menu.id = :cid 
			AND topics.id = :tid"
		);
		$statement->execute(array('cid' => $cid, 'tid' => $tid));
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;
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