<?php 

if(!empty($_GET["id"])){
    $id = $_GET["id"];
    $sql = $conect->query(" delete from productos_agg where id='$id' ");
}
?>