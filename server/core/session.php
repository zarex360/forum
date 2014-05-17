<?php

namespace core;

class Session
{
	/**
	 * Returns true if there is a session[$key]
	 * @param string
	 * @return boolean 
	 */
	public function has($key = '')
	{
		if(isset($_SESSION))
			return array_key_exists($key, $_SESSION);
		return false;
	}

	/**
	 * @param string $key
	 * @param string $value
	 */
	public function set($key, $value)
	{
		if(isset($key) and isset($value))
		{
			$_SESSION[$key] = $value;
		}
	}

	/**
	 * Session destroy!
	 */
	public function destroy()
	{
		if(isset($_SESSION))
		{
			$_SESSION = array();
			unset($_SESSION);
			session_destroy();
		}
	}

	/**
	 * Unset a session with $key
	 * @param string
	 */
	public function undo($key)
	{
		if(isset($_SESSION[$key]))
		{
			unset($_SESSION[$key]);
		}
	}

	/**
	 * Trying to fins a session with $key and returns it if true 
	 * @var string
	 * @return array
	 */
	public function get($key ='') 
	{
		if(isset($_SESSION))
		{
			if(array_key_exists($key, $_SESSION)) 
			{
			  return $_SESSION[$key];
			}
			return $_SESSION;
		}
	}
}