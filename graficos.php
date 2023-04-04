
<?php 
include_once("db/conexion.php"); 

$sqli = "SELECT * FROM productos_agg"; 
$parse = mysqli_query($conect, $sqli); 
$nombre = []; 
$cantidad = []; 
if(mysqli_num_rows($parse) > 0) { 
    while($array = mysqli_fetch_array($parse)) { 
        array_push($nombre, $array['nombre_product']); 
        array_push($cantidad, $array['cantidad_product']); 
    } 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Grafico</title>
<script src="https://kit.fontawesome.com/b9a22337ae.js" crossorigin="anonymous"></script>
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
                <a class="nav-link active" aria-current="page" href="index.php">INICIO</a>
                <a class="nav-link" href="productos.php">PODUCTOS</a>
                <a class="nav-link" href="crearusuario.php">CREAR USUARIOS</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container" style="height:50%; width:50%; margin-top:8%; margin-bottom: 10%;">
    <h2 class="text-center mb-3">Productos mas vendidos</h2>
    <canvas id = "lineChart" height = "10" width = "10"></canvas> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 

    <script> 
        const CHART = document.getElementById("lineChart"); 
        console.log(CHART); 
        const colors = ['rgb(69,177,223)', 'rgb(99,201,122)', 'rgb(203,82,82)', 'rgb(229,224,88)'];
        let lineChart = new Chart(CHART, { 
            type: "pie", 
            data: { 
                labels: [<?php echo '"'.implode('","',  $nombre ).'"' ?>], 
                datasets: [{ 
                    label: 'Cantidad', 
                    data: [<?php echo '"'.implode('","',  $cantidad ).'"' ?>], 
                    fill: false, 
                    borderColor: colors, 
                    tension: 0.1, 
                    backgroundColor: colors, 
                }] 
            } 
        }) 
    </script> 
    </div>
</body>
</html>