 <?php

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

	public function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public function destroy()
	{
		if(isset($_SESSION))
		{
			$_SESSION = array();
			unset($_SESSION);
			session_destroy();
		}
	}

	public function undo($key)
	{
		if(isset($_SESSION[$key]))
		{
			unset($_SESSION[$key]);
		}
	}

	public function get($key ='') {
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