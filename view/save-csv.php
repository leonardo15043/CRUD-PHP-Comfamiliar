<?php
require_once '../controller/user.php';
$users = new userController();
$data = $users->saveCsv();

?>
<!DOCTYPE html>
<html>
<head>
<title>Lista de usuarios</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

<div class="container mt-5">
    <h1>Lista de usuarios CSV</h1>
    <table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Nombres</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Fecha de nacimiento</th>
        <th scope="col">Telefono</th>
        <th scope="col">Iedntificación</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Direccion</th>
        </tr>
    </thead>
    <tbody>
        <?php
            for ($i=1; $i < count($data); $i++) { 
        
        ?>
        <tr>
            <td><?php echo $data[$i][0]; ?></td>
            <td><?php echo $data[$i][1]; ?></td>
            <td><?php echo $data[$i][2]; ?></td>
            <td><?php echo $data[$i][3]; ?></td>
            <td><?php echo $data[$i][4]; ?></td>
            <td><?php echo $data[$i][5]; ?></td>
            <td><?php echo $data[$i][6]; ?></td>
        </tr>
        <?php
            }
        ?>
        
    </tbody>
    </table>
</div>

</body>

</html>