<?php
require_once '../controller/user.php';
$users = new userController();

?>
<!DOCTYPE html>
<html>
<head>
<title>Lista de usuarios</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>

<div class="container mt-5">
    <table class="table">
    <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombres</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Fecha de nacimiento</th>
        <th scope="col">Telefono</th>
        <th scope="col">Iedntificación</th>
        <th scope="col">Ciudad</th>
        <th scope="col">Direccion</th>
        <th scope="col">Habilitado</th>
        <th scope="col">Tipo de usuario</th>
        <th scope="col">Fecha de Creación</th>
        <th scope="col">Fecha de Modificación</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($users->getAllUsers() as $us ){
        ?>
        <tr>
            <th scope="row"><?php echo $us->id_user; ?></th>
            <td><?php echo $us->name; ?></td>
            <td><?php echo $us->surname; ?></td>
            <td><?php echo $us->date_birth; ?></td>
            <td><?php echo $us->phone; ?></td>
            <td><?php echo $us->identification; ?></td>
            <td><?php echo $us->city; ?></td>
            <td><?php echo $us->address; ?></td>
            <td><?php echo $us->enabled; ?></td>
            <td><?php echo $us->role; ?></td>
            <td><?php echo $us->creation_date; ?></td>
            <td><?php echo $us->update_date; ?></td>
        </tr>
        <?php
            }
        ?>
        
    </tbody>
    </table>
</div>

</body>

</html>