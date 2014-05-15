<?php

class ProfileCtrl extends core\Controller
{
	protected function editProfile()
	{
		$model = new ProfileModel();
		
		$auth = new core\database\DbQuery();

		if($auth->haveUser())
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