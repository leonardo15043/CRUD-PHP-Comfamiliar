<?php
require_once '../model/type-user.php';

class typeUserController{

    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new TypeUser();
    }

    public function getAllTypes(){
        return $this->model->getAll();
    }

}