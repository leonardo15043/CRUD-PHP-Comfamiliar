<?php
require_once '../controller/user.php';
$users = new userController();
print_r($users->listUsers());

?>

