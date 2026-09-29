<?php
//incluye la informacion del archivo Conexio.php para poder conectarse a la base de datos
include ("Conexio.php");

//Manddamo llamar para ejecutar la funcion conectar y poder conectarnos a la base de datos
$conn=conectar();

//Dame todo lo que tengas en la tabla de alumnos
$sql="SELECT * FROM alumnos";

//
$query=mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Alumnos</title>
</head>
<body>
<table>
<tr>
    <th>Matricula</th>
    <th>Nombre</th>
    <th>Apellido Paterno</th>
    <th>Apellido Materno</th>
    <th>Edad</th>
    <th>Acciones</th>
</tr>
<tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
    <td></td>
    <td></td>
    <td></td>
</tr>
<tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
    <td></td>
    <td></td>
    <td></td>
</tr>
</table>
</body>
</html>