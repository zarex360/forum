<?php

class CategoryCtrl extends core\Controller
{
	protected function get()
	{
		$params = func_get_args();
		$model = new CategoryModel();
		$result = false;

		if(count($params) === 0)
		{
			$result = $model->getAll('categories');
		}
		else if(is_int($params[0]))
		{
			$result = $model->getById($params[0]);
		}
		else if(is_string($params[0]))
		{
			$result = $model->getByName($params[0]);
		}

		$this->response->add('categoryResponse', $result);
	}
}