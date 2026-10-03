<?php
/* conexion con la base de datos */
include ("Conexio.php");

/*Crear la conexion*/
$conn=conectar();

/* Recibir los datos del formulario */
$matricula = $_POST['matricula'];
$nombre = $_POST['nombre'];
$apellidoPaterno = $_POST['apellido_p'];
$apellidoMaterno = $_POST['apellido_m'];
$edad = $_POST['edad'];

/* Insertar los datos en la base de datos */
$sql = "INSERT INTO alumnos (matricula, nombre, apellido_p, apellido_m, edad) VALUES ('$matricula', '$nombre', '$apellido_p', '$apellido_m', '$edad')";  

/* Ejecutar la consulta */
$query = mysqli_query($conn, $sql);

/* comprobamos si se inserto o no al alumno */
if ($query) {
    header("Location: alumnos.php");
}
    else{
        echo"Error al insertar al alumno";
    }

?>