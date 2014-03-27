<?php

class HomeCtrl extends Basectrl
{
	protected function example1()
	{
		$model = new HomeModel();
		
		$result = $model->getHomePage('home');
		
		$this->response->add('example1', $result);
	}

	protected function example2()
	{
		$model = new HomeModel();
		
		$result = $model->getHomePage('home');

		
		// Make model for global content
		$globalContent = array(
			'title' => $result['name'],
			'id' => $result['id']
		);

		$tpl = $this->view->dressFull(
			'home', 
			$result, 
			$globalContent
		);


/*		$tpl = $this->view->dressOne(
			'home',
			$result
		);*/

		$this->response->add('example1', $tpl);
	}
}