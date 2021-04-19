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

    public function editUser($user){
        $data = new user();
        $data = $this->model->editUser($user);
    }

    public function addUser($user){
        $data = new user();
        $data = $this->model->addUser($user);
    }

    public function addGuardianStuden($user){
        $data = new user();
        $data = $this->model->addGuardianStuden($user);
    }

    public function delete($id){
        $data = new user();
        $data = $this->model->deleteUser($id);
    }

    public function saveCsv(){

        $file = fopen("../assets/usuarios.csv", "r");
        while(!feof($file)){
            $data[] = fgetcsv($file, 1024);
        }

        for ($i=1; $i < count($data); $i++) { 
                $save['name'] = $data[$i][0];
                $save['surname'] = $data[$i][1];
                $save['date_birth'] = $data[$i][2];
                $save['phone'] = $data[$i][3];
                $save['identification'] = $data[$i][4];
                $save['city'] = $data[$i][5];
                $save['address'] = $data[$i][6];
                $save['enabled'] = $data[$i][7];
                $save['type_user'] = $data[$i][8];
                $save['id_student'] = $data[$i][9];
                
                $this->addGuardianStuden($save);     
        }

        return $data;

    }
    
}