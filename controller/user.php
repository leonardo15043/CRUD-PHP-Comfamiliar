<?php
require_once '../model/user.php';

class userController{

    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new user();
    }

    public function listGuardian(){

        $data = new user();
        $data = $this->model->getAllGuardianStudent();
        
        return $data;
    }
    
    public function listStudenttoGuardian($id){

        $data = new user();
        $data = $this->model->getStudenttoGuardian($id);
        
        return $data;
    }
    
}