<?php

class Session
{
	
	public static function init()
	{
		@session_start();
	}
	
	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}
	
	public static function get($key)
	{
		if (isset($_SESSION[$key]))
		return $_SESSION[$key];
	}
	
	public static function destroy()
	{
		//unset($_SESSION);
		session_destroy();
	}

	public static function checkRole($role)
    {
        if(Session::get('role') != $role)
        {
            Session::destroy();
            header('location: ' . URL . 'login');
        }
    }

    public static function checkLoggedIn()
    {
        if(Session::get('loggedIn') == false)
        {
            Session::destroy();
            header('location:' . URL . 'login');

        }
    }

}