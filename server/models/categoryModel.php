<?php

class CategoryModel extends core\database\DbQuery
{
	public function getAll()
	{
		return $this->getAllFrom('categories');
	}

	public function getById($params)
	{
		$id = $params[0];
		$q = "SELECT * FROM categories WHERE id = '" . $id . "'";
		return $this->dbQuery($q);
	}

	public function getByName($params)
	{
		$category = $params[0];
		$q = "SELECT * FROM categories WHERE href = '" . $category . "'";
		return $this->dbQuery($q);
	}
}