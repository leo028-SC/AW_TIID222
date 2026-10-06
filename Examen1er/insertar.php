<?php
include ("Conexión.php");


$conn=conectar();


$Marca = $_POST['Marca'];
$Modelo = $_POST['Modelo'];         
$Año = $_POST['Año'];
$Precio = $_POST['Precio'];


$sql = "INSERT INTO carros (marca, modelo, año, precio) VALUES ('$Marca', '$Modelo', '$Año', '$Precio')";  


$query = mysqli_query($conn, $sql);


if ($query) {
    header("Location: Examen.php");
}
    else{
        echo"Error al insertar el carro";
    }

?>