<?php
require_once '../controller/user.php';
require_once '../controller/type-user.php';
$users = new userController();
$typeUser = new typeUserController();

if(isset($_GET['action']) && $_GET['action'] == "save"){
    $users->addUser($_POST);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Agregar Usuario</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
<div class="container mt-5">
        <h1>Agregar Usuario</h1>
    <form action="?action=save" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Nombres</label>
        <input type="text" class="form-control" id="name" name="name" >
    </div>
    <div class="form-group">
        <label for="surname">Apellidos</label>
        <input type="text" class="form-control" id="surname" name="surname" >
    </div>
    <div class="form-group">
        <label for="date_birth">Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="date_birth" name="date_birth" >
    </div>
    <div class="form-group">
        <label for="phone">Celular</label>
        <input type="text" class="form-control" id="phone" name="phone" >
    </div>
    <div class="form-group">
        <label for="identification">Identificacion</label>
        <input type="text" class="form-control" id="identification" name="identification" >
    </div>
    <div class="form-group">
        <label for="city">Ciudad</label>
        <input type="text" class="form-control" id="city" name="city" >
    </div>
    <div class="form-group">
        <label for="address">Direccion</label>
        <input type="text" class="form-control" id="address" name="address" >
    </div>
    <div class="form-group">
        <label for="type_user">Tipo de usuario</label>
        <select class="form-control" name="type_user" id="type_user">
        <option selected>Seleccionar</option>
        <?php
            foreach($typeUser->getAllTypes() as $ty ){
        ?>
            <option value="<?php echo $ty->id_typeuser; ?>"><?php echo $ty->role; ?></option>
        <?php
           }
        ?>
        </select>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
    </form>
</div>
</body>

</html>