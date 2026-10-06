<?php
/* creacion de funcion llamada conectar*/ 
/*Funcuion -> Bloque de codigo que podemos mandar llamar cuando queramos */

function conectar(){
    /*Infomacion del servidor */
    $host="localhost";
    $user="root";
    $pass="";

    /*Base de datos */
    $db="AW_crud";

    /*Conectar a la base de datos */
    $conn=mysqli_connect($host, $user, $pass, $db);
    
    mysqli_select_db($conn, $db);
    return $conn;
}


?>