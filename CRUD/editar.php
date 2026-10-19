// editar crud
<?php
include("Conexio.php");

$conn = conectar();

// Recibir la matricula enviada desde el enlace de la tabla
$matricula = $_GET['Matricula'];

// Consulta para traer solo la informacion del alumno seleccionado
$sql = "SELECT * FROM alumnos WHERE Matricula='$matricula'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
</head>
<body>
    <div>
        <h1>Editar Alumno</h1>
        <form action="actualizar.php" method="POST">
            <!-- Campo oculto para mantener la matricula original al actualizar -->
            <input type="hidden" name="Matricula" value="<?php echo $row['Matricula']; ?>">

            <label for="Nombre">Nombre:</label><br>
            <input type="text" name="Nombre" value="<?php echo $row['Nombre']; ?>"><br><br>

            <label for="Apellido_p">Apellido Paterno:</label><br>
            <input type="text" name="Apellido_p" value="<?php echo $row['Apellido_p']; ?>"><br><br>

            <label for="Apellido_m">Apellido Materno:</label><br>
            <input type="text" name="Apellido_m" value="<?php echo $row['Apellido_m']; ?>"><br><br>

            <label for="Edad">Edad:</label><br>
            <input type="text" name="Edad" value="<?php echo $row['Edad']; ?>"><br><br>

            <input type="submit" value="Actualizar Información">
        </form>
    </div>
</body>
</html>