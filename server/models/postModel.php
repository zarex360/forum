<?php

class PostModel extends core\database\DbQuery
{
	public function getAllPosts($data)
	{
		if($categoryId = $this->getCategoryId($data['categoryName']))
		{
			if($topic = $this->getTopicForPost($categoryId, $data['topicId']))
			{
				$posts = $this->getPostsXtopic($topic['id']);
				return array(
					'topic' => $topic,
					'posts' => $posts
				);
			}
		}
		return false;
	}

	private function getPostsXtopic($tid)
	{
		$q = "SELECT posts.* FROM posts 
			INNER JOIN posts_x_topic 
			ON posts.id = posts_x_topic.pid
			WHERE posts_x_topic.tid = :tid";

		$r = array('tid' => $tid);
		$result = $this->dbQuery($q, $r);
		return $result;
	}

	private function getTopicForPost($cid, $tid)
	{
		$q = "SELECT topics.* FROM topics
			INNER JOIN topics_x_category
			ON topics.id = topics_x_category.tid
			INNER JOIN category_menu
			ON category_menu.id = topics_x_category.cid
			WHERE category_menu.id = :cid 
			AND topics.id = :tid";

		$r = array('cid' => $cid, 'tid' => $tid);
		$result = $this->dbQuery($q, $r, 'fetch');
		return $result;
	}

	private function getCategoryId($href)
	{
		$q = "SELECT id FROM category_menu WHERE href = :href";
		$r = array('href' => $href);
		$result = $this->dbQuery($q, $r, 'fetch');
		return $result['id'];
	}
}