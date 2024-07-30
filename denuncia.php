<?php
include './baseDatos/conexion.php';

// Recuperar datos POST y sanitizar entradas
$delito = mysqli_real_escape_string($conexion, $_POST['delito']);
$feho = mysqli_real_escape_string($conexion, $_POST['feho']);
$domicilio = mysqli_real_escape_string($conexion, $_POST['domicilio']);
$colonia = mysqli_real_escape_string($conexion, $_POST['colonia']);
$descrip = mysqli_real_escape_string($conexion, $_POST['descrip']);
$ecalles = mysqli_real_escape_string($conexion, $_POST['ecalles']);
$descd = mysqli_real_escape_string($conexion, $_POST['descd']);
$nomre = mysqli_real_escape_string($conexion, $_POST['nomre']);
$sexo = mysqli_real_escape_string($conexion, $_POST['sexo']);
$edad = mysqli_real_escape_string($conexion, $_POST['edad']);
$estatura = mysqli_real_escape_string($conexion, $_POST['estatura']);
$descf = mysqli_real_escape_string($conexion, $_POST['descf']);

// Crear y ejecutar la consulta SQL para insertar los datos en la tabla de denuncias
$sql = "INSERT INTO denuncias (delito, feho, domicilio, colonia, descrip, ecalles, descd, nomre, sexo, edad, estatura, descf)
VALUES ('$delito', '$feho', '$domicilio', '$colonia', '$descrip', '$ecalles', '$descd', '$nomre', '$sexo', '$edad', '$estatura', '$descf')";

$ejecutar = mysqli_query($conexion, $sql);

// Verificar si la consulta fue exitosa
if ($ejecutar) {
    echo '
    <script>
        alert("Usuario registrado exitosamente");
        window.location = "denuncia.html";
    </script>
    ';
} else {
    echo '
    <script>
        alert("Inténtelo de nuevo, Usuario no almacenado: ' . mysqli_error($conexion) . '");
        window.location = "../denuncia.php";
    </script>
    ';
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
