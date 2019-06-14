<?php

class Cookie
{

    public static function set($key,$value)
    {

        setcookie($key,$value,time() + (86400 * 30), "/","",false,true);

    }

    public static function get($key)
    {

        if(isset($_COOKIE['key']))
        {
            return $_COOKIE['key'];
        }

    }

    public static function delete($key)
    {
        setcookie($key,"",time() - 3600,"/","",false,true);
    }




}