 <?php
/**
 * METHODS:
 * session
 * ->has($key);
 * ->set($key, $value);
 * ->destroy();
 * ->undo($key);
 * ->get($key);
 */
class Session
{
	/**
	 * Checks if there is a session with requested params
	 * @param String $key
	 */
	public function has($key = '')
	{
		return array_key_exists($key, $_SESSION);
	}

	/**
	 * @param String $key
	 * @param String @value
	 * It sets a session with $key as $value
 	 */
	public function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	/**
	 * It kills all the sessions
	 */
	public function destroy()
	{
		$_SESSION = array();
		unset($_SESSION);
		session_destroy();
	}

	/**
	 * It unsets on specifik session with name $key
	 * @param String $key
	 */
	public function undo($key)
	{
		if(isset($_SESSION[$key]))
		{
			unset($_SESSION[$key]);
		}
	}

	/**
	 * It returns the requested session if it exist 
	 * else return the whole session
	 * @param String $key
	 */
	public function get($key ='') {
		if(array_key_exists($key, $_SESSION)) {
		  return $_SESSION[$key];
		}
		return $_SESSION;
	}
}