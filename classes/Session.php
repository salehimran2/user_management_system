<?php

class Session{

     public static function exist($tokenName){
     return (isset($_SESSION[$tokenName])) ? true : false;

     }

    public static function put($name, $token){
      return $_SESSION[$name] = $token;
    }

    public static function get($token){
      return $_SESSION[$token];
    }

    public static function delete($name){
    if(self::exist($name)){
      unset($_SESSION[$name]);
    }
    }

    public static function flash($name, $message=''){
      if(self::exist($name)){
        $session = self::get($name);
        self::delete($name);
        return $session;
      }else{
        self::put($name, $message);
      }

    }

    
}