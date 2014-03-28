<?php


class MenuCtrl extends BaseCtrl
{
	protected function getMenu()
	{
		$model = new MenuModel();

		$result = $model->getMenu();

		$this->response->add('menuResponse', $result);
	}
}