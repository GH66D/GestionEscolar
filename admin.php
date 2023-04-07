<?php
include('conexion.php');

$con = connection();

$boleta = $_POST['boleta'];
$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$nacimiento = $_POST['nacimiento'];
$genero = $_POST['genero'];
$discapacidad = $_POST['discapacidad'];
$curp = $_POST['curp'];
$calle = $_POST['calle'];
$colonia = $_POST['colonia'];
$alcaldia = $_POST['alcaldia'];
$cp = $_POST['cp'];
$tel = $_POST['tel'];
$correo = $_POST['correo'];
$escuela = $_POST['escuela'];
$estado = $_POST['estado'];
$nombresc = $_POST['nombresc'];
$promedio = $_POST['promedio'];
$opcion = $_POST['opcion'];
$examen1 = $_POST['examen'];


$sql1 = "INSERT INTO alumno VALUES('$boleta', '$nombre', '$paterno', '$materno', '$nacimiento', '$genero', '$discapacidad', '$curp', '$calle', '$colonia', '$alcaldia', '$cp', '$tel', '$correo', '$escuela', '$estado', '$nombresc', '$promedio', '$opcion', '$examen1');";
$query1 = mysqli_query($con, $sql1);


$sql2 = "UPDATE control_examen SET disponibilidad = (disponibilidad - 1) , asignados = (asignados + 1) WHERE id_examen = '$examen1';";
$query2 = mysqli_query($con,$sql2);

Header("Location: MainAdmin.php");

?>