<?php

class ProfileCtrl extends BaseCtrl
{
	protected function editProfile()
	{
		$model = new ProfileModel();
		
		$auth = new Auth();

		$data = $this->getJsonInput();

		if($auth->checkUser())
		{
			$result = $model->editProfile($data);
		}
		else
		{
			$result = false;
		}
		
		$result = $this->response->add('editProfileResponse', $result);
	}

}