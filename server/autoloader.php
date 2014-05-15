<?php

class Autoloader 
{
	/**
	 * Directory path for map structure outside the core
	 */
	private $directories;


	/**
	 * @param string $name
	 * Logic about how the classes should be loaded
	 */
	public function load($name) 
	{
		$items = explode('\\', $name);
		
		if($items[0] === 'core') 
		{
			$this->loadCoreFile($items);
		}
		else
		{
			$this->loadOther($name);
		}
	}


	/**
	 * @param array $items
	 * Turns the array to a string with the requested path $items.
	 */
	private function loadCoreFile($items)
	{
		$filename = lcfirst(array_pop($items));
		$path = implode('/', $items);
		$path = $path . '/' . $filename . '.php';
		$this->includeFile($path);
	}


	/**
	 * @param string $name
	 * Makes a path from the $this->drirectories and sends it to includeFile.
	 */
	private function loadOther($name)
	{
		foreach($this->directories as $directoryPath)
		{
			$path = $directoryPath . '/' . $name . '.php';

			if($this->includeFile($path))
			{
				return;
			}
		}
	}


	/**
	 * Register the directories the autoloader should search through.
	 */
	public function registerDirectoryPaths($directories)
	{
		$this->directories = $directories;
	}


	/**
	 * Load the file if exists
	 * @return boolean
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