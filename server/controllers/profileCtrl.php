<?php

class ProfileCtrl extends core\controller\Controller
{
	public function edit(){
		$data = $this->requestData;

		$model = new ProfileModel();

		$result = $model->checkPass($data);
		$this->response->add('EditResponse', $result);
		if($result){
			$result = $model->update($data);
			$this->response->add('EditResponse', $result);
		}
		$this->response->add('EditResponse', $result);
	}
}