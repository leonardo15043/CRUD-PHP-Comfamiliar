<?php
require_once '../model/user.php';

class userController{

    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new user();
    }

    
    public function getAllUsers(){

        $data = new user();
        $data = $this->model->getAll();
        
        return $data;
    }

    public function getUser($id){
       return $this->model->getUser($id);
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

    public function addUser($user){
        $data = new user();
        $data = $this->model->addUser($user);
    }

    public function delete($id){
        $data = new user();
        $data = $this->model->deleteUser($id);
    }
    
}