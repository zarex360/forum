<?php

class AdminModel extends core\database\DbQuery
{
	public function getConfigs()
	{
		return 'getConfigs';
	}

	public function add($params)
	{
		$type = $params[1];
		return $type;
	}

	public function remove($params)
	{
		$type = $params[1];
		return $type;
	}
}