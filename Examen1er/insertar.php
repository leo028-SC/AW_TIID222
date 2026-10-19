<?php
/* Conexión con la base de datos */
include("Conexión.php");

/* Crear la conexión */
$conn = conectar();

/* Recibir los datos del formulario */
$marca  = $_POST['marca'];
$modelo = $_POST['modelo'];
$año    = $_POST['año'];
$precio = $_POST['precio'];

/* Insertar los datos coincidiendo con los nombres de la BD */
$sql = "INSERT INTO carros (Marca, Modelo, Año, Precio) VALUES ('$marca', '$modelo', '$año', '$precio')";  

/* Ejecutar la consulta */
$query = mysqli_query($conn, $sql);

/* Comprobar redirección */
if ($query) {
    header("Location: Examen.php");
} else {
    echo "Error al insertar el registro";
}

?>