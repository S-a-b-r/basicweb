<?php

class Cookie
{
    public function updateTokenInCookie($token)
    {
        return setcookie('token', $token, time() + 60 * 60 * 24 * 365, '/');
    }

    public function getToken(){
        return $_COOKIE['token'];
    }

    public function deleteTokenInCookie()
    {
        setcookie('token', '', 1, '/');
    }
}