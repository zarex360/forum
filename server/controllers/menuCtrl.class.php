<?php


class MenuCtrl extends BaseCtrl
{
	protected function getMainMenu()
	{
		$model = new MenuModel();

		$result = $model->getMenu();

		$this->response->add('mainMenuResponse', $result);
	}
}