<?php

include("conexión.php");

$conn = conectar();

$sql = "SELECT * FROM carros";

$query=mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class = "contenedor" > 
<header style="background-color: #37474f; color: white; padding: 15px; text-align: center;">
    <h1>Examen 1er parcial - Aplicaciones web</h1>
</header>
<div>
    <h1>Formulario</h1>
    <div>
    <form style= "border: 1px solid #ccc; padding: 20px; border-radius: 5px; max-width: 200px;"action="insertar.php" method="POST">
    <label for="marca">Marca:</label>
    <input type="text" id="marca" name="marca">
    <label for="modelo">Modelo:</label>
    <input type="text" id="modelo" name="modelo">
    <label for="año">Año:</label>
    <input type="text" id="año" name="año">
    <label for="precio">Precio:</label>
    <input type="text" id="precio" name="precio">
    <input type="submit" value="Enviar">
</div>

</div>
<div  style="margin-left: auto; margin-right: 0;">
<h1>Tabla de Carros</h1>
<table style="width: 100%; border-collapse: collapse; text-align: left; margin-left: auto; margin-right: 0;">
<thead>
    <tr style="background-color: #37474f; color: white;">
    <th style="padding: 8px; border: 1px solid #ddd;">ID</th>
    <th style="padding: 8px; border: 1px solid #ddd;">Marca</th>
    <th style="padding: 8px; border: 1px solid #ddd;">Modelo</th>
    <th style="padding: 8px; border: 1px solid #ddd;">Año</th>
    <th style="padding: 8px; border: 1px solid #ddd;">Precio</th>
    </tr>
</thead>
<tbody>
        
        <?php
        while($row=mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $row['Marca']?></td>
            <td><?php echo $row['Modelo']?></td>
            <td><?php echo $row['Año']?></td>
            <td><?php echo $row['Precio']?></td>
            <td>
        </tr>
        <?php
        }
        ?>
    <tbody>
<tbody>
    <tr>
    <td style="padding: 8px; border: 1px solid #ddd;">1</td>
    <td style="padding: 8px; border: 1px solid #ddd;">Toyota</td>
    <td style="padding: 8px; border: 1px solid #ddd;">Corolla</td>
    <td style="padding: 8px; border: 1px solid #ddd;">2022</td>
    <td style="padding: 8px; border: 1px solid #ddd;">310000</td>
    </tr>
</tbody>
</table>
</div>
<a href="Creamos nuevo repositorio en GitHub.pdf" target="_blank">R1</a>
<a href="introduccion a php.pdf" target="_blank">R2</a>
<a href="R3.pdf" target="_blank">R3</a>

<div>
    <footer style="background-color: #263238; color: white; text-align: center; padding: 10px; margin-top: 10px;">
        <img src="descarga.jpg" alt="">
    <h1>Leonardo Octavio suarez Cocilion</h1>
    <p style="margin: 0; font-size: 14px;">En estos 4 cuatrimestres me ha costado mucho trabajo, pero he aprendido mucho.</p>
</footer>
</div>
</div>

</body>
</html>