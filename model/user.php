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

	public function getUser($id){
	
		$stm = $this->pdo->prepare("SELECT * FROM user WHERE id_user = ? ");	
		$stm->execute(array($id));
		return $stm->fetch(PDO::FETCH_OBJ);
		
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

	public function addGuardianStuden($user){

        $result = array($user['name'],$user['surname'],$user['date_birth'],$user['phone'],$user['identification'],$user['city'],$user['address'],1,$user['type_user'],date("Y-m-d"),date("Y-m-d") );
		$stm = $this->pdo->prepare("INSERT INTO user (name,surname,date_birth,phone,identification,city,address,enabled,type_user,creation_date,update_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");	
		$stm->execute($result);
		
		$stm1 = $this->pdo->prepare("SELECT * FROM user ORDER BY id_user desc LIMIT 1");
		$stm1->execute();
		$data_csv = $stm1->fetch(PDO::FETCH_OBJ);

		$result3 = array($data_csv->id_user,$user['id_student'],date("Y-m-d"),date("Y-m-d") );
		$stm3 = $this->pdo->prepare("INSERT INTO relationship (id_guardian,id_student,creation_date,update_date) VALUES (?, ?, ?, ?)");	
		$stm3->execute($result3);

    }

	public function deleteUser($id){
        $stm = $this->pdo->prepare("DELETE FROM user WHERE id_user = ?");			          
        $stm->execute(array($id));
    }

}
