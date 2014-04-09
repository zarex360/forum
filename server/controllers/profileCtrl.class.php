<?php

class ProfileCtrl extends BaseCtrl
{
	protected function editProfile()
	{
		$model = new ProfileModel();
		
		$auth = new Auth();

		if($auth->checkUser())
		{
			$result = $model->editProfile($this->requestData);
		}
		else
		{
			$result = false;
		}
		
		$result = $this->response->add('editProfileResponse', $result);
	}

}