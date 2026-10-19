<?php

include ("Conexio.php");

$conn=conectar();

//recibimos matricula enviada por url
$matricula=$_GET['Matricula'];

//Eliminamos al alumno de la base de datos
$sql="DELETE FROM alumnos WHERE Matricula='$matricula'";

$query=mysqli_query($conn, $sql);

//comprobamos si se elimino o no al alumno
if($query){
    header("Location: alumnos.php");
}
else{
    echo"Error al eliminar al alumno" . mysqli_error($conn);

}

?>