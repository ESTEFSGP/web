<?php
    include_once '../baseDatos/bd.php';
    $conexionBD = BD::crearInstancia();

    // Obtener los datos de la encuesta
    $consulta = $conexionBD->prepare("SELECT * FROM encuesta");
    $consulta->execute();
    $listaProductos = $consulta->fetchAll();

// Obtener los datos de la encuesta
$consulta = $conexionBD->prepare("SELECT * FROM encuesta");
$consulta->execute();
$listaProductos = $consulta->fetchAll();

// Manejar la eliminación de datos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clearTable'])) {
    $consultaBorrar = $conexionBD->prepare("DELETE FROM encuesta");
    $consultaBorrar->execute();
    echo "Datos borrados exitosamente"; // Mensaje de depuración
    header("Location: vista_encuesta.php"); // Redirigir para evitar resubmit
    exit;
}

