<?php
require_once '../db.php';

class User{

    private $pdo;

    public function __CONSTRUCT()
	{
		
		$this->pdo = Database::connection();     
		
	}

    public function getAll(){

        $result = array();
		$stm = $this->pdo->prepare("SELECT * FROM user");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);

    }
}
