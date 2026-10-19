<?php
include("Conexio.php");

$conn = conectar();

// Recibir los datos enviados por el formulario de editar.php
$matricula  = $_POST['Matricula'];
$nombre     = $_POST['Nombre'];
$apellido_p = $_POST['Apellido_p'];
$apellido_m = $_POST['Apellido_m'];
$edad       = $_POST['Edad'];

// Actualizar los registros en la base de datos
$sql = "UPDATE alumnos SET Nombre='$nombre', Apellido_p='$apellido_p', Apellido_m='$apellido_m', Edad='$edad' WHERE Matricula='$matricula'";

$query = mysqli_query($conn, $sql);

// Comprobamos si se realizo el cambio
if ($query) {
    header("Location: alumnos.php");
} else {
    echo "Error al actualizar la informacion del alumno: " . mysqli_error($conn);
}
?>