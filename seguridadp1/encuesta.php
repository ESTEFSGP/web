<?php 
 $conexion = mysqli_connect("localhost", "root", "", "formularios");

// Recuperar datos POST y sanitizar entradas
$nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
$edad = mysqli_real_escape_string($conexion, $_POST['edad']);
$colonia = mysqli_real_escape_string($conexion, $_POST['colonia']);
$municipio = mysqli_real_escape_string($conexion, $_POST['municipio']);
$percepcion_seguridad = mysqli_real_escape_string($conexion, $_POST['percepcion_seguridad']);
$pm = mysqli_real_escape_string($conexion, $_POST['pm']);
$pe = mysqli_real_escape_string($conexion, $_POST['pe']);
$gn = mysqli_real_escape_string($conexion, $_POST['gn']);
$ej = mysqli_real_escape_string($conexion, $_POST['ej']);
$ma = mysqli_real_escape_string($conexion, $_POST['ma']);
$van=mysqli_real_escape_string($conexion,$_POST['van']);
$cons=mysqli_real_escape_string($conexion,$_POST['cons']);
$rotos=mysqli_real_escape_string($conexion,$_POST['rotos']);
$bansmo=mysqli_real_escape_string($conexion,$_POST['bansmo']);
$vesumo=mysqli_real_escape_string($conexion,$_POST['vesumo']);
$disp=mysqli_real_escape_string($conexion,$_POST['disp']);
$huachi=mysqli_real_escape_string($conexion,$_POST['huachi']);
$desem= mysqli_real_escape_string($conexion, $_POST['desem']);
$confianza= mysqli_real_escape_string($conexion, $_POST['confianza']);
$pres= mysqli_real_escape_string($conexion, $_POST['pres']);

// Preparar la consulta SQL
$query = "INSERT INTO encuesta (nombre, edad, colonia, municipio, percepcion_seguridad,
                     pm,pe,gn,ej,ma, van,cons,rotos,bansmo,vesumo,disp,huachi, desem, confianza, pres) 
          VALUES ('$nombre', '$edad', '$colonia', '$municipio', '$percepcion_seguridad',
           '$pm','$pe','$gn','$ej','$ma', '$van','$cons','$rotos','$bansmo','$vesumo','$disp','$huachi', '$desem', '$confianza', '$pres')";

$ejecutar = mysqli_query($conexion, $query);

// Verificar si la consulta fue exitosa
if ($ejecutar) {
    echo '
    <script>
        alert("Usuario registrado exitosamente");
        window.location = "encuesta.html";
    </script>
    ';
} else {
    echo '
    <script>
        alert("Inténtelo de nuevo, Usuario no almacenado: ' . mysqli_error($conexion) . '");
        window.location = "../encuesta.php";
    </script>
    ';
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
