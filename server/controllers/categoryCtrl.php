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
			$result = $model->getAll();
		}
		else if(count($params) === 1)
		{
			$result = $model->get($params[0]);
		}

		$this->response->add('categoryResponse', $result);
	}
}