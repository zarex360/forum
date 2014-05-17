<?php

class MenuCtrl extends core\Controller
{
	private $param_1 = array(
		'main'
	); 

	protected function get()
	{
		$model = new MenuModel();
		$params = func_get_args();
		$result = false;

		if(in_array($params[0], $this->param_1))
		{
			$result = $model->getMenu($params[0]);
		}

		$this->response->add('menuResponse', $result);
	}
}