<?php

class CategoryModel extends core\database\DbQuery
{
	public function getAll($categories)
	{
		return $this->getAllFrom($categories);
	}

	public function getById($category)
	{
		if(is_int($category))
		{
			$q = "SELECT * FROM categories WHERE id = '" . $category . "'";
			return $this->dbQuery($q);
		}
		return false;
	}

	public function getByName($category)
	{
		if(is_string($category))
		{
			$q = "SELECT * FROM categories WHERE href = '" . $category . "'";
			return $this->dbQuery($q);
		}
		return false;
	}
}