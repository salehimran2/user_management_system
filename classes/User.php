<?php

class User{

    private $_db;

    public function __construct(){
        $this->_db = DB::getInstance();
    }

    public function create($user = array()){

        if(!$this->_db->insert('users', $user)){
            throw new Exception('There was an error creating an account!'); 
        }

    }
}