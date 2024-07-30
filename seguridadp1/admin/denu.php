<?php
    include_once '../baseDatos/bd.php';
    $conexionBD = BD::crearInstancia();

    
    $consulta = $conexionBD->prepare("SELECT * FROM denuncias");
    $consulta->execute();
    $listaProductos = $consulta->fetchAll();


$consulta = $conexionBD->prepare("SELECT * FROM denuncias");
$consulta->execute();
$listaProductos = $consulta->fetchAll();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clearTable'])) {
    $consultaBorrar = $conexionBD->prepare("DELETE FROM denuncias");
    $consultaBorrar->execute();
    echo "Datos borrados exitosamente"; 
    header("Location: vista_denuncias.php"); 
    exit;
}
