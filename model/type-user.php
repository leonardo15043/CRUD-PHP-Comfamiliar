<?php
require_once '../db.php';

class TypeUser{

    private $pdo;

    public function __CONSTRUCT()
	{
		$this->pdo = Database::connection();     
	}

    public function getAll(){
        $stm = $this->pdo->prepare("SELECT * FROM type_user");
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
    }
}