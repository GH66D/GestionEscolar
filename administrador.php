<?php

include('conexion.php');


$con = connection();
$id = $_GET["id"];
$id1 = $_GET["id1"];



$sql = "SELECT disponibilidad FROM control_examen WHERE id_examen = '$id';";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_array($query);

$sql1 = "UPDATE control_examen SET disponibilidad = (disponibilidad + 1) WHERE id_examen = '$id';";

$sql2 = "UPDATE control_examen SET asignados = (asignados - 1) WHERE id_examen = '$id';";


$sql3 = "SELECT asignados FROM control_examen WHERE id_examen = '$id';";
$query3 = mysqli_query($con,$sql3);
$row1 = mysqli_fetch_array($query3);

$sql4 = "DELETE FROM alumno WHERE boleta = '$id1';";
$query4 = mysqli_query($con,$sql4);


if($row['disponibilidad'] < 25){
$query1 = mysqli_query($con,$sql1);
}

if($row1['asignados'] != 0){
$query2 = mysqli_query($con,$sql2);
}



header("location:MainAdmin.php");


?>
