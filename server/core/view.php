<?php

namespace core;

class View
{
	/**
	 * @param string
	 * @param array
	 * First param should be the name of the template you wanna use,
	 * And the second should be an array with data(key => value)
	 */
	public function dressTemplate($tplName, array $data)
	{
		if($data !== array() || !is_string($tplName))
		{
			extract($data);
			ob_start();
			require '../templates/' . $tplName . '.tpl.php';
			$html = ob_get_clean();
			return $html;	
		}
		return '<span>Invalid template name or empty data</span>';
	}
}