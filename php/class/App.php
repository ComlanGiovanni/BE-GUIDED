<?php

class App
{
    static $db = null;

    static function getDatabase()
    {
        if (!self::$db){
            self::$db = new Database('root', '', 'be-guided');
        }
        return self::$db;

    }
    
    static function getUser()
    {
        return new User(Session::getInstance());
    }
    
    static function getOffer()
    {
        return new Offer(Session::getInstance());
    }
    
    static function redirect($page)
    {
        header("Location: $page");
        exit();
    }

}