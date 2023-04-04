<?php 

include_once "db/conexion.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($conect, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) > 0) {
        $error_message = "Ya existe ese nombre de usuario.";
    } else {
        $query = "INSERT INTO users (username,email,password) VALUES ('$username', '$email', '$password')";
        mysqli_query($conect, $query);
        echo ("<script>location.href='./inicio.php';</script>");
        exit();
    }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREAR USUARIOS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#" style="margin-right:50px;">MENU</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="in.php">INICIO</a>
                <a class="nav-link" href="productos.php">PODUCTOS</a>
                <a class="nav-link" href="crearusuario.php">CREAR USUARIOS</a>
                </div>
            </div>
        </div>
    </nav>

<div class="container col-8">
    <br>
    <h2 class="text-center">Registrar usuario</h1>
    <div id="formproduct">
            <br>
            <form method="post">
                <label for="username">Nombre de usuario:</label>
                <input type="text" class="form-control" id="username" name="username">
                <br>
                <label for="user_password"> Correo eléctronico:</label>
                <input type="text" class="form-control" id="email" name="email">
                <br>
                <label for="user_email">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password">
                <br>
                <button class="btn btn-outline-dark" type="submit" name="submit">Registrar</button>
            </form>
        </div>
        <br>
    </div>
</div>
</body>
</html>