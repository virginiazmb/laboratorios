<?php


if (!empty($_POST["btn_registrar"])) {
    if (!empty($_POST["producto"]) and !empty($_POST["cantidad"]) and !empty($_POST["descrip"]) and !empty($_POST["precio"])) {
        $pro = $_POST["producto"];
        $cantidad = $_POST["cantidad"];
        $info = $_POST["descrip"];
        $buy = $_POST["precio"];

        $sql = $conect->query(" INSERT INTO productos_agg(nombre_product,cantidad_product,descripcion_product,precio_product)VALUES('$pro',$cantidad,'$info',$buy) ");
    }else {
        echo "<h1>not funciona</h1>";
    }
}



?>

