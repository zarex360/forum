 <?php

class Session
{
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
		$_SESSION = array();
		unset($_SESSION);
		session_destroy();
	}

	public function undo($key)
	{
		if(isset($_SESSION[$key]))
		{
			unset($_SESSION[$key]);
		}
	}

	public function get($key ='') {
		if(array_key_exists($key, $_SESSION)) {
		  return $_SESSION[$key];
		}
		return $_SESSION;
	}
}