<?php

function conectar(){
    
    $host="localhost";
    $user="root";
    $pass="";

    
    $db="AW_examen";

    $conn=mysqli_connect($host, $user, $pass, $db);
    
    mysqli_select_db($conn, $db);
    return $conn;
}


?>