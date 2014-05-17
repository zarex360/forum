<?php

class MenuCtrl extends core\Controller
{
	protected function get()
	{
		$model = new MenuModel();
		$params = func_get_args();
		$result = false;

		if(isset($params[0]))
		{
			$result = $model->getMenu($params[0]);
		}

		$this->response->add('menuResponse', $result);
	}
}