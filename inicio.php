<?php 
include "db/conexion.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorios</title>
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
                <a class="nav-link active" aria-current="page" href="inicio.php">INICIO</a>
                <a class="nav-link" href="productos.php">PODUCTOS</a>
                <a class="nav-link" href="crearusuario.php">CREAR USUARIOS</a>
                </div>
            </div>
        </div>
    </nav>

<div class="container" style="text-align:center; margin-top: 60px;">
    <h2>¡Bienvenido a Cleanix!</h2>
    <img src="assets\paquete-productos-limpieza-superficies_23-2148541961.avif" alt="" style="width: 300px; height: 300px; border-radius: 200px; margin-top: 40px; border: 1px solid grey; box-shadow: 10px 5px 5px gray;">
</div>

        <a href="logout.php" style="margin-left: 55px; top:15%; background: navy; text-decoration: none; color: white; padding: 15px 20px; border-radius: 30px; margin-bottom: 70px; text-align: center;">log out</a>

</body>
</html>