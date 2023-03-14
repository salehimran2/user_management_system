<?php

class Validate{

    private $_db = null,
            $_errors = array(),
            $_passed = false;

            public function __construct() {
                $this->_db = DB::getInstance();
            }

            public function check($source, $items = array()){

                foreach($items as $item => $itm){
                    foreach($itm as $valid => $validvalue){
                        $src = trim($source[$item]);

                        if($valid === 'required' && empty($src)){
                            $this->addError("{$item} is required"); 

                        }
                        if($valid === 'min' && strlen($src) < $validvalue){
                            $this->addError("{$item} must be minimum of 2 characters"); 
                        }

                        if($valid === 'max' && strlen($src) > $validvalue){
                            $this->addError("{$item} must be minimum of 2 characters"); 
                        }

                        if($valid === 'matches' && $src != $source[$validvalue]){
                            $this->addError("{$item} must be the same with password!"); 
                        }

                        if($valid === 'unique'){
                           $check = $this->_db->get($validvalue, array($item, '=', $src));
                           if($check->count()){
                            $this->addError("{$item} already exist!"); 
                           }
                        }

                    }
                }

                if(empty($this->_errors)){
                    $this->_passed = true;
                }

            }

            public function addError($error){
                $this->_errors[] = $error;
            }

            public function display(){
                return $this->_errors;
            }

            public function passed(){
                return $this->_passed;
            }

}