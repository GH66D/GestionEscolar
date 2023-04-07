<?php

function connection(){
    $host = "localhost";
    $user = "root";
    $pass = "";

    $bd = "registro_alumnos2023";
    $connect = mysqli_connect($host,$user,$pass);

    mysqli_select_db($connect,$bd);
    return $connect;
};

?>