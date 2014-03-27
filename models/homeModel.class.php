<?php

class HomeModel extends BaseModel
{
	public function getHomePage($pageName)
	{
		$statement = $this->db->prepare("SELECT * FROM pages WHERE name = :pageName");
		$statement->execute(array('pageName' => $pageName));
		$result = $statement->fetch(PDO::FETCH_ASSOC);
		return $result;
	}
}