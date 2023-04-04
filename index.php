<?php

include_once "db/conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conect, $query);

    if (mysqli_num_rows($result) == 1) {
        session_start();
        $_SESSION['username'] = $username;
        echo ("<script>location.href='./inicio.php';</script>");
    } 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="css\sing-in.css">

</head>
<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <form method="POST">
            <img class="mb-4" src="assets\paquete-productos-limpieza-superficies_23-2148541961.avif" alt="" width="75" height="65" style="border-radius: 65px; border: 1px solid black;">
            <h1 class="h3 mb-3 fw-normal">Bienvenido a Cleanix</h1>
            <p class="mb-3 text-body-secondary">Por favor, inicia sesión</p>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
                <label for="floatingInput">Usuario</label>
            </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                    <label for="floatingPassword">Contraseña</label>
                <button class="w-50 btn btn-lg btn-outline-info" type="submit" class="btningresar" value="ok"> Sign in</button>
        </form>
    </main>

</body>
</html>