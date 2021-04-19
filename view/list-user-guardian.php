<?php
require_once '../controller/user.php';
$users = new userController();

?>
<!DOCTYPE html>
<html>
<head>
<title>Lista de cuidadores de cada estudiante</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>

<div class="container mt-5">
    <?php
        foreach($users->listGuardian() as $gt ){
    ?>
    <div class="card mt-2" style="width: 18rem;">
    <div class="card-body">
        <h5 class="card-title"><?php echo $gt->name; ?></h5>
    </div>
    <ul class="list-group list-group-flush">
        <?php
            foreach($users->listStudenttoGuardian($gt->id_guardian) as $st ){
        ?>
            <li class="list-group-item"><?php echo $st->name; ?></li>
        <?php
           }
        ?>
    </ul>
    </div>
    <?php
        }
    ?>
</div>

</body>

</html>