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

	public function createNewTopic($topic)
	{
			$catId = $topic['catId'];
			$q = "INSERT INTO topics SET title = :title, text = :text, auther = :auther";
			$r = array(
				'title' => $topic['title'],
				'text' => $topic['text'],
				'auther' => $topic['user']
			);
			$this->dbQuery($q, $r);
			$q = "SELECT id FROM topics ORDER BY created DESC LIMIT 1";
			$topicId = $this->dbQuery($q, 'fetch');
			$this->createTopicLink($catId, $topicId);
	}

	private function createTopicLink($catId, $topicId){
		$q = "INSERT INTO topics_x_category SET cid = :catId, tid = :topicId";
		$r = array(
			'catId' => $catId,
			'topicId' => $topicId['id']
		);
		$this->dbQuery($q, $r);
	}
}