<?php
class Input{
    public static function exists($type='post'){
  switch($type){
      case 'post':
     return (!empty($_POST)) ? true: false;
      break;
      case 'get':
      return (!empty($_POST)) ? true: false;
      break;
      default:
      return false;
      break;
     }
     }

    public static function get($string){
        if(isset($_POST[$string])){
            return $_POST[$string];
        }elseif(isset($_GET[$string])){
            return $_GET[$string];
        }else{
            return '';
        }

    }

}
    