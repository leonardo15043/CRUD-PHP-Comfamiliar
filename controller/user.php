<?php
require_once '../model/user.php';

class userController{

    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new user();
    }

    public function listUsers(){

        $data = new user();
        $data = $this->model->getAll();
        
        return $data;
    }
    
}