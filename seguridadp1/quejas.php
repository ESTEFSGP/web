<?php
// Establecer la conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "formularios");

$tipo =mysqli_real_escape_string($conexion, $_POST['tipo']);
$texto=mysqli_real_escape_string($conexion,$_POST['texto']);

// Preparar la consulta SQL
$query = "INSERT INTO quejas (tipo, texto) 
          VALUES ('$tipo', '$texto')";
$ejecutar = mysqli_query($conexion, $query);

// Verificar si la consulta fue exitosa
if ($ejecutar) {
    echo '
    <script>
        alert("Usuario registrado exitosamente");
        window.location = "quejas.html";
    </script>
    ';
} else {
    echo '
    <script>
        alert("Inténtelo de nuevo, Usuario no almacenado: ' . mysqli_error($conexion) . '");
        window.location = "../queja.php";
    </script>
    ';
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>