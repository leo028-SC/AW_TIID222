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
    <div>
<table border = "2">
    <thead>
<tr>
    <th>Matricula</th>
    <th>Nombre</th>
    <th>Apellido Paterno</th>
    <th>Apellido Materno</th>
    <th>Edad</th>
    <th>Acciones</th>
</tr>
    </thead>
    <tbody>
        
        <?php
        while($row=mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $row['matricula']?></td>
            <td><?php echo $row['nombre']?></td>
            <td><?php echo $row['apellido_p']?></td>
            <td><?php echo $row['apellido_m']?></td>
            <td><?php echo $row['edad']?></td>
            <td>
        </tr>
        <?php
        }
        ?>
    <tbody>
<tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
    <td>jfdnf</td>
    <td>fafew</td>
    <td>
        <button type="button">Editar</button>
        <button type="button">Eliminar</button>
    </td>
</tr>
<tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
    <td></td>
    <td></td>
    <td> 
        <button type="button">Editar</button>
        <button type="button">Eliminar</button>
    </td>

</tr>
</tbody>
</table>
</div>
<div>
    <h1>Formulario</h1>
    <div style = "display: flex; gap :10px;">
    <form action="insertar.php" method="POST">
        <input type="text" name="matricula" placeholder="Matricula">
        <input type="text" name="nombre" placeholder="Nombre">
        <input type="text" name="apellido_p" placeholder="Apellido_p">
        <input type="text" name="apellido_m" placeholder="Apellido_m">
        <input type="text" name="edad" placeholder="Edad">
        <input type="submit" value="Enviar">
    </div>
    </form>
</div>
</body>
</html>