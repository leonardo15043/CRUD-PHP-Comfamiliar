<?php
require_once '../db.php';

class User{

    private $pdo;

    public function __CONSTRUCT()
	{
		$this->pdo = Database::connection();     
	}

	public function getAll(){

		$stm = $this->pdo->prepare("SELECT u.*, tu.role FROM user as u INNER JOIN type_user as tu ON u.type_user = tu.id_typeuser");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);

    }

    public function getAllGuardianStudent(){

		$stm = $this->pdo->prepare("SELECT * FROM user as u INNER JOIN relationship as r ON u.id_user = r.id_guardian");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);

    }

	public function getStudenttoGuardian($id_guardian){

		$stm = $this->pdo->prepare("SELECT * FROM user as u INNER JOIN relationship as r ON u.id_user = r.id_student WHERE  r.id_guardian =".$id_guardian);
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);

    }

	public function addUser($user){
	
        $result = array($user['name'],$user['surname'],$user['date_birth'],$user['phone'],$user['identification'],$user['city'],$user['address'],1,$user['type_user'],date("Y-m-d"),date("Y-m-d") );
		$stm = $this->pdo->prepare("INSERT INTO user (name,surname,date_birth,phone,identification,city,address,enabled,type_user,creation_date,update_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");	
	    $stm->execute($result); 
    }

}
