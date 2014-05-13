<?php

class autoloader 
{
	public function load($path) 
	{
		$items = explode('\\', $path);
		
		if($items[0] === 'core') 
		{
			$this->loadCoreFile($items);
		}
		else if(strpos($items[0], 'Ctrl') !== false)
		{
			$this->loadOther($path, CONTROLLER_DIR);
		}
		else if(strpos($items[0], 'Model') !== false) 
		{
			$this->loadOther($path, MODEL_DIR);
		}
	}

	private function loadCoreFile($items)
	{
		$filename = lcfirst(array_pop($items));
		$path = implode('/', $items);
		$path = $path . '/' . $filename . '.php';
		$this->includeFile($path);
	}


	private function loadOther($name, $dirs)
	{
		$dirs = explode(',', $dirs);

		foreach($dirs as $dir)
		{
			$path = $dir . '/' . $name . '.php';
			if($this->includeFile($path))
			{
				return;
			}
		}
	}

	/**
	 * Load the file if exists
	 */
	private function includeFile($path)
	{
		if(file_exists($path))
		{
			include $path;
			return true;
		}
	}
}