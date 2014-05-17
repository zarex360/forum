<?php

class CategoryModel extends core\database\DbQuery
{
	public function get($category)
	{
		if(is_numeric($category))
		{
			$q = "SELECT * FROM categories WHERE id = '" . $category . "'";
			$result = $this->dbQuery($q);
		}
		else if(is_string($category))
		{
			$q = "SELECT * FROM categories WHERE href = '" . $category . "'";
			$result = $this->dbQuery($q);
		}

		if(isset($result) and $result !== array())
		{
			return $result;
		}
		return false;
	}

	public function getAll()
	{
		$q = "SELECT * FROM categories";
		return $this->dbQuery($q);
	}
}