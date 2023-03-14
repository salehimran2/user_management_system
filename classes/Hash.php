<?php

class Hash{
    public static function make($name, $string=''){
        return hash('sha256', $name . $string);
    }

    public static function salt($number){
        return bin2hex(random_bytes($number));

    }

    public static function unique(){
        
    return self::make(uniqid());
    }
 

}