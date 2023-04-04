

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

<!--FORMULARIO-->


        <h3 style="text-align: center; margin-top: 40px; margin-bottom: 30px;">REGISTROS DE PRODUCTOS / INVENTARIO</h3>
                <?php 
                include_once "db/conexion.php";
                include_once "archivos/delete.php";
                ?>
            <form method="POST">
                <div class="container" style="margin-top: 50px;">
                    <label for="formGroupExampleInput" class="form-label" style="font-size: 25px; font-family:'Century Gothic';">Nombre del producto</label>
                    <input type="text" class="form-control"  placeholder="Nombre del producto a insertar" name="producto">

                    <label for="formGroupExampleInput" class="form-label" style=" margin-top: 10px; font-size: 25px; font-family:'Century Gothic';">Cantidad del producto</label>
                    <input type="text" class="form-control"  placeholder="Cantidad del producto a insertar" name="cantidad">

                    <label for="formGroupExampleInput" class="form-label" style=" margin-top: 10px; font-size: 25px; font-family:'Century Gothic';">Descripcion del producto</label>
                    <input type="text" class="form-control"  placeholder="Cantidad del producto a insertar" name="descrip">

                    <label for="formGroupExampleInput" class="form-label" style=" margin-top: 10px; font-size: 25px; font-family:'Century Gothic';">Precio del producto</label>
                    <input type="text" class="form-control"  placeholder="Cantidad del producto a insertar" name="precio">

                    <button type="submit" class="btn btn-outline-info" name="btn_registrar" value="ok" style= "margin-top: 20px; margin-left: 410px; margin-bottom: 60px;">Registrar</button>
                    <?php 
                        include_once "db/conexion.php";
                        include_once "archivos/crear.php";
                    ?>
                </div>
            </form>


    
    <div class="container" style="padding-left: 95px; padding-right: 45px; margin-bottom: 45px;">
        <h3 style="text-align: center; margin-bottom: 40px;">PRODUCTOS REGISTRADOS</h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre del producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Precio</th>
                </tr>
            </thead>
        <tbody>
        <?php
        include_once("db/conexion.php");

        $sqli=$conect->query(" select * from productos_agg ");

        while($archive=$sqli->fetch_object()){ ?>
            <tr>
            <th><?= $archive->id?></th>
            <td><?= $archive->nombre_product?></td>
            <td><?= $archive->cantidad_product?></td>
            <td><?= $archive->descripcion_product?></td>
            <td><?= $archive->precio_product?></td>
            <td><a href="productos.php?id=<?= $archive->id ?>" class="btn btn-outline-dark" role="buttom">Eliminar</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<button type="submit" class="btn btn-outline-info" name="btnpdf" value="pdf"><a href="fpdf/PruebaV.php" target="_blank" style="text-decoration:none; color: black; text-align: right;">Reportes</a></button>
<button type="submit" class="btn btn-outline-dark" name="btnpdf" value="pdf"><a href="graficos.php" style="text-decoration:none; color: pink; text-align: right;">Graficos</a></button>
</div>

</body>
</html>