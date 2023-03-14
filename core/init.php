<?php
session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => 'splus1703',
        'db' => 'crud'

    ),
     'remember' => array(
     'cookie_name' => 'hash',
     'cookie_expiry' => 604800
     ),
     'session' => array(
        'session_name' => 'user',
        'token_name'   => 'token'

     )
         );

     spl_autoload_register('Loadclasses');

     function Loadclasses($classname){
         $path = 'classes/';
         $ext = '.php';
         $fullpath = "".$path."".$classname."".$ext."";
         if(file_exists($fullpath)){
         include_once $fullpath;
         }else{
             return false;
         }
     }

     include_once 'functions/sanitize.php';
     include_once 'includes/random_compat/lib/random.php';
     