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
    <h1>Formulario</h1>
    <div style = "display: flex; gap :10px;">
    <form action="insertar.php" method="POST">
        <input type="text" name="Matricula" placeholder="Matricula">
        <input type="text" name="Nombre" placeholder="Nombre">
        <input type="text" name="Apellido_p" placeholder="Apellido Paterno">
        <input type="text" name="Apellido_m" placeholder="Apellido Materno">
        <input type="text" name="Edad" placeholder="Edad">
        <input type="submit" value="Enviar">
    </form>
    </div>
    <div>
<table border = "2" style = "border-collapse: collapse; margin-top: 20px; width: 100%;">
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
            <td><?php echo $row['Matricula']?></td>
            <td><?php echo $row['Nombre']?></td>
            <td><?php echo $row['Apellido_p']?></td>
            <td><?php echo $row['Apellido_m']?></td>
            <td><?php echo $row['Edad']?></td>
            <td>
                <a href="editar.php?Matricula=<?php echo $row['Matricula']; ?>" style="background-color: #c3ffc5; color: white; border: none; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">Editar</a>
                <a href="Delete.php?Matricula=<?php echo $row['Matricula']; ?>" style="background-color: #ffaea8; color: white; border: none; padding: 10px 20px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer;">Eliminar</a>
            </td>
        </tr>
        <?php
        }
        ?>

</tbody>
</table>
</div>
</div>
</body>
</html>