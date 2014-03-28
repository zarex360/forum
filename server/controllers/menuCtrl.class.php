<?php


class MenuCtrl extends BaseCtrl
{
	protected function getMainMenu()
	{
		$model = new MenuModel();

		$result = $model->getMainMenu();

		$this->response->add('mainMenuResponse', $result);
	}

	protected function getCatergoryMenu()
	{
		$model = new MenuModel();

		$result = $model->getCatergoryMenu();

		$this->response->add('categoryMenuResponse', $result);
	}
}