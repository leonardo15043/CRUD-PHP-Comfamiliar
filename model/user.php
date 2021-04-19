<?php
require_once '../db.php';

class User{

    private $pdo;

    public function __CONSTRUCT()
	{
		
		$this->pdo = Database::connection();     
		
	}

    public function getAllGuardianStudent(){

        $result = array();
		$stm = $this->pdo->prepare("SELECT * FROM user as u INNER JOIN relationship as r ON u.id_user = r.id_guardian");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);

    }

	public function getStudenttoGuardian($id_guardian){

        $result = array();
		$stm = $this->pdo->prepare("SELECT * FROM user as u INNER JOIN relationship as r ON u.id_user = r.id_student WHERE  r.id_guardian =".$id_guardian);
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);

    }

}
